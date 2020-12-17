<div class="collapse navbar-collapse d-inline-block" id="navbarNav">
    @guest
      {{-- Jika guest yang mengakses halaman --}}
      <a class="navbar-brand text-white" href=" {{ route('root') }}">Le Petite Pasta</a>
    @else
      {{-- Jika admin dan member yang mengakses halaman --}}
      <a class="navbar-brand text-white" href=" {{ route('home') }}">Le Petite Pasta</a>
    @endguest
    
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <ul class="navbar-nav ml-auto">
        @guest
            {{-- Jika guest yang mengakses halaman --}}
            {{-- <li class="nav-item">
              <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('root') }}">{{ __('Home') }}</a>
            </li> --}}

            <li class="nav-item">
              <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('guestmenu') }}">{{ __('Our Menu') }}</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('about') }}">{{ __('About') }}</a>
            </li>

            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  Join Us!
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>

                  @if (Route::has('register'))
                    <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                  @endif
              </div>
          </li>
            
        @else
            {{-- Jika admin yang mengakses halaman --}}
            @if(auth()->user()->role=="admin")
              <li class="nav-item">
                <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('transactions') }}">View All Transaction</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('users') }}">View All User</a>
                  </li>
  
              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    @if(auth()->user()->image == null)
                      {{ Auth::user()->username ?? '' }}
                    @else
                      <img src="{{ asset('assets/image/' . auth()->user()->image) }}" style="width: 25px; height: 25px; border-radius: 25px;" alt="">
                    @endif
                  </a>
  
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      
                    
                      <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>
  
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                  </div>
              </li>
  
            {{-- Jika guest yang mengakses halaman --}}
            @elseif(auth()->user()->role=="member")
              {{-- <li class="nav-item">
              <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('home') }}">Home</a>
              </li> --}}

              <li class="nav-item">
              <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('menu') }}">Our Menu</a>
              </li>
  
              <li class="nav-item">
              <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('about') }}">About</a>
              </li>
  
              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  @if(auth()->user()->image == null)
                    {{ Auth::user()->username ?? '' }}
                  @else
                    <img src="{{ asset('assets/image/' . auth()->user()->image) }}" style="width: 25px; height: 25px; border-radius: 25px;" alt="">
                  @endif
                </a>
  
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item text-dark" href="{{ route('profile', auth()->user()->id) }}">
                    Profile
                  </a>

                  <a class="dropdown-item text-dark" href="{{ route('cart') }}">
                      View Cart
                  </a>

                    <a class="dropdown-item text-dark" href="{{ route('transactions') }}">
                        View Transaction History
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
  
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
              </li>
            @endif
        @endguest
      </ul>
  </div>