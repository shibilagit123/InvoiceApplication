<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>
  
      {{ config('app.name', 'Laravel') }}
  
   </title>
   <meta name="description" content="Bootstrap Admin App + jQuery">
   <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">

   <!-- =============== VENDOR STYLES ===============-->
   <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
   <!-- FONT AWESOME-->
   <link rel="stylesheet" href="{{ asset('css/fontawesome/css/font-awesome.min.css') }}">
   <!-- SIMPLE LINE ICONS-->
   <link rel="stylesheet" href="{{ asset('css/simple-line-icons/css/simple-line-icons.css') }}">
   
   <!-- =============== BOOTSTRAP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" id="bscss">
   <!-- =============== APP STYLES ===============-->
   <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="maincss">
    <!-- =============== custom ===============-->
   <link rel="stylesheet" href="{{ asset('css/theme-a.css') }}" id="maincss">
   <!-- =============== sweetalert ===============-->
   <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" id="maincss">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" id="maincss">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" id="maincss">
    <link rel="stylesheet" href="{{ asset('css/calendar.css') }}" id="maincss">
  @yield('custom_css')
</head>

<body>
   <div class="wrapper">
      <!-- top navbar-->
      <header class="topnavbar-wrapper">
         <!-- START Top Navbar-->
         <nav role="navigation" class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
               <a href="#/" class="navbar-brand">
                  <div class="brand-logo">
                     <img src="
                     
                         {{ asset('img/upload-icon-19.png') }}
                      
                     " alt="App Logo" class="img-responsive" style="height: 60px;">
                  </div>
                  <div class="brand-logo-collapsed">
                    {{--  <img src="
                      {{ asset('img/logo-single.png') }}
                     " alt="App Logo" class="img-responsive"> --}}
                  </div>
               </a>
            </div>
            <!-- END navbar header-->
            <!-- START Nav wrapper-->
            <div class="nav-wrapper">
               <!-- START Left navbar-->
               <ul class="nav navbar-nav">
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a href="#" data-trigger-resize="" data-toggle-state="aside-collapsed" class="hidden-xs">
                        <em class="fa fa-navicon"></em>
                     </a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                        <em class="fa fa-navicon"></em>
                     </a>
                  </li>
                  <!-- START User avatar toggle-->
                  <li>
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a id="user-block-toggle" href="#user-block" data-toggle="collapse">
                        <em class="icon-user"></em>
                     </a>
                  </li>
                  <!-- END User avatar toggle-->
                  <!-- START lock screen-->
                  
                  <!-- END lock screen-->
               </ul>
               <!-- END Left navbar-->
               <!-- START Right Navbar-->
              <ul class="nav navbar-nav navbar-right">
                  <li>
                     <a href="">
                        <em class="fa fa-cog"></em>
                     </a>
                  </li>
                {{--   <li>
                     <a download href="">
                        <em class="fa fa-file-archive-o"></em>
                     </a>
                  </li> --}}
                
                  <li>
                     <a href="{{ route('logout') }}" onclick="event.preventDefault();logOut();">
                        <em class="fa fa-sign-out"></em>
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                  </li>
                  <!-- END Offsidebar menu-->
               </ul>
               <!-- END Right Navbar-->
            </div>
          
         </nav>
         <!-- END Top Navbar-->
      </header>
     <!-- sidebar-->
      <aside class="aside">
       
         <!-- START Sidebar (left)-->
         <div class="aside-inner">
            <nav data-sidebar-anyclick-close="" class="sidebar">
               <!-- START sidebar nav-->
               <ul class="nav">
                  <!-- START user info-->
                  <li class="has-user-block">
                     <div  id="user-block" class="collapse" >
                        <div class="item user-block">
                           <!-- User picture-->
                           <div class="user-block-picture">
                              <div class="user-block-status">
                                 <img src="{{ (file_exists(Auth::user()->image)) ? asset(Auth::user()->image) : asset('img/user/8.jpg') }}" alt="Avatar" style="width:40px;height:40px;" class="img-thumbnail img-circle">
                                 <div class="circle circle-success circle-lg"></div>
                              </div>
                           </div>
                           <!-- Name and Job-->
                           <div class="user-block-info">
                              <span class="user-block-name">Hello, {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                              <span class="user-block-role"></span>
                           </div>
                        </div>
                     </div>
                  </li>
                  
              <li class=" ">
                  <a href="{{ route('home') }}" title="Create Order">
                  <em class="fa fa-cart-plus"></em>
                      <span>Create Order</span>
                  </a>
              </li>
              <li class=" ">
                  <a href="{{ route('order.index') }}" title="Dashboard">
                  <em class="fa fa-dashboard"></em>
                      <span>view orders</span>
                  </a>
              </li>
              
              


            
           
               
              
               
             </ul>
                  
            </nav>
         </div>
         <!-- END Sidebar (left)-->
      
     </aside>
    
      <section>
        <!-- Page content-->
        @yield('content')
      </section>
      <!-- Page footer-->
      <footer>
         <span>&copy; <span id="demoyear"></span> </span>
      </footer>
   </div>
   <!-- =============== VENDOR SCRIPTS ===============-->
   <!-- JQUERY-->
   <script src="{{ asset('js/jquery.js') }}"></script>
   <!-- BOOTSTRAP-->
   <script src="{{ asset('js/bootstrap.js') }}"></script>
   <!-- STORAGE API-->
   <script src="{{ asset('js/jquery.storageapi.js') }}"></script>
   <!-- =============== PAGE VENDOR SCRIPTS ===============-->
   <script src="{{ asset('js/moment.js') }}"></script>


   @yield('mid_js')

   <!-- =============== APP SCRIPTS ===============-->
   <script src="{{ asset('js/app.js') }}"></script>
   <!-- =============== Sweet Alert ===============-->
   <script src="{{ asset('js/sweetalert.min.js') }}"></script>
   <!-- Notify -->
   <script src="{{ asset('js/notify.min.js') }}"></script>
   <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
   <script src="{{ asset('js/calendar.js') }}"></script>
  
  <script>
    function logOut() {
      sweetAlert({
        title: "Are you sure?",
        /*text: "You will not be able to recover this banner!",*/
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: true,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          $('#logout-form').submit();
        } else {
            sweetAlert('Cancelled!', "", "success");
        }
      });
    }
  </script>

  <!-- Notify -->
  <script>
    
  </script>

  @yield('custom_js')

</body>
</html>