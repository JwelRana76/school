<?php

namespace App\Service;

use App\Models\Classes;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ClassService {
  protected $model = Classes::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('action', fn($item) => view('pages.class.action', compact('item'))->render())
      ->make(true);
  }

  public function create($data)
  {
    dd($data);
    DB::beginTransaction();
    try {
      if ($data['id'] == null) {
        $this->model::create([
          'name' => strtolower($data['name']),
        ]);
        $message = ['success' => 'Class Inserted Successfully'];
      } else {
        $this->model::findOrFail($data['id'])->update([
          'name' => strtolower($data['name']),
        ]);
        $message = ['success' => 'Class Updated Successfully'];
      }
      DB::commit();
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}