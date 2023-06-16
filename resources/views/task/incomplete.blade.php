@extends('layouts.temp')

@section('title', 'Show Incomplete Tasks')
@section('subtitle', 'List of Your Tasks')
@section('content')
    <div class="flex items-center justify-center my-7 w-full">

        <a href="{{ route('taskmake') }}"><button class="btn btn-info text-slate-100">Add Task</button></a>
    </div>
    <div class="flex items-center justify-start my-7 mx-16 w-full">
        <a href="{{ route('taskstatus', ['status' => 'completed']) }}" class="link link-info">Completed Tasks</a>

    </div>
    <div class="flex items-center justify-center my-7 w-full">
        <div class="overflow-auto">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->id }}</td>
                            <td>{{ Str::limit($d->judul, 20, '...') }}</td>
                            <td>{!! Str::limit($d->deskripsi, 30, '...') !!}</td>
                            <td>{{ $d->status }}</td>
                            <td>{{ $d->updated_at }}</td>
                            <td>


                                <span class="dropdown dropdown-left">
                                    <label tabindex="0" class="btn m-1 btn-warning">Edit<br> Status</label>
                                    <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box">
                                        <li>
                                            <form action="{{ route('taskupdate_status', ['id' => $d->id]) }}"
                                                method="post">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" name="idt" value="{{ $d->id }}">
                                                <input type="hidden" name="status" value="completed">
                                                <input type="submit" value="Completed">

                                            </form>

                                        </li>

                                        <li>
                                            <form action="{{ route('taskupdate_status', ['id' => $d->id]) }}"
                                                method="post">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" name="idt" value="{{ $d->id }}">
                                                <input type="hidden" name="status" value="incomplete">
                                                <input type="submit" value="Incomplete">

                                            </form>
                                        </li>
                                    </ul>
                                </span>
                                <span>
                                    <a href="{{ route('taskdetail', ['id' => $d->id]) }}"><button
                                            class="btn btn-primary inline-block">Detail/<br>Edit</button></a>
                                </span>
                                <span>
                                    <form action="{{ route('taskdelete', ['id' => $d->id]) }}" method="post"
                                        class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-error inline-block">Hapus</button>
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Diperbarui</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
