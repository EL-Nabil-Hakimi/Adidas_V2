<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

      

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Adidas</title>
</head>

<style>
  #listPerAll{
    
    max-height: 200px !important;
    overflow-y: auto; 
    overflow-x: none;
  }
  #listPer {
    margin-left: 3%;
    margin-top: 2%;
    display: flex;
    align-items: center;
    cursor: pointer;
}
  #listPer label{
    cursor: pointer;

  }
  #listPer input[type="checkbox"] {
        margin-right: 5px;
    }
  #Logout{
    text-decoration: none;
    color: red;
    transition: 0.6s;
    margin-left: 2em;
    margin-right: 2em;

    }
    #Logout:hover{
      transform: scale(1.2)
    }
</style>
<body>
    <!--Main Navigation-->
<header>
    <!-- Sidebar -->
    
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
       
        <div class="position-sticky">

          @if (View::hasSection('nav'))
             @yield('nav')
          @else
          <div class="list-group list-group-flush mx-3 mt-4">
            
            <a href="/Client" class="list-group-item list-group-item-action py-2 ripple ">
              <i class="fas fa-chart-area fa-fw me-3"></i><span>Clients</span>
            </a>
            <a href="/addClientpage" class="list-group-item list-group-item-action py-2 ripple">
              <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Client</span>
            </a>
            <a href="/Product" class="list-group-item list-group-item-action py-2 ripple " >
              <i class="fas fa-chart-area fa-fw me-3"></i><span>Produits</span>
            </a>
            <a href="/addProduitpage" class="list-group-item list-group-item-action py-2 ripple">
              <i class="fas fa-chart-area fa-fw me-3"></i><span>Ajouter Produit</span>
            </a>
            <a href="/Categorie" class="list-group-item list-group-item-action py-2 ripple "
              ><i class="fas fa-lock fa-fw me-3"></i><span>Categories</span></a
            >
            <a href="/addCategoriepage" class="list-group-item list-group-item-action py-2 ripple "
              ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Categorie</span></a
            >
            <a href="/roles" class="list-group-item list-group-item-action py-2 ripple "
            ><i class="fas fa-chart-line fa-fw me-3"></i><span>Roles</span></a
            >
            <a href="/addrolepage" class="list-group-item list-group-item-action py-2 ripple "
              ><i class="fas fa-chart-line fa-fw me-3"></i><span>Ajouter Role</span></a
            >
          @endif
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
  
    <!-- Navbar -->
    <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button
          class="navbar-toggler"
          type="button"
          data-mdb-toggle="collapse"
          data-mdb-target="#sidebarMenu"
          aria-controls="sidebarMenu"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i class="fas fa-bars"></i>
        </button>
  
        <!-- Brand -->
        <a class="navbar-brand" href="#">
          <img
            src="https://turbologo.com/articles/wp-content/uploads/2019/07/Three-Bars-adidas-logo-1.jpg.webp"
            height="60"
            alt="Adidas Logo"
            loading="lazy"
            />
          </a>
        <!-- Search form -->
        <form class="d-none d-md-flex input-group w-auto my-auto">
          <input
            autocomplete="off"
            type="search"
            class="form-control rounded"
            placeholder='Search...'
            style="min-width: 225px;"
          />
          <span class="input-group-text border-0"><i class="fas fa-search"></i></span>
        </form>
  
        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row">
          <!-- Notification dropdown -->
          <li class="nav-item dropdown">
            <a
              class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="fas fa-bell"></i>
              <span class="badge rounded-pill badge-notification bg-danger">1</span>
            </a>
            
            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink"
            >
              <li>
                <a class="dropdown-item" href="#">Some news</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Another news</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Something else here</a>
              </li>
            </ul>
          </li>
          <!-- Icon -->
          <li class="nav-item">
            <a class="nav-link me-3 me-lg-0" href="#">
              <i class="fas fa-fill-drip"></i>
            </a>
          </li>
          <!-- Icon -->
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" href="#">
              <i class="fab fa-github"></i>
            </a>
          </li>
  
          <!-- Icon dropdown -->
          <li class="nav-item dropdown">
            <a
              class="nav-link me-3 me-lg-0 dropdown-toggle hidden-arrow"
              href="#"
              id="navbarDropdown"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="flag-united-kingdom flag m-0"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li>
                <a class="dropdown-item" href="#"
                  ><i class="flag-united-kingdom flag"></i>English
                  <i class="fa fa-check text-success ms-2"></i
                ></a>
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="flag-portugal flag"></i>Português</a>
              </li>
            </ul>
          </li>
  
          <!-- Avatar -->
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center"
              href="#"
              id="navbarDropdownMenuLink"
              role="button"
              data-mdb-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img (31).webp"
                class="rounded-circle"
                height="22"
                alt="Avatar"
                loading="lazy"
              />
            </a>
            <ul
              class="dropdown-menu dropdown-menu-end"
              aria-labelledby="navbarDropdownMenuLink"
            >
              <li>
                <a class="dropdown-item" href="#">My profile</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Settings</a>
              </li>
              <li>
                <a class="dropdown-item" href="#">Logout</a>
              </li>
            </ul>
          </li>
        </ul>
        <a href="/login" id="Logout">Logout</a>

      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </header>
  <!--Main Navigation-->
  
  <!--Main layout-->
  <main style="margin-top: 58px;">
    <div class="container pt-4">
          @if(View::hasSection('content'))
            @yield('content')
          @else
              <img style="width: 100%; height:87vh;" src="https://turbologo.com/articles/wp-content/uploads/2019/07/Three-Bars-adidas-logo-1.jpg.webp" alt="" srcset="">
          @endif
  
    </div>
  </main>
  <!--Main layout-->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="assets/js/js.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>



</body>
</html>