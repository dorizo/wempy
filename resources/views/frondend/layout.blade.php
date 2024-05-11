<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="korpri kemendagri website dan aplikasi" />
  <meta name="description" content="korpri kemendagri adalah" />
  <meta name="author" content="doris hermawan 082310777783" />

  <title>KORPRI KEMENDAGRI</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('frondend')}}/css/bootstrap.css" />
  <!-- fonts awesome style -->
  <link href="{{asset('frondend')}}/css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="{{asset('frondend')}}/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('frondend')}}/css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    
    @include('frondend.header') 
    @include('frondend.slide') 
    
  </div>
  @include('frondend.fiture')
  @include("frondend.about")
  <!-- help section -->

  <section class="help_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
               
            {{$video->judul}}
              </h2>
            </div>
            <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($video->isi), 250, $end='...')  }}
          </p>
            <a href="">
              See Videos
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
          <iframe width="100%" height="400" src="{{getYoutubeEmbedUrl($video->link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>  
                  
            <!-- <div class="play_btn">
              <button>
                <i class="fa fa-play" aria-hidden="true"></i>
              </button>
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end help section -->


  <!-- we do section -->

  <!-- <section class="wedo_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What We do
        </h2>
        <p>
          Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now
        </p>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="box pr-0 pr-lg-5">
            <div class="img-box">
              <img src="images/wedo-img2.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Social Marketing
              </h5>
              <p>
                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box pr-0 pr-lg-5">
            <div class="img-box">
              <img src="images/wedo-img3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Content Marketing
              </h5>
              <p>
                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box pr-0 pr-lg-5">
            <div class="img-box">
              <img src="images/wedo-img4.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Data Analysis
              </h5>
              <p>
                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="box pr-0 pr-lg-5">
            <div class="img-box">
              <img src="images/wedo-img1.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Digital Marketing
              </h5>
              <p>
                passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum
              </p>
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- end we do section -->

  <!-- news section -->

  <section class="news_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          Latest News
        </h2>
        </div>
        <style>
           .crop {
        width: 100%;
        height: 400px;
        overflow: hidden;
    }

    .crop img {
        width: 100%;
        height: 400px;
        margin: -75px 0 0 -100px;
    }
        </style>
      @foreach($berita as $berita2)
      <div class="row">
        <div class="col-lg-6 ">
          <div class="detail_container">
            <div class="detail-box">
              <h4>
                {{$berita2->judul}}
              </h4>
              <div class="news_social">
                <a href="">
                  <i class="fa fa-heart" aria-hidden="true"></i>
                  <span>
                    Like
                  </span>
                </a>
                <a href="">
                  <i class="fa fa-comment" aria-hidden="true"></i>
                  <span>
                    Comment
                  </span>
                </a>
                <a href="">
                  <i class="fa fa-share-alt" aria-hidden="true"></i>
                  <span>
                    Share
                  </span>
                </a>
              </div>
              <p>
              {{ \Illuminate\Support\Str::limit(strip_tags($berita2->isi), 250, $end='...')  }}
         </p>
            </div>
            <div class="btn-box">
              <a href="">
                Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 ">
          <div class="img-box">
            <div class="crop">
              <img src='{{URL::to("storage/uploads/$berita2->gambar")}}'  alt="">
            </div>
          </div>
        </div>
       
      </div>
          @endforeach
    </div>
  </section>

  <!-- end news section -->


  <!-- client section -->

  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          What Says Our Clients
        </h2>
      </div>
      <div class="carousel-wrap ">
        <div class="owl-carousel">
          <div class="item">
            <div class="box">
              <div class="client_id">
                <div class="img-box">
                  <img src="images/client-img1.jpg" alt="">
                </div>
                <div class="client_detail">
                  <h5>
                    Jims thomas
                  </h5>
                  <h6>
                    hidden in the
                  </h6>
                </div>
              </div>
              <div class="client_text">
                <p>
                  If you are going to use a passage of Lorem Ipsum, you need to be sure th
                  ere isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
                </p>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="client_id">
                <div class="img-box">
                  <img src="images/client-img2.jpg" alt="">
                </div>
                <div class="client_detail">
                  <h5>
                    Thomas mor
                  </h5>
                  <h6>
                    Hidden
                  </h6>
                </div>
              </div>
              <div class="client_text">
                <p>
                  If you are going to use a passage of Lorem Ipsum, you need to be sure th
                  ere isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 col-lg-4 offset-md-1 offset-lg-2">
          <div class="form_container">
            <div class="heading_container">
              <h2>
                Contact Now For Work
              </h2>
            </div>
            <form action="#">
              <div>
                <input type="text" placeholder="Full Name " />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone number" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6  px-0">
          <div class="map_container">
            <div class="map">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->


  <!-- info section -->

  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h4>
              Address
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
          <div class="info_social">
            <a href="">
              <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-twitter" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a>
            <a href="">
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_link_box">
            <h4>
              Links
            </h4>
            <div class="info_links">
              <a class="active" href="index.html">
                <img src="images/nav-bullet.png" alt="">
                Home
              </a>
              <a class="" href="about.html">
                <img src="images/nav-bullet.png" alt="">
                About
              </a>
              <a class="" href="service.html">
                <img src="images/nav-bullet.png" alt="">
                Services
              </a>
              <a class="" href="testimonial.html">
                <img src="images/nav-bullet.png" alt="">
                Testimonial
              </a>
              <a class="" href="news.html">
                <img src="images/nav-bullet.png" alt="">
                Latest News
              </a>
              <a class="" href="contact.html">
                <img src="images/nav-bullet.png" alt="">
                Contact Us
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_detail">
            <h4>
              Info
            </h4>
            <p>
              necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <h4>
            Subscribe
          </h4>
          <form action="#">
            <input type="text" placeholder="Enter email" />
            <button type="submit">
              Subscribe
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <p>
            &copy; <span id="displayYear"></span> All Rights Reserved. Design by
            <a href="https://html.design/">Free Html Templates</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <script src="{{asset('frondend')}}/js//jquery-3.4.1.min.js"></script>
  <script src="{{asset('frondend')}}/js//bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{asset('frondend')}}/js//custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</body>

</html>