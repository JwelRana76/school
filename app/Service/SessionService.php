<?php

namespace App\Service;

use App\Models\Session;
use Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class SessionService {
  protected $model = Session::class;

  public function Index()
  {
    $data = $this->model::all();

    return DataTables::of($data)
      ->addColumn('action', fn($item) => view('pages.session.action', compact('item'))->render())
      ->make(true);
  }

  public function create($data)
  {
    DB::beginTransaction();
    try {
      if ($data['id'] == null) {
        $this->model::create([
          'name' => $data['name'],
        ]);
        $message = ['success' => 'Session Inserted Successfully'];
      } else {
        $this->model::findOrFail($data['id'])->update([
          'name' => $data['name'],
        ]);
        $message = ['success' => 'Session Updated Successfully'];
      }
      DB::commit();
      return $message;
    } catch (Exception $th) {
      DB::rollback();
      dd($th->getMessage());
    }
  }
}