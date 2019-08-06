	@extends('frontend.layouts.master')

@section('content')
	<main>
		<section id="breadcrumd">
			<div class="container">
				<div class="content">
					<ul class="list-inline">
						<li class="list-inline-item"><a href="index.html">Trang chủ</a></li>
						<li class="list-inline-item"><span>Giới thiệu</span></li>
					</ul>
				</div>
			</div>
		</section>
		<section id="about">
			<div class="container">
				<div class="content">
					<div class="title-info-cate">
						<h1>Giới thiệu</h1>
					</div>
					<div class="info-about">
						<p>{!! $setting[0]->description !!}</p>
					</div>
				</div>
			</div>
		</section>
	</main>	
@endsection