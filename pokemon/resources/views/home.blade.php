@extends('layouts.app2')

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
<link rel="stylesheet" href="css/home.css">
@endsection

@section('content')
<h1>HOME</h1>
<div id="pokemons" class="block card swiper mySwiper">
   <div class="swiper-wrapper">
      @foreach($pokemons as $pokemon)
         <div class="swiper-slide">
               <img src="{{$pokemon->image}}">
               <span>{{$pokemon->name}}</span>
         </div>
      @endforeach
   </div>
   <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div>
   <div class="swiper-pagination"></div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div id="trailer" class="block card">
      <video class=""playsinline="" muted="" autoplay="" loop="" disableremoteplayback="">
            <source src="https://storage.googleapis.com/pgoblog/seasons-mythical-wishes/Hero%20Trailer/PGO_S9_Launch_16x9_WebHeader_v1.mp4" type="video/mp4" sizes="auto">
      </video>
    </div>
  </div>
  <div class="col-sm-6">
    <div id="buttons" class="block card">
      <div class="card-body">
         <a href="" class="btn btn-primary">JOUER MAINTENANT</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="/js/home.js"></script>
@endsection