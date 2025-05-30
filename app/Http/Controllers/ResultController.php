<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Result;
date_default_timezone_set('Africa/Cairo');

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $test= Test::find($id);
        // dd($test->date,$test->time);

        $dateString = $test->date . ' ' . $test->time;
        
        
        $date = new \DateTime($dateString);
        
        $date->modify('+' . ceil( $test->period / 2) . ' minutes');
       
        $timer = $date->format('F d, Y h:i:s A');
        // Get the current date and time
        $currentDate = new \DateTime();
       
        
        return view('startTest',['test'=>$test ,'timer'=>$timer ,'currentDate'=>$currentDate,'date'=>$date]);
    }

    public function init(Request $request,$id){

        $request->validate([
            'id'=>['exists:students,stu_id','unique:results,stu_id'],
            'email'=>['email','exists:students,email'],
           
           ]);
        $res=new Result();
        $res->test_id =$id;
        $res->correct=0;
        $res->wrong=0;
        $res->name=$request->name;
        $res->stu_id=$request->id;
        $res->email=$request->email;
        $res->timeTaken="0";

        $res->save();
      
            return to_route('results.create',$res->id);
    }

    
    public function create($id)
    {
        $res= Result::find($id);
        $test =Test::find($res->test_id);
        $i=1;
    
        $dateString = $test->date . ' ' . $test->time;
        
        
        $date = new \DateTime($dateString);
        $endDate = $date->modify('+' . $test->period . ' minutes')->format('Y-m-d H:i:s');

        
        return view('Questions',['test'=>$test ,'i'=>$i,'res'=>$res ,'endDate'=>$endDate ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        $res =Result::find($id);
        $test = Test::find($res->test_id);
        // dd($request->all(),$test->questions);
       
        $totalQues=count($test->questions);
        if($request->input('time_taken') == "0m 0s"){
            $res->timeTaken =$test->period;
        }else{
            $timeTakenInSeconds = $request->input('time_taken')."m";

        // Convert the time to a more readable format (minutes and seconds)
        $minutes = floor((int) $timeTakenInSeconds / 60);
        $seconds =(int) $timeTakenInSeconds % 60;
    
        $timeTakenFormatted = sprintf('%dm %ds', $minutes, $seconds);
        $res->timeTaken= $timeTakenFormatted;
        }
        
        $i=1;
        $score=0;
        foreach($test->questions as $ques){
            if($request['ansForQues-'.$i++] == $ques->correct){
               $res->correct++;
                $score+=$ques->points;
            }
        }

        $res->score=$score;
        $res->wrong =$totalQues - $res->correct;

           $res->save();

           return view('result',['res'=>$res,'test'=>$test]);

       
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
