@extends('layouts.master')

@section('titre','page contact')

@section('contact','active')

@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{route('accueil')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Contact Us</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section contact-section">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
          <div class="col-md-4">
              <div class="row mb-5">
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                        <div class="icon mr-3">
                            <span class="icon-map-o"></span>
                        </div>
                      <p><span>Address:</span> 203 Fake St, fes, marocco</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                        <div class="icon mr-3">
                            <span class="icon-mobile-phone"></span>
                        </div>
                      <p><span>Phone:</span> <a href="tel://1234567920">+212 69 796 654</a></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="border w-100 p-4 rounded mb-2 d-flex">
                        <div class="icon mr-3">
                            <span class="icon-envelope-o"></span>
                        </div>
                      <p><span>Email:</span> <a href="mailto:info@yoursite.com">user@user123.com</a></p>
                    </div>
                </div>
              </div>
        </div>
        <div class="col-md-8 block-9 mb-md-5">
          <form action="{{ route('contact.send') }}" method="POST" class="bg-light p-5 contact-form">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name" name="name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Email"  name="email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject"  name="subject">
            </div>
            <div class="form-group">
              <textarea  id="" cols="30" rows="7" class="form-control" placeholder="Message"  name="message"></textarea>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>
      </div>
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div id="map" class="bg-white">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3310.690393433028!2d-5.0078451!3d34.0181246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8b484d445777%3A0x10e6aaaeedd802ef!2sFes%E2%80%AD!5e0!3m2!1sen!2s!4v1621438494776!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
          </div>
      </div>
    </div>
  </section> 
@endsection

 