@include('layouts.header')	
	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{asset('assets/images/gift-image.jpg')}}" alt="IMG-BANNER">

						<a href="{{route('giftset')}}" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Հավաքիր ինքդ արկղ
								</span>

								<span class="block1-info stext-102 trans-04">
									Ընտրելով նվերները
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									տեսնել ավելին
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{asset('assets/images/products/nkar1.jpg')}}" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Men
								</span>

								<span class="block1-info stext-102 trans-04">
									Spring 2018
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="{{asset('assets/images/rose.jpg')}}" alt="IMG-BANNER">

						<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									Ծաղկեփնջեր
								</span>

								<span class="block1-info stext-102 trans-04">
									New Trend
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Տեսնել ավելին
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Ամբողջ տեսականին
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5  all-categorys how-active1" data-filter="*">
						Ամբողջը
					</button>
					@foreach($categorys as $category)
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 category-filter" data-filter="{{$category->class_name}}">
					{{ $category->name}}
						
						</button>
					@endforeach
				</div>
			</div>

			<div class="row isotope-grid">
				@foreach($gifts as $gift)
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item  {{$gift['class_name']}}">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="{{asset('assets/images/products/'.$gift['image'])}}" alt="IMG-PRODUCT">

							<span class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-key="{{$gift['id']}}">
								Տեսնել ավելին
							</span>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									{{$gift['name']}}
								</a>
								@if($gift['sale_price'] == "")
									<span class="stext-105 cl3 ">
										{{$gift['price']}} Դրամ
									</span>
								@else
									<span class="stext-105 cl3 old-price ">
										{{$gift['price']}} Դրամ
									</span>
									<span class="stext-105 cl3 sale ">
										{{$gift['sale_price']}} Դրամ
									</span>
								@endif
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="{{asset('assets/images/icons/favorite.png')}}" alt="ICON" width="30">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{asset('assets/images/icons/favorite2.png')}}" alt="ICON" width="30">
								</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<button class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04 load-more" data-key = "8">
					Load More
				</button>
			</div>
		</div>
	</section>

@include('layouts.footer')