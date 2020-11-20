@extends('front.index')

@section('content')

<div class="all-requests">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>

                </ol>
            </nav>
        </div>
        <!--requests-->
        <div class="requests">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
            <div class="content">
                <form class="row filter"  action="{{url('donation-requests')}}" method="POST">
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
                                    <option  value="{{$city->id}}">{{$city->name}}</option>
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
                            عدد التبرعات للبحث هي  ( {{$result->count()}} )                            
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
                             نأسف لايوجد تبرعات لصيغه البحث حاول مرة آخرى 
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
                <div class="pages">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            {{ null !== $donations ? $donations->links("pagination::bootstrap-4") : ''  }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection