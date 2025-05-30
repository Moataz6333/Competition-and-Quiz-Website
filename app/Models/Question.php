<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=[
        'test_id',
        'head',
        'headPhoto',
        'op1',
        'op1_photo',
        'op2',
        'op2_photo',
        'op3',
        'op3_photo',
        'op4',
        'op4_photo',
        'correct',
        'points',
    ];
}
