@extends('layouts.temp')

@section('title', 'Add Tasks')
@section('subtitle', 'Yeah, you can see...')
@section('content')
    <div class="flex items-center justify-center my-7 w-full">
        <form action="{{ route('taskupdate', ['id' => $data->id]) }}" method="post">
            @method('put')
            @csrf


            <div class="form-control w-full ">
                <label class="label">
                    <span class="label-text">Judul</span>
                </label>
                <input type="text" name="judul" placeholder="Type here" class="input input-bordered w-full "
                    value="{{ $data->judul }}" />
                <label class="label">
                    <span class="label-text">Deskripsi</span>
                </label>
                <input id="x" type="hidden" name="deskripsi" value="{{ $data->deskripsi }}">
                <trix-editor input="x"></trix-editor>

                <label class="label">
                    <span class="label-text">Status</span>
                </label>
                <select class="selkat z-30" name="status">
                    <option value="completed" @selected($data->status == 'completed')>Selesai</option>

                    <option value="incomplete" @selected($data->status == 'incomplete')>Belum Selesai</option>
                </select>


                <input type="submit" class="btn btn-success max-w-xs my-5" value="Simpan">
            </div>


        </form>
    </div>
@endsection
