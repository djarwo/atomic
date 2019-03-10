<div class="page-sidebar-wrapper page-sidebar-fixed">
    <div class="page-sidebar navbar-collapse collapse">
                    
        <ul id="myUL" class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
            data-slide-speed="200">
            <div class="sidebar-search">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_menu" onkeyup="search_menu()" placeholder="Cari Menu...">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>                 
            </div> 

            <li class="heading">                
                <h3 class="uppercase">Menu</h3>                
            </li>            
            <li id="nav-li" class="nav-item {{ in_array('dashboard', $data['activeMenu']) ? 'active' : '' }}">
                <a href="{{ route('dashboard.index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>   

            <li id="nav-li" class="nav-item {{ in_array('master', $data['activeMenu']) ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-puzzle-piece"></i>
                    <span class="title">Master</span>
                    <span class="selected"></span>
                    <span class="arrow {{ in_array('master', $data['activeMenu']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li id="nav-li" class="nav-item {{ in_array('dompet', $data['activeMenu']) ? 'active' : '' }}">
                        <a href="{{ route('dompet.index') }}" class="nav-link "> Dompet </a>
                    </li>
                    <li id="nav-li" class="nav-item {{ in_array('kategori', $data['activeMenu']) ? 'active' : '' }}">
                        <a href="{{ route('kategori.index') }}" class="nav-link "> Kategori </a>
                    </li>                        
                </ul>
            </li>

            <li id="nav-li" class="nav-item {{ in_array('transaksi', $data['activeMenu']) ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="title">Transaksi</span>
                    <span class="selected"></span>
                    <span class="arrow {{ in_array('transaksi', $data['activeMenu']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li id="nav-li" class="nav-item {{ in_array('transaksiin', $data['activeMenu']) ? 'active' : '' }}">
                        <a href="{{ route('transaksiin.index') }}" class="nav-link "> Dompet Masuk </a>
                    </li>
                    <li id="nav-li" class="nav-item {{ in_array('transaksiout', $data['activeMenu']) ? 'active' : '' }}">
                        <a href="{{ route('transaksiout.index') }}" class="nav-link "> Dompet Keluar </a>
                    </li>                        
                </ul>
            </li>

            <li id="nav-li" class="nav-item {{ in_array('laporan', $data['activeMenu']) ? 'active' : '' }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-file"></i>
                    <span class="title">Laporan</span>
                    <span class="selected"></span>
                    <span class="arrow {{ in_array('laporan', $data['activeMenu']) ? 'open' : '' }}"></span>
                </a>
                <ul class="sub-menu">
                    <li id="nav-li" class="nav-item {{ in_array('laporan', $data['activeMenu']) ? 'active' : '' }}">
                        <a href="{{ route('transaksi.laporan') }}" class="nav-link "> Laporan Transaksi</a>
                    </li>                                       
                </ul>
            </li>            
        </ul>
    </div>
    <!-- END SIDEBAR -->
</div>
