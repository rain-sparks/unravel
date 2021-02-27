<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Laravel</title>

<!-- Metronic -->
<!--begin::Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

<!--end::Fonts -->

<!--begin::Page Vendors Styles(used by this page) -->
{!! Html::style( 'metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css') !!}
{!! Html::style( 'metronic/plugins/custom/datatables/datatables.bundle.css') !!}
{!! Html::style( 'metronic/css/pages/invoices/invoice-2.css') !!}
{!! Html::style( 'metronic/plugins/custom/jquery-ui/jquery-ui.bundle.css') !!}
<!--end::Page Vendors Styles -->

<!--begin::Global Theme Styles(used by all pages) -->
{!! Html::style( 'metronic/plugins/global/plugins.bundle.css') !!}
{!! Html::style( 'metronic/css/style.bundle.css') !!}
{!! Html::style( 'metronic/css/custom.css') !!}

<!--end::Global Theme Styles -->

<!--begin::Layout Skins(used by all pages) -->

<!--end::Layout Skins -->
<link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" />


</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

  <!-- begin:: Aside -->
  <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
    <div class="kt-aside__brand-logo">
      <a href="/" style="color: #fff!important">
        UNRAVEL STUDIOS
      </a>
    </div>
  </div>

  <!-- end:: Aside -->

  <!-- begin:: Aside Menu -->
  <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
      data-ktmenu-dropdown-timeout="500">
      <ul class="kt-menu__nav ">
        <li
          class="kt-menu__item {{ strpos(Route::currentRouteName(), 'home') === 0 ? 'kt-menu__item--active' : '' }}"
          aria-haspopup="true"><a href="{{route('home')}}" class="kt-menu__link "><i
              class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span
              class="kt-menu__link-text">HOME</span></a></li>
        <li class="kt-menu__section ">
          <h4 class="kt-menu__section-text">M E N U</h4>
          <i class="kt-menu__section-icon flaticon-more-v2"></i>
        </li>
        <li
          class="kt-menu__item  kt-menu__item--submenu {{ strpos(Route::currentRouteName(), 'products') === 0 ? 'kt-menu__item--active' : '' }}"
          aria-haspopup="true"><a href="{{route('products')}}" class="kt-menu__link "><i
              class="kt-menu__link-icon flaticon2-bell-1"></i><span class="kt-menu__link-text">Products</span></a>
        </li>
        <li
          class="kt-menu__item  kt-menu__item--submenu {{ strpos(Route::currentRouteName(), 'customers') === 0 ? 'kt-menu__item--active' : '' }}"
          aria-haspopup="true"><a href="{{route('customers')}}" class="kt-menu__link "><i
              class="kt-menu__link-icon flaticon-users-1"></i><span class="kt-menu__link-text">Customers</span></a>
        </li>
        <li
          class="kt-menu__item  kt-menu__item--submenu {{ strpos(Route::currentRouteName(), 'orders') === 0 ? 'kt-menu__item--active' : '' }}"
          aria-haspopup="true"><a href="{{route('orders')}}" class="kt-menu__link "><i
              class="kt-menu__link-icon flaticon2-shopping-cart-1"></i><span class="kt-menu__link-text">Orders</span></a>
        </li>
        
       
      </ul>
    </div>
    </li>
  </div>
  <!-- end:: Aside Menu -->
</div>
<!-- end:: Aside -->
            
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
        </div>
    </div>
    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                    <span class="kt-header__topbar-username kt-hidden-mobile">{{Auth::user()->name}}</span>
                    <i class="kt-menu__link-icon flaticon2-user"></i>
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <div class="kt-notification__custom kt-space-between">
                        <a href="/logout" class="btn btn-label btn-label-brand btn-sm btn-bold">Log Out</a>
                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>

        <!--end: User Bar -->
    </div>

    <!-- end:: Header Topbar -->
</div>

<!-- end:: Header -->
          
 

@yield('content')
