<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Roll;
use App\Models\Student;
use Exception;
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
        $lessons = Lesson::all();

        foreach ($lessons as $lesson) {
            $lesson->attendances = Roll::where("lesson_id", "=", $lesson->id)->where("attendance", "=", 1)->count();
        }

        return view("rolls.index", compact("lessons"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();

        return view("rolls.create", compact("students"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lessons = Lesson::where("date", $request->date)->count();
        if (!$lessons) {
            Lesson::insert([
                "date" => $request->date
            ]);

            for ($i = 1; $i <= count($request->a); $i++) {
                Roll::insert([
                    "student_id" => $i,
                    "lesson_id" => Lesson::where("date", $request->date)->first()->id,
                    "attendance" => $request->a[$i] == "p" ? 1 : 0
                ]);
            }

            return redirect()->route("rolls.index");
        } else {
            return redirect()->route("rolls.create")->withErrors("Já foi feita a listagem de presença para a aula dessa data");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $attendances = Roll::where("lesson_id", $id)->get();
            if ($attendances->count() == 0) {
                throw new Exception("Essa presença não existe!");
            }
        } catch (\Exception $e) {
            $message = $e->getMessage();
            dd('Erro: ' . $message);
            exit;
        }
        //Pegar todas as rolls daquela aula

        foreach ($attendances as $attendance) {
            $attendance->student = Student::where("id", $attendance->student_id)->get();
        }

        return view("rolls.show", compact("attendances"));
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
