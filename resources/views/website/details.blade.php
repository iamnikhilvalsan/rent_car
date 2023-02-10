@extends('website.master')
@section('body')

<style type="text/css">
.form-control
{
height: 36px !important;
color: #000003b5 !important;
font-size: 12px;
}
</style>

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{asset('/web_assets/images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">{{$cars->title}}</h1>
          </div>
        </div>
      </div>
    </section>
		
    @php

    $cars->image = asset('uploads/cars/'.$cars->image);
    $cars->image_2 = asset('uploads/cars/'.$cars->image_2);

    @endphp

	<section class="ftco-section ftco-car-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			@include('admin.flash-message')
      			@if ($errors->any())
						    <div class="alert alert-danger">
						        <ul>
						            @foreach ($errors->all() as $error)
						                <li>{{ $error }}</li>
						            @endforeach
						        </ul>
						    </div>
							@endif
      			<div class="car-details">
      				<div class="img rounded" style="background-image: url({{asset($cars->image)}});"></div>
      				<div class="text text-center">
      					<span class="subheading">{{$cars->brands}}</span>
      					<h2>{{$cars->title}}</h2>
      					<br><span class="subheading">Model: {{$cars->model}}</span>
      					<a href="#" class="btn btn-danger py-2 ml-1 text-center" style="margin-top:15px" data-toggle="modal" data-target="#BookingModal">BOOK NOW</a>
      					<br>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Mileage
		                	<span>{{$cars->mileage_per_litter}} Km/L</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Transmission
		                	<span>{{$cars->transmission}}</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Seats
		                	<span>{{$cars->seat_type}} Seater</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Type
		                	<span>{{$cars->car_types}}</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
          <div class="col-md d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services">
              <div class="media-body py-md-4">
              	<div class="d-flex mb-3 align-items-center">
	              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
	              	<div class="text">
		                <h3 class="heading mb-0 pl-3">
		                	Fuel
		                	<span>{{$cars->fuel_type}}</span>
		                </h3>
	                </div>
                </div>
              </div>
            </div>      
          </div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs text-center">
							<div class="d-flex justify-content-center">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
							    <li class="nav-item">
							      <br><a class="nav-link active" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>
							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
						      <p>{{ $cars->description }}</p>
						    </div>
						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Choose Car</span>
            <h2 class="mb-2">Related Cars</h2>
          </div>
        </div>
        <div class="row">

        	@foreach($relatedcars as $DT)

            @php

            $DT->image = asset('uploads/cars/'.$DT->image);
            $DT->image_2 = asset('uploads/cars/'.$DT->image_2);

            @endphp

        	<div class="col-md-4">
				<div class="car-wrap rounded ftco-animate">
					<div class="img rounded d-flex align-items-end" style="background-image: url({{asset($DT->image)}});">
					</div>
					<div class="text">
						<h2 class="mb-0"><a href="{{ route('view-car-details',$DT->cars_id) }}">{{$DT->title}}</a></h2>
						<div class="d-flex mb-3">
    						<span class="cat">{{$DT->brands}}</span>
    						<p class="price ml-auto">${{$DT->price_per_day}} <span>/day</span></p>
						</div>
						<p><a style="width: 100% !important;"href="{{ route('view-car-details',$DT->cars_id) }}" class="btn btn-secondary py-2 ml-1">Details</a></p>
					</div>
				</div>
			</div>
			@endforeach


        </div>
    	</div>
    </section>

@if(session('customers_id'))
<div class="modal fade" id="BookingModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title pull-left">Book Vehicle</h4>
			</div>
			<div class="modal-body">
				<form action="{{route('book-car')}}" method="post" autocomplete="off">
        		@csrf

      			<div class="form-group">
      				<label>Pickup Date</label>
              <input type="date" class="form-control" required name="pickup_date" placeholder="Pickup Date">
            </div>

      			<div class="form-group">
      				<label>Return Date</label>
              <input type="date" class="form-control" required name="return_date" placeholder="Return Date">
            </div>

      			<div class="form-group">
      				<label>Message</label>
              <textarea class="form-control" required name="message" placeholder="message"></textarea>
            </div>
            <br>

					<button type="button" class="btn btn-info pull-left" data-dismiss="modal">Close</button>
					<input type="hidden" name="cars_id" id="cars_id" value="{{$DT->cars_id}}">
					<input type="submit" class="btn btn-danger pull-right" style="float: right;" name="delete" value="Book Now">
				</form>
			</div>
		</div>
	</div>
</div>
@else
<div class="modal fade" id="BookingModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title pull-left">Book Vehicle</h4>
			</div>
			<div class="modal-body">
				<p>Please <a href="{{ route('customer-login') }}">Login</a> and continue.</p>
			</div>
		</div>
	</div>
</div>
@endif

@endsection