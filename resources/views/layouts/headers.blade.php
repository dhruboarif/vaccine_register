<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Covido</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ URL::asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{ URL::asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ URL::asset('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}">
       <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css')}}"> 
      <link rel="stylesheet" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')}}" media="screen">
      <link rel="stylesheet" href="{{ URL::asset('https://rawgit.com/LeshikJanz/libraries/master/Bootstrap/baguetteBox.min.css')}}">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   <!-- Javascript files-->
   
</head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ URL::asset('images/loading.gif')}}" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- top -->
                    <!-- header -->
         <header class="header-area">
            <div class="left">
               <a href="Javascript:void(0)"><i class="fa fa-search new1" aria-hidden="true"></i></a>
            </div>
            <div class="right">
               <a href="Javascript:void(0)"><i class="fa fa-user new1" aria-hidden="true"></i></a>
            </div>
            <div class="container">
               <div class="row d_flex">
                  <div class="col-sm-3 logo_sm">
                     <div class="logo">
                        <a href="index.html"></a>
                     </div>
                  </div>
                  <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-9">
                     <div class="navbar-area">
                        <nav class="site-navbar">
                           <ul>
                              <li><a class="active" href="{{url('')}}">Home</a></li>
                              <li><a href="{{route('nidCheck')}}">Register</a></li>
                              <li><a href="{{route('regStatus')}}">Vaccine Status</a></li>
                              <li><a href="index.html" class="logo_midle">covido</a></li>
                              <li><a href="news.html">news</a></li>
                              <li><a href="doctores.html">doctores</a></li>
                               
                              <li><a href="contact.html">Contact </a></li>
                           </ul>
                           <button class="nav-toggler">
                           <span></span>
                           </button>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
            
         </header>
      <!-- end header -->
            <div class="full_bg">
      <!-- header inner -->

      