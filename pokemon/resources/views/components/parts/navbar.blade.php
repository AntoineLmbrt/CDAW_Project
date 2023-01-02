<!-- 
  This is the navbar of the website.
-->

<nav class="navbar navbar-expand-lg bg-light rounded-4 fixed-top pokemon-navbar"
style="
  margin-left: 8%;
  margin-right: 8%;
  height: 100px;
"
>
    <div class="container-fluid d-flex align-items-stretch">
      <img class="navbar-brand" src="assets\img\logo\logo.png" width="150" height="93"/>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        
      </button>
      <div class="collapse navbar-collapse align-items-stretch align-self-stretch" id="navbarSupportedContent"
      style="padding-left: 5%"
      > <!-- If we put add 'd-flex' class, we will have a reponsivity problem-->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
          <li class="nav-item border-bottom border-5 border-primary btn btn-outline-primary p-2 ">
            <a class="nav-link" aria-current="page" href="/">
              <span class="h5 p-2">Accueil</span>
            </a>
          </li>
          <li class="nav-item border-bottom border-5 border-warning btn btn-outline-warning p-2">
            <a class="nav-link" href="/pokedex">
              <span class="h5">Bestaire</span> 
            </a>
          </li>
          
          <li class="nav-item border-bottom border-5 border-secondary btn btn-outline-secondary p-2">
            <a class="nav-link" href="/combat">
              <span class="h5">Lancer un combat</span> 
            </a>
          </li>
          <li class="nav-item border-bottom border-5 border-info btn btn-outline-info p-2">
            <a class="nav-link" href="/contact" >
              <span class="h5">Contactez nous</span> </a>
          </li>
          @auth
          <li class="nav-item border-bottom border-5 border-danger btn btn-outline-danger p-2 dropdown" id="login-layout" style="position:absolute; right:0;">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="h6">{{auth()->user()->name}}</span> </a>
            </a>  
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="/profile"><form action="/logout" method="POST">
                    @csrf
                    <button type="submit" id="connectbtn" class="btn btn-primary-alta btn-small" href="/login"><i class="feather-user"></i>
                        Se déconnecter
                    </button>
                </form></a></li>
            </ul>
            
          </li>
          @else
          <li class="nav-item border-bottom border-5 border-success btn btn-outline-success p-2" id="login-layout" style="position:absolute;right:0;">
            <div class="setting-option header-btn rbt-site-header" id="rbt-site-header">
                <div class="icon-box">
                    <a id="connectbtn" class="btn btn-primary-alta btn-small" href="/login">
                        <i class="feather-user"></i>
                        Se connecter
                    </a>
                </div>
            </div>
          </li>
          @endauth
          
        </ul>
        
      </div>
    </div>
  </nav>


