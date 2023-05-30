<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">

<head>
    <base href="./" />
    <meta charset="utf-8" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <meta content="CoreUI - Open Source Bootstrap Admin Template" name="description" />
    <meta content="Łukasz Holeczek" name="author" />
    <meta content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard" name="keyword" />
    <title>
        ScienceConfluence - admin
    </title>
    <link href="{{ asset('/adminlte/assets/favicon/manifest.json') }}" rel="manifest" />
    <meta content="#ffffff" name="msapplication-TileColor" />
    <meta content="assets/favicon/ms-icon-144x144.png" name="msapplication-TileImage" />
    <meta content="#ffffff" name="theme-color" />
    <!-- Vendors styles-->
    <link href="{{ asset('/adminlte/vendors/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('/adminlte/css/vendors/simplebar.css') }}" rel="stylesheet" />
    <!-- Main styles for this application-->
    <link href="{{ asset('adminlte/css/style.css') }}" rel="stylesheet" />
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css" rel="stylesheet" />
    <link href="{{ asset('/adminlte/css/examples.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
    <link href="{{ asset('/adminlte/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">

            <img src="{{ asset('img/logo-science-conflue.png') }}"  height="40" alt="{{ config("app.name") }}" class="sidebar-brand-full">
            <img src="{{ asset('img/logo-science-conflue.png') }}"  height="40" alt="{{ config("app.name") }}" class="sidebar-brand-narrow">

            <svg alt="CoreUI Logo" class="sidebar-brand-narrow" height="46" width="46">
                <use xlink:href="/adminlte/assets/brand/coreui.svg#signet">
                </use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <svg class="nav-icon">
                        <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-chart-pie">
                        </use>
                    </svg>
                    Dashboard
                    <span class="badge badge-sm bg-info ms-auto">
                        NEW
                    </span>
                </a>
            </li>
            <li class="nav-title">
                Webinaire
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.webinaires.index") }}">
                    <i class="nav-icon fa fa-podcast" aria-hidden="true"></i>
                    List Webinaire
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.webinaires.create") }}">
                    <svg class="nav-icon">
                        <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-pencil">
                        </use>
                    </svg>
                    Ajouter Webinaire
                </a>
            </li>
            <li class="nav-title">
                Users
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.users.index") }}">
                    <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                    List Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.users.create") }}">
                    <svg class="nav-icon">
                        <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-pencil">
                        </use>
                    </svg>
                    Ajouter User
                </a>
            </li>
            {{-- <li class="nav-title">
                Components
            </li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-puzzle">
                        </use>
                    </svg>
                    Users
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link" href="base/accordion.html">
                            <span class="nav-icon">
                            </span>
                            Accordion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/breadcrumb.html">
                            <span class="nav-icon">
                            </span>
                            Breadcrumb
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/cards.html">
                            <span class="nav-icon">
                            </span>
                            Cards
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/carousel.html">
                            <span class="nav-icon">
                            </span>
                            Carousel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/collapse.html">
                            <span class="nav-icon">
                            </span>
                            Collapse
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/list-group.html">
                            <span class="nav-icon">
                            </span>
                            List group
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/navs-tabs.html">
                            <span class="nav-icon">
                            </span>
                            Navs &amp; Tabs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/pagination.html">
                            <span class="nav-icon">
                            </span>
                            Pagination
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/placeholders.html">
                            <span class="nav-icon">
                            </span>
                            Placeholders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/popovers.html">
                            <span class="nav-icon">
                            </span>
                            Popovers
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/progress.html">
                            <span class="nav-icon">
                            </span>
                            Progress
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/scrollspy.html">
                            <span class="nav-icon">
                            </span>
                            Scrollspy
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/spinners.html">
                            <span class="nav-icon">
                            </span>
                            Spinners
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/tables.html">
                            <span class="nav-icon">
                            </span>
                            Tables
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="base/tooltips.html">
                            <span class="nav-icon">
                            </span>
                            Tooltips
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-cursor">
                        </use>
                    </svg>
                    Buttons
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item">
                        <a class="nav-link" href="buttons/buttons.html">
                            <span class="nav-icon">
                            </span>
                            Buttons
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="buttons/button-group.html">
                            <span class="nav-icon">
                            </span>
                            Buttons Group
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="buttons/dropdowns.html">
                            <span class="nav-icon">
                            </span>
                            Dropdowns
                        </a>
                    </li>
                </ul>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <svg class="nav-icon">
                        <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-chart-pie">
                        </use>
                    </svg>
                    Charts
                </a>
            </li> --}}
        </ul>
        <button class="sidebar-toggler" data-coreui-toggle="unfoldable" type="button">
        </button>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">
            <div class="container-fluid">
                <button class="header-toggler px-md-0 me-md-3"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" type="button">
                    <svg class="icon icon-lg">
                        <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-menu">
                        </use>
                    </svg>
                </button>
                <a class="header-brand d-md-none" href="#">
                    <svg alt="CoreUI Logo" height="46" width="118">
                        <use xlink:href="/adminlte/assets/brand/coreui.svg#full">
                        </use>
                    </svg>
                </a>

                <ul class="header-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-bell">
                                </use>
                            </svg>
                        </a>
                    </li>

                </ul>
                <ul class="header-nav ms-3">
                    <li class="nav-item dropdown">
                        <a aria-expanded="false" aria-haspopup="true" class="nav-link py-0"
                            data-coreui-toggle="dropdown" href="#" role="button">
                            <div class="avatar avatar-md">
                                <img alt="user@email.com" class="avatar-img"
                                    src="{{ asset('storage/' . auth()->user()->image) }}" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-light py-2">
                                <div class="fw-semibold">
                                    Account
                                </div>
                            </div>
                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-user">
                                    </use>
                                </svg>
                                Profile
                            </a>
                            <div class="dropdown-divider">
                            </div>

                            <a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use xlink:href="/adminlte/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                                    </use>
                                </svg>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

        </header>
        <div class="body flex-grow-1 px-3">
            @yield('content')
        </div>
        <footer class="footer">
            <div>
                <a href="/">
                    ScienceConfluence
                </a>

                © 2022 .
            </div>
            <div class="ms-auto">
                Powered by
                <a href="/">
                    ScienceConfluence
                </a>
            </div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('adminlte/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('adminlte/vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('adminlte/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('adminlte/js/main.js') }}"></script>
    <script></script>
</body>

</html>
