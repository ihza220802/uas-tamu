<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', $title) </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
	<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
	

	<!-- Favicon -->


		

		<!-- Bootstrap css -->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

		<!-- Icons css -->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/plugins/icons/icons.css" rel="stylesheet">

		<!--  Right-dropdownmenu css -->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/plugins/dropdown/dropdown.css" rel="stylesheet">

		<!--  Left-Dropdownbar css -->
		<link rel="stylesheet" href="https://laravel.spruko.com/dashfox/ltr/assets/css/dropdownmenu.css">

		<!--- Dashboard-2 css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/style.css" rel="stylesheet">
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/style-dark.css" rel="stylesheet">

		<!--- Color css-->
		<link id="theme" href="https://laravel.spruko.com/dashfox/ltr/assets/css/colors/color.css" rel="stylesheet">

		 

		<!---Skinmodes css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/skin-modes.css" rel="stylesheet" />

		<!--- Animations css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/css/animate.css" rel="stylesheet">

		<!---Switcher css-->
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/switcher/css/switcher.css" rel="stylesheet">
		<link href="https://laravel.spruko.com/dashfox/ltr/assets/switcher/demo.css" rel="stylesheet">
		<style>
    .navbar-nav .nav-link {
        color: white !important; /* Change link color to white */
    }

    .bg-black {
        background-color: black !important; /* Change background color to black */
    }
</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
	<div class="container-fluid bg-black"> <!-- Change bg-white to bg-black -->
    <a class="navbar-white text-white" href="#"><b>BUKU TAMU</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/home">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">User</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('tamus.index')}}">Tamu</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('positions.index') }}">Position</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('departements.index') }}">Departement</a>
        </li>
       
        @if(Auth()->user()->position =="0")
        @endif
     
    </ul>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="main-header-right">
                    <div class="nav nav-item  navbar-nav-right ml-auto">
                        
                        <div class="dropdown main-header-message right-toggle">
                            <a class="nav-link pr-0" data-toggle="sidebar-right" data-target=".sidebar-right">
                                <i class="fas fa-caret-down" style="font-size:20px"></i>
                            </a>
                        </div>
                    </div>
    </div>
</div>
    
    </nav>

    <!-- Loader -->
		<div id="global-loader">
			<img src="https://laravel.spruko.com/dashfox/ltr/assets/img/loader-2.svg" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->
      
    <div class= "container-fluid">
        <div class="card">
          <div class="card-body">
            <h1 class="crad-title">@yield('title', $title)</h1>
            @yield('content')
          </div>
    		</div>
    </div>
          
        
        

        <!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fas fa-arrow-up"></i></a>

		<!-- Jquery js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/jquery/jquery.min.js"></script>

		<!-- Bootstrap4 js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/bootstrap/popper.min.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Ionicons js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/ionicons/ionicons.js"></script>

		<!-- Moment js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/moment/moment.js"></script>	

		<!-- P-scroll js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/perfect-scrollbar/p-scroll.js"></script>

		<!-- Sidebar js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/side-menu/sidemenu.js"></script>

		<!-- Rating js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/rating/jquery.barrating.js"></script>		

		<!-- Suggestion js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/suggestion/jquery.input-dropdown.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/search.js"></script>

		<!-- Right-sidebar js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/sidebar/sidebar.js"></script>
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/sidebar/sidebar-custom.js"></script>

		<!-- Sticky js-->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/sticky.js"></script>

		<!-- eva-icons js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/plugins/eva-icons/eva-icons.min.js"></script>

		 

		<!-- Eva-icons js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/eva-icons.min.js"></script>
		

		<!-- custom js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/js/custom.js"></script>

		<!-- Switcher js -->
		<script src="https://laravel.spruko.com/dashfox/ltr/assets/switcher/js/switcher.js"></script>
		
		<!-- font awesome -->
		<script src="https://kit.fontawesome.com/964ae5b0fd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    @yield('js')
  </body>
  
</html>