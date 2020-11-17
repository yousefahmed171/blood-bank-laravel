
@extends('admin.index')
@section('title') Edit Settings @endsection

@section('content')


<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Settings</h3>
  </div>
  <div class="card-body">

    {!! Form::model($settings, ['action' => ['SettingController@update',$settings->id], 'method' => 'PUT']) !!} 
    
    @include('admin.partials.validate_errors')

    <label for="exampleInputSettings">About App </label>
    {!! Form::text('about_app', null,[
      'class'       => 'form-control'
    ])!!}
    <label for="exampleInputSettings">Notification Setting Post </label>
    {!! Form::textarea('notification_setting_post', null,[
        'class'       => 'form-control'
    ])!!}
    <label for="exampleInputSettings">Phone </label>
    {!! Form::text('phone', null,[
        'class'       => 'form-control'
    ])!!}
    <label for="exampleInputSettings">Email </label>
    {!! Form::text('email', null,[
        'class'       => 'form-control'
    ])!!}
    <label for="exampleInputSettings">Facebook Link </label>
    {!! Form::text('fs_link', null,[
        'class'       => 'form-control'
    ])!!}
    <label for="exampleInputSettings">Twitter Link </label>
    {!! Form::text('tw_link', null,[
        'class'       => 'form-control'
    ])!!}
    <label for="exampleInputSettings">Youtupe Link </label>
    {!! Form::text('yt_link', null,[
        'class'       => 'form-control'
    ])!!}
    <label for="exampleInputSettings">Instagram Link </label>
    {!! Form::text('ins_link', null,[
        'class'       => 'form-control'
    ])!!}
  </div>

  <div class="card-footer">
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>

    {!! Form::close() !!}
</div>

@endsection