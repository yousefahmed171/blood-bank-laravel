@extends('front.index')
@section('content')
    
        <!--intro-->
        <div class="intro">
            <div id="slider" class="carousel slide" data-ride="carousel">
                {{-- <ol class="carousel-indicators">
                    <li data-target="#slider" data-slide-to="0" class="active"></li>
                    <li data-target="#slider" data-slide-to="1"></li>
                    <li data-target="#slider" data-slide-to="2"></li>
                </ol> --}}
                <div class="carousel-inner">
                    <div class="carousel-item carousel-1 active">
                        <div class="container info">
                            <div class="col-md-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    {{$settings->about_app}} 
                                </p>
                                <a href="{{url('about')}}">المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--about-->
        <div class="about">
            <div class="container">
                <div class="col-md-6 text-center">
                    <p>
                        <span>بنك الدم</span> <br>
                        {{$settings->about_app}}
                    </p>
                </div>
            </div>
        </div>
        
        <!--articles-->
        <div class="articles">
            <div class="container title">
                <div class="head-text">
                    <h2>المقالات</h2>
                </div>
            </div>
            <div class="view">
                <div class="container">
                    <div class="row">
                        <!-- Set up your HTML -->
                        <div class="owl-carousel articles-carousel">
                            @foreach ($posts as $post)
                                <div class="card">
                                       
                                <a class="favourite"  id="{{$post->id}}" onclick="toggleFavourite(this)" {{$post->is_favourite ? 'second-heart' : 'first-heart'}}  >
                                    <i 
                                        
                                        
                                         
                                        class="fa fa-heart">
                                    </i> 
                                </a>
                                    
                                    <div class="photo">
                                        <img src="{{asset('images/posts/'.$post->img)}}" class="card-img-top" alt="{{$post->title}}">
                                        <a href="{{url('post/'.$post->id)}}" class="click">المزيد</a>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->title}}</h5>
                                        <p class="card-text">
                                            {{$post->content}}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--requests-->
        <div class="requests">
            <div class="container">
                <div class="head-text">
                    <h2>طلبات التبرع</h2>
                </div>
            </div>
            <div class="content">
                <div class="container">
                <form class="row filter" action="{{url('/')}}" method="POST">
                    @csrf
                        <div class="col-md-5 blood">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="bloodtype" name="bloodtype">
                                        <option selected disabled>اختر فصيلة الدم</option>
                                        @foreach ($bloodtypes as $bloodtype)
                                            <option value="{{$bloodtype->id}}">{{$bloodtype->name}}</option>
                                        @endforeach
 
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 city">
                            <div class="form-group">
                                <div class="inside-select">
                                    <select class="form-control" id="city" name="city">
                                        <option selected disabled>اختر المدينة</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 search">
                            <button type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="patients">
                        @if($result->count() > 0)
                            <div class="alert alert-success" role="alert">
                                عدد التبرعات  هي  ( {{$result->count()}} )                            
                            </div>
                            @foreach ($result as $donation)
                                <div class="details">
                                    <div class="blood-type">
                                        <h2 dir="ltr">{{$donation->bloodtype->name}}</h2>
                                    </div>
                                    <ul>
                                        <li><span>اسم الحالة:</span> {{$donation->name}}</li>
                                        <li><span>مستشفى:</span> {{$donation->hospital_address}}</li>
                                        <li><span>المدينة:</span> {{$donation->city->name}}  {{$donation->governorate}}</li>
                                    </ul>
                                    <a href="{{url('donation-request/'.$donation->id)}}">التفاصيل</a>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                 نأسف لايوجد تبرعات  حاول مرة آخرى 
                            </div>
                            @foreach ($donations as $donation)
                            <div class="details">
                                
                                <div class="blood-type">
                                    <h2 dir="ltr">{{$donation->bloodtype->name}}</h2>
                                </div>
                                <ul>
                                    <li><span>اسم الحالة:</span> {{$donation->name}}</li>
                                    <li><span>مستشفى:</span> {{$donation->hospital_address}}</li>
                                    <li><span>المدينة:</span> {{$donation->city->name}}  {{$donation->governorate}}</li>
                                </ul>
                                <a href="{{url('donation-request/'.$donation->id)}}">التفاصيل</a>
                            </div>
                            @endforeach
                        @endif
                       
                        
                    </div>
                    <div class="more">
                        <a href="{{url('donation-requests')}}">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
        <!--contact-->
        <div class="contact">
            <div class="container">
                <div class="col-md-7">
                    <div class="title">
                        <h3>اتصل بنا</h3>
                    </div>
                    <p class="text">يمكنك الإتصال بنا للإستفسار عن معلومة وسيتم الرد عليكم</p>
                    <div class="row whatsapp">
                        <a href="{{$settings->whatsapp_link}}" target="_blank">
                            <img src="{{asset('images/front/whats.png')}}">
                            <p dir="ltr">+002  1010737793</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--app-->
        <div class="app">
            <div class="container">
                <div class="row">
                    <div class="info col-md-6">
                        <h3>تطبيق بنك الدم</h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى،
                        </p>
                        <div class="download">
                            <h4>متوفر على</h4>
                            <div class="row stores">
                                <div class="col-sm-6">
                                    <a href="{{$settings->android_link}}" target="_blank">
                                        <img src="{{asset('images/front/google.png')}}">
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{$settings->ios_link}}" target="_blank">
                                        <img src="{{asset('images/front/ios.png')}}">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="screens col-md-6">
                        <img src="{{asset('images/front/App.png')}}">
                    </div>
                </div>
            </div>
        </div>

        

@push('script')

    
        <script>

            function toggleFavourite(heart) { 
                var post_id = heart.id;
                $.ajax({
                    url : '{{url(route('toggle-favourite'))}}',
                    type: 'post',
                    data: {_token:"{{csrf_token()}}", post_id:post_id},
                    success: function (data) {
                        console.log(data);
                        var currentClass = $(heart).attr('class');
                        if(currentClass.includes('first')){
                            $(heart).removeClass('first-heart').addClass('second-heart');
                        }else {
                            $(heart).removeClass('second-heart').addClass('first-heart');
                        }
                    }
                });
               
            }
        </script>

@endpush

@endsection

