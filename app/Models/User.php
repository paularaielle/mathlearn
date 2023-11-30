<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\AtivoScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'nome',
        'nickname',
        'perfil', // 1 = Aluno, 2 = Professor, 3 = Administrador
        'email',
        'password',
        // novos campos
        'avatar',
        'pontuacao',
        'foto',
        'ativo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static $perfis = [
        1 => 'Aluno',
        2 => 'Professor',
        3 => 'Administrador',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new AtivoScope);
    }

    protected function nickname(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) =>  Str::snake(no_accents(strtolower($value))),
        );
    }

    protected function email(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) =>  no_accents(strtolower($value)),
        );
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            // get: fn (string $value) => $value,
            set: fn (string $value) =>  Hash::make($value),
        );
    }

    public function isAdmin(): bool
    {
        return $this->perfil === 3;
    }

    public function isProfessor(): bool
    {
        return $this->perfil === 2;
    }

    public function isAluno(): bool
    {
        return $this->perfil === 1;
    }

    public function strPerfil() {
        return isset(static::$perfis[$this->perfil])
            ? static::$perfis[$this->perfil]
            : 'Não definido';
    }

    public function src() {
        if (!$this->avatar) {
            return asset('img/no-avatar.png');
        }

        return $this->isAluno()
            ? asset($this->avatar)
            : Storage::url($this->avatar);
    }

    public function getTurmas () {
        return Turma::whereIn('id',
            PessoaTurma::where('user_id', $this->id)
                ->pluck('turma_id')
                ->all()
        )->get();
    }

    public function iconMedal()
    {
        if ($this->isAluno()) {
            $medalhas = config('medalha');
            foreach ($medalhas as $m) {
                if (in_array($this->pontuacao, range($m['start'], $m['end']))){
                    return '<i class="fa-solid fa-medal ' . $m['color'] . '"></i>';
                }
            }
        }
        return '';
    }

    public function turmas()
    {
        return $this->getTurmas();
    }
}
