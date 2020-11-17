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
                            <li class="breadcrumb-item active" aria-current="page">انشاء حساب جديد</li>
                        </ol>
                    </nav>
                </div>
                <div class="account-form">

                    {!! Form::model($model,[
                        'action'        => 'Front\AuthController@doRegister',
                        'method'        => 'post'
                    ]) !!}

                        <label for="name">الإسم   </label>
                        {!! Form::text('name', null,[
                            'class'           => 'form-control',
                            'placeholder'     => 'الإسم '
                        ])!!}

                        <label for="email"> البريد الإلكترونى   </label>
                        {!! Form::email('email', null, [
                            'class'             => 'form-control',
                            'placeholder'       => 'البريد الإلكترونى  '
                        ])!!}

                        <label for="data">تاريخ الميلاد   </label>
                        {!! Form::date('brith_date', null,[
                            'class'           => 'form-control',
                            'placeholder'     => 'تاريخ الميلاد '
                        ])!!}

                        <label for="data">فصيلة الدم   </label>
                        {!! Form::select('blood_type_id', $bloodtypes, null, [
                            'class'         => 'form-control',
                            'placeholder'   => 'فصيلة الدم'
                        ])!!}

                        <label for="data">إختر المحافظة   </label>
                        {!! Form::select('governorate_id', $governorates, null, [
                            'class'         => 'form-control',
                            'id'            => 'governorates',
                            'placeholder'   => 'إختر المحافظة'
                        ])!!}

                        <label for="city_id">إختر المدينة   </label>
                        {!! Form::select('city_id', [], null, [
                            'class'         => 'form-control',
                            'id'            => 'cities',
                            'placeholder'   => 'إختر المدينة'
                        ])!!}

                        <label for="phone">الجوال   </label>
                        {!! Form::text('phone', null,[
                            'class'             => 'form-control',
                            'placeholder'       => 'الجول '
                        ])!!}

                        <label for="data">تاريخ آخر  تبرع   </label>
                        {!! Form::date('brith_date', null,[
                            'class'             => 'form-control',
                            'id'                => 'date',
                            'placeholder'       => 'تاريخ الميلاد ',
                            'onfocus'           => "(this.type='date')"
                        ])!!}

                        <label for="password"> كلمة السر  </label>
                        {!! Form::password('password', [
                            'class'             => 'form-control',
                            'placeholder'       => 'كلمة السر '
                        ])!!}

                        <label for="password_confirmation"> تأكيد كلمة السر  </label>
                        {!! Form::password('password_confirmation', [
                            'class'             => 'form-control',
                            'placeholder'       => 'تأكيد كلمة السر '
                        ])!!}

                        <br>
                            <div class="create-btn">
                                <button class="btn btn-success"> إنشاء حساب  </button>
                            </div>
                        <br>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        @push('script')

        <script>

            $("#governorates").change(function(e){
                e.preventDefault();

                var governorate_id = $("#governorates").val();
                if(governorate_id)
                {
                    $.ajax({
                        url : '{{url('api/v1/cities?governorate_id=')}}'+governorate_id,
                        type: 'get',
                        success: function (data) {
                            if(data.status == 1)
                            {
                                $("#cities").empty();
                                $.each(data.data, function(index, city){
                                    $("#cities").append($('<option>').val(city.id).text(city.name));
                                });//'<option value="'+city.id+'">'+city.name+'</option>'
                                //console.log(data);
                            }
                        },
                        error : function(jqxhr, textStatus, errorMessage) {
                            alert(errorMessage);
                        }

                    });
                } else {

                }
            });

        </script>

    @endpush

@endsection