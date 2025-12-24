<?php

namespace App\Http\Controllers;

use App\Models\Upazila;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UpazilaController extends Controller
{
    protected $model = Upazila::class;

    public function index()
    {
        $columns = $this->model::$columns;
        if (request()->ajax()) {
            $data = $this->model::all();

            return DataTables::of($data)
            ->addColumn('action', fn($item) => view('pages.upazila.action', compact('item'))->render())
            ->make(true);
        }
        return view('pages.upazila.index', compact('columns'));
    }

    public function store(Request $request)
    {
        if ($request->id == null) {
            $request->validate([
                'name' => 'required',
            ]);
        }
        $data = $request->all();
        DB::beginTransaction();
        try {
        if ($data['id'] == null) {
            $this->model::create([
            'name' => strtolower($data['name']),
            'code' => $data['code'],
            'district_id' => $data['district_id'],
            ]);
            $message = ['success' => 'Upazila Inserted Successfully'];
        } else {
            $this->model::findOrFail($data['id'])->update([
            'name' => strtolower($data['name']),
            'code' => $data['code'],
            'district_id' => $data['district_id'],
            ]);
            $message = ['success' => 'Upazila Updated Successfully'];
        }
        DB::commit();
        return redirect()->route('upazila.index')->with($message);
        } catch (Exception $th) {
        DB::rollback();
        dd($th->getMessage());
        }
    }
    function edit($id)
    {
        $id = base64_decode($id);
        $upazila = $this->model::findOrFail($id);
        $columns = $this->model::$columns;
        if (request()->ajax()) {
            $data = $this->model::all();

            return DataTables::of($data)
            ->addColumn('action', fn($item) => view('pages.upazila.action', compact('item'))->render())
            ->make(true);
        }
        return view('pages.upazila.index', compact('columns', 'upazila'));
    }
    function delete($id)
    {
        $id = base64_decode($id);
        $this->model::findOrFail($id)->delete();
        return redirect()->route('upazila.index')->with('success', 'Upazila Deleted Successfully');
    }
}
