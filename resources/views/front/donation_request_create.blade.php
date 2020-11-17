@extends('front.index')
@inject('model', 'App\Models\DonationRequest')

@section('content')

     <!--contact-us-->
     <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">إنشاء طلب تبرع</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-12">
                    <div class="contact-form">
                        <div class="title">
                            <h4>إنشاء طلب تبرع</h4>
                        </div>
                        <div class="fields">

                            
                            {!! Form::model($model,[
                                'action'  => 'Front\MainController@donationRequestStore',
                                'method' => 'POST'
                            ]) !!} 
                                
                            @include('admin.partials.validate_errors')

                            <label for="name">الإسم  </label>
                            {!! Form::text('name', null,[
                              'class'       => 'form-control',
                              'placeholder' => 'الإسم'
                            ])!!}

                            <label for="phone">رقم الهاتف  </label>
                            {!! Form::text('phone', null,[
                            'class'       => 'form-control',
                            'placeholder' => 'رقم التيلفون'
                            ])!!}

                            <label for="age">العمر </label>
                            {!! Form::text('age', null,[
                                'class'       => 'form-control',
                                'placeholder'   =>' العمر'
                            ])!!}

                            <label for="bags">أكياس الدم </label>
                            {!! Form::text('bags', null,[
                                'class'       => 'form-control',
                                'placeholder' => 'أكياس الدم'
                            ])!!}

                            <label for="hospital_address">عنوان المستشفى </label>
                            {!! Form::text('hospital_address', null,[
                                'class'       => 'form-control',
                                'placeholder'   => 'عنوان المستشفى'
                            ])!!}

                            <label for="details"> تفاصيل آخرى   </label>
                            {!! Form::textarea('details', null,[
                                'class'       => 'form-control',
                                'placeholder'       => ' تفاصيل آخرى'
                            ])!!}

                            <div class="form-group">
                                <label >إختر فصيلة الدم </label>
                                {!! Form::select('blood_type_id', $bloodtypes,[
                                'class'       => 'form-control'
                                ])!!}
                            </div>

                            <div class="form-group">
                                <label >إختر المدينة </label>
                                {!! Form::select('city_id', $citites,[
                                'class'       => 'form-control'
                                ])!!}
                            </div>

                          
                        
                            <br>
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary">ارسال</button>
                            </div>
                        
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection