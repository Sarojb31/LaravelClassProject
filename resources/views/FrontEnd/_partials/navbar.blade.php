

<!-- =====================Navigation Bar ===================-->
<header >
  <nav class="navbar navbar-expand-lg  fixed-top navbar-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="#"><image id="logo" src="{{asset('FrontEnd_asset/asset/images/PSL.png')}}"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100   justify-content-end">
          <li class="nav-item active ">
            <a class="nav-link" href="{{route('home')}}">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('shop')}}">SHOP</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="{{route('contact')}}">CONTACT US</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link " href="{{route('about')}}">ABOUT US</a>
          </li>
           <li class="nav-item">
            <a class="nav-link " href="{{route('donate.list')}}">DONATIONS</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user "></i>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

             
                @if(Auth::check()) 
                
                  <a class="dropdown-item" href="{{route('cart')}}">View Cart</a>
                  <a class="dropdown-item" href="{{route('upload')}}">Upload</a>
                  <a class="dropdown-item" href="{{route('donate')}}">Donate</a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" onclick="event.preventDefault();document.getElementById('user-logout').submit();">SignOut</a>
                  <form action="{{route('logout')}}" id="user-logout" method="post">@csrf</form>
                
                @else
                
                <a class="dropdown-item" href="{{route('login')}}">Sign In</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('register')}}">Sign Up</a>
                
                @endif
                           
              
            </div>
          </li>





        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>
  </header>

      <!-- Navbar CSS Ends Here -->

 @section('script')
 <script type="text/javascript">      
     // --------------JS for menu scroll------------
    // Navbar Scrollblack 
      $(window).on('scroll',function()
      {
        if ($(window).scrollTop())
        {
              $('nav').addClass('snav');//navigation Bar
              $('nav a').addClass('snava');
              document.getElementById('logo').src='{{asset('FrontEnd_asset/asset/images/PSWS.png')}}';//Items 

          }
          else
          {
              $('nav').removeClass('snav');
              $('nav a').removeClass('snava');
              document.getElementById('logo').src='{{asset('FrontEnd_asset/asset/images/PSL.png')}}';
          }
      })
        
    // Navbar Scrollblack//
    </script>

 
 @endsection

