@extends('front.index')
@inject('model', 'App\Models\Contact')

@section('content')

      <!--contact-us-->
      <div class="contact-now">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
                    </ol>
                </nav>
            </div>
            <div class="row methods">
                <div class="col-md-6">
                    <div class="call">
                        <div class="title">
                            <h4>اتصل بنا</h4>
                        </div>
                        <div class="content">
                            <div class="logo">
                                <img src="images/front/logo.png">
                            </div>
                            <div class="details">
                                <ul>
                                    <li><span>الجوال:</span> {{$settings->phone}}</li>
                                    <li><span>فاكس:</span> 234234234</li>
                                    <li><span>البريد الإلكترونى:</span> {{$settings->email}}</li>
                                </ul>
                            </div>
                            <div class="social">
                                <h4>تواصل معنا</h4>
                                <div class="icons" dir="ltr">
                                    <div class="out-icon">
                                        <a href="{{$settings->fs_link}}" target="_blank"><img src="images/front/001-facebook.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->tw_link}}" target="_blank"><img src="images/front/002-twitter.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->yt_link}}" target="_blank"><img src="images/front/003-youtube.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->ins_link}}" target="_blank"><img src="images/front/004-instagram.svg"></a>
                                    </div>
                                    <div class="out-icon">
                                        <a href="{{$settings->ins_link}}" target="_blank"><img src="images/front/005-whatsapp.svg"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                        <div class="title">
                            <h4>تواصل معنا</h4>
                        </div>
                        <div class="fields">

                            
                            {!! Form::model($model,[
                                'action'  => 'Front\MainController@contactSend',
                                'method' => 'POST'
                            ]) !!} 
                                
                            @include('admin.partials.validate_errors')

                            <label for="name">Name  </label>
                            {!! Form::text('name', null,[
                              'class'       => 'form-control',
                              'placeholder' => 'الإسم'
                            ])!!}

                            <label for="email">Email </label>
                            {!! Form::text('email', null,[
                                'class'       => 'form-control',
                                'placeholder'   => 'البريد الإلكترونى'
                            ])!!}

                            <label for="phone">Phone </label>
                            {!! Form::text('phone', null,[
                                'class'       => 'form-control',
                                'placeholder' => 'الجوال'
                            ])!!}

                            <label for="subject">Subject </label>
                            {!! Form::text('subject', null,[
                                'class'       => 'form-control',
                                'placeholder'   => 'عنوان الرسالة'
                            ])!!}

                            <label for="massage">Massage   </label>
                            {!! Form::textarea('massage', null,[
                                'class'       => 'form-control',
                                'placeholder'       => 'نص الرسالة'
                            ])!!}

                          
                        
                            <div class="card-footer">
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary">ارسال</button>
                                </div>
                            </div>
                        
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection