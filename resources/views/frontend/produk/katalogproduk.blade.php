@extends('frontend.templates.default')
@section('content')
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
										<h4 class="panel-title"><a href="{{ route('katalogproduk') }}">{{ $kt->nama_katagori}}</a></h4>
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
					<div class="features_items">
                                    <!--features_items-->
						<h2 class="title text-center">DAFTAR PRODUK</h2>
						{{-- @forelse ($produk as $pd)
						    <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="{{ url ('/admin/assets/covers/'. $pd->foto) }}" alt="" />
										<h2>Rp. {{ $pd->harga_penjualan }}</h2>
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
										<li><a href="{{ route ('frontdetailproduk') }}"><i class="fa fa-plus-square"></i>Detail Produk</a></li>
									
									</ul>
								</div>
							</div>
						</div>
						@empty
						@endforelse --}}
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
				</div>
			</div>
		</div>
	</section>

@endsection