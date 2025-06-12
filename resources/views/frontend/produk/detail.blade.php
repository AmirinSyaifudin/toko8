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
										<h4 class="panel-title"><a href="">{{ $kt->nama_katagori}}</a></h4>
									</div>
								</div>
							@empty
							@endforelse
						</div>
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ url ('/admin/assets/covers/'. $produk->foto) }}" alt="">
								<h3>ZOOM</h3>
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								  <!-- Wrapper for slides -->
								    {{-- <div class="carousel-inner">
										<div class="item active left">
										  <a href=""><img src="{{ url ('/admin/assets/covers/'. $produk->foto) }}" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item next left">
										  <a href=""><img src="{{ url ('/admin/assets/covers/'. $produk->foto) }}" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="{{ url ('/admin/assets/covers/'. $produk->foto) }}" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>	
									</div> --}}
								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="">
								<h2>{{ $produk->nama }}</h2>
								<p>KODE PRODUK: {{ $produk->kode_barang }}</p>
								<img src="images/product-details/rating.png" alt="">
								<span>
									<span>Rp. {{ $produk->harga_penjualan }}</span>
									<label>Quantity:</label>
									<input type="text" value="3">
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Keranjang
									</button>
								</span>
								<p><b>KODE BARANG :</b> {{ $produk->kode_barang }}</p>
								<p><b>STOK:</b> {{ $produk->stok }}</p>
								{{-- <p><b>Brand:</b> E-SHOPPER</p> --}}
								<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">-----</h2>
					</div><!--/recommended_items-->
				</div>
			</div>
		</div>
	</section>
@endsection