<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Service\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->baseService = new StudentService;
    }

    public function index(){
        $item = $this->baseService->Index();
        $columns = Student::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.student.index', compact('columns'));
    }
}
