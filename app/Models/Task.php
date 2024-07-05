<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    //Append Task Relations

    public function createdUser(): HasOne{

        return $this->hasOne(User::class,'created_by');
    }
}
