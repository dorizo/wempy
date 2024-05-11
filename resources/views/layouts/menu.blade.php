<li><a class="nav-link" href="{{route('home')}}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
           
            <li class="menu-header">Korpri</li>
            @if(permission("Cberita"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Berita</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('beritas.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('beritas.create')}}">Buat</a></li>    
              </ul>
            </li>
            @endif
            @if(permission("Cberitavideo"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Berita Video</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('beritavideo.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('beritavideo.create')}}">Buat</a></li>    
              </ul>
            </li>
            @endif
            @if(permission("Ciuran"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>iuran</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('iuran.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('iuran.create')}}">Master iuran</a></li>    
              </ul>
            </li>
            @endif
            
            @if(permission("Ciuran"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Whatsapp</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('whatsapp.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('whatsapp.create')}}">Clastering Whatsapp</a></li>    
              </ul>
            </li>
            @endif
            @if(permission("Ciuran"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Pengeluaran</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('pengeluaran.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('pengeluaran.create')}}">Buat</a></li>    
              </ul>
            </li>
            @endif
            @if(permission("Cmamber"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Member</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('member.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('member.create')}}">Buat</a></li>    
              </ul>
            </li>
            @endif
            @if(permission("Cjabatan"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Jabatan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('jabatan.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('jabatan.create')}}">Buat</a></li>    
              </ul>
            </li>
            @endif

            @if(permission("Cmamber"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Kategori</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('kategori.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('kategori.create')}}">Buat</a></li>    
              </ul>
            </li>
            @endif

            @if(permission("Cuser"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>User</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('user.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('user.create')}}">Buat</a></li>   
              </ul>
            </li>
            @endif

            
            @if(permission("Crole"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Role</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{URL::to('/role')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{URL::to('/role/create')}}">Buat</a></li>   
              </ul>
            </li>
            @endif
            
            @if(permission("Cpermission"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Permision</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{URL::to('/permission')}}">Liat</a></li> 
                <li><a class="nav-link"  href="{{URL::to('/permission/add')}}">Buat</a></li>   
              </ul>
            </li>
            @endif
            @if(permission("Cmenu"))
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Menu</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('menu.index')}}">Liat</a></li> 
                <li><a class="nav-link" href="{{route('menu.create')}}">Buat</a></li>    
              </ul>
            </li>
            @endif
          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getKorpri.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a>
          </div> 