@include('layouts.header')

@include('layouts.nav')

@inject('clients', 'App\Models\Client')
@inject('donationRequests', 'App\Models\DonationRequest')
@inject('posts', 'App\Models\Post')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        @yield('dashboard')
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> @yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




@include('layouts.footer')

