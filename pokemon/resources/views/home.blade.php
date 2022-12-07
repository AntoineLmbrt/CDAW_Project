@extends('layouts.app')

@section('style')
<style>

#cc {
    color: azure
   }

.card {
    margin-left: 8%;
    margin-right: 8%;
}
</style>
@endsection

@section('content')
   <div class="card">
       <video class=""playsinline="" muted="" autoplay="" loop="" disableremoteplayback="">
         <source src="https://storage.googleapis.com/pgoblog/seasons-mythical-wishes/Hero%20Trailer/PGO_S9_Launch_16x9_WebHeader_v1.mp4" type="video/mp4">
         </video>
      <div class="card-body">
      <h5 class="card-title">Pokémon à l'affiche</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
   </div> 
@endsection