@extends('adminlte::page')
@section('title', 'User Profile')
@section('content_header')
<h1 class="m-0 text-dark">Profile Pelanggan</h1>
<style>
    .centered-img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-height: 100%;
        width: 90%;
    }

</style>

@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-row-reverse">
            <div class="p-2">
                <a href="{{route('profil-pelanggan.edit', Auth::user()->pelanggan->id)}}" class="btn btn-info mb-2">
                    <i class="fa fa-edit"> Edit Profil</i>
                </a>
            </div>
        </div>
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    @if(auth()->user()->pelanggan?->foto )
                    <img src="{{ url('/storage/'.auth()->user()->pelanggan->foto) }}" class="centered-img" id="tampil" alt="{{ url('/storage/'.auth()->user()->pelanggan->foto) }}">
                    @else
                    <img src="/img/no-image.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%"
                        id="tampil">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <table class="table mb-3">
                            <thead>
                                <tr class="table-info">
                                    <th scope="row">Nama Lengkap</th>
                                    <td>:</td>
                                    <td>{{Auth::user()->pelanggan ->nama_lengkap ?? ''}}</td>
                                </tr>
                                <tr class="table-info">
                                    <th scope="row">No. Telepon</th>
                                    <td>:</td>
                                    <td>{{Auth::user()->pelanggan ->no_hp ?? ''}}</td>
                                </tr>
                                <tr class="table-info">
                                    <th scope="row">Alamat</th>
                                    <td>:</td>
                                    <td>{{Auth::user()->pelanggan ->alamat ?? ''}}</td>
                                </tr>
                                <tr class="table-info">
                                    <th scope="row">Email</th>
                                    <td>:</td>
                                    <td>{{Auth::user()->email }}</td>
                                </tr>

                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
