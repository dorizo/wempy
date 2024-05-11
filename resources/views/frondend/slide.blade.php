<!-- slider section -->
<section class="slider_section position-relative">
      <div class="box">
        <div class="detail-box">
          <a class="navbar-brand" href="index.html">
            <span>
            <br />
            <br />
            <br />
            WEMPY HOLDING
            </span>
          </a>
          <div class="carousel slide slider_text_carousel" data-ride="carousel">
            <div class="carousel-inner">
            @php 
            $i =0
            @endphp
            @foreach($berita as $b)
            
                <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                    <div class="heading_box">
                        <h3>
                        {{$b->judul}}
                        </h3>
                    </div>
                </div>
                @php 
                $i++
                @endphp
            @endforeach
            </div>
          </div>

          <div class="btn-box">
            <a href="" class="btn-1">
              Hubungi Kami
            </a>
            <a href="" class="btn-2">
              Tentang Korpri
            </a>
          </div>
        </div>
        <div class="img-box">
          <div class="carousel slide slider_image_carousel carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
            @php 
            $image =0
            @endphp
            @foreach($berita as $p)
              <div class=" image carousel-item {{ $image === 0 ? 'active' : '' }}">
                <img  src="{{URL::to('storage/uploads')}}/{{$p->gambar}}" loading="lezy">
              </div>
              @php 
                $image++
                @endphp
            @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->