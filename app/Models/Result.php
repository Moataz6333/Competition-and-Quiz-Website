<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable=[
        'test_id',
        'correct',
        'wrong',
        'name',
        'stu_id',
        'email',
        'timeTaken',
        'score',
    ];
}
