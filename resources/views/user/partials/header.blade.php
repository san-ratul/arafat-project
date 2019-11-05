<header id="aa-header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-header-area">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="aa-header-left">
                  <div class="aa-telephone-no">
                    <span class="fa fa-phone"></span>
                    {{App\User::where('admin',true)->first()->contact_no}}
                  </div>
                  <div class="aa-email hidden-xs">
                    <span class="fa fa-envelope-o"></span> {{App\User::where('admin',true)->first()->email}}
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="aa-header-right">
                    @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="aa-login" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    @else
                    <a href="{{ route('register') }}" class="aa-register">Register</a>
                    <a href="{{ route('login') }}" class="aa-login">Login</a>
                    @endauth
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
