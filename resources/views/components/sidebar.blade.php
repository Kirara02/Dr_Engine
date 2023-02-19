<aside id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-profile">
                <div class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="javascript:;appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        <img src="../assets/img/user/user-13.jpg" alt="" />
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                {{ auth()->user()->username }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-item mt-2 {{ (request()->is('dashboard') ? 'active':'') }}">
                <a href="{{ url('dashboard') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-md-home"></i>
                    </div>
                    <div class="menu-text">Dashboard</div>
                </a>
            </div>
            
            <div class="menu-header">Menu</div>
            <div class="menu-item has-sub {{ request()->is('members') || request()->is('mekanik') || request()->is('jenis_kerusakan') ? 'active':'' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-md-cube"></i>
                    </div>
                    <div class="menu-text">Data Master</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->is('members') ? 'active':'') }}">
                        <a href="{{ route('members.index') }}" class="menu-link">
                            <div class="menu-text">Data Member</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->is('mekanik') ? 'active':'') }}">
                        <a href="{{ route('mekanik.index') }}" class="menu-link">
                            <div class="menu-text">Data Mekanik</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->is('jenis_kerusakan') ? 'active':'') }}">
                        <a href="{{ route('jenis_kerusakan.index') }}" class="menu-link">
                            <div class="menu-text">Data Jenis Kerusakan</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub  {{ request()->is('kerusakan') || request()->is('diagnosa') || request()->is('perbaikan') ? 'active':'' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="ion-md-construct"></i>
                    </div>
                    <div class="menu-text">Data Repair</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item  {{ (request()->is('kerusakan') ? 'active':'') }}">
                        <a href="{{ route('kerusakan.index') }}" class="menu-link">
                            <div class="menu-text">Data Kerusakan</div>
                        </a>
                    </div>
                    <div class="menu-item  {{ (request()->is('diagnosa') ? 'active':'') }}">
                        <a href="{{ route('diagnosa.index') }}" class="menu-link">
                            <div class="menu-text">Data Diagnosa</div>
                        </a>
                    </div>
                    <div class="menu-item  {{ (request()->is('perbaikan') ? 'active':'') }}">
                        <a href="{{ route('perbaikan.index') }}" class="menu-link">
                            <div class="menu-text">Data Perbaikan</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item has-sub {{ (request()->is('laporan') ? 'active':'') }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fas fa-archive"></i>
                    </div>
                    <div class="menu-text">Laporan</div> 
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->is('laporan') ? 'active':'') }}">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Rekap Perbaikan</div>
                        </a>
                    </div>
                </div>
            </div>					
            <!-- BEGIN minify-button -->
            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>
            <!-- END minify-button -->
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</aside>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="javascript:;" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
