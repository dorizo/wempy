
  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
              
              </h2>
            </div>
            <p>
              
{{ \Illuminate\Support\Str::limit(strip_tags($profile->menuContent->menucontent), 500, $end='...')  }}
            
            </p>
            <a href="{{URL::to('/halaman/'.$profile->menuCode)}}">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <div class="stripe_design sd1"></div>
            <div class="stripe_design sd2"></div>
            <div class="stripe_design sd3"></div>
            <div class="stripe_design sd4"></div>
            <div class="stripe_design sd5"></div>
            <div class="stripe_design sd6"></div>
            
            <img src='{{URL::to("storage/uploads/icon/$profile->icon")}}' alt="" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->
