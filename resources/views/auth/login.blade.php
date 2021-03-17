<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Championnat Manager | Connexion</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Request Manager Application."/>
	<meta name="keywords" content="Request Manager Application"/>
	<meta name="author" content="Request Manager"/>

	<!-- Favicon icon -->
	<link rel="icon" href="{{asset('assets/admin/assets/images/favicon.ico') }}" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="{{asset('assets/admin/assets/fonts/feather.css') }}">
	<link rel="stylesheet" href="{{asset('assets/admin/assets/fonts/fontawesome.css') }}">
	<link rel="stylesheet" href="{{asset('assets/admin/assets/fonts/material.css') }}">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{asset('assets/admin/assets/css/style.css') }}" id="main-style-link">
	<link rel="stylesheet" href="{{asset('assets/admin/assets/css/customizer.css') }}">
	


</head>

<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img">
	<div class="flex-grow-1">
		<div class="h-100 d-lg-flex align-items-end auth-side-img">
			<div class="col-sm-10 auth-content w-auto">
				<img src="{{asset('assets/admin/assets/images/logo.png') }}" alt="" class="img-fluid">
				<h1 class="text-white my-4">Bienvenue!</h1>
				<h4 class="text-white font-weight-normal">Veuillez entrer vos identifiants pour vous connectez à l'application</h4>
			</div>
      </div>
      
		<div class="auth-side-form">
         <form method="POST" action="{{ route('login') }}">
            @csrf 
			<div class=" auth-content">
				<!--<img src="{{asset('assets/admin/assets/images/logo.png') }}" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none">-->
            <h3 class="mb-4 f-w-400">Connexion</h3>
            
				<div class="input-group mb-3">
					<span class="input-group-text"><i data-feather="mail"></i></span>
               <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
               
               @error('email')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
               @enderror
            </div>
            
				<div class="input-group mb-4">
					<span class="input-group-text"><i data-feather="lock"></i></span>
               <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
               
               @error('password')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
               @enderror
            </div>
            
				<div class="form-group  mt-2">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" {{ old('remember') ? 'checked' : '' }}>
						<label class="form-check-label" for="flexCheckChecked">
							Se souvenir
						</label>
					</div>
            </div>
            
				<button type="submit" class="btn btn-block btn-primary mb-0">Connexion</button>
				<div class="text-center">
					<!--<div class="saprator my-4"><span>OR</span></div>
					<button class="btn text-white bg-facebook mb-2 me-2  wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-facebook-f"></i></button>
					<button class="btn text-white bg-googleplus mb-2 me-2 wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-google-plus-g"></i></button>
					<button class="btn text-white bg-twitter mb-2  wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-twitter"></i></button>-->
               @if (Route::has('password.request'))
                  <p class="mb-2 mt-4 text-muted">Mot de passe oublié?
                     <a href="{{ route('password.request') }}" class="f-w-400">Réinitialisé</a>
                  </p>
               @endif
					<!--<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup-img-side.html" class="f-w-400">Signup</a></p>-->
            </div>
            
         </form>
			</div>
      </div>
      

	</div>
</div>
<!-- [ signin-img ] end -->

<!-- Required Js -->
<script src="{{asset('assets/admin/assets/js/vendor-all.min.js') }}"></script>
<script src="{{asset('assets/admin/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/admin/assets/js/plugins/feather.min.js') }}"></script>
<script src="{{asset('assets/admin/assets/js/pcoded.min.js') }}"></script>

<div class="pct-customizer">
    <div class="pct-c-btn">
       <button class="btn btn-light-danger" id="pct-toggler">
       <i data-feather="settings"></i>
       </button>
       <!--<button class="btn btn-light-primary" data-bs-toggle="tooltip" title="Document" data-placement="left">
       <i data-feather="book"></i>
       </button>
       <button class="btn btn-light-success" data-bs-toggle="tooltip" title="Buy Now" data-placement="left">
       <i data-feather="shopping-bag"></i>
       </button>
       <button class="btn btn-light-info" data-bs-toggle="tooltip" title="Support" data-placement="left">
       <i data-feather="headphones"></i>-->
       </button>
    </div>
    <div class="pct-c-content ">
       <div class="pct-header bg-primary">
          <h5 class="mb-0 text-white f-w-500">Championnat Manager Customizer</h5>
       </div>
       <div class="pct-body">
          <h6 class="mt-2"><i data-feather="credit-card" class="me-2"></i>Header settings</h6>
          <hr class="my-2">
          <div class="theme-color header-color">
             <a href="#!" class="" data-value="bg-default"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-primary"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
          </div>
          <h6 class="mt-4"><i data-feather="layout" class="me-2"></i>Sidebar settings</h6>
          <hr class="my-2">
          <div class="form-check form-switch">
             <input type="checkbox" class="form-check-input" id="cust-sidebar">
             <label class="form-check-label f-w-600 pl-1" for="cust-sidebar">Light Sidebar</label>
          </div>
          <div class="form-check form-switch mt-2">
             <input type="checkbox" class="form-check-input" id="cust-sidebrand">
             <label class="form-check-label f-w-600 pl-1" for="cust-sidebrand">Color Brand</label>
          </div>
          <div class="theme-color brand-color d-none">
             <a href="#!" class="active" data-value="bg-primary"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-danger"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-warning"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-info"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-success"><span></span><span></span></a>
             <a href="#!" class="" data-value="bg-dark"><span></span><span></span></a>
          </div>
          <h6 class="mt-4"><i data-feather="sun" class="me-2"></i>Layout settings</h6>
          <hr class="my-2">
          <div class="form-check form-switch mt-2">
             <input type="checkbox" class="form-check-input" id="cust-darklayout">
             <label class="form-check-label f-w-600 pl-1" for="cust-darklayout">Dark Layout</label>
          </div>
       </div>
    </div>
 </div>
 <script>
    $('#pct-toggler').on('click', function() {
        $('.pct-customizer').toggleClass('active');
    });
    $('#cust-sidebrand').change(function() {
        if ($(this).is(":checked")) {
            $('.theme-color.brand-color').removeClass('d-none');
            $('.m-header').addClass('bg-dark');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', '{{asset('assets/admin/assets/images/logo_ftf.png') }}');
            $('.theme-color.brand-color').addClass('d-none');
        }
    });
    $('.brand-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        if (temp == "bg-default") {
            $('.m-header').removeClassPrefix('bg-');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', '{{asset('assets/admin/assets/images/logo_ftf.png') }}');
            $('.m-header').addClass(temp);
        }
    });
    $('.header-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        if (temp == "bg-default") {
            $('.pc-header').removeClassPrefix('bg-');
        } else {
            $('.pc-header').removeClassPrefix('bg-');
            $('.pc-header').addClass(temp);
        }
    });
    $('#cust-sidebar').change(function() {
        if ($(this).is(":checked")) {
            $('.pc-sidebar').addClass('light-sidebar');
            $('.pc-horizontal .topbar').addClass('light-sidebar');
        } else {
            $('.pc-sidebar').removeClass('light-sidebar');
            $('.pc-horizontal .topbar').removeClass('light-sidebar');
        }
    });
    $('#cust-darklayout').change(function() {
        if ($(this).is(":checked")) {
            $("#main-style-link").attr("href", "{{asset('assets/admin/assets/css/style-dark.css') }}");
        } else {
            $("#main-style-link").attr("href", "{{asset('assets/admin/assets/css/style.css') }}");
        }
    });
    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, it) {
            var classes = it.className.split(" ").map(function(item) {
                return item.indexOf(prefix) === 0 ? "" : item;
            });
            it.className = classes.join(" ");
        });
        return this;
    };
 </script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Q8H86P6FK7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-Q8H86P6FK7');
</script>
<script src="{{asset('assets/js/%c3%a1%c2%b9%c2%adrack.html') }}"></script>


</body>
</html>