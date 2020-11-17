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
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    @foreach ($bloodtypes as $bloodtype)
                                        <option>{{$bloodtype->name}}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر المدينة</option>
                                    @foreach ($cities as $city)
                                    <option>{{$city->name}}</option>
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