
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>YOUGOTravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="{{asset('webwisata')}}/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="{{asset('webwisata')}}/https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('webwisata')}}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/animate.css">
    
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{asset('webwisata')}}/css/aos.css">

    <link rel="stylesheet" href="{{asset('webwisata')}}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{asset('webwisata')}}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/icomoon.css">
    <link rel="stylesheet" href="{{asset('webwisata')}}/css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">YOUGOTravel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="#special-destination" class="nav-link">Paket Wisata</a></li>
          <li class="nav-item"><a href="#special-hotels" class="nav-link">Penginapan</a></li>
          <li class="nav-item"><a href="#special-offers" class="nav-link">Obyek Wisata</a></li>
          <li class="nav-item"><a href="#best-news" class="nav-link">Berita</a></li>
          <li class="nav-item cta"><a href="{{ route('login') }}" class="nav-link"><span>Login</span></a></li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    

    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('webwisata/images/bg_1.jpg') }}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Explore <br></strong> your amazing city</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Find great places to stay, eat, shop, or visit from local experts</p>
          </div>
        </div>
      </div>
    </div>


    <section id="special-destination" class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Destination</span>
            <h2 class="mb-4"><strong>Paket Wisata</strong></h2>
          </div>
        </div>    		
    	</div>
        @if($paket_wisata->isEmpty())
        @else
    	<div class="container-fluid">
    		<div class="row destination-slider owl-carousel">
            @foreach ($paket_wisata->slice(0,3) as $key => $pkt)
    			<div class="col-sm col-md-6 col-lg ftco-animate">
    				<div class="destination">
    					<a href="{{route('paket_wisata.detail', $pkt->id)}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('/storage/Foto paketwisata/' .$pkt->foto1)}}'); background-size: cover;">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<div class="d-flex">
    							<div class="one">
		    						<h3><a href="#">{{$pkt->nama_paket}}</a></h3>
		    						<p class="rate">
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<i class="icon-star"></i>
		    							<span>8 Rating</span>
		    						</p>
	    						</div>
	    						<div class="two">
	    							<span class="price">${{$pkt->harga_per_pack}}</span>
    							</div>
    						</div>
    						<p>{{$pkt->deskripsi}}</p>
    						<hr>
    					</div>
    				</div>
    			</div>
            @endforeach
    	</div>
        @endif
    </section>

    <section id="special-hotels" class="ftco-section">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <span class="subheading">Special Hotels</span>
            <h2 class="mb-4"><strong>Popular Lodging</strong></h2>
          </div>
        </div>    
        @if($penginapan->isEmpty())
        @else
    		<div class="row">
            @foreach ($penginapan->slice(0,3) as $key => $pn)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="destination">
    					<a href="{{route('penginapan.detail', $pn->id)}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('/storage/Foto penginapan/' .$pn->foto1)}}'); background-size: cover;">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<h3><a href="#">{{$pn->nama_penginapan}}</a></h3>
    						<p class="rate">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<span>8 Rating</span>
    						</p>
                            <p>{{$pn->deskripsi}}</p>
    						<hr>
    					</div>
    				</div>
    			</div>
            @endforeach
    	</div>
        @endif
    </section>


    <section id="about" class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-5 heading-section ftco-animate">
          	<span class="subheading">Best Directory Website</span>
            <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sed consectetur maxime, delectus laudantium explicabo corporis incidunt perferendis fuga inventore a!</p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Asperiores laboriosam amet iusto accusantium minus beatae quae corrupti doloremque facere fugit?</p>
          </div>
		    <div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel">
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url('{{asset('webwisata/images/person_1.jpg') }} ')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		                    <p class="name">Dennis Green</p>
		                    <span class="position">Guest from italy</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url('{{asset('webwisata/images/person_2.jpg') }} ')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		                    <p class="name">Dennis Green</p>
		                    <span class="position">Guest from London</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url('{{asset('webwisata/images/person_3.jpg') }} ')">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
		                    <p class="name">Dennis Green</p>
		                    <span class="position">Guest from Philippines</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>

    <section id="special-offers" class="ftco-section">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Offers</span>
            <h2 class="mb-4"><strong>Popular Tour destinations</strong></h2>
          </div>
        </div>    
        @if($obyek_wisata->isEmpty())
        @else		
    		<div class="row">
            @foreach ($obyek_wisata->slice(0,3) as $key => $ob)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="destination">
    					<a href="{{route('obyek_wisata.detail', $ob->id)}}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('/storage/Foto obyekwisata/' .$ob->foto1)}}'); background-size: cover;">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
    					</a>
    					<div class="text p-3">
    						<h3><a href="#">{{$ob->nama_wisata}}</a></h3>
    						<p class="rate">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<span>8 Rating</span>
    						</p>
                            <p>{{$ob->deskripsi_wisata}}</p>
    						<hr>
    					</div>
    				</div>
    			</div>
            @endforeach
    	</div>
        @endif
    </section>

    <section id="best-news" class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <span class="subheading">Recent Blog</span>
            <h2><strong>Best News</strong></h2>
          </div>
        </div>
        @if($berita->isEmpty())
        @else
        <div class="row d-flex">
        @foreach ($berita->slice(0,3) as $key => $br)
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('{{asset('/storage/Foto berita/' .$br->foto)}}'); background-size: cover;">
              </a>
              <div class="text p-4 d-block">
              	<span class="tag">{{$br->judul}}</span>
                <h3 class="heading mt-3"><a href="#">{{$br->berita}}</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">{{$br->tgl_post}}</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      @endif
    </section>
		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">YOUGOTravel</h2>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur nulla, obcaecati ea iure consequuntur quas repellendus sapiente accusantium ad animi.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, molestias?</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 2282 9075 234</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">YougoTravel@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('webwisata')}}/js/jquery.min.js"></script>
  <script src="{{asset('webwisata')}}/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="{{asset('webwisata')}}/js/popper.min.js"></script>
  <script src="{{asset('webwisata')}}/js/bootstrap.min.js"></script>
  <script src="{{asset('webwisata')}}/js/jquery.easing.1.3.js"></script>
  <script src="{{asset('webwisata')}}/js/jquery.waypoints.min.js"></script>
  <script src="{{asset('webwisata')}}/js/jquery.stellar.min.js"></script>
  <script src="{{asset('webwisata')}}/js/owl.carousel.min.js"></script>
  <script src="{{asset('webwisata')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{asset('webwisata')}}/js/aos.js"></script>
  <script src="{{asset('webwisata')}}/js/jquery.animateNumber.min.js"></script>
  <script src="{{asset('webwisata')}}/js/bootstrap-datepicker.js"></script>
  <script src="{{asset('webwisata')}}/js/jquery.timepicker.min.js"></script>
  <script src="{{asset('webwisata')}}/js/scrollax.min.js"></script>
  <script src="{{asset('webwisata')}}/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('webwisata')}}/js/google-map.js"></script>
  <script src="{{asset('webwisata')}}/js/main.js"></script>
    
  </body>
</html>