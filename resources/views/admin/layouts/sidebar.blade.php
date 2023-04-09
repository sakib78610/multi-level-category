  <div class="app-sidebar sidebar-shadow">
      <div class="app-header__logo">
          <div class="logo-src"></div>
          <div class="header__pane ml-auto">
              <div>
                  <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                      <span class="hamburger-box">
                          <span class="hamburger-inner"></span>
                      </span>
                  </button>
              </div>
          </div>
      </div>
      <div class="app-header__mobile-menu">
          <div>
              <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                  <span class="hamburger-box">
                      <span class="hamburger-inner"></span>
                  </span>
              </button>
          </div>
      </div>
      <div class="app-header__menu">
          <span>
              <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                  <span class="btn-icon-wrapper">
                      <i class="fa fa-ellipsis-v fa-w-6"></i>
                  </span>
              </button>
          </span>
      </div>    
      <div class="scrollbar-sidebar">
          <div class="app-sidebar__inner">
                  {{-- Admin sidebar --}}
                  @if(Auth::user()->user_type==Config::get('constants.const.admin'))
                      <ul class="vertical-nav-menu">
                          <a href="{{ route('dashboard')}}"><li class="app-sidebar__heading">Dashboard</li></a>
                          <li>
                              <a href="{{ route('usersList')}}">
                                  <i class="fa fa-users" aria-hidden="true"></i>
                                  Users List
                              </a>
                          </li>
                          <li>
                              <a href="{{ route('categories.index')}}">
                                  <i class="fa fa-list" aria-hidden="true"></i>
                                  Manage Category
                              </a>
                          </li>
                      </ul>
                  @else
                  {{-- Users sidebar --}}
                      <ul class="vertical-nav-menu">
                          <a href="{{ route('dashboard')}}"><li class="app-sidebar__heading">Dashboard</li></a>
                          <li>
                              <a href="{{ route('categories.index')}}">
                                  <i class="fa fa-list" aria-hidden="true"></i>
                                  Manage Category
                              </a>
                          </li>
                      </ul>
                  @endif
          </div>
      </div>
  </div>    
