@extends('adminlte::page')
@section('title', 'Edit Kategori Wisata')
@section('content_header')
<h1 class="m-0 text-dark">Edit Kategori Wisata</h1>
@stop
@section('content')
<form action="{{route('kategori_wisata.update', $kategori_wisata)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <label for="kategori_wisata">Kategori Wisata</label>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-database"></i></span>
                        <input type="text" class="form-control border-primary
@error('kategori_wisata') is-invalid @enderror" id="kategori_wisata" placeholder="Kategori Wisata"
                            name="kategori_wisata"
                            value="{{$kategori_wisata->kategori_wisata ??old('kategori_wisata')}}">
                        @error('kategori_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"> Simpan</i></button>
                        <a href="{{route('kategori_wisata.index')}}" class="btn btn-danger">
                            <i class="fa fa-times"> Batal</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @stop