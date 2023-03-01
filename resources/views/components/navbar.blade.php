<nav id="header" class="app-header">
    <!-- BEGIN navbar-header -->
    <div class="navbar-header">
        <a href="{{ url('dashboard') }}" class="navbar-brand"><span class="navbar-logo"></span> <b>dr.</b>Engine</a>
        <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <!-- END navbar-header -->
    <!-- BEGIN header-nav -->
    <div class="navbar-nav">				
        <div class="navbar-item navbar-user dropdown">
            <a href="" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <img src="{{ asset('/storage/'.auth()->user()->member->foto) }}" alt="" /> 
                <span>
                    <span class="d-none d-md-inline">{{ auth()->user()->member->nama }}</span>
                    <b class="caret"></b>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-1">
                <a href="{{ route('profile') }}" class="dropdown-item"><i class="fas fa-user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                @if(auth()->user()->member->mekanik == null && auth()->user()->level != 'admin')
                    <a href="{{ route('mekanik.create') }}" class="dropdown-item"><i class="fas fa-cog"></i> Daftar Mekanik</a>
                    <div class="dropdown-divider"></div>
                @endif
                
                <a href="javascript:;" class="dropdown-item logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
    <!-- END header-nav -->
</nav>