@extends('layouts.master')

@section('titre','page Home')

@section('home','active')

@section('content')
<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
      <div class="col-lg-8 ftco-animate">
        <div class="text w-100 text-center mb-md-5 pb-md-5">
          <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>
          <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>

        </div>
      </div>
    </div>
  </div>
</div>

 <section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12	featured-top">
        <div class="row no-gutters">
          <div class="col-md-4 d-flex align-items-center">
            <form action="#" class="request-form ftco-animate bg-primary">
              <h2>Make your trip</h2>
              <div class="form-group">
                <label for="" class="label">marque de voiture </label>
                <input type="text" class="form-control" placeholder="dacia, ford, jeep, etc" name="marque" value="{{ request('marque') }}">
              </div>
              <div class="form-group">
                <input type="submit" value="Rechercher A Car " class="btn btn-secondary py-3 px-4">
              </div>
            </form>
          </div>

        </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">What we offer</span>
        <h2 class="mb-2">Featured Vehicles</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        @if (count($cars) > 0)
        <div class="carousel-car owl-carousel">
          @foreach ($cars as $car)
          <div class="item">
            <div class="car-wrap rounded ftco-animate">
              <div class="img rounded d-flex align-items-end" >
                <img src="{{ asset('cars/'.$car->image) }}" alt="">
              </div>
              <div class="text">
                <h2 class="mb-0"><a href="#">{{$car->marque}}</a></h2>
                <div class="d-flex mb-3">
                  <span class="cat">{{$car->type}}</span>
                  <p class="price ml-auto">{{$car->prixJ}}dh<span>/day</span></p>
                </div>
                <p class="d-flex mb-0 d-block">
                  @if ($car->disponible)
                    @auth
                      <a href="{{route('reserv.create',$car->id)}}"  class="btn btn-primary py-2 mr-1">Book now</a>   
                    @else  
                      <a href="{{route('login')}}"  class="btn btn-primary py-2 mr-1">Book now</a>             
                    @endauth
                    <a href="{{route('car.show',$car->id)}}" class="btn btn-secondary py-2 ml-1">Details</a>   
                  @else
                    <span class="btn btn-warning disponible">No disponible</span>  
                  @endif
                </p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        @else
        <div class="text-center">
          <p>There are no cars available with the marque "{{$marque}}".</p>
        </div>
        @endif
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-about">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
      </div>
      <div class="col-md-6 wrap-about ftco-animate">
        <div class="heading-section heading-section-white pl-md-5">
          <span class="subheading">About us</span>
          <h2 class="mb-4">Welcome to Carbook</h2>

          <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
          <p><a href="{{route('car.index')}}" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
        </div>
      </div>
    </div>
  </div>
</section> 

@endsection

	

