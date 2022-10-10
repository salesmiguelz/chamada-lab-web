<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Roll;

class HomeController extends Controller
{
    public function index()
    {
        $randomImgs = ['bombril.png', 'nescau.png', 'redbull.jpg', 'adidas.png', 'guarana.jpg', 'steam.png'];

        $selectedImg = $randomImgs[array_rand($randomImgs)];
        $students = Student::all();

        foreach ($students as $student) {

            $student->presences = Roll::where("student_id", $student->id)->where("attendance", 1)->count();
            $student->absences = Roll::where("student_id", $student->id)->where("attendance", 0)->count();

            if (($student->presences + $student->absences) == 0) {
                $student->frequency = 0;
            } else {
                $student->frequency = $student->presences / ($student->presences + $student->absences) * 100;
            }
        }
        return view('home.home', compact('students', 'selectedImg'));
    }
}
