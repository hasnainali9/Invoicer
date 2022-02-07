<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('/files/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/files/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/files/vendor/toastr/css/toastr.min.css')}}">
</head>
<body>

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="show">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{url('/')}}" class="brand-logo">
                <svg class="logo-abbr" width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
					<rect class="svg-logo-rect" width="50" height="50" rx="6" fill="#EB8153"/>
					<path class="svg-logo-path"  d="M17.5158 25.8619L19.8088 25.2475L14.8746 11.1774C14.5189 9.84988 15.8701 9.0998 16.8205 9.75055L33.0924 22.2055C33.7045 22.5589 33.8512 24.0717 32.6444 24.3951L30.3514 25.0095L35.2856 39.0796C35.6973 40.1334 34.4431 41.2455 33.3397 40.5064L17.0678 28.0515C16.2057 27.2477 16.5504 26.1205 17.5158 25.8619ZM18.685 14.2955L22.2224 24.6007L29.4633 22.6605L18.685 14.2955ZM31.4751 35.9615L27.8171 25.6886L20.5762 27.6288L31.4751 35.9615Z" fill="white"/>
				</svg>
                <svg class="brand-title" width="74" height="22" viewBox="0 0 74 22" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path class="svg-logo-path"  d="M0.784 17.556L10.92 5.152H1.176V1.12H16.436V4.564L6.776 16.968H16.548V21H0.784V17.556ZM25.7399 21.28C24.0785 21.28 22.6599 20.9347 21.4839 20.244C20.3079 19.5533 19.4025 18.6387 18.7679 17.5C18.1519 16.3613 17.8439 15.1293 17.8439 13.804C17.8439 12.3853 18.1519 11.088 18.7679 9.912C19.3839 8.736 20.2799 7.79333 21.4559 7.084C22.6319 6.37467 24.0599 6.02 25.7399 6.02C27.4012 6.02 28.8199 6.37467 29.9959 7.084C31.1719 7.79333 32.0585 8.72667 32.6559 9.884C33.2719 11.0413 33.5799 12.2827 33.5799 13.608C33.5799 14.1493 33.5425 14.6253 33.4679 15.036H22.6039C22.6785 16.0253 23.0332 16.7813 23.6679 17.304C24.3212 17.808 25.0585 18.06 25.8799 18.06C26.5332 18.06 27.1585 17.9013 27.7559 17.584C28.3532 17.2667 28.7639 16.8373 28.9879 16.296L32.7959 17.36C32.2172 18.5173 31.3119 19.46 30.0799 20.188C28.8665 20.916 27.4199 21.28 25.7399 21.28ZM22.4919 12.292H28.8759C28.7825 11.3587 28.4372 10.6213 27.8399 10.08C27.2612 9.52 26.5425 9.24 25.6839 9.24C24.8252 9.24 24.0972 9.52 23.4999 10.08C22.9212 10.64 22.5852 11.3773 22.4919 12.292ZM49.7783 21H45.2983V12.74C45.2983 11.7693 45.1116 11.0693 44.7383 10.64C44.3836 10.192 43.9076 9.968 43.3103 9.968C42.6943 9.968 42.069 10.2107 41.4343 10.696C40.7996 11.1813 40.3516 11.8067 40.0903 12.572V21H35.6103V6.3H39.6423V8.764C40.1836 7.90533 40.949 7.23333 41.9383 6.748C42.9276 6.26267 44.0663 6.02 45.3543 6.02C46.3063 6.02 47.0716 6.19733 47.6503 6.552C48.2476 6.888 48.6956 7.336 48.9943 7.896C49.3116 8.43733 49.517 9.03467 49.6103 9.688C49.7223 10.3413 49.7783 10.976 49.7783 11.592V21ZM52.7548 4.62V0.559999H57.2348V4.62H52.7548ZM52.7548 21V6.3H57.2348V21H52.7548ZM63.4657 6.3L66.0697 10.444L66.3497 10.976L66.6297 10.444L69.2337 6.3H73.8537L68.9257 13.608L73.9657 21H69.3457L66.6017 16.884L66.3497 16.352L66.0977 16.884L63.3537 21H58.7337L63.7737 13.692L58.8457 6.3H63.4657Z" fill="black"/>
				</svg>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
	
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							
                        </div>
                        <ul class="navbar-nav header-right main-notification">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-fullscreen" href="#">
                                    <svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                    <svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                                </a>
							</li>
							
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{Auth::User()->name}}" width="20" alt=""/>
									<div class="header-info">
										<span>{{Auth::User()->name}}</span>
										<small>{{Auth::User()->email}}</small>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{route('updateProfile.show')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
				<div class="sub-header">
					<div class="d-flex align-items-center flex-wrap me-auto">
						<h5 class="dashboard_bar"></h5>
					</div>
				</div>
			</div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<div class="main-profile">
					<div class="image-bx">
						<img src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{Auth::User()->name}}" alt="">
						
					</div>
					<h5 class="name"><span class="font-w400">Hello,</span> {{Auth::User()->name}}</h5>
					<p class="email">{{Auth::User()->email}}</p>
				</div>
				<ul class="metismenu" id="menu">
					<li><a class=" ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-144-layout"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-label first">Main Menu</li>
                    @if(CheckRolePermission('airway_view'))
                    <li><a class="ai-icon" href="{{route('invoices.home')}}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="19" height="18" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"viewBox="0 0 0.42 0.49" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003"> <defs> <style type="text/css"><![CDATA[ .fil0{fill:#FEFFFF}]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <g id="_987666304"> <path class="fil0" d="M0.04 0.36l0.29 -0 0 0.02 -0.29 0 -0 -0.02zm0.17 -0.07l0.12 -0 0 0.02 -0.12 0 -0 -0.02zm-0.18 -0.01c0,0 0.01,0.01 0.03,0.02 0.03,0.01 0.09,0.01 0.12,-0.01 0,-0 0.01,-0.01 0.01,-0.01 0,0.01 -0,0.02 -0.01,0.02 -0.03,0.03 -0.11,0.03 -0.15,-0 -0,-0 -0.01,-0.02 -0.01,-0.02zm0 -0.03c0,0 0.01,0.01 0.01,0.01 0.04,0.02 0.1,0.02 0.14,-0.01 0,-0 0.01,-0.01 0.01,-0.01 0,0.02 -0.01,0.03 -0.03,0.04 -0.04,0.02 -0.1,0.01 -0.13,-0.01 -0,-0 -0.01,-0.02 -0.01,-0.02zm0.18 -0.03l0 -0 0.11 0 0 0 0 0.02 -0.12 0 0 -0.02zm-0.18 0.01c0,0 0.01,0.01 0.01,0.01 0.01,0 0.01,0.01 0.02,0.01 0.03,0.01 0.06,0.01 0.09,0 0.02,-0.01 0.03,-0.02 0.03,-0.02 0,0.02 -0.01,0.03 -0.03,0.04 -0.03,0.02 -0.1,0.02 -0.13,-0.01 -0,-0 -0.01,-0.02 -0.01,-0.02zm0 -0.03c0,0 0,0 0.01,0.01 0.03,0.03 0.11,0.03 0.14,0 0,-0 0,-0 0.01,-0.01 0.01,0.02 -0.01,0.03 -0.03,0.04 -0.02,0.01 -0.03,0.01 -0.05,0.01 -0.02,0 -0.04,-0 -0.05,-0.01 -0.01,-0 -0.01,-0.01 -0.02,-0.01 -0,-0 -0.01,-0.02 -0.01,-0.02zm0.08 -0c0.03,0 0.06,-0.01 0.08,-0.03 0.01,0.04 -0.08,0.06 -0.13,0.04 -0.01,-0 -0.01,-0.01 -0.02,-0.01 -0,-0 -0.01,-0.02 -0.01,-0.02 0,0 0.01,0.01 0.01,0.01 0.02,0.01 0.04,0.02 0.06,0.02zm0.1 -0.05l0.12 0 -0 0.02 -0.12 -0 -0 -0.02zm-0.12 -0.04c0.03,-0 0.08,0.01 0.09,0.03 0.01,0.02 -0.01,0.03 -0.02,0.04 -0.01,0.01 -0.03,0.01 -0.05,0.01 -0.02,0 -0.04,-0 -0.05,-0 -0.04,-0.01 -0.06,-0.04 -0.02,-0.06 0.01,-0.01 0.03,-0.01 0.05,-0.01zm0.12 -0.03l0.12 0 -0 0.02 -0.12 -0 0 -0.02zm0.16 -0.08l-0.36 -0 -0 0.44c0.03,0 0.06,0 0.09,0l0.23 0c0.01,0 0.04,0 0.05,-0l0 -0.43z"/> <polygon class="fil0" points="0.38,0.07 0.4,0.07 0.4,0.46 0.08,0.46 0.08,0.45 0.06,0.45 0.06,0.49 0.42,0.48 0.42,0.05 0.38,0.05 "/> <path class="fil0" d="M0.11 0.17c0.01,-0 0.03,-0 0.03,-0.01 0,-0.01 -0.04,-0.01 -0.05,-0.02 -0.01,-0 0.01,-0.01 0.02,-0.01 0.01,0 0,0.01 0.02,0 0,-0 0,-0 0,-0l0 -0c-0,-0 -0.01,-0.01 -0.01,-0.01 -0.02,-0 -0.01,0 -0.01,-0.01l-0.01 0 -0 0c-0.03,0 -0.03,0.01 -0.02,0.02 0.01,0 0.02,0.01 0.03,0.01 0.02,0 -0,0.01 -0.02,0.01 -0,-0 -0,-0 -0.01,-0l-0.02 0c0,0.01 0.02,0.01 0.03,0.01l0 0.01 0.01 0 0 -0.01z"/> </g> </g></svg>
							<span class="nav-text">AirWay Bills</span>
						</a>
                    </li>
                    @endif
                    @if(CheckRolePermission('airport_view'))
                    <li><a class="ai-icon" href="{{route('airports.home')}}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="18" height="18" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"viewBox="0 0 0.57 0.56" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003"> <defs> <style type="text/css"><![CDATA[ .fil0{fill:#969BA0}]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <g id="_986645944"> <path class="fil0" d="M0.39 0.19l0.03 -0c0,-0 0,-0 0.01,0 0.01,0.01 0.01,0.02 -0,0.03 -0.02,0.02 -0.05,-0.01 -0.03,-0.03zm-0.21 0c0.01,0.02 -0.01,0.04 -0.03,0.03 -0,-0 -0.01,-0.01 -0.01,-0.01 -0,-0.01 0,-0.01 0,-0.01 0,-0 0.01,-0 0.02,-0 0.01,0 0.01,0 0.02,0zm0.09 -0.02c-0.03,0 -0.03,0.01 -0.03,-0 0,-0.03 0.02,-0.05 0.06,-0.04 0.02,0 0.03,0.02 0.03,0.04 0,0.01 0,0.01 -0.02,0.01 -0.01,-0 -0.02,-0 -0.03,-0zm-0 -0.07c-0.02,0 -0.02,0.02 -0.03,0.02 -0.02,0 -0.08,-0 -0.09,0 0,0 0,0 0,0 0,0 0,0 0,0 0.03,0.01 0.02,0.01 0.06,0.01 0.01,0 0.02,0 0.03,-0 -0,0 -0,0.01 -0.01,0.01 -0,0 -0,0.01 -0.01,0.01l-0.22 0c0,0 0.03,0.01 0.04,0.02 0.01,0 0.08,0.01 0.09,0.01 -0,0.01 -0.01,0.02 0,0.03 0,0.01 0.01,0.02 0.03,0.02 0.01,0 0.02,-0 0.03,-0.01 0.01,-0.01 0.01,-0.02 0.01,-0.03l0.02 0c0,0.01 0,0.01 0.01,0.02 0,0.01 0.01,0.01 0.01,0.01 0.01,0.01 0.02,0.01 0.04,0.01 0.02,0 0.04,-0.01 0.04,-0.02 0.01,-0.01 0.01,-0.02 0.02,-0.03l0.02 -0c-0,0.02 0,0.03 0.02,0.04 0.02,0.01 0.04,-0 0.04,-0.02 0.01,-0.01 0,-0.02 0,-0.03 0.01,-0 0.08,-0.01 0.09,-0.01 0.01,-0 0.04,-0.02 0.04,-0.02l-0.22 -0c-0,-0 -0,-0.01 -0.01,-0.01 -0,-0 -0.01,-0.01 -0.01,-0.01 0.01,0 0.04,0 0.05,0 0,-0 0.01,-0.01 0.02,-0.01 0,-0 0.02,-0.01 0.02,-0.01 -0.01,-0 -0.07,-0 -0.08,-0 -0.01,0 -0.01,0 -0.01,-0l-0.01 -0.01c-0,-0 -0.01,-0 -0.01,-0.01l-0.01 -0.1 -0.01 0 -0.01 0.1z"/> <polygon class="fil0" points="0.28,0.26 0.25,0.26 0.17,0.56 0.25,0.56 "/> <polygon class="fil0" points="0.32,0.56 0.4,0.56 0.31,0.26 0.29,0.26 "/> </g> </g></svg>
							<span class="nav-text">Airports List</span>
						</a>
                    </li>
                    @endif
                    @if(CheckRolePermission('airline_view'))
                    <li><a class="ai-icon" href="{{route('airlines.home')}}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="18" height="18" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"viewBox="0 0 0.24 0.35" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003"> <defs> <style type="text/css"><![CDATA[ .fil1{fill:#636669}.fil0{fill:#969BA0}]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <g id="_977345192"> <path class="fil0" d="M0.09 0.09c-0.01,0 -0.02,-0 -0.02,-0 -0.03,-0 -0.01,0.01 -0.03,-0.02 -0,-0.01 -0.01,-0.01 -0.01,-0.02l-0.01 0c0.01,0.05 0.02,0.03 0.01,0.07 -0,0.01 -0.01,0.02 -0.01,0.03l0.01 0c0.01,-0.01 0.02,-0.02 0.02,-0.03l0.04 0 -0.02 0.08 0.02 -0 0.05 -0.07c0.02,-0.02 0.01,-0.01 0.05,-0.01 0.02,-0 0.04,0.01 0.05,-0.01 -0,-0.01 -0,-0.01 -0.01,-0.01 -0.01,-0.01 -0.02,-0.01 -0.04,-0.01 -0.05,0 -0.04,0.01 -0.06,-0.03l-0.04 -0.05c-0,-0 0,-0 -0.02,-0 0,0.01 0.02,0.07 0.02,0.08z"/> <path class="fil1" d="M-0 0.27c0.01,0.01 0.02,0.01 0.04,0.01 0.02,0 0.03,0 0.05,0 0,0.01 0.02,0.03 0.03,0.04 0,0.01 0.01,0.01 0.01,0.02 0,0.01 0.01,0.01 0.01,0.02l0.02 0c-0,-0.02 -0.02,-0.06 -0.02,-0.07 0.04,0 0.03,-0 0.05,0.02 0,0.01 0.01,0.01 0.01,0.02l0.01 0 -0.01 -0.05c-0,-0 0,-0.02 0.01,-0.02 0,-0.01 0,-0.02 0.01,-0.03l-0.01 0c-0,0.01 -0.02,0.02 -0.02,0.03l-0.04 0 0.02 -0.08 -0.02 0c-0.02,0.02 -0.04,0.05 -0.05,0.07 -0.01,0.01 -0,0.01 -0.02,0.01 -0.01,-0 -0.02,0 -0.03,0 -0.02,0 -0.03,-0 -0.04,0.01 -0,0 -0.01,0 -0.01,0.01z"/> </g> </g></svg>
							<span class="nav-text">Airlines List</span>
						</a>
                    </li>
                    @endif
                    @if(CheckRolePermission('company_view'))
                    <li><a class="ai-icon" href="{{route('companies.home')}}" aria-expanded="false">
						<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="18" height="18" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"viewBox="0 0 0.6 0.6" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:xodm="http://www.corel.com/coreldraw/odm/2003"> <defs> <style type="text/css"><![CDATA[ .fil0{fill:#969BA0}]]> </style> </defs> <g id="Layer_x0020_1"> <metadata id="CorelCorpID_0Corel-Layer"/> <g id="_849132984"> <path class="fil0" d="M0.51 0.5c0.02,-0 0.03,0.01 0.04,0.02 0.01,0.01 0,0.04 0,0.06l-0.08 0c0,-0.02 -0,-0.04 0,-0.06 0.01,-0.01 0.02,-0.02 0.04,-0.02zm-0.06 0.08l-0.08 0c0,-0.01 -0,-0.06 0,-0.07 0,-0.05 0.07,-0.05 0.08,-0 0,0.01 0,0.06 0,0.07zm-0.15 -0.12c0.02,0 0.04,0.02 0.05,0.04 0,0.01 0,0.07 0,0.08l-0.1 0c0,-0.02 -0,-0.07 0,-0.08 0.01,-0.02 0.02,-0.04 0.05,-0.04zm-0.15 0.05c0,-0.03 0.04,-0.05 0.06,-0.03 0.01,0.01 0.01,0.02 0.01,0.04 0,0.02 0,0.04 0,0.06l-0.08 0 -0 -0.07zm-0.06 -0.01c0.02,-0 0.04,0.02 0.04,0.04l0 0.04 -0.08 0c0,-0.02 -0,-0.04 0,-0.06 0.01,-0.01 0.02,-0.02 0.04,-0.02zm0.02 -0.04c-0.01,0.03 -0.04,0.02 -0.04,-0.01 0,-0.01 0.01,-0.02 0.02,-0.02 0.01,0 0.02,0.01 0.02,0.02zm0.38 -0c-0,-0.03 0.04,-0.03 0.04,-0 0,0.01 -0.01,0.02 -0.02,0.02 -0.01,0 -0.02,-0.01 -0.02,-0.02zm-0.08 -0.05c0.01,-0 0.02,0.01 0.02,0.01 0,0.01 -0.01,0.02 -0.01,0.02 -0.02,0.01 -0.04,-0.03 -0.01,-0.04zm-0.22 0c0.01,-0 0.02,0 0.02,0.01 0,0.01 -0,0.02 -0.01,0.02 -0.02,0.01 -0.04,-0.03 -0.01,-0.04zm0.11 -0.03c0.02,-0 0.03,0.01 0.03,0.02 0,0.02 -0.01,0.03 -0.02,0.03 -0.04,0.01 -0.05,-0.05 -0.01,-0.06zm0.14 -0.21l0.14 -0 0 0.34 -0.02 0c-0,-0 -0.01,-0.01 -0.01,-0.01 -0.01,-0.01 -0.01,-0.01 -0.01,-0.01 0,-0.01 0.01,-0.01 0.01,-0.02 0.01,-0.04 -0.05,-0.07 -0.07,-0.03 -0.01,0.02 0.01,0.04 0.01,0.04 -0,0 -0,0 -0.01,0 -0,0 -0,0 -0.01,0 -0,-0 -0,-0.01 -0,-0.01 -0.01,-0.01 -0.01,-0.02 -0.02,-0.02l-0 -0c0,-0 0.01,-0.01 0.01,-0.03 -0,-0.02 -0.01,-0.02 -0.01,-0.03 -0,-0.01 0,-0.06 0,-0.08l0 -0.11c0,-0.01 -0,-0.03 0,-0.04zm-0.28 0.29c-0,0 -0.01,0 -0.02,0.02 -0.01,0.01 -0.01,0.01 -0.01,0.02l-0.01 -0.01c0,-0.01 0.01,-0.01 0.01,-0.02 0.01,-0.04 -0.05,-0.07 -0.07,-0.03 -0.01,0.01 -0.01,0.02 0,0.04 0,0 0,0.01 0.01,0.01 -0,0 -0,0 -0.01,0 -0.01,0 -0.01,0.01 -0.02,0.02l-0.02 0 -0 -0.34 0.14 0c0,0.01 0,0.21 0,0.23 -0,0.01 -0.01,0.01 -0.01,0.03 -0,0.01 0,0.01 0,0.02 0,0 0.01,0.01 0.01,0.01zm0.11 -0.01c-0,0.01 -0.01,0 -0.03,0.03 -0,0 -0,0 -0,0 -0,0 -0,0 -0,0 -0,-0 -0.01,-0.01 -0.01,-0.01l-0.01 -0.01c0,-0.01 0.02,-0.02 0,-0.05 -0,-0.01 -0.01,-0.01 -0.02,-0.02 -0.01,-0.01 -0.02,-0 -0.03,-0l0 -0.37 0.24 0 0 0.37c-0.01,-0 -0.02,-0 -0.03,0 -0.02,0.01 -0.02,0.02 -0.02,0.04 0,0.01 0.01,0.02 0.01,0.02 -0,0 -0.01,0.01 -0.01,0.01 -0,0 -0.01,0.01 -0.01,0.01 -0.01,-0.02 -0.02,-0.02 -0.03,-0.03 0.01,-0.01 0.01,-0.01 0.01,-0.02 0,-0.01 0,-0.02 -0,-0.03 -0.02,-0.04 -0.08,-0.04 -0.09,-0 -0,0.01 -0.01,0.02 -0,0.03 0,0.01 0.01,0.02 0.01,0.02zm-0.11 -0.3c-0.02,0 -0.05,0 -0.07,0 -0.02,0 -0.05,0 -0.07,0 -0.02,0 -0.02,0 -0.02,0.02 0,0.04 -0,0.35 0,0.35 0,0.01 0.02,0.01 0.03,0.01 0,0.01 -0,0.01 -0,0.02 0,0.01 0,0.01 0,0.02 0,0.02 -0,0.03 0.01,0.03 0.14,-0 0.28,0 0.42,0 0.03,0 0.06,-0 0.08,0 0.02,0 0.01,-0.01 0.01,-0.03 0,-0.01 -0,-0.03 -0,-0.04 0.01,-0 0.02,0 0.03,-0.01 0,-0 0,-0.1 0,-0.11l0 -0.25c0,-0.02 0,-0.02 -0.02,-0.02 -0.05,0 -0.09,0 -0.14,0 -0,-0.02 0,-0.13 -0,-0.14 -0,-0.01 -0.02,-0.01 -0.03,-0.01l-0.22 0c-0.01,0 -0.03,-0 -0.03,0.01 -0,0.01 0,0.12 -0,0.14z"/> <path class="fil0" d="M0.25 0.06l0 0 0.1 0 -0 0.06 -0 0 -0.09 0 -0 -0 -0 -0.06zm-0.01 -0.02c-0.01,0 -0.01,0.01 -0.01,0.02l0 0.06c-0,0.01 0,0.02 0.01,0.02 0.01,-0 0.11,0 0.12,-0 0.01,-0 0.01,-0.01 0.01,-0.02l0 -0.06c0,-0.01 -0,-0.02 -0.02,-0.02 -0.01,0 -0.11,-0 -0.12,0z"/> <polygon class="fil0" points="0.11,0.39 0.13,0.39 0.13,0.23 0.11,0.23 "/> <polygon class="fil0" points="0.05,0.39 0.07,0.39 0.07,0.23 0.05,0.23 "/> <polygon class="fil0" points="0.53,0.39 0.55,0.39 0.55,0.23 0.53,0.23 "/> <polygon class="fil0" points="0.47,0.39 0.49,0.39 0.49,0.23 0.47,0.23 "/> <polygon class="fil0" points="0.29,0.26 0.29,0.26 0.31,0.26 0.31,0.24 0.29,0.24 "/> <polygon class="fil0" points="0.33,0.26 0.35,0.26 0.35,0.24 0.34,0.24 0.33,0.24 "/> <polygon class="fil0" points="0.25,0.26 0.25,0.26 0.26,0.26 0.27,0.26 0.27,0.24 0.25,0.24 "/> <polygon class="fil0" points="0.21,0.26 0.21,0.26 0.23,0.26 0.23,0.26 0.23,0.24 0.21,0.24 "/> <polygon class="fil0" points="0.37,0.26 0.37,0.26 0.38,0.26 0.39,0.26 0.39,0.24 0.37,0.24 "/> <polygon class="fil0" points="0.25,0.22 0.25,0.22 0.26,0.22 0.27,0.22 0.27,0.2 0.25,0.2 "/> <polygon class="fil0" points="0.21,0.3 0.23,0.3 0.23,0.28 0.21,0.28 "/> <polygon class="fil0" points="0.25,0.3 0.27,0.3 0.27,0.28 0.25,0.28 "/> <polygon class="fil0" points="0.37,0.3 0.39,0.3 0.39,0.28 0.37,0.28 "/> <polygon class="fil0" points="0.29,0.3 0.31,0.3 0.31,0.28 0.29,0.28 "/> <polygon class="fil0" points="0.21,0.22 0.21,0.22 0.23,0.22 0.23,0.22 0.23,0.2 0.21,0.2 "/> <polygon class="fil0" points="0.33,0.3 0.35,0.3 0.35,0.28 0.33,0.28 "/> <polygon class="fil0" points="0.37,0.22 0.39,0.22 0.39,0.2 0.37,0.2 "/> <polygon class="fil0" points="0.21,0.34 0.23,0.34 0.23,0.32 0.21,0.32 "/> <polygon class="fil0" points="0.25,0.34 0.27,0.34 0.27,0.32 0.25,0.32 "/> <polygon class="fil0" points="0.25,0.18 0.27,0.18 0.27,0.16 0.25,0.16 "/> <polygon class="fil0" points="0.33,0.22 0.35,0.22 0.35,0.2 0.33,0.2 "/> <polygon class="fil0" points="0.37,0.34 0.39,0.34 0.39,0.32 0.37,0.32 "/> <polygon class="fil0" points="0.29,0.22 0.31,0.22 0.31,0.2 0.29,0.2 "/> <polygon class="fil0" points="0.33,0.18 0.35,0.18 0.35,0.16 0.33,0.16 "/> <polygon class="fil0" points="0.29,0.18 0.31,0.18 0.31,0.16 0.29,0.16 "/> <polygon class="fil0" points="0.33,0.34 0.35,0.34 0.35,0.32 0.33,0.32 "/> <polygon class="fil0" points="0.29,0.34 0.31,0.34 0.31,0.32 0.29,0.32 "/> </g> </g></svg>
							<span class="nav-text">Company List</span>
						</a>
                    </li>
                    @endif
                    @if(CheckRolePermission('client_view'))
                    <li><a class="ai-icon" href="{{route('client.home')}}" aria-expanded="false">
                        <i class="far fa-address-card"></i>
							<span class="nav-text">Client List</span>
						</a>
                    </li>
                    @endif

                    <li class="nav-label">Settings</li>
                    @if(CheckRolePermission('user_view'))
                    <li><a class="ai-icon" href="{{route('users.show')}}" aria-expanded="false">
						<i class="fa fa-users" aria-hidden="true"></i>
							<span class="nav-text">Users List</span>
						</a>
                    </li>
                    @endif
                    @if(CheckRolePermission('role_view'))
                    <li><a class="ai-icon" href="{{route('roles.show')}}" aria-expanded="false">
						<i class="fab fa-critical-role"></i>
							<span class="nav-text">Roles</span>
						</a>
                    </li>
                    @endif

                    
                    <li class="nav-label">Account</li>
                    <li><a class="ai-icon" href="{{route('updateProfile.show')}}" aria-expanded="false">
						<i class="fa fa-user" aria-hidden="true"></i>
							<span class="nav-text">Profile</span>
						</a>
                    </li>
                    <li><a class="ai-icon" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" aria-expanded="false">
						<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
							<span class="nav-text">Logout</span>
						</a>
                    </li>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
					
                </ul>
				<div class="copyright">
					<p><strong>Admin Dashboard</strong> © {{ now()->year }} All Rights Reserved</p>
					<p class="fs-12">Made with <span class="heart"></span> by LightningIt Solutions</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            @yield('content')
        </div>
        <!--**********************************
            Content body End
        ***********************************-->
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Developed by <a href="http://dexignzone.com/" target="_blank">LightningIt Solutions</a> {{ now()->year }}</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>

          
    
    <script src="{{ asset('/files/vendor/global/global.min.js')}}"></script>

	<!-- Datatable -->
	<script src="{{ asset('/files/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('/files/js/plugins-init/datatables.init.js')}}"></script>

    <script src="{{ asset('/files/js/custom.js')}}"></script>
	<script src="{{ asset('/files/js/deznav-init.js')}}"></script>
    <!-- Toastr -->
    <script src="{{ asset('/files/vendor/toastr/js/toastr.min.js')}}"></script>
    
	<script>
		jQuery(document).ready(function(){
			

            @if(session()->has('message'))
                toastr.success("{{ session()->get('message') }}", {
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-right",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    })
             @elseif($errors->any())
                toastr.error("{{$errors->first()}}", {
                        timeOut: 500000000,
                        closeButton: !0,
                        debug: !1,
                        newestOnTop: !0,
                        progressBar: !0,
                        positionClass: "toast-top-right",
                        preventDuplicates: !0,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: !1
                    })
            @endif
		});
	</script>
    @yield('scripts')
</body>
</html>
