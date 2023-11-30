<?php
namespace App\Models;

use App\Models\Scopes\ProfessorScope;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Professor extends \App\Models\User
{
    protected $table = 'users';

    protected static function booted(): void
    {
        static::addGlobalScope(new ProfessorScope);
    }
}
