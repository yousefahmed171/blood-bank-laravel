@extends('front.index')
@inject('model', 'App\Models\Client')
@section('content')

       <!--form-->
       <div class="form">
        <div class="container">
            <div class="path">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تسجيل الدخول</li>
                    </ol>
                </nav>
            </div>
            <div class="signin-form">
                
                    <div class="logo">
                        <img src="images/front/logo.png">
                    </div>
                    {!! Form::model($model,[
                        'action'  => 'Front\AuthController@doLogin',
                        'method' => 'post'
                    ]) !!} 
                        
                    @include('admin.partials.validate_errors')

                    <label for="phone">الجوال   </label>
                    {!! Form::text('phone', null,[
                      'class'       => 'form-control',
                      'placeholder' => 'الجول '
                    ])!!}

                    <label for="password"> كلمة السر  </label>
                    {!! Form::password('password', [
                    'class'       => 'form-control',
                    'placeholder' => 'كلمة السر '
                    ])!!}
                
                    <br>
                 
                
                    <div class="row buttons">
                        <div class="col-md-6 right">
                            <button  class="btn btn-primary" type="submit">دخول</button>
                        </div>
                        <div class="col-md-6 left">
                            <button  class="btn btn-primary" type="submit">انشاء حساب جديد</button>
                        </div>
                    </div>
                    {!! Form::close() !!}



            </div>
        </div>
    </div>

@endsection