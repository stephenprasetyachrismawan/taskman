@extends('layouts.temp')

@section('title', 'Add Tasks')
@section('subtitle', 'Add your task here')
@section('content')
    <div class="flex items-center justify-center my-7 w-full">
        <form action="{{ route('taskcreate') }}" method="post">
            @csrf


            <div class="form-control w-full ">
                <label class="label">
                    <span class="label-text">Judul</span>
                </label>
                <input type="text" name="judul" placeholder="Type here" class="input input-bordered w-full " />
                <label class="label">
                    <span class="label-text">Deskripsi</span>
                </label>
                <input id="x" type="hidden" name="deskripsi">
                <trix-editor input="x"></trix-editor>

                <label class="label">
                    <span class="label-text">Status</span>
                </label>
                <select class="selkat z-30" name="status">
                    <option value="" disabled selected>
                        <<--Pilih Kategori-->>
                    </option>
                    <option value="completed">Selesai</option>

                    <option value="incomplete">Belum Selesai</option>
                </select>


                <input type="submit" class="btn btn-success max-w-xs my-5" value="Simpan">
            </div>


        </form>
    </div>
@endsection
