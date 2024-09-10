<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
	<!-- Page Title -->
	<title>Scout</title>
	<!-- Favicon Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
	<!-- Google Fonts Css-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">
	<!-- Bootstrap Css -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
	<!-- SlickNav Css -->
	<link href="{{asset('css/slicknav.min.css')}}" rel="stylesheet">
	<!-- Swiper Css -->
	<link rel="stylesheet" href="{{asset('css/swiper-bundle.min.css')}}">
	<!-- Font Awesome Icon Css-->
	<link href="{{asset('css/all.css')}}" rel="stylesheet" media="screen">
	<!-- Animated Css -->
	<link href="{{asset('css/animate.css')}}" rel="stylesheet">
	<!-- Magnific Popup Core Css File -->
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
	<!-- Main Custom Css -->
	<link href="{{asset('css/custom.css')}}" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('css/registration.css')}}">
 
</head>
<body class="tt-magic-cursor">


    
        <!-- Preloader Start -->
        <div class="preloader">
            <div class="loading-container">
                <div class="loading"></div>
                <div id="loading-icon"><img src="{{asset('images/logo.svg')}}" alt=""></div>
            </div>
        </div>
        <!-- Preloader End -->
        
	<!-- Magic Cursor Start -->
	<div id="magic-cursor">
		<div id="ball"></div>
	</div>
	<!-- Magic Cursor End -->

  

	 <div class="gredient">
<form action="{{ url('register') }}" method="POST">
        @csrf
 <div class="login-page">
        <div class="left-side">
           <img src="{{asset('images/logo.svg')}}" alt="Logo" class="logo">

            <h2>Find the Right Products and Suppliers with <span style="color:#3545D6">Ease!</span></h2>
            <img src="images/Registration/image.png" alt="Image" class="main-image">
            <div class="bottom-logos">
                <img src="{{asset('images/Registration/walMart.svg')}}" alt="Logo 6">
                 <img src="{{asset('images/Registration/ebay.svg')}}" alt="Logo 2">
                <img src="{{asset('images/Registration/aliExpress.svg')}}" alt="Logo 3">
                <img src="{{asset('images/Registration/shopify.svg')}}" alt="Logo 5">
                <img src="{{asset('images/Registration/amazon.svg')}}" alt="Logo 4">
            </div>
        </div>
        <div class="right-side">
               <img src="images/logo.svg" alt="Logo" class="mob-logo">
            <div class="top-navigation" >
                <img src="images/Registration/backArrow.svg" alt="Back Icon">
                <p style="text-decoration: underline; font-size:14px;color:#0F1A27;margin-bottom: 0.0em !important;">Back To Home Page</p>
            </div>
            
            <div class="login-form">
                <h3>Create an account</h3>
                <p>Welcome! Get started using Scout.</p>
                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
                <label for="name">Full Name</label>
                <div class="input-field">
                    <img src="{{asset('images/Registration/full-name.svg')}}" alt="Name Icon">
                    <input type="text" name="username" id="username" placeholder="Your Name" required>
                </div>
                <label for="email">Email</label>
                <div class="input-field">
                    <img src="{{asset('images/Registration/email.svg')}}" alt="Email Icon">
                    <input type="email" name="email" id="email" placeholder="Email@example.com" required>
                </div>
                <label for="password">Password</label>
                <div class="input-field">
                    <img src="{{asset('images/Registration/password.svg')}}" alt="Password Icon">
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
                <button class="get-started">Get Started</button>
                <div class="login-options">
                    <p style="text-decoration: underline; ">Already have an account? <a href="{{url('login')}}">Login</a></p>
                    <div class="or-divider">
                        <span></span> Or <span></span>
                    </div>
                     <button class="social-login google">
            <img src="{{asset('images/Registration/google.svg')}}" alt="Google Icon">
            Continue with Google
        </button>
        <button class="social-login facebook">
            <img src="{{asset('images/Registration/fbIcon.svg')}}" alt="Facebook Icon">
            Continue with Facebook
        </button>
                </div>
            </div>
        </div>
    </div>
</form>
     </div> 


     <!-- Jquery Library File -->
     <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
     <!-- Bootstrap js file -->
     <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <!-- Validator js file -->
     <script src="{{asset('js/validator.min.js')}}"></script>
     <!-- SlickNav js file -->
     <script src="{{asset('js/jquery.slicknav.js')}}"></script>
     <!-- Swiper js file -->
     <script src="{{asset('js/swiper-bundle.min.js')}}"></script>
     <!-- Counter js file -->
     <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
     <script src="{{asset('js/jquery.counterup.min.js')}}"></script>
     <!-- Isotop js file -->
     <script src="{{asset('js/isotope.min.js')}}"></script>
     <!-- Magnific js file -->
     <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
     <!-- SmoothScroll -->
     <script src="{{asset('js/SmoothScroll.js')}}"></script>
     <!-- MagicCursor js file -->
     <script src="{{asset('js/gsap.min.js')}}"></script>
     <script src="{{asset('js/magiccursor.js')}}"></script>
     <!-- Text Effect js file -->
     <script src="{{asset('js/SplitText.js')}}"></script>
     <script src="{{asset('js/ScrollTrigger.min.js')}}"></script>
     <!-- Wow js file -->
     <script src="{{asset('js/wow.js')}}"></script>
     <!-- Main Custom js file -->
     <script src="{{asset('js/function.js')}}"></script>
</body>
</html>