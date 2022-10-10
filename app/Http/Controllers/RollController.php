<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Roll;
use App\Models\Student;
use Illuminate\Http\Request;

class RollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSelected = "rolls";
        $lessons = Lesson::all();

        foreach ($lessons as $lesson) {
            $lesson->attendances = Roll::where("lesson_id", "=", $lesson->id)->where("attendance", "=", 1)->count();
        }

        return view("rolls.index", compact("lessons", "pageSelected"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        $pageSelected = "rolls";

        return view("rolls.create", compact("students", "pageSelected"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Pegar todas as rolls daquela aula
        $attendances = Roll::where("lesson_id", $id)->get();
        $pageSelected = "rolls";

        foreach ($attendances as $attendance) {
            $attendance->student = Student::where("id", $attendance->student_id)->get();
        }

        $pageSelected = "rolls";
        return view("rolls.show", compact("attendances", "pageSelected"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
