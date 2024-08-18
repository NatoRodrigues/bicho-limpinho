<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    // TABELA
    protected $table = [
        'admin'
    ];
    

    // COLUNA
    protected $fillable = [
        'admin_username',
        'admin_password',
        'created_at',
        'updated_at',
    ];


    protected $hiddenFields = [
        'remember_token',
    ];
}
