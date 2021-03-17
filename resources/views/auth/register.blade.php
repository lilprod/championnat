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
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css') }}">
	

    <style>
        body {
            background-color: #d8bc35;
        }

        .iti { width: 100%; }

        .iti__flag {background-image: url("{{asset('images/flags.png') }}");}

        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .iti__flag {background-image: url("{{asset('images/flags@2x.png') }}");}
        }
    </style>
</head>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-8 offset-lg-2 mb-5">

            @include('inc.messages')
            
            <div class="card shadow">
                <!--<div class="card-header">{{ __('Inscription') }}</div>-->

                <div class="card-body">

                    <p class="text-center">
                        <img src="{{asset('assets/admin/assets/images/logo.png') }}" alt="CHAMPIONNAT MANAGER" class="">
                    </p>

                    <p class="text-center text-secondary">
                        Inscrivez-vous en un clique de souris.
                    </p>

                    <form method="POST" action="{{route('save')}}">
                        @csrf
                    
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type Média <span class="text-danger">*</span></label>
                                <select name="type_media_id" id="type_media_id" class="form-control" required>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->title}}</option>	
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nom_media" class="font-weight-bold">Nom du média</label>
                                <input placeholder="Nom" class="form-control @error('nom_media') is-invalid @enderror" name="nom_media" type="text" id="nom_media" value="{{ old('nom_media') }}" required autocomplete="nom_media">
                            
                                @error('nom_media')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ville de couverture<span class="text-danger">*</span></label>
                                <select name="ville_id" id="ville" class="form-control" required>
                                    <option value = "">--Sectionner votre ville--</option>
                                    @foreach ($villes as $ville)
                                        <option value="{{$ville->id}}">{{$ville->title}}</option>	
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stade <span class="text-danger">*</span></label>
                                <select name="stade_id" id="stade" class="form-control" required>
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Email</label>
                                    <input placeholder="Email" class="form-control" required="" name="email" type="email" id="email">
                                <small class="form-text text-muted">Veuillez renseigner une adresse email valide.</small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Téléphone <span class="text-danger">*</span></label>
                            <input id="output" type="hidden" name="phone_number" value=""/>
                            <input type="tel" id="phone" name="" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" required autocomplete="phone_number">
        
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group checkbox">
                                <label>
                                    <input type="checkbox" class="form-check-input input-primary" id="remember" OnClick="checkbox();"> J'ai lu et accepte les Termes & Conditions d'inscription
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">

                        </div>
                    </div>

                    <!--<div class="form-group text-center">
                        <input name="newsletter" type="checkbox" value="1">
                        <label for="newsletter" class="font-weight-bold">Je veux reçevoir les mises à jour du site</label>
                    </div>-->

                    <div class="form-group text-center">
                        <input class="btn btn-success" id="submit" type="submit" value="Inscription" disabled>
                    </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-white">
    <div class="container">
    <a class="navbar-brand font-weight-bold text-dark" href="#">FTF</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-md-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-dark" href="#">Accueil <span class="sr-only">(current)</span></a>
        </li>
  
        <!--<li class="nav-item">
            <a class="nav-link text-dark" href="">Se connecter</a>
        </li>-->
      </ul>
    </div>
    </div>
  </nav>


<!-- Required Js -->
<script src="{{asset('assets/admin/assets/js/vendor-all.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
    
         $('#ville').on('change', function () {
    
             var ville_id = $(this).val();

             if(ville_id){

                 $.ajax({
                    url: '{!!URL::route('getStades')!!}',
                    type: 'GET',
                    data : { 'id' : ville_id},
                    dataType: 'json',
    
                    success:function(data){
    
                        if(data) {
                            $('#stade').empty();
    
                            $('#stade').focus;
    
                            //$('#stade').append('<option value = "">--Sectionner stade--</option>');
    
                            $.each(data, function(key, value){
                             $('select[name = "stade_id"]').append('<option value= "'+ value.id +'">' + value.title + ' </option>');
                           });
                         }
                         
                        }

                    });

                }else{
                    $('#stade').empty();
                }
                   
         });

         $('#nom_media').keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
    });
</script>

<script>
    function checkbox(){
           if(document.getElementById('remember').checked){
               document.getElementById('submit').disabled = '';
           }
           else{
               document.getElementById('submit').disabled = 'disabled';
           }
       }
 </script>
<script src="{{asset('assets/admin/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{asset('assets/admin/assets/js/plugins/feather.min.js') }}"></script>
<script src="{{asset('assets/admin/assets/js/pcoded.min.js') }}"></script>

<script type="text/javascript" src="{{asset('js/intlTelInput.js') }}"></script>
      <script>
         var input = document.querySelector("#phone");
         output = document.querySelector("#output");
         var iti = window.intlTelInput(input, {
               // allowDropdown: false,
               // autoHideDialCode: false,
               // autoPlaceholder: "off",
               // dropdownContainer: document.body,
               // excludeCountries: ["us"],
               // formatOnDisplay: false,
               initialCountry: "auto",
               geoIpLookup: function(success, failure) {
                    $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "tg";
                    success(countryCode);
                    });
                },
               // hiddenInput: "full_number",
               // localizedCountries: { 'de': 'Deutschland' },
               // nationalMode: true,
               // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
               // placeholderNumberType: "MOBILE",
               // preferredCountries: ['cn', 'jp'],
               separateDialCode: true,
               utilsScript: "{{asset('js/utils.js') }}" // just for formatting/placeholders etc
         });
         
         var handleChange = function() {
            var text = iti.getNumber();
            //var text = iti.getNumber(intlTelInputUtils.numberFormat.E164);
            
            var textNode = document.createTextNode(text);
            output.innerHTML = "";
            output.appendChild(textNode);
            document.getElementById("output").value=text;
         };
         
         // listen to "keyup", but also "change" to update when the user selects a country
         input.addEventListener('change', handleChange);
         input.addEventListener('keyup', handleChange); 
      </script>

  
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