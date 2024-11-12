<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>STudent Work</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset ('quixlab-master')}}/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{asset ('quixlab-master')}}/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset ('quixlab-master')}}/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="{{asset ('quixlab-master')}}/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="{{asset ('quixlab-master')}}/css/style.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{asset ('quixlab-master')}}/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

</head>
<body>

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <div id="main-wrapper">

        <div class="nav-header">
            <div class="brand-logo">
                <a href="{{route('home')}}">
                    <b class="logo-abbr"><img src="{{asset ('quixlab-master')}}/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="{{asset ('quixlab-master')}}/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="{{asset ('courses-master')}}/assets/img/logo/lo - Copy.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        