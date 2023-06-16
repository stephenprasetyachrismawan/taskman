<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //
    public function detail_by_status($status)
    {
        $data = Task::where('status', [$status])->get();

        return view('task.' . $status)->with([
            'data' => $data
        ]);
    }
    public function delete($id)
    {
        $cek = Task::find($id)->delete();
        if ($cek) {
            return redirect(route('taskshow'));
        } else {
            return redirect(route('taskshow'));
        }
    }
    public function update($id, Request $req)
    {
        Task::find($id)->update([
            'judul' => $req->judul,
            'status' => $req->status,
            'deskripsi' => $req->deskripsi
        ]);
        return redirect(route('taskshow'));
    }
    public function detail($id)
    {
        $cek = Task::find($id);
        if (Auth::id() != $cek->user_id) {
            return route('taskshow');
        }
        return view('task.edit')->with(['data' => $cek]);
    }
    public function update_status($id, Request $req)
    {
        Task::find($id)->update([
            'status' => $req->status
        ]);
        return back();
    }
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

        return view('task.show')->with([
            'data' => $data
        ]);
    }
}
