<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{$post->id}}">
        </a>
        {{$post->title}}</h2>
    <p class="blog-post-meta">{{$post -> created_at -> toFormattedDateString()}} </p>

    {{$post->body}}

  </div><!-- /.blog-post -->