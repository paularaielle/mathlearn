<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\AtivoScope;
use Illuminate\Support\Facades\Storage;

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
}
