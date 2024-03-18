@extends('adminlte::page')
@section('title', 'User Profile')
@section('content_header')
<h1 class="m-0 text-dark">User Profile </h1>
<style>
    .container {
        position: relative;
        height: 200px;
    }

    .centered-img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
    }

</style>
@stop
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="card user-profile">
                    <table class="table mb-2">
                        <tbody>
                            <div class="container">
                                <img src="storage/{{$pelanggan->foto}}" alt="{{$pelanggan->foto}} tidak tampil"
                                    class="centered-img" height="150" width="150">
                            </div>
                            <tr class="table-info">
                                <th scope="row">Nama Lengkap</th>
                                <td>:</td>
                                <td>{{Auth::user()->pelanggan ->nama_lengkap ?? ''}}</td>
                            </tr>
                            <tr class="table-info">
                                <th scope="row">No Telepon</th>
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
                            <a href="{{route('profil-pelanggan.edit', Auth::user()->pelanggan->id)}}"
                                class="btn btn-info mb-2">
                                <i class="fa fa-edit"> Edit Profil</i>
                            </a>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop