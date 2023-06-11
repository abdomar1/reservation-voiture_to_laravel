@extends('layouts.master')

@section('titre','reserve voiture')

 
@section('cars','active')
    
@section('content')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{url('images/bg_3.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
          <p class="breadcrumbs"><span class="mr-2"><a href="{{route('accueil')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>reserve car <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">reserve car</h1>
        </div>
      </div>
    </div>
</section>


<section class="ftco-section ftco-car-details" >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7">
        
              {{-- error  --}}
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              {{-- end error --}}

        <h2 class="text-center">Reserve Car : {{ $car->marque }}</h2>
        <div class="bd-example bd-example-tabs">
          <div class="tab-content">
            <div>
              <form id="reservationForm" method="POST" action="{{ route('reserve.store') }}" class="border p-5">
                @csrf

                <div class="mb-sm-7 mb-4">
                  <label for="dateL" class="form-label">
                      Start Date:<span class="required"></span>
                  </label>
                  <input name="dateL" type="date" class="form-control reservation-dates" autofocus id="dateL" required placeholder="dateL"
                  value="{{ old('dateL') }}" onchange="updateEndDate()" min="{{ \Carbon\Carbon::now()->toDateString() }}">
                  <div id="dateLError" class="error"></div>
              </div>
              <div class="mb-sm-7 mb-4">
                  <label for="dateR" class="form-label">
                      End Date:<span class="required"></span>
                  </label>
                  <input name="dateR" type="date" class="form-control reservation-dates" autofocus id="dateR" required placeholder="dateR"
                  value="{{ old('dateR') }}" min="{{ \Carbon\Carbon::now()->toDateString() }}" onchange="updateEndDate()">
                  <div id="dateRError" class="error"></div>
              </div>

                <div class="mb-sm-7 mb-4">
                    Total Price: <span id="totalPrice"></span> DH/Day
                </div>
                <input type="hidden" name="car_id" value="{{ $car->id }}">

                <div class="mb-sm-7 mb-4">
                  <label for="card-element" class="form-label">Card Details:</label>
                  <div id="card-element" class="form-control"></div>
                  <div id="card-errors" class="error"></div>
                </div>

                <div class="mb-sm-7 mb-4 text-center">
                    <button type="submit" class="btn btn-primary">Reserve</button>
                </div>
            </form>
            
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>

{{--  --}}
{{--  --}}

{{--for stripe--}}
<script src="https://js.stripe.com/v3/"></script>
<script>
  // Configure Stripe.js with your publishable API key
  var stripe = Stripe('{{ env('STRIPE_KEY') }}');

  // Create a reference to the card element
  var elements = stripe.elements();
  var cardElement = elements.create('card');

  // Mount the card element to the card-element <div>
  cardElement.mount('#card-element');

  // Handle real-time validation errors on the card element
  cardElement.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  // Handle the form submission
  var form = document.getElementById('reservationForm');
  form.addEventListener('submit', function(event) {
    event.preventDefault();

    // Disable the submit button to prevent multiple submissions
    var submitButton = document.querySelector('button[type="submit"]');
    submitButton.disabled = true;

    // Create a payment method using the card element
    stripe.createPaymentMethod({
      type: 'card',
      card: cardElement,
    }).then(function(result) {
      if (result.error) {
        // Display error message to the user
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;

        // Enable the submit button
        submitButton.disabled = false;
      } else {
        // Tokenize the payment method ID
        var paymentMethodId = result.paymentMethod.id;

        // Add the payment method ID to the form data
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method_id');
        hiddenInput.setAttribute('value', paymentMethodId);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
      }
    });
  });
</script>
{{-- end for stripe --}}

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

<!-- Scripts -->
<script src="assets/js/front-third-party5252.js?id=f8c5e3b133a546fe08b8"></script>
<script src="assets/js/messages.js"></script>
<script src="assets/js/custom/helpersb093.js?id=5044ed0dbc11fd5055f3"></script>
<script src="assets/js/custom/customb712.js?id=bc95924f7cc157b27e8f"></script>
<script src="assets/js/auto_fill/auto_fill326f.js?id=52f0694384bfb239479a"></script>
<script src="assets/js/auth/auth4b13.js?id=bb2938ddc372c4dc803b"></script>
<script>
$(document).ready(function() {
    $('.alert').delay(5000).slideUp(300)
})
</script>
@endsection

