@extends('frontend.layouts.master')

@section('content')
<main>
	<section id="banner">
		<div class="avarta"><img src="{{ asset('frontend/images/banner.png') }}" class="img-fluid" width="100%" alt=""></div>
		<div class="caption">
			<div class="container">
				<div class="info">
					<p>Học giỏi hơn với</p>
					<h1><span>Toán Song Ngữ</span></h1>
					<h2>Lớp 5</h2>
					<div class="desc">Trong thế giới phẳng, sự tiếp cận tri thức đã trở nên dễ dàng hơn rất nhiều. Công nghệ đã cho phép bạn đọc có nhiều phương thức tiếp cận tri thức</div>
					<div class="btn-book"><a href="product-detail.html">Mua ngay</a></div>
				</div>
			</div>
		</div>
	</section>
	<section id="product">
		<div class="container">
			<div class="title"><span>sản phẩm nổi bật</span></div>
			<div class="list-prod">
				<div class="row">
					@if (!empty($products))
						@foreach ($products as $product)
							<div class="col-md-3 col-6 col-sm-6">
								<div class="item">
									<div class="avarta"><a href="/product-detail/{{ $product->slug }}"><img src="{{ asset('frontend/images/sp1.png') }}" class="img-fluid" alt=""></a></div>
									<div class="info">
										<div class="vote">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o"></i>
										</div>
										<h3><a href="/product-detail/{{ $product->slug }}">{{ $product->name }}</a></h3>
										<div class="price">{{ number_format($product->price_old, 0, '.', '.') }}<span>đ</span></div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
	</section>
	<section id="new-hot">
		<div class="container">
			<div class="title"><span>tin tức nổi bật</span></div>
			<div class="list-news">
				<ul>
					@if (!empty($news))
						@foreach ($news as $item)
							<li>
								<div class="item">
									<div class="avarta"><a href="/news-detail/{{ $item->slug }}"><img src="{{ asset('frontend/images/new-hot.png') }}" class="img-fluid" alt=""></a></div>
									<div class="info">
										<div class="date"><span>{{ date('d-m-Y', strtotime($item->updated_at)) }}</span></div>
										<h3><a href="/news-detail/{{ $item->slug }}">{{ $item->title }}</a></h3>
									</div>
								</div>
							</li>
						@endforeach
					@endif
				</ul>
			</div>
		</div>
	</section>
</main>
@endsection
