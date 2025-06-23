@extends('frontend.templates.default')
@section('content')
<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('Eshopper/images/home/girl1.jpg' ) }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('Eshopper/images/home/pricing.png' ) }}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('Eshopper/images/home/girl2.jpg' ) }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('Eshopper/images/home/pricing.png' ) }}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{ asset('Eshopper/images/home/girl3.jpg' ) }}" class="girl img-responsive" alt="" />
									<img src="{{ asset('Eshopper/images/home/pricing.png' ) }}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>KATAGORI</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@forelse ($katagori as $kt)
							    	<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="{{ route('katalogproduk', $kt->id) }}">{{ $kt->nama_katagori}}</a></h4>
									</div>
								</div>
							@empty
							@endforelse
						</div>
						<div class="shipping text-center"><!--shipping-->
							<img src="{{ asset('Eshopper/images/home/shipping.jpg' ) }}" alt="" />
						</div><!--/shipping-->
						&nbsp
						&nbsp
					<h2 class="title text-center">SELAMAT BERBELANJA</h2>
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">DAFTAR PRODUK</h2>
						@forelse ($produk as $pd)
						    <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ url ('/admin/assets/covers/'. $pd->foto) }}" alt="" />
										{{-- <h2>Rp. {{ $pd->harga_penjualan }}</h2> --}}
										 <h2>Rp {{ number_format($pd->harga_penjualan, 0, ',', '.') }}</h2>
										<p>{{ $pd->nama }}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukkan Keranjang</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>Rp. {{ $pd->harga_penjualan }}</h2>
											<p>{{ $pd->nama }}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Masukkan Keranjang</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="{{ route ('frontdetailproduk', $pd->id) }}"><i class="fa fa-plus-square"></i>Detail Produk</a></li>
										{{-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> --}}
									</ul>
								</div>
							</div>
						</div>
						@empty
						@endforelse
					</div><!--features_items-->
					<div class="recommended_items"><!--recommended_items-->
						{{-- <h2 class="title text-center">recommended items</h2> --}}
						{{-- <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('Eshopper/images/home/recommend1.jpg' ) }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('Eshopper/images/home/recommend2.jpg' ) }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('Eshopper/images/home/recommend3.jpg' ) }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('Eshopper/images/home/recommend1.jpg' ) }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('Eshopper/images/home/recommend2.jpg' ) }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="{{ asset('Eshopper/images/home/recommend3.jpg' ) }}" alt="" />
													<h2>$56</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="{{ asset('Eshopper/#recommended-item-carousel' ) }}" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="{{ asset('Eshopper/#recommended-item-carousel' ) }}" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div> --}}
					</div><!--/recommended_items-->
					 
					<div class="d-flex justify-content-center">
							{{ $produk->links('pagination::bootstrap-4') }}
					</div>
					
				</div>
			</div>
		</div>
	</section>
    
@endsection