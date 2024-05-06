<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Store extends Model
{
    use HasFactory;
    
    protected $table = 'tb_store';

    protected $fillable =[
        'id',
        'name',
        'address',
        'active',
        'created_at',
        'updated_at'
    ];
}
