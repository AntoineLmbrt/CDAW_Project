@section('style')
    <style>
      .fa {
        padding: 20px;
        font-size: 30px;
        width: 50px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
  }
      .fa-facebook {
        background: #3B5998;
        color: white;
      }

      .fa-twitter {
        background: #55ACEE;
        color: white;
      }

      .fa-google {
        background: #dd4b39;
        color: white;
      }

      .fa-linkedin {
        background: #007bb5;
        color: white;
      }

      .fa-youtube {
        background: #bb0000;
        color: white;
      }


    </style>

@endsection
<div class="card text-center" style="margin-left: 8%; margin-right:8%">
    <div class="card-body">
    <div class="row">
    <div class="col-sm-6">
      <div class="card border-white">
        <div class="card-body">
          <img class="navbar-brand" src="assets\img\logo\logo.png" width="200" height="124"/>
          <h6 class="card-title">Pokémon App est site web de jeu de pokémon, dans laquelle vous pouvez avoir votre collection pokémon et jouer avec vos amis.</h6>
          
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card border-white">
        <div class="card-body">
          <h5 class="card-title">Nous Réseaux sociaux</h5>
          <p class="card-text">Suivez-nous sur nos réseaux sociaux pour être au courant de nos dernières actualités.</p>
          <div class="social-container">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-linkedin"></a>
            <a href="#" class="fa fa-youtube"></a>

    
          
        </div>
      </div>
    </div>
  </div>
    </div>
    <div class="card-footer text-muted">
    © 2022 CDAW - IMT Nord Europe
    </div>
  </div>