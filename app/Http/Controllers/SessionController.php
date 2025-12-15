<?php

namespace App\Http\Controllers;

use App\Models\Session;
use App\Service\SessionService;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->baseService = new SessionService;
    }
    public function index()
    {
        $item = $this->baseService->Index();
        $columns = Session::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.session.index', compact('columns'));
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
        return redirect()->route('session.index')->with($message);
    }
    function edit($id)
    {
        $id = base64_decode($id);
        $session = Session::findOrFail($id);
        $item = $this->baseService->Index();
        $columns = Session::$columns;
        if (request()->ajax()) {
            return $item;
        }
        return view('pages.session.index', compact('columns', 'session'));
    }
    function delete($id)
    {
        $id = base64_decode($id);
        Session::findOrFail($id)->delete();
        return redirect()->route('session.index')->with('success', 'Class Deleted Successfully');
    }
}
