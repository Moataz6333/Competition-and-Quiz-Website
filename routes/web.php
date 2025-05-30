<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Models\Test;
use App\Models\Rule;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\StudentController;



Route::get('/', function () {
    $tests =Test::all();
    $rule=Rule::first();
        return view('index',['tests'=>$tests,'rule'=>$rule]);
})->name('index');

//tests
Route::resource('/tests',TestController::class)->middleware('auth:sanctum');
Route::get('/view/{test}',[TestController::class,'view'])->name('tests.view')->middleware('auth:sanctum');
//questions
Route::get('questions/{test}',[QuestionController::class,'create'])->name('ques.create')->middleware('auth:sanctum');
Route::post('questions/{test}',[QuestionController::class,'store'])->name('ques.store')->middleware('auth:sanctum');
Route::get('questions/edit/{ques}',[QuestionController::class,'edit'])->name('ques.edit')->middleware('auth:sanctum');
Route::post('questions/update/{ques}',[QuestionController::class,'update'])->name('ques.update')->middleware('auth:sanctum');
Route::delete('questions/delete/{ques}',[QuestionController::class,'destroy'])->name('ques.destroy')->middleware('auth:sanctum');

//results
Route::get('start/{test_id}',[ResultController::class,'index'])->name('results.index');
Route::post('start/{test_id}',[ResultController::class,'init'])->name('results.init');
Route::get('test/{test_id}',[ResultController::class,'create'])->name('results.create');
Route::post('test/{res_id}',[ResultController::class,'store'])->name('results.store');

//admin
Route::get('/admin',[TestController::class,'admin'])->name('login');
Route::post('/admin',[TestController::class,'login'])->name('check');
//sign in an admin
Route::get('/signin',[TestController::class,'signin'])->middleware('auth:sanctum');
Route::post('/signin',[TestController::class,'storeUser'])->name('users.store')->middleware('auth:sanctum');


//logout
Route::get('/logout',function(){
    Auth::logout();
    return redirect('/admin');
})->name('logout');

//export excel
Route::get('/export/{test}', [SpreadsheetController::class, 'export'])->name('tests.export');
Route::get('/export_stu', [SpreadsheetController::class, 'export_students'])->name('export_students');


//students
Route::get('/students',[StudentController::class,'students'])->name('students.names');
Route::get('/register',[StudentController::class,'index'])->name('students.index');
Route::post('/register',[StudentController::class,'store'])->name('students.store');

//rule
Route::post('/rule',[StudentController::class,'updateRuleStatus'])->name('rules.updateState');
Route::post('/rule-date',[StudentController::class,'updateRuleDate'])->name('rules.updateDate');

