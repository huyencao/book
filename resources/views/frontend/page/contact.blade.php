@extends('frontend.layouts.master')

@section('content')
<main>
	<section id="breadcrumd">
		<div class="container">
			<div class="content">
				<ul class="list-inline">
					<li class="list-inline-item"><a href="index.html">Trang chủ</a></li>
					<li class="list-inline-item"><span>Liên hệ</span></li>
				</ul>
			</div>
		</div>
	</section>
	<section id="contact">
		<div class="container">
			<div class="content">
				<div class="title-info-cate">
					<h1>Liên hệ</h1>
				</div>
				<div class="info-contact">
					<div class="row">
						<div class="col-md-6">
							<div class="left">
								<div class="place">
									<p><i class="fa fa-map-marker"></i>{{ $setting[0]->address }}</p>
									<p style="color: #e81919"><i class="fa fa-phone"></i>{{ $setting[0]->phone }}</p>
									<p style="color: #2863db"><i>@</i>{{ $setting[0]->email }}</p>
								</div>
								<div class="maps">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7748372818096!2d105.82069531492907!3d21.001660994078794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ade4ee3e84b5%3A0xc23f50a8e637de55!2sGCO+GROUP!5e0!3m2!1svi!2s!4v1564452374623!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="right">
								<div class="form-sent">
									<form action="">
										<div class="title-form">GỬI LIÊN HỆ</div>
										<div class="list-item-form">
											<div class="item">
												<input type="text" placeholder="Họ tên">
											</div>
											<div class="item">
												<input type="text" placeholder="Điện thoại">
											</div>
											<div class="item">
												<input type="text" placeholder="Email">
											</div>
											<div class="item">
												<textarea name="" placeholder="Nội dung" id="" cols="30" rows="10"></textarea>
											</div>
											<div class="item">
												<input type="submit" value="gửi" class="btn-sent">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>	
@endsection