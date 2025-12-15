<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Service\SectionService;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->baseService = new SectionService;
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $columns = Section::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.section.index', compact('columns'));
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
        return redirect()->route('section.index')->with($message);
    }
    function edit($id)
    {
        $id = base64_decode($id);
        $section = Section::findOrFail($id);
        $item = $this->baseService->Index();
        $columns = Section::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.section.index', compact('columns', 'section'));
    }
    function delete($id)
    {
        $id = base64_decode($id);
        Section::findOrFail($id)->delete();
        return redirect()->route('section.index')->with('success', 'Section Deleted Successfully');
    }
}
