<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Student;
use App\Models\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('rejester');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        //20225458532
        'name'=>['min:3'],
        'id'=>['min:5','max:11','unique:students,stu_id'],
        'email'=>['email'],
        'whatsapp'=>['min:11'],
       ]);
       
       
       $stu= Student::create([
        
        'name'=>$request->name,
        'stu_id'=>$request->id,
        'email'=>$request->email,
        'whatsapp'=>$request->whatsapp,
       ]);
      
       return redirect()->back()->with('success','student registered successfully');
       
    }

    public function updateRuleStatus(Request $request){
        // dd($request->all());
        $rule=Rule::first();
        if($request->status == 'close'){
            $rule->status= 0;
        }else{
            $rule->status=1;
        }
        $rule->save();
       return redirect()->back()->with('success','regirtration updated successfully');

    }
    public function updateRuleDate(Request $request){
        // dd($request->all());
        $rule=Rule::first();
        $rule->deadline=$request->deadline;
        $rule->save();
       return redirect()->back()->with('success','regirtration updated successfully');

    }
    public function students(){
        $students =Student::all();
        return view('admin.students',compact('students'));
    }
   
}
