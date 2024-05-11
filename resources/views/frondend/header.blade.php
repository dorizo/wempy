
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container">
        <div class="custom_menu-btn">
          <button onclick="openNav()">
            <span class="s-1"> </span>
            <span class="s-2"> </span>
            <span class="s-3"> </span>
          </button>
        </div>
        <div id="myNav" class="overlay">
          <div class="menu_btn-style ">
            <button onclick="closeNav()">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>
          </div>
          <div class="overlay-content">
            <a class="active" href="index.html">
              Beranda
            </a>
            <a class="" href="about.html">
              Tentang Korpri
            </a>
            <a class="" href="service.html">
              Galeri
            </a>
            <a class="" href="testimonial.html">
              Berita
            </a>
            <a class="" href="contact.html">
              Kontak Kami
            </a>
          </div>
        </div>
        <a class="navbar-brand" href="index.html">
          <span>
          WEMPY HOLDING
          </span>
        </a>
        <div class="user_option">
            <button class="btn  nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
            @guest
             @if (Route::has('login'))
             <a href="{{ route('login') }}">
            @endif               
             @else
            <a href="{{ route('home') }}">
            @endguest
            <i class="fa fa-user" aria-hidden="true"></i>
          </a>
        </div>
        <div class="name_style">
          <h6>
            W
            E
            M
            P
            I
          </h6>
        </div>
      </nav>
    </header>
    <!-- end header section -->