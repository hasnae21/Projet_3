<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Apprenant;
use App\Models\Briefs_apprenant;

use Illuminate\Http\Request;

class Briefs_apprenantController extends Controller
{
    
    public function store(Request $request)
    {
        if(is_null(Brief::find($request->brief_id)->briefsApprenant()->find($request->student_id))){
            $assign = StudentBrief::create([
                'student_id' => $request->student_id,
                'brief_id' => $request->brief_id
            ]);
        }
        return back();
    }

    public function show($id)
    {

        $students = Student::all();
        return view('assign.assign', ['students' => $students, 'id'=>$id]);
    }

}
