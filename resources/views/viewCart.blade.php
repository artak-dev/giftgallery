@include('layouts.header')		
	
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" action="{{route('createOrder')}}" type ="post">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Ապրանքը</th>
									<th class="column-2"></th>
									<th class="column-3">Գինը</th>
									<th class="column-4">Քանակը</th>
									<th class="column-5">Ընդամենը</th>
								</tr>
							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Գրեք ձեր պրոմո կոդը">
									
								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Ակտիվացնել պրոմո կոդը
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Պատվերի ընդհանուր գումարը
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Ընդամենը:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2 subtotal-order">
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Առաքում:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Մենք գնահատում ենք ձեր ընտրությունը այդ իսկ պատճառով առաքումները կատարում ենք անվճար։<br>
									Շնորհակալություն 
								</p>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Ընդամենը:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2 subtotal-order">
								</span>
							</div>
						</div>
							<a href="{{ route('checkout') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
		                       Պատվիրել
		                    </a>
					</div>
				</div>
			</div>
		</div>
	</form>
@include('layouts.footer')