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
        @if (auth()->user()->member->nama == '' OR auth()->user()->member->nohp == '' OR auth()->user()->member->nik == '' OR auth()->user()->member->email == '' OR
        auth()->user()->member->alamat == '')
            <div class="navbar-item">
                <div class="bg-default text-danger p-2 rounded">Silahkan lengkapi identitas di menu profil</div>
            </div>
        @endif
        @can('isAdmin')
            <div class="navbar-item dropdown">
                <?php $data = \App\Models\Mekanik::where('statusAktivasi','=','0') ?>
                <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                    <i class="fa fa-bell"></i>
                    @if(!$data->first() == null)
                        <span class="badge">{{ $data->count() }}</span>
                    @endif
                </a>
                <div class="dropdown-menu media-list dropdown-menu-end">
                    <div class="dropdown-header">NOTIFICATIONS ({{ $data->count() }})</div>
                    @foreach (\App\Models\Mekanik::where('statusAktivasi','=','0')->get() as $item)
                        <a href="javascript:;" class="dropdown-item media">
                            <div class="media-left">
                                <i class="fa fa-cogs media-object bg-gray-500"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"><strong>{{ $item->name }}</strong> mendaftar mekanik</i></h6>
                                <div class="text-muted fs-10px">{{ $item->created_at->diffForHumans() }}</div>
                                <div class="row mt-2 d-flex justify-content-between">
                                    <form action="{{ route('mekanik.acc') }}" method="post" class="w-50">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="button" class="btn btn-sm btn-success w-100 btn-acc">Accept</button>
                                    </form>
                                    <form action="{{ route('mekanik.eject') }}" method="post" class="w-50">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="button" class="btn btn-sm btn-danger w-100 btn-eject">Eject</button>
                                    </form>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>				
        @endcan
        <div class="navbar-item navbar-user dropdown">
            <a href="" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                @if(!auth()->user()->member->foto)
                <img src={{ asset('assets/img/user/user-1.jpg') }}" alt="" /> 
                @else
                <img src="{{ asset('/storage/'.auth()->user()->member->foto) }}" alt="" /> 
                @endif
                <span>
                    <span class="d-none d-md-inline">{{ auth()->user()->member->nama }}</span>
                    <b class="caret"></b>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-1">
                <a href="{{ route('profile') }}" class="dropdown-item"><i class="fas fa-user"></i> Profile</a>
                <div class="dropdown-divider"></div>
                @if(auth()->user()->member->mekanik == null && auth()->user()->level != 'admin' && auth()->user()->member->nama != '')
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