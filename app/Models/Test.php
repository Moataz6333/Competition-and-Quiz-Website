<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Result;

class Test extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'icon',
        'points',
        'period',
        'date',
        'time',
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }
    public function results(){
        return $this->hasMany(Result::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
   
}
