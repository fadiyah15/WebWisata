@extends('adminlte::page')
@section('title', 'Edit Kategori Berita')
@section('content_header')
<h1 class="m-0 text-dark">Edit Kategori Berita</h1>
@stop
@section('content')
<form action="{{route('kategori_berita.update', $kategori_berita)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="kategori_berita">Kategori Berita</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-globe"></i></span>
                        <input type="text" class="form-control border-primary
@error('kategori_berita') is-invalid @enderror" id="kategori_berita" placeholder="Kategori berita"
                            name="kategori_berita"
                            value="{{$kategori_berita->kategori_berita ??old('kategori_berita')}}">
                        @error('kategori_berita') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
                        <a href="{{route('kategori_berita.index')}}" class="btn btn-danger">
                            <i class="fa fa-times"> Batal</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop