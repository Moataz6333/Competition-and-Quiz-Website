<?php

namespace App\Http\Controllers;

use App\Services\SpreadsheetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Test;
use App\Models\Student;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SpreadsheetController extends Controller
{
    protected $spreadsheetService;

    public function __construct(SpreadsheetService $spreadsheetService)
    {
        $this->spreadsheetService = $spreadsheetService;
    }

    public function export($id)
    {
        // $data = [
        //     ['Name', 'Email'],
        //     ['John Doe', 'john@example.com'],
        //     ['Jane Doe', 'jane@example.com'],
        // ];
        $test= Test::find($id);
        $records =$test->results;
        $data = [['Name','ID','Email','Score|'.$test->points,'Time','Correct','Wrong']];

        foreach($records as $record){

            array_push($data,[$record->name,$record->stu_id,$record->email,$record->score,$record->timeTaken,$record->correct,$record->wrong]);
        }

        
        $filename = $test->name.'.xlsx';

        $this->spreadsheetService->export($data, $filename);

        // Create a StreamedResponse
        return new StreamedResponse(function () use ($filename) {
            $path = storage_path("app/public/{$filename}");
            readfile($path);
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
    public function export_students()
    {
        // $data = [
        //     ['Name', 'Email'],
        //     ['John Doe', 'john@example.com'],
        //     ['Jane Doe', 'jane@example.com'],
        // ];
        // $test= Test::find($id);
        $records =Student::all();
        $data = [['ID','Name','Email','Whatsapp']];

        foreach($records as $record){

            array_push($data,[$record->stu_id,$record->name,$record->email,$record->whatsapp]);
        }

        
        $filename = 'students'.'.xlsx';

        $this->spreadsheetService->export($data, $filename);

        // Create a StreamedResponse
        return new StreamedResponse(function () use ($filename) {
            $path = storage_path("app/public/{$filename}");
            readfile($path);
        }, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
