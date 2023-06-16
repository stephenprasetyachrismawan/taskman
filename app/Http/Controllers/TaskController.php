<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function create(Request $r)
    {
        $data = new Task();
        $data->judul = $r->judul;
        $data->deskripsi = $r->deskripsi;
        $data->user_id = Auth::user()->id;
        $data->status = $r->status;
        $data->save();
        return redirect('task');
    }
    public function make()
    {
        return view('task.create');
    }
    public function show()
    {
        $data = Task::whereIn('user_id', [Auth::id()])->get();
        dd($data);
        return view('task.show');
    }

    public function detail($id)
    {
        dd($id);
    }
    public function detail_by_status($status)
    {
        dd($status);
    }
}
