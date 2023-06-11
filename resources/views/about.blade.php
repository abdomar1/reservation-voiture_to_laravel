@extends('layouts.master')


@section('titre','page about')

@section('about','active')


@section('content') 
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('accueil')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">About Us</h1>
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
              <p>Carbook is your ultimate destination for car rental services. Whether you're traveling for business or leisure, Carbook offers a wide range of vehicles to suit your needs. With a simple and efficient booking process,
                 you can easily search for available cars, compare prices, and select the perfect vehicle for your journey. Carbook partners with reputable car rental agencies, ensuring that you have access to a fleet of well-maintained and reliable cars. Whether you need a compact car for city exploration or a spacious SUV for a family trip, 
                 Carbook has the ideal rental option for you. With flexible rental durations and competitive rates, Carbook makes renting a car convenient and affordable. Say goodbye to the hassle of searching for rental cars, and trust Carbook to provide you with a seamless car rental experience. Book your next adventure with Carbook today!</p>
              <p><a  href="{{route('car.index')}}" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
            </div>
                  </div>
              </div>
          </div>
      </section>

@endsection


 

 