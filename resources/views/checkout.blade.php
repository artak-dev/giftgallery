@include('layouts.header')


	<div class="sec-banner bg0 p-t-80 p-b-50">
		<div class="container">
			<div class="form-group">
				<h3>Առաքում և վճարում</h3>
			</div>
			<div class = "col-md-12">
				<form action = "{{ route('createOrder') }}" method = "post">
					@csrf
					<div class = "row">
						<div class = "col-md-7">
							<div class="row">
								<div class="form-group col-md-4">
								    <label for="first_name">Անուն։</label>
								    <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
								    @error('first_name')
			    						<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-4">
								    <label for="last_name">Ազգանուն։</label>
								    <input type="text" class="form-control" id="last_name"  name="last_name" value="{{ old('last_name') }}">
								    @error('last_name')
			    						<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="row">
								<div class="form-group col-md-4">
								    <label for="city">Քաղաք։</label>
								    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
								    @error('city')
			    						<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-4">
								    <label for="address">Հասցե։</label>
								    <input type="text" class="form-control" id="address" placeholder="Փողոցի անվանումը և տան համարը" name ="address" value="{{ old('address') }}">
								    @error('address')
			    						<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
{{-- 								<div class="form-group col-md-4">
								    <label for="billing_state">Մարզ։</label>
								    <input type="text" class="form-control" id="billing_state" name ="billing_state" value="{{ old('billing_state') }}">
								</div> --}}
							</div>
{{-- 							<div class="row">
								<div class="form-group col-md-4">
								    <label for="address">Հասցե։</label>
								    <input type="text" class="form-control" id="address" placeholder="Փողոցի անվանումը և տան համարը" name ="address" value="{{ old('address') }}">
								    @error('address')
			    						<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-4">
								    <label for="postal_code">Փոստ. ինդեքս։</label>
								    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="ըստ անհրաժեշտության" value ="{{ old('postal_code') }}">
								</div>
							</div> --}}
							<div class="row">
								<div class="form-group col-md-4">
								    <label for="email">Էլ․ փոստ։</label>
								    <input type="text" class="form-control" id="email" name="email" value={{ old('email') }}>
								    @error('email')
			    						<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group col-md-4">
								    <label for="phone_number">Հեռախոսահամար։</label>
								    <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}">
								    @error('phone_number')
			    						<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class ="row">
								<div class="form-group col-md-8">
								    <label for="notes">Այլ նշումներ (ըստ անհրաժեշտության )։</label>
								    <textarea type="text" class="form-control" id="notes" name="notes" ></textarea>
								</div>
							</div>
						</div>
						<div class ="col-md-5">
							<div class ="col-md-12">
								<h5 class = "choose-paymenth-type-text">Ընտրեք վճարման տարբերակը</h5>
							</div>	
						    @error('paymenth_method')
	    						<div class="alert alert-danger">{{ $message }}</div>
	    					@enderror					
							<div class ="form-group col-md-12">
									<input type="radio" name="paymenth_method"  class="pay_cash" value ="1" {{ (old('paymenth_method') == 1) ? 'checked' : false }} checked>
								    <label for="pay_cash" class="pay_cash">Վճարել կանխիկ</label>
							</div>
							<div class ="form-group col-md-12">
								<input type="radio" name="paymenth_method"  class="pay_cash" value ="2" {{ (old('paymenth_method') == 2) ?'checked' : false}}>
								<h6 style = "display: inline-block;">Վճարել Իդրամով</h6>
								<img src="{{asset('assets/images/icons/odram-icon.png')}}" width="70" style = "display: inline-block;">
							</div>
							<div class ="form-group col-md-12">
								<input type="radio" name="paymenth_method"  class="pay_cash" value = "3" {{ (old('paymenth_method') == 3) ?'checked' : false}}>
								<h6 style = "display: inline-block;">Վճարել քարտով</h6>
								<img src="{{asset('assets/images/icons/ameria-bank.jpg')}}" width="30" style = "display: inline-block;">
							</div>
							<div class ="form-group col-md-12">
			                    <button class = "flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" type = "submit">
			                        Գրանցել Պատվերը
			                    </button>
			                    </a>
							</div>
						</div>
					</div>
					<input type="hidden" name="keys" id="keys">
				</form>
			</div>
		</div>
	</div>	


@include('layouts.footer')		