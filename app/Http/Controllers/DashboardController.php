<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Filiere;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Result;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupération des nombres de lignes pour chaque table
        $userCount = User::count();
        $studentCount = Student::count();
        $filiereCount = Filiere::count();
        $courseCount = Course::count();
        $examCount = Exam::count();
        $resultCount = Result::count();

        // Passer ces données à la vue dashboard
        return view('dashboard', [
            'userCount' => $userCount,
            'studentCount' => $studentCount,
            'filiereCount' => $filiereCount,
            'courseCount' => $courseCount,
            'examCount' => $examCount,
            'resultCount' => $resultCount
        ]);
    }
}


