<?php

namespace App\Service;

use App\Models\Section;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SectionService {
  protected $model = Section::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('action', fn($item) => view('pages.section.action', compact('item'))->render())
      ->make(true);
  }

  public function create($data)
  {
    DB::beginTransaction();
    try {
      if ($data['id'] == null) {
        $this->model::create([
          'name' => strtolower($data['name']),
        ]);
        $message = ['success' => 'Section Inserted Successfully'];
      } else {
        $this->model::findOrFail($data['id'])->update([
          'name' => strtolower($data['name']),
        ]);
        $message = ['success' => 'Section Updated Successfully'];
      }
      DB::commit();
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}