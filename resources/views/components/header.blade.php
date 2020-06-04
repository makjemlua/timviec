<!-- Header start -->
<style type="text/css">
  div.header
  {
    position: fixed;
    background-color: #e5e0e0;
    width: 100%;
    z-index: 99;
    box-shadow: 10px 10px 5px grey;
  }
  .navbar-nav>li>a
  {
    border-bottom: 2px solid #e5e0e0;
  }
</style>
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-12"> <a href="{{ route('home.index') }}" class="logo"><img src="{{ asset('images/logo.gif') }}" alt=""></a>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-10 col-sm-12 col-xs-12">
        <!-- Nav start -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-collapse collapse" id="nav-main">
            <ul class="nav navbar-nav">
              <li class="postjob"><a href="{{ route('home.index') }}">Trang chủ</a>
              </li>

              <li><a href="{{ route('about-us') }}">Về chúng tôi</a></li>

              <li><a href="{{ route('get.news') }}">Blog</a>

              </li>
              <li><a href="{{ route('contact') }}">Liên hệ</a></li>
              <li><a href="{{ route('home.tuyendung') }}">Tuyển dụng</a></li>

              @if(!Auth::guard('web')->check() && !Auth::guard('employers')->check())
              <li><a href="{{ route('login.index') }}">Đăng nhập</a></li>

              @elseif(Auth::guard('web')->check())
              <li class="dropdown userbtn"><a href="{{ route('user.info') }}">
                @if(!Auth::guard('web')->user()->provider)
                    <img src="{{ old('avatar',(isset(Auth::guard('web')->user()->avatar)) ? asset(pare_url_file(Auth::guard('web')->user()->avatar)) : asset('images/default.png') ) }}" alt="" class="userimg">
                @else
                  <img src="{{ old('avatar', (asset(get_data_user('web', 'avatar')) ? get_data_user('web', 'avatar') : asset('images/default.png') ) ) }}" alt="" class="userimg">
                @endif

              </a>
              	 <ul class="dropdown-menu">
                    <li><a href="{{ route('user.info') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{ Auth::guard('web')->user()->name }}</a></li>
                    <li><a href="{{-- {{ route('user.editprofile') }} --}}"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa hồ sơ</a></li>
                    <li><a href=""><i class="fa fa-briefcase" aria-hidden="true"></i> My jobs</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('get.logout.user') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
                  </ul>
              </li>

              @elseif(Auth::guard('employers')->check())
              <li class="dropdown userbtn"><a href="{{ route('employer.info') }}"><img src="{{ old('avatar',(isset(Auth::guard('employers')->user()->em_avatar)) ? asset(pare_url_file(Auth::guard('employers')->user()->em_avatar)) : asset('images/default.png') ) }}" alt="" class="userimg"></a>
                 <ul class="dropdown-menu">
                    <li><a href="{{ route('employer.info') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{ Auth::guard('employers')->user()->name }}</a></li>
                    <li><a href=""><i class="fa fa-pencil" aria-hidden="true"></i> Đăng tin</a></li>
                    <li><a href=""><i class="fa fa-briefcase" aria-hidden="true"></i> My Jobs</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('get.logout.employer') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a></li>
                  </ul>
              </li>

              @endif
            </ul>
            <!-- Nav collapes end -->
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- Nav end -->
      </div>
    </div>
    <!-- row end -->
  </div>
  <!-- Header container end -->
</div>
<!-- Header end -->