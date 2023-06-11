@extends('layouts.master')

@section('titre','page de cars')
    
@section('cars','active')

<style>
  #categories {
    overflow-x: scroll;
    white-space: nowrap;
    margin-bottom: 20px;
    display: flex;
    justify-content: center;
    position: relative;
  }

  #categories::-webkit-scrollbar {
    display: none;
  }

  #categories li {
    margin-right: 10px;
    list-style-type: none; /* إخفاء نقاط القوائم */
  }
</style>


@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="{{route('accueil')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Choose Your Car</h1>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-12 hello">
        <div class="row no-gutters">
          <div class="col-md-4 d-flex align-items-center">
            <form action="#" class="request-form ftco-animate bg-primary">
              <h2>Make your trip</h2>
              <div class="form-group">
                <label for="" class="label">marque de voiture </label>
                <input type="text" class="form-control" placeholder="dacia, ford, jeep, etc" name="marque" value="{{ request('marque') }}" >
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

<section class="ftco-section bg-light">
 <h2 class=" text-center">Categories:</h2>
   <ul id="categories">
    @foreach($categories as $category)
      <li ><a href="{{ route('car.index', ['categorie' => $category->id]) }}"><img src="{{ asset('categorie/'.$category->path) }}" alt="" width="60" class="rounded-circle border"></a></li>
    @endforeach
   </ul>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row">
      @foreach ($cars as $car)
      <div class="col-md-4">
        <div class="car-wrap rounded ftco-animate">
          <div class="img rounded d-flex align-items-end" style="background-image: url({{ asset('cars/'.$car->image) }});">
          </div>
          <div class="text">
            <h2 class="mb-0"><a href="car-single.html">{{$car->marque}}</a></h2>
            <div class="d-flex mb-3">
              <span class="cat">{{$car->type}}</span>
              <p class="price ml-auto">{{$car->prixJ}}dh<span>/day</span></p>
            </div>
            <p class="d-flex mb-0 d-block">
              @if ($car->disponible)
              @auth
              <a href="{{route('reserv.create',$car->id)}}"  class="btn btn-primary py-2 mr-1">Reserve now</a>   
              @else  
              <a href="{{route('login')}}"  class="btn btn-primary py-2 mr-1">Reserve now</a>             
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
    <div class="row mt-5">
      <div class="col text-center">

      </div>
    </div>
  </div>
</section>
@endsection
    

