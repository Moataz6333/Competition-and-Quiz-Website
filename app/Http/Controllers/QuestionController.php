<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $test= Test::find($id);
        $questions =$test->questions;
        $i=count($questions);
        return view('questions.create',['test'=>$test,'questions'=>$questions->reverse(),'i'=>$i]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
            // dd($request->all());
            $request->validate([
                'correct_answear'=>['required'],
                
               ]);
            $question = new Question();
            $question->test_id =$id;
            $question->head= $request->head;
            //options
            $question->op1= $request->op1;
            $question->op2= $request->op2;
            $question->op3= $request->op3;
            $question->op4= $request->op4;
            //correct
            $question->correct =$request->correct_answear;
            //points
            $question->points=$request->points;

            //head photo
            if($request->hasFile('headPhoto')){
                $mainPhoto = $request->file('headPhoto');
  
      
                $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/questions';
                 if (!file_exists($destinationPath)) {
                 mkdir($destinationPath, 0777, true);
                   }
                  $fileName =  $mainPhoto->getClientOriginalName();
             
                 // Move the file to the destination path
                 $mainPhoto->move($destinationPath, $fileName);
                  $relativePath = '/images/questions/' . $fileName;
                 // Optionally save file info to the database, if needed
                  $question->headPhoto=url($relativePath);
            }
            //photos

            for($i=1; $i<5 ;$i++){
                if($request->hasFile('op'.$i.'_photo')){
                    $mainPhoto = $request->file('op'.$i.'_photo');
      
          
                    $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/questions';
                     if (!file_exists($destinationPath)) {
                     mkdir($destinationPath, 0777, true);
                       }
                      $fileName =  $mainPhoto->getClientOriginalName();
                 
                     // Move the file to the destination path
                     $mainPhoto->move($destinationPath, $fileName);
                      $relativePath = '/images/questions/' . $fileName;
                     // Optionally save file info to the database, if needed
                      $question['op'.$i.'_photo']=url($relativePath);
                }
            }

               $question->save();





      return back()->with('success', 'Question added Successfully!');
        
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
    public function edit( $id)
    {
        $ques=Question::find($id);
        return view('questions.edit',['ques'=>$ques]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
       
        $question=Question::find($id);
        $question->head= $request->head;
        //options
        $question->op1= $request->op1;
        $question->op2= $request->op2;
        $question->op3= $request->op3;
        $question->op4= $request->op4;
        //correct
        if($request->ques1 != null){
            $question->correct =$request->ques1;

        }
        //points
        $question->points=$request->points;

        //head photo
        if($request->hasFile('headPhoto')){
            $mainPhoto = $request->file('headPhoto');

  
            $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/questions';
             if (!file_exists($destinationPath)) {
             mkdir($destinationPath, 0777, true);
               }
              $fileName =  $mainPhoto->getClientOriginalName();
         
             // Move the file to the destination path
             $mainPhoto->move($destinationPath, $fileName);
              $relativePath = '/images/questions/' . $fileName;
             // Optionally save file info to the database, if needed
              $question->headPhoto=url($relativePath);
        }
        //photos

        for($i=1; $i<5 ;$i++){
            if($request->hasFile('op'.$i.'_photo')){
                $mainPhoto = $request->file('op'.$i.'_photo');
  
      
                $destinationPath = $_SERVER['DOCUMENT_ROOT'] . '/images/questions';
                 if (!file_exists($destinationPath)) {
                 mkdir($destinationPath, 0777, true);
                   }
                  $fileName =  $mainPhoto->getClientOriginalName();
             
                 // Move the file to the destination path
                 $mainPhoto->move($destinationPath, $fileName);
                  $relativePath = '/images/questions/' . $fileName;
                 // Optionally save file info to the database, if needed
                  $question['op'.$i.'_photo']=url($relativePath);
            }
        }

           $question->save();
      return back()->with('success', 'Question Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $question=Question::find($id);
        $question->delete();
      return back()->with('success', 'Question Deleted Successfully!');

    }
}
