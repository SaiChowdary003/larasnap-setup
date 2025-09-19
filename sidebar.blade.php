<style>
    .sidebar .sidebar-brand-icon {
        display: none;
    }
    .sidebar .sidebar-brand-text {
        display: block;
    }

    .sidebar.toggled .sidebar-brand-icon {
        display: block;
    }
    .sidebar.toggled .sidebar-brand-text {
        display: none;
    }

    .sidebar.toggled .sidebar-brand {
        padding: 0.75rem 0.25rem;
    }
</style>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <!-- Small logo -->
        <div class="sidebar-brand-icon">
            <img class="logo" src="{{ asset('fieldy-logo-sm.png') }}" alt="logo" style="width:50px;">
        </div>
        <!-- Large logo -->
        <div class="sidebar-brand-text mx-3">
            <img class="logo" src="{{ asset('fieldy-logo.png') }}" alt="logo" style="width:100px;">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Sidebar Menu -->
    @php
        $user = auth()->user();
    @endphp

    @if ($user && $user->roles()->where('name', 'super-admin')->exists())
        {!! menu('super-admin') !!}
    @elseif ($user && $user->roles()->where('name', 'sales')->exists())
        {!! menu('sales') !!}
    @elseif ($user && $user->roles()->where('name', 'support')->exists())
        {!! menu('support') !!}
    @elseif ($user && $user->roles()->where('name', 'finance')->exists())
        {!! menu('finance') !!}
    @else
        <li class="nav-item">
            <span class="nav-link text-muted">No accessible menus</span>
        </li>
    @endif

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
