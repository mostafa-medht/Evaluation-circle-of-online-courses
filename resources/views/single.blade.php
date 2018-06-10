@extends('layouts.frontend')

@section('content')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$post->title}}</h1>
        </div>
    </div>

    <div class="container">
            <div class="row medium-padding120">
                <main class="main">
                    <div class="col-lg-10 col-lg-offset-1">
                        <article class="hentry post post-standard-details">
        
                            <div class="post-thumb">
                                <img src="{{$post->featured}}" alt="{{$post->title}}">
                            </div>
        
                            <div class="post__content">
        
        
                                <div class="post-additional-info">
        
                                    <div class="post__author author vcard">
                                        Posted by
        
                                        <div class="post__author-name fn">
                                            <a href="#" class="post__author-link">Admin</a>
                                        </div>
        
                                    </div>
        
                                    <span class="post__date">
        
                                        <i class="seoicon-clock"></i>
        
                                        <time class="published" datetime="2016-03-20 12:00:00">
                                            {{$post->created_at->toFormattedDateString()}}
                                        </time>
        
                                    </span>
        
                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                            @foreach($categories as $category)
                                                @if($post->category_id == $category->id)
                                                    <a href="{{route('category.single',['id' => $category->id] )}}">{{$category->name}}</a>
                                                @endif
                                            @endforeach
                                    </span>
        
                                </div>
        
                                <div class="post__content-info">
        
                                    {!! $post->content !!}
                                    
                                    <br><br>
                                    <div class="widget w-tags">
                                        <div class="tags-wrap">
                                            @foreach($post->tags as $tag)
                                                <a href="#" class="w-tags-item">{{$tag->tag}}</a>
                                            @endforeach
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                            <div class="socials">Share:
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-facebook"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-twitter"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-linkedin"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-google-plus"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-pinterest"></i>
                                </a>
                            </div>
        
                        </article>
        
                        <div class="blog-details-author">
        
                            <div class="blog-details-author-thumb">
                                <img src="{{asset($post->user->profile->avatar)}}" alt="Author" style="width:70px; height:70px; border-radius:50%;">
                            </div>
        
                            <div class="blog-details-author-content">
                                <div class="author-info">
                                    <h5 class="author-name">{{$post->user->name}}</h5>
                                    <p class="author-info">SEO Specialist</p>
                                </div>
                                <p class="text">{{$post->user->profile->about}}
                                </p>
                                <div class="socials">
        
                                    <a href="{{$post->user->profile->facebook}}" class="social__item" target="_blank">
                                        <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                    </a>
        
                                    <a href="{{$post->user->profile->youtube}}" class="social__item" target="_blank">
                                        <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                    </a>
                                 
                                    <a href="#" class="social__item">
                                        <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
                                    </a>
        
                                    <a href="#" class="social__item">
                                        <img src="{{asset('app/svg/google.svg')}}" alt="google">
                                    </a>
        
                                    
        
                                </div>
                            </div>
                        </div>
        
                        <div class="pagination-arrow">
        
                            @if($prev)
                                <a href="{{route('post.single',['slug' =>$prev->slug])}}" class="btn-next-wrap">
                                    <div class="btn-content">
                                        <div class="btn-content-title">Next Post</div>
                                        <p class="btn-content-subtitle">{{$prev->title}}</p>
                                    </div>
                                    <svg class="btn-next">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg>
                                </a>
                            @endif

                            @if($next)
                                <a href="{{route('post.single',['slug' =>$next->slug])}}" class="btn-prev-wrap">
                                    <svg class="btn-prev">
                                        <use xlink:href="#arrow-left"></use>
                                    </svg>
                                    <div class="btn-content">
                                        <div class="btn-content-title">Previous Post</div>
                                        <p class="btn-content-subtitle">{{$next->title}}</p>
                                    </div>
                                </a>
                            @endif
                            
                            
                        </div>
        
                        <div class="comments">
    
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h3 class="comments-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span>  {{ $post->comments()->count() }} Comments</h3>
                                    @foreach($post->comments as $comment)
                                        <div class="comment">
                                            <div class="author-info">
                        
                                                <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) . "?s=50&d=monsterid" }}" class="author-image">
                                                <div class="author-name">
                                                    <h4>{{ $comment->name }}</h4>
                                                    <p class="author-time">{{ date('F nS, Y - g:iA' ,strtotime($comment->created_at)) }}</p>
                                                </div>
                                                
                                            </div>
                        
                                            <div class="comment-content">
                                                {{ $comment->comment }}
                                            </div>
                                            
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="row">
                                <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                                  {!! Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}
                                    <div class="card card-default">
                                            <div class="card-header" style="margin-bottom: 30px; color:black">
                                               (: Leave a Comment :)
                                            </div>

                                            <div class="card-body">
                                                <div class="col-md-4">
                                                    <div class="form-group" style="color: black">
                                                    {{ Form::label('name', "Name:") }}
                                                    {{ Form::text('name', null, ['class' => 'form-control' , 'placeholder'=>'Name....']) }}
                                                    </div>   
                                                </div>
                            
                                                <div class="col-md-4">
                                                    <div class="form-group" style="color: black">
                                                    {{ Form::label('email', 'Email:') }}
                                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder'=>'Plz Enter an email']) }}
                                                    </div>
                                                </div>
                            
                                                <div class="col-md-12">
                                                    <div class="form-group" style="color:black; border: darkslategray">
                                                    {{ Form::label('comment', "Comment:") }}
                                                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5', 'placeholder'=>'Add Your Comment.....:)']) }}
                                                    </div>

                                                    {{ Form::submit('Add Comment', ['class' => 'btn btn-success ', 'style' => 'margin-top:15px; background-color:#28a745']) }}    
                                                </div>
                                            </div>    
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        
                    </div>
        
                    <!-- End Post Details -->
        
                    <!-- Sidebar-->
                    <br>
                    <br>
                    <br>
                    <div class="col-lg-12">
                        <aside aria-label="sidebar" class="sidebar sidebar-right">
                            <div  class="widget w-tags">
                                <div class="heading text-center">
                                    <h4 class="heading-title">ALL BLOG TAGS</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>
        
                                <div class="tags-wrap">
                                    @foreach($tags as $tag)
                                    <a href="{{route('tag.single',['id' =>$tag->id])}}" class="w-tags-item">{{$tag->tag}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </aside>
                    </div>
        
                    <!-- End Sidebar-->
        
                </main>
            </div>
        </div>
@endsection