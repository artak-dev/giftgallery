@include('layouts.header')
<div class= "clearSection" ></div>
<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Զեղչ 
				</h3>
			</div>
				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Ֆիլտր
					</div>
				</div>
@include('layouts.filter')
<div class="row isotope-grid">
	@foreach($gifts as $gift)
	<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item ">
		<!-- Block2 -->
		<div class="block2">
			<div class="block2-pic hov-img0">
				<img src="{{asset('assets/images/products/'.$gift['image'])}}" alt="IMG-PRODUCT">
				<input
				class="product-info"
				type="hidden"
				data-id="{{$gift['id']}}"
				data-category_id="{{$gift['category_id']}}"
				data-class_name="{{$gift['class_name']}}"
				data-image="{{$gift['image']}}"
				data-name="{{$gift['name']}}"
				data-price="{{$gift['price']}}"
				data-sale_end="{{isset($gift['sale_end']) ? $gift['sale_end'] : ''}}"
				data-sale_price="{{$gift['sale_price']}}"
				data-description="{{$gift['description']}}"
				data-current_price="{{$gift['currentPrice']}}"
				>

				<span class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" data-key="{{$gift['id']}}">
					Տեսնել ավելին
				</span>
			</div>

			<div class="block2-txt flex-w flex-t p-t-14">
				<div class="block2-txt-child1 flex-col-l ">
					<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
						{{$gift['name']}}
					</a>
					@if(!$gift['sale_price'])
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
	<div class="flex-c-m flex-w w-full p-t-45">
		<button class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04 load-more" data-key = "8" data-category="5">
			Տեսնել ավելին
		</button>
</div>
</section>
@include('layouts.footer')