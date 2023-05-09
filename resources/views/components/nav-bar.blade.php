<div>
    <div class="col-sm-12 d-flex justify-content-center align-item-center">
        <img class="header-img" src="{{ asset('images\Amravati_Website_Logo4.png')}}" alt="" srcset="">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">{{lang('nav.title')}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <li class="nav-item">
                    {{-- <a class="nav-link" href="/logout">Logout</a> --}}
                    <a href="{{ route('logout')}}" class="nav-link" onclick="confirmation(event)">{{lang('nav.logout')}}</a>

                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="/login">{{lang('nav.login')}}</a>
                  </li>
                @endauth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{lang('nav.lang')}}
                </a>
                <select class="dropdown-menu changeLanguage" aria-labelledby="navbarDropdown">
                    <option class="dropdown-item" value="en" {{ session()->get('locale') == 'en' ? 'selected' : ''}}>{{lang('nav.en')}}</option>
                    <option class="dropdown-item" value="mr" {{ session()->get('locale') == 'mr' ? 'selected' : ''}}>{{lang('nav.mr')}}</option>
                    <option class="dropdown-item" value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : ''}}>{{lang('nav.hi')}}</option>
                </select>
              </li>
            </ul>
            @yield('nav_bredcrumb')
          </div>
        </div>
      </nav>
</div>
