<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\User;
use App\Models\Student;
use App\Models\Rule;
use Illuminate\Support\Facades\Hash;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $tests =Test::all();
        $students=Student::all();
        $rule =Rule::first();
        
        return view('admin.dashboard',['tests'=>$tests,'num'=>count($students),'rule'=>$rule]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // dd($request->all());
        $test =new Test();
        $test->name =$request->name;
        // icon
        if($request->hasFile('testIcon')){
           
            $mainPhoto = $request->file('testIcon');
  
      
         $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/icons';
          if (!file_exists($destinationPath)) {
          mkdir($destinationPath, 0777, true);
            }
           $fileName =  $mainPhoto->getClientOriginalName();
      
          // Move the file to the destination path
          $mainPhoto->move($destinationPath, $fileName);
           $relativePath = '/images/icons/' . $fileName;
          // Optionally save file info to the database, if needed
           $test->icon=url($relativePath);
      
      }

      $test->points=(int) $request->points;
      $test->period= $request->time;
      $test->date =$request->date;
      $test->time=$request->start;
      $test->save();


   

      return back()->with('success', 'Test created Successfully!');


    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $test=Test::find($id);
        return view('admin.edit',['test'=>$test]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $test =Test::find($id);
        $test->name =$request->name;
        // icon
        if($request->hasFile('testIcon')){
           
            $mainPhoto = $request->file('testIcon');
  
      
         $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/icons';
          if (!file_exists($destinationPath)) {
          mkdir($destinationPath, 0777, true);
            }
           $fileName =  $mainPhoto->getClientOriginalName();
      
          // Move the file to the destination path
          $mainPhoto->move($destinationPath, $fileName);
           $relativePath = '/images/icons/' . $fileName;
          // Optionally save file info to the database, if needed
           $test->icon=url($relativePath);
      
      }

      $test->points=(int) $request->points;
      $test->period= $request->time;
      $test->date =$request->date;
      $test->time=$request->start;
      $test->save();
      return back()->with('success', 'Test Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test= Test::find($id);
        $test->delete();
      return back()->with('success', 'Test Deleted Successfully!');

    }

    public function admin(){
        return view('admin.login');
    }
    public function login(){
        
        if(auth()->attempt(request()->only(['name','password']))){
         return to_route('tests.index');
        }
        return redirect()->back()->withErrors(['email'=>'invaild email or password'])->withInput();
    }
    public function view($id){
        $test=Test::find($id);
        $i=1;
        return view('admin.view',['test'=>$test,'i'=>$i]);
    }
    public function signin(){
        return view('admin.signin');
    }
    public function storeUser(Request $request){
        $request->validate([
            'name'=> ['min:3','unique:users'],
            'email'=>['unique:users','email'],
            'password'=>['min:8','confirmed'],

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'=>Hash::make($request->password)
        ]);
      return back()->with('success', 'Admin registerd Successfully!');

    }
}
