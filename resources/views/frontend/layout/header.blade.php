<!doctype html>
<html class="no-js" lang="zxx">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Eaoron Indonesia</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">
	<link rel="apple-touch-icon" href="{{asset('frontend/images/icon.png')}}">

	<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 

	<!-- Stylesheets -->
	<link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/style.css')}}">

	<!-- Custom css -->
   <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
   <link rel="stylesheet" href="{{asset('frontend/css/new-style.css')}}">

	<!-- Modernizer js -->
	<script src="{{asset('frontend/js/vendor/modernizr-3.5.0.min.js')}}"></script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
		.rating {
		      float:left;
		    }

		    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t 
		      follow these rules. Every browser that supports :checked also supports :not(), so
		      it doesn’t make the test unnecessarily selective */
		    .rating:not(:checked) > input {
		        position:absolute;
		        top:-9999px;
		        clip:rect(0,0,0,0);
		    }

		    .rating:not(:checked) > label {
		        float:right;
		        width:1em;
		        /* padding:0 .1em; */
		        overflow:hidden;
		        white-space:nowrap;
		        cursor:pointer;
		        font-size:300%;
		        /* line-height:1.2; */
		        color:#ddd;
		    }

		    .rating:not(:checked) > label:before {
		        content: '★ ';
		    }

		    .rating > input:checked ~ label {
		        color: #FFD700;
		        
		    }

		    .rating:not(:checked) > label:hover,
		    .rating:not(:checked) > label:hover ~ label {
		        color: #FFD700;
		        
		    }

		    .rating > input:checked + label:hover,
		    .rating > input:checked + label:hover ~ label,
		    .rating > input:checked ~ label:hover,
		    .rating > input:checked ~ label:hover ~ label,
		    .rating > label:hover ~ input:checked ~ label {
		        color: #FFD700;
		        
		    }

		    .rating > label:active {
		        position:relative;
		        top:2px;
		        left:2px;
		    }
	</style>
	
</head>
<body>