@extends('front.index')

@section('content')

       <!--inside-article-->
       <div class="inside-article">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item" aria-current="page"><a href="#">المقالات</a></li>
                        <li class="breadcrumb-item active" aria-current="page">الوقاية من الأمراض</li>
                    </ol>
                </nav>
            </div>
            <div class="article-image">
                <img src="{{asset('images/posts/'.$post->img)}}">
            </div>
            <div class="article-title col-12">
                <div class="h-text col-6">
                    <h4>طريقة الوقاية من الأمراض</h4>
                </div>
                <div class="icon col-6">
                    <button type="button"><i class="far fa-heart"></i></button>
                </div>
            </div>
            
            <!--text-->
            <div class="text">
                <p>
                    {{$post->content}}
                </p> 
            </div>
            
            <!--articles-->
            <div class="articles">
                <div class="title">
                    <div class="head-text">
                        <h2>مقالات ذات صلة</h2>
                    </div>
                </div>
                <div class="view">
                    <div class="row">
                        
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach ($model as $posts)
                                <div class="card">
                                    <a href="" class="favourite">
                                    <i id="{{$posts->id}}" onclick="toggleFavourite(this)" class="far fa-heart {{$posts->is_favourite ? 'second-heart' : 'first-heart'}}"></i>
                                    </a>

                                    <div class="photo">
                                        <img src="{{asset('images/posts/'.$posts->img)}}" class="card-img-top" alt="{{$posts->title}}">
                                        <a href="{{url('post/'.$posts->id)}}" class="click">المزيد</a>
                                    </div>

                                    

                                    <div class="card-body">
                                        <h5 class="card-title">{{$posts->title}}</h5>
                                        <p class="card-text">
                                            {{$posts->content}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

@endsection