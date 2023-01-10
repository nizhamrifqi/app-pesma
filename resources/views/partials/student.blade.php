<p class="text-muted nav-heading mt-4 mb-1">
    <span>Data</span>
</p>
<ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item w-100">
    <a class="nav-link" href="{{ url('student/data/'.auth()->user()->nim)}}" >
        <i class="fe fe-user fe-16"></i>
        <span class="ml-3 item-text">Profile</span>
    </a>
    </li>
    <li class="nav-item w-100">
    <a class="nav-link" href="">
        <i class="fe fe-server fe-16"></i>
        <span class="ml-3 item-text">Permission</span>
    </a>
    </li>
    <li class="nav-item w-100">
    <a class="nav-link" href="">
        <i class="fe fe-database fe-16"></i>
        <span class="ml-3 item-text">History</span>
    </a>
    </li>
</ul>