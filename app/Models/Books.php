<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $table = 'tb_books';

    protected $fillable =[
        'id',
        'name',
        'isbn',
        'value',
        'created_at',
        'updated_at'
    ];

    public static function AllResults()
    {
        return Books:: select(
            'id',
            'name',
            'isbn',
            'value'
        )
        ->orderBy('name', 'DESC')
        ->get();
    }
}
