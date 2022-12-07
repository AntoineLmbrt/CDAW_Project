<!--
I tried to use bootsrap as much as I can (Stand on the Shoulders of Giants)

What I can add:
  - Solve 'se connecter' Button
  - Add icons
  - Change navbar toggler to other one
  - Add animations ( not important)

-->
<nav class="navbar navbar-expand-lg bg-light rounded-4"
    style="
      margin-left: 8%;
      margin-right: 8%;
      margin-top: 30px;
    "
    >
        <div class="container-fluid d-flex align-items-stretch">
          <img class="navbar-brand" src="assets/img/logo/logo.png" width="150" height="93"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            
          </button>
          <div class="collapse navbar-collapse align-items-stretch align-self-stretch" id="navbarSupportedContent"
          style="padding-left: 5%"
          > <!-- If we put add 'd-flex' class, we will have a reponsivity problem-->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
              <li class="nav-item border-bottom border-5 border-success btn btn-outline-success p-2 ">
                <a class="nav-link active" aria-current="page" href="/">
                  <span class="h5 p-2">Accueil</span>
                </a>
              </li>
              <li class="nav-item border-bottom border-5 border-warning btn btn-outline-warning p-2">
                <a class="nav-link active" href="#">
                  <span class="h5">Bestaire</span> 
                </a>
              </li>
              
              <li class="nav-item border-bottom border-5 border-secondary btn btn-outline-secondary p-2">
                <a class="nav-link active" href="#">
                  <span class="h5">Lancer un combat</span> 
                </a>
              </li>
              <li class="nav-item border-bottom border-5 border-info btn btn-outline-info p-2">
                <a class="nav-link active" href="#" >
                  <span class="h5">Contactez nous</span> </a>
              </li>
    
              <li class="nav-item border-bottom border-5 border-danger btn btn-outline-danger p-2" id="login-layout" 
              style="
                
                position:absolute;
                right:0;
              
                " 
              >
                <a 
                class="nav-link active" 
                href="#" 
                >
                <span class="h5">Se connecter</span> </a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>