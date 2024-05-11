@extends('layouts.admin')

@section('content')
            @foreach($berita as $b)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                  <div class="article-header">
                  <iframe width="100%" height="200" src="{{getYoutubeEmbedUrl($b->link)}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>  
                  
                    <div class="article-title">
                      <h2><a href="#">{{$b->judul}}</a></h2>
                    </div>
                  </div>
                  <div class="article-details">
                  {{ Illuminate\Support\Str::limit(strip_tags($b->isi), $limit = 150, $end = '...') }}
                  </p>
                    <div class="article-cta">                           
                      <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                  </div>
                </article>
              </div>
              @endforeach
@endsection