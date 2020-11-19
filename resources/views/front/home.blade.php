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
                                {{-- <a href="#">المزيد</a> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="carousel-item carousel-2">
                        <div class="container info">
                            <div class="col-md-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    {{$settings->about_app}}
                                </p>
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item carousel-3">
                        <div class="container info">
                            <div class="col-md-5">
                                <h3>بنك الدم نمضى قدما لصحة أفضل</h3>
                                <p>
                                    {{$settings->about_app}}
                                </p>
                                <a href="#">المزيد</a>
                            </div>
                        </div>
                    </div> --}}
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
                                       
                                     {{-- <a  class="favourite" >
                                        <i id="{{$post->id}}" onclick="toggleFavourite(this)" class="far fa-heart {{$post->is_favourite ? 'second-heart' : 'first-heart'}} "></i>

                                     </a> --}}

                                    {{-- <button class="btn " id="{{$post->id}}" onClick="toggleFavourite(this)"> 
                                        <i class="fa fa-heart" {{$post->is_favourite ? 'second-heart' : 'first-heart'}} 
                                            style="
                                                margin-right: 91%;
                                                font-size: 27px;
                                                color: #090808;
                                                outline-color: #020202;
                                            "></i>
                                    </button> --}}
                                     

                                     {{-- <button id="{{$post->id}}" 
                                        onClick="toggleFavourite(this)" 
                                        class="btn btn-lg favourite">
                                        <i class="fas fa-heart" ></i>
                                    </button> --}}

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
                            
                            @foreach ($donations as $donation)
                            <p>No data</p>
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
                        <a href="#">
                            <img src="{{asset('images/front/whats.png')}}">
                            <p dir="ltr">+002  1215454551</p>
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
                                    <a href="#">
                                        <img src="{{asset('images/front/google.png')}}">
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="#">
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


            // $("#bloodtype", "#city").change(function(e){
            //     e.preventDefault();

            //     var bloodtype = $("#bloodtype").val();
            //     var city = $("#city").val();
            //     if(bloodtype || city)
            //     {
            //         $.ajax({
            //             url : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
            //             type: 'GET',
            //             success: function (data) {
                     
            //                 if(data.status != 0)
            //                 {
            //                     $("#cities").empty();
            //                     $("#cities").append('<option>إختر المدينة </option>');
            //                     $.each(data.data, function(index, value){
            //                         $("#cities").append('<option value="'+value.id+'">'+value.name+'</option>');
            //                     });
            //                 } else {
            //                     $("#cities").empty();
            //                 }
            //             },
            //             error : function(jqxhr, textStatus, errorMessage) {
            //                 alert(errorMessage);
            //             }
            //         });
            //     } else {

            //     }
            // });



            function toggleFavourite(heart) { 
                var post_id = heart.id;
                $.ajax({
                    url : '{{url('toggle-favourite')}}',
                    type: 'post',
                    data: {_token:"{{csrf_token()}}", post_id:post_id},
                    success: finction (data) {
                        console.log(data);
                    }

                });
                var currentClass = $(heart).attr('class');
                if(currentClass.includes('first')){
                    $(heart).remveClass('first-heart').addClass('second-heart');
                }else {
                    $(heart).remveClass('second-heart').addClass('first-heart');
                }
            }
        </script>

@endpush

@endsection

