@extends('layouts.master')

@section('titre','page de cars')
    
@section('cars','active')

@section('content')

    
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{url('images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('accueil')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Car Details</h1>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-car-details">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="car-details">
          <div class="img rounded" style="background-image: url({{ asset('cars/'.$car->image) }});"></div>
          <div class="text text-center">
            <span class="subheading">{{$categorie->nameCategorie}}</span>
            <h2>{{$car->marque}}</h2>
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
                  kilomtrage
                  <span>{{$car->kilomtrage}} Km/h</span>
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
                  <span>{{$car->Transmission}}</span>
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
                  <span>{{$car->Seats}} Adults</span>
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
              <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
              <div class="text">
                <h3 class="heading mb-0 pl-3">
                  Luggage
                  <span>{{$car->Luggage}} Bags</span>
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
                  <span>{{$car->type}}</span>
                </h3>
              </div>
            </div>
          </div>
        </div>      
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 pills">
        <div class="bd-example bd-example-tabs">
          <div class="d-flex justify-content-center">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

              @auth
              <li class="nav-item">
                <a class="btn btn-primary" href="{{route('reserv.create',$car->id)}}" role="tab">reserve</a>
              </li>
              @else
              <li class="nav-item">
                <a class="btn btn-danger " href="{{route('login')}}"role="button">se connecter pour réserve </a>
              </li>
              @endauth

            </ul>
          </div>


        </div>
      </div>
    </div>
  </div>
</section>


{{-- for paypal --}}
<script>
  // Get references to the PayPal and bankForm elements
  const paypalRadioButton = document.getElementById('paypal');
  const bankFormDiv = document.getElementById('bankForm');

  // Add an event listener to the PayPal radio button
  paypalRadioButton.addEventListener('change', function() {
    // Check if the PayPal radio button is selected
    if (paypalRadioButton.checked) {
      // Show the bankForm div
      bankFormDiv.style.display = 'block';
    } else {
      // Hide the bankForm div
      bankFormDiv.style.display = 'none';
    }
  });
</script>
{{-- end for paypal --}}

{{-- script de prix totale --}}
<script>
  document.getElementById('dateR').addEventListener('change', calculateTotalPrice);

  function calculateTotalPrice() {
      const startDate = new Date(document.getElementById('dateL').value);
      const endDate = new Date(document.getElementById('dateR').value);
      const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24)); // Calculate the number of days
      const pricePerDay = {{$car->prixJ}}; // Fetch the daily price from the PHP variable
      const totalPrice = days * pricePerDay;
      document.getElementById('totalPrice').textContent = totalPrice.toFixed(2); // Display the total price with two decimal places
  }
</script>
{{-- end script de prix totale --}}

@endsection
    

 