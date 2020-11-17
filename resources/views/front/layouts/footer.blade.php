        <!--footer-->
        <div class="footer">
            <div class="inside-footer">
                <div class="container">
                    <div class="row">
                        <div class="details col-md-4">
                            <img src="{{asset('images/front/logo.png')}}">
                            <h4>بنك الدم</h4>
                            <p>
                                {{$settings->about_app}}                            </p>
                        </div>
                        <div class="pages col-md-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="list-home-list" href="{{url('/')}}" role="tab" aria-controls="home">الرئيسية</a>
                                {{-- <a class="list-group-item list-group-item-action" id="list-profile-list" href="{{url('/')}}" role="tab" aria-controls="profile">عن بنك الدم</a> --}}
                                {{-- <a class="list-group-item list-group-item-action" id="list-messages-list" href="{{url('/')}}" role="tab" aria-controls="messages">المقالات</a> --}}
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{url('donation-requests')}}" role="tab" aria-controls="settings">طلبات التبرع</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{url('about')}}" role="tab" aria-controls="settings">من نحن</a>
                                <a class="list-group-item list-group-item-action" id="list-settings-list" href="{{url('contact')}}" role="tab" aria-controls="settings">اتصل بنا</a>
                            </div>
                        </div>
                        <div class="stores col-md-4">
                            <div class="availabe">
                                <p>متوفر على</p>
                                <a href="{{$settings->fs_link}}">
                                    <img src="{{asset('images/front/google1.png')}}">
                                </a>
                                <a href="{{$settings->fs_link}}">
                                    <img src="{{asset('images/front/ios1.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="other">
                <div class="container">
                    <div class="row">
                        <div class="social col-md-4">
                            <div class="icons">
                                <a href="{{$settings->fs_link}}" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$settings->ins_link}}" class="instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="{{$settings->tw_link}}" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{$settings->yt_link}}" class="youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                        <div class="rights col-md-8">
                            <p>جميع الحقوق محفوظة لـ <span>بنك الدم</span> &copy; 2019</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
        {{-- <script src="{{asset('front/js/jq.js')}}"></script> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="{{asset('front/js/bootstrap.bundle.js')}}"></script>
        <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
      
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> --}}
      
        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
        
        <script src="{{asset('front/js/owl.carousel.min.js')}}"></script>


        <script src="{{asset('front/js/main.js')}}"></script>

        @stack('script')
    </body>
</html>