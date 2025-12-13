<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use App\Service\ClassService;

class ClassController extends Controller
{
    public function __construct()
    {
        $this->baseService = new ClassService;
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $columns = Classes::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.class.index', compact('columns'));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $request->validate([
                'name' => 'required',
            ]);
        }
        $data = $request->all();
        $message = $this->baseService->create($data);
        return redirect()->route('class.index')->with($message);
    }
    function edit($id)
    {
        $id = base64_decode($id);
        $classes = Classes::findOrFail($id);
        $item = $this->baseService->Index();
        $columns = Classes::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.class.index', compact('columns', 'classes'));
    }
    function delete($id)
    {
        $id = base64_decode($id);
        Classes::findOrFail($id)->delete();
        return redirect()->route('class.index')->with('success', 'Class Deleted Successfully');
    }
}
