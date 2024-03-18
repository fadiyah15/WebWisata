@extends('adminlte::page')
@section('title', 'YOUGOTravel')
@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome {{Auth::user()->level }} !</h3>
                    <h6 class="font-weight-normal mb-0">Have a Nice Day and
                        <span class="text-danger">Don't forget to Love Yourself</span></h6>
                </div>
                <br>
                <br>
                <div id="image-slider" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#image-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#image-slider" data-slide-to="1"></li>
                        <li data-target="#image-slider" data-slide-to="2"></li>
                        <li data-target="#image-slider" data-slide-to="3"></li>
                        <li data-target="#image-slider" data-slide-to="4"></li>
                        <li data-target="#image-slider" data-slide-to="5"></li>

                    </ol>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/alam1.jpg" width="900" height="500" alt="Slide 1" class="d-block mx-auto">
                        </div>
                        <div class="carousel-item">
                            <img src="img/alam2.jpg" width="900" height="500" alt="Slide 2" class="d-block mx-auto">
                        </div>
                        <div class="carousel-item">
                            <img src="img/alam4.jpg" width="900" height="500" alt="Slide 3" class="d-block mx-auto">
                        </div>
                        <div class="carousel-item">
                            <img src="img/wisata1.jpg" width="900" height="500" alt="Slide 3" class="d-block mx-auto">
                        </div>
                        <div class="carousel-item">
                            <img src="img/alam6.jpg" width="900" height="500" alt="Slide 3" class="d-block mx-auto">
                        </div>
                        <div class="carousel-item">
                            <img src="img/alam3.jpg" width="900" height="500" alt="Slide 3" class="d-block mx-auto">
                        </div>

                    </div>

                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#image-slider" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#image-slider" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <!-- Script untuk mengatur autoplay -->
                <script>
                    $(document).ready(function () {
                        $('.carousel').carousel({
                            interval: 50, // Waktu ganti slide (dalam milidetik)
                            pause: false, // Jeda otomatis saat hover
                            wrap: true // Mengulang slide dari awal setelah mencapai slide terakhir
                        });
                    });

                </script>
            </div>
        </div>
    </div>
</div>
</div>
@stop
