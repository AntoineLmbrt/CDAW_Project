@extends('layouts.app')

@section('title', 'Accueil')

@section('style')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
  <link rel="stylesheet" href="css/home.css">
@endsection

@section('content')
  <div class="card">
    <div id="pokemons" class="block swiper mySwiper">
      <div class="swiper-wrapper">
          @foreach($pokemons as $key=>$pokemon)
            @if($key%2 == 0)
              <div class="swiper-slide">
                <img src="{{$pokemon->image}}" style="height: 150px; width: 150px;">
                <span class="h6">{{$pokemon->name}}</span>
              </div>
            @endif
          @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
    <video class=""playsinline="" muted="" autoplay="" loop="" disableremoteplayback="">
      <source src="https://storage.googleapis.com/pgoblog/seasons-mythical-wishes/Hero%20Trailer/PGO_S9_Launch_16x9_WebHeader_v1.mp4" type="video/mp4" sizes="auto">
    </video>
    <div class="card-body d-grid gap-2 col-6 mx-auto" style="height: 100px">
      <a href="/combat" class="border-bottom border-5 border-warning btn btn-outline-warning"><span class="h4">JOUER MAINTENANT</span></a>
    </div>

  </div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script src="/js/home.js"></script>
@endsection