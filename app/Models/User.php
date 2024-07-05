<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory,  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'dob' => 'datetime:j F Y', // Cast DOB in following format 3rd May 2024
        ];
    }
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value), //Capitalize the first Letter of name – Accessor
            set: fn (string $value) => strtolower($value),//Set value as lower case for name – Mutator
        );
    }
    //Create a scope for Active user
    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }
    //A User might have multiple roles - Assign Roles via relations
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }
    
    //Append Task Relations

    public function tasks(): HasMany{

        return $this->hasMany(Task::class,'created_by');
    }
}
