@php
    $current = \Request::segment(1);
@endphp
<nav class="topnav navbar navbar-light">
  <button type="button" class="navbar-toggler text-muted mt-1  collapseSidebar">
    <i class="fe fe-menu navbar-toggler-icon"></i>
  </button>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link text-muted my-1 p-2" href="#" id="modeSwitcher" data-mode="dark">
        <i class="fe fe-sun fe-16"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-muted " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="avatar avatar-sm mt-2">
          <label class="mr-3">
          @auth
          {{ Auth()->user()->full_name }}
          @endauth
          </label>
          <img src="{{ asset('tinydash')}}/assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
        </span>
        
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        
        @can('student')
        <a class="dropdown-item" href="{{ url('student/data/'.auth()->user()->nim)}}">
        @elsecan('SuperAdm')
        <a class="dropdown-item" href="#">
        @elsecan('admin')
        <a class="dropdown-item" href="admin">
        @elsecan('security')
        <a class="dropdown-item" href="security">
        @endcan
          
          <i class="fe fe-user fe-12 mr-2"></i> 
          My Profile
        </a>
          <hr class="m-2">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="dropdown-item">          
            <i class="fe fe-log-out fe-12 mr-2"></i>
            Log Out
          </button>
        </form>
      </div>
    </li>
  </ul>
</nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
          <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87  " />
            <polygon class="st0" points="96,69 33,69 42,51 105,51   " />
            <polygon class="st0" points="78,33 15,33 24,15 87,15  " />
          </g>
        </svg>
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="{{ url($current) }}">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span>
        </a>
      </li>
    </ul>
    @can('student')
      @include('partials.student')
    @endcan
    
    @can('SuperAdm')
      @include('partials.superadmin')
    @endcan

    @can('admin')
      @include('partials.admin')
    @endcan
    
    @can('security')
      @include('partials.security')
    @endcan

    <div class="btn-box w-100 mt-4 mb-1">
      {{-- <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
        <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Buy now</span>
      </a> --}}
      <form action="/logout" method="post">
        @csrf
        <button type="submit" class="btn mb-2 btn-primary btn-lg btn-block">          
          <i class="fe fe-log-out fe-12 mr-2"></i>
          Log Out
        </button>
      </form>
    </div>
  </nav>
</aside>