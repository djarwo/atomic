<div class="page-sidebar-wrapper page-sidebar-fixed">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
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
            <li id="nav-li" class="nav-item {{ in_array('dashboard', ['dashboard']) ? 'active' : '' }}">
                <a href="{{ url('dashboard.index') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Beranda</span>
                    <span class="selected"></span>
                </a>
            </li>            
        </ul>
    </div>
    <!-- END SIDEBAR -->
</div>
