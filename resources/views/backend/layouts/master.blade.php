<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <title>@yield('title', config('app.name'))</title>
    @include('backend.layouts.partials.meta_tags')
    @include('backend.layouts.partials.styles')
    @yield('styles')
    <style>
        /* body {
            background-color: #222;
        } */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 999;
            background: #ffffff;
        }
        #loader {
            display: block;
            position: relative;
            left: 50%;
            top: 50%;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #1abc9c;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
        #loader:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #1abc9c;
            -webkit-animation: spin 3s linear infinite;
            animation: spin 3s linear infinite;
        }
        #loader:after {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #1abc9c;
            -webkit-animation: spin 1.5s linear infinite;
            animation: spin 1.5s linear infinite;
        }
        @-webkit-keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        .profile_image{
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }
        .main-menu{
            position: fixed !important;
            background-color: #042f66 !important;
        }
        .navbar-wrapper{
            position: fixed !important;
            width: 100%;
            z-index: 99;
            background-color: #042f66 !important;
        }
        .main-menu .main-menu-content .nav-title {
            color: #008abd !important;
        }
        .active {
            border-left: 2px solid #008abd !important;
        }
        .main-menu .main-menu-content .nav-item a:hover {
            color: #ffffff !important;
        }
        .main-menu .main-menu-content .nav-item.has-class>a, .main-menu .main-menu-content .nav-item .tree-1 a.has-class>a, .main-menu .main-menu-content .nav-item .tree-2 a.has-class>a, .main-menu .main-menu-content .nav-item .tree-3 a.has-class>a, .main-menu .main-menu-content .nav-item .tree-4 a.has-class>a {
            background: #008abd !important;
        }
        .main-menu .main-menu-content .tree-1.open .has-class>a, .main-menu .main-menu-content .nav-item .open.tree-2 .has-class>a, .main-menu .main-menu-content .nav-item .open.tree-3 .has-class>a, .main-menu .main-menu-content .nav-item .open.tree-4 .has-class>a, .main-menu .main-menu-content .tree-2.open .has-class>a, .main-menu .main-menu-content .tree-3.open .has-class>a, .main-menu .main-menu-content .tree-4.open .has-class>a{
            color: #008abd !important;
        }
        .main-menu .main-menu-header {
            background: #008abd !important;
        }
        .card {
            border-top: 4px solid #008abd!important;
        }
    </style>
</head>

<body class="menu-static">
    <!-- Pre-loader start -->
    {{-- @include('backend.layouts.partials.preloader') --}}
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    @include('backend.layouts.partials.header')
    <!-- Menu header end -->
    <!-- Menu aside start -->
    @include('backend.layouts.partials.sidebar')
    
    <!-- Menu aside end -->
    <!-- Main-body start-->
    <div class="main-body">
        <div class="page-wrapper">
            @yield('admin-content')
        </div>
    </div>
    @include('backend.layouts.partials.scripts')
    @yield('scripts')
</body>

</html>
