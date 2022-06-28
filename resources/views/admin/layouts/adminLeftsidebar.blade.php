  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
      <!-- Brand Logo -->
      <a href="{{ url('/') }}" class="brand-link bg-primary">
          {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
          <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('cp/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> --}}
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
                  data-accordion="true">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <!-- Dashboard -->
                  <li class="nav-item has-treeview {{ session('lsbm') == 'dashboard' ? ' menu-open ' : '' }}">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('Dashboard') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ route('admin.dashboard') }}"
                                  class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Dashboard') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.websiteParameters') }}"
                                  class="nav-link {{ session('lsbsm') == 'webparameter' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Web Parameters') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.frontSlidersAll') }}"
                                  class="nav-link {{ session('lsbsm') == 'frontSlidersAll' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Front Sliders') }}</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  {{-- ./Dashboard --}}

                  {{-- Website Page --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'Page' ? ' menu-open ' : '' }}">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('Page') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">

                          <li class="nav-item ">
                              <a href="{{ route('admin.dashboard') }}"
                                  class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Pages') }}</p>
                              </a>
                          </li>


                      </ul>
                  </li>

                  {{-- news event --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'news' ? ' menu-open ' : '' }}">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('News , Events & Notices') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">


                          {{-- <li class="nav-item ">
                              <a href="{{ route('admin.categoriesAll') }}"
                                  class="nav-link {{ session('lsbsm') == 'categoriesAll' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Categories') }}</p>
                              </a>
                          </li> --}}
                          <li class="nav-item ">
                              <a href="{{ route('admin.postsAll', ['type' => 'notice']) }}"
                                  class="nav-link {{ session('lsbsm') == 'noticeall' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Notice') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.postsAll', ['type' => 'news']) }}"
                                  class="nav-link {{ session('lsbsm') == 'newsall' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All News') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.postsAll', ['type' => 'event']) }}"
                                  class="nav-link {{ session('lsbsm') == 'eventall' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Event') }}</p>
                              </a>
                          </li>

                          {{-- <li class="nav-item ">
                              <a href="{{ route('admin.postsAll', ['type' => 'seminer']) }}"
                                  class="nav-link {{ session('lsbsm') == 'seminerall' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Seminer') }}</p>
                              </a>
                          </li> --}}

                      </ul>
                  </li>


                  {{-- ./role --}}





                  {{-- Pages --}}
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'pages' ? ' menu-open ' : '' }}">
                      <a href="{{ route('admin.pagesAll') }}" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Pages') }}

                          </p>
                      </a>
                  </li> --}}

                  <li class="nav-item has-treeview {{ session('lsbm') == 'page' ? ' menu-open ' : '' }}">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Menu & Pages') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.newMenu') }}"
                                  class="nav-link {{ session('lsbsm') == 'newMenu' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('New Menu') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.allMenus') }}"
                                  class="nav-link {{ session('lsbsm') == 'allMenus' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Menus') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.pagesAll') }}"
                                  class="nav-link {{ session('lsbsm') == 'pages' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Pages') }}</p>
                              </a>
                          </li>

                      </ul>
                  </li>

                  {{-- Pages --}}


                  {{-- Company --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'company' ? ' menu-open ' : '' }}">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Company') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.companiesAll') }}"
                                  class="nav-link {{ session('lsbsm') == 'companiesAll' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Companies') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.companiesAll', ['status' => 'active']) }}"
                                  class="nav-link {{ session('lsbsm') == 'companiesAllactive' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Active Companies') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.companiesAll', ['status' => 'inactive']) }}"
                                  class="nav-link {{ session('lsbsm') == 'companiesAllinactive' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Inactive Companies') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.companiesAll', ['status' => 'pending']) }}"
                                  class="nav-link {{ session('lsbsm') == 'companiesAllpending' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Pending Companies') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.companyAddNew') }}"
                                  class="nav-link {{ session('lsbsm') == 'companyAddNew' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Create New Company') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- ./company --}}

                  {{-- Flight Schedule Start --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'flightSchedules' ? ' menu-open ' : '' }}">
                      <a href="#" class="nav-link ">
                          {{-- <i class="nav-icon far fa-circle nav-icon"></i> --}}
                          <i class="fa fa-plane  nav-icon" aria-hidden="true"></i>
                          <p>
                              {{ __('Flight Schedules') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.allFlightSchedules') }}"
                                  class="nav-link {{ session('lsbsm') == 'allSchedule' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Flight Schedule') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.addFlightSchedules') }}"
                                  class="nav-link {{ session('lsbsm') == 'addSchedule' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Add Flight Schedule') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- Flight Schedule End --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'airports' ? ' menu-open ' : '' }}">
                      <a href="" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Airports') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.allAirports') }}"
                                  class="nav-link {{ session('lsbsm') == 'allAirports' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Airports') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.createNewAirports') }}"
                                  class="nav-link {{ session('lsbsm') == 'createNewAirports' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Create New Airports') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- ./airports --}}

                  {{-- Airlines Company --}}
                  <li
                      class="nav-item has-treeview {{ session('lsbm') == 'allAirlineCompany' ? ' menu-open ' : '' }}">
                      <a href="" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Air Lines Company') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.allAirlineCompany') }}"
                                  class="nav-link {{ session('lsbsm') == 'airlinesCompanyAll' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Airlines Companies') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.createNewAirlineCompany') }}"
                                  class="nav-link {{ session('lsbsm') == 'createNewAirlineCompany' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Create New Company') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- ./company --}}

                  {{-- hotels --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'hotel' ? ' menu-open ' : '' }}">
                      <a href="" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('All Hotel') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.allHotel') }}"
                                  class="nav-link {{ session('lsbsm') == 'allHotel' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Hotel') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.addNewHotel') }}"
                                  class="nav-link {{ session('lsbsm') == 'addNewHotel' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Create New Hotel') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- ./hotels --}}

                  {{-- Top destinations --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'destination' ? ' menu-open ' : '' }}">
                      <a href="" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('All Destination') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.allDestination') }}"
                                  class="nav-link {{ session('lsbsm') == 'allDestination' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Destination') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.createNewDestination') }}"
                                  class="nav-link {{ session('lsbsm') == 'createNewDestination' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Create New Destination') }}</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  {{-- Contact part --}}


                  <li class="nav-item has-treeview {{ session('lsbm') == 'contact' ? ' menu-open ' : '' }}">
                      <a href="" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Contact Request') }} @if ($countUnseen)<span
                                      class="text-danger" style="font-weight: 600">({{ $countUnseen }})</span>
                              @endif
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.allContact') }}"
                                  class="nav-link {{ session('lsbsm') == 'allContact' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('All Contact Request') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.newContact') }}"
                                  class="nav-link {{ session('lsbsm') == 'newContact' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('New Contact Request') }} @if ($countUnseen)<span class="text-danger"
                                              style="font-weight: 600">({{ $countUnseen }})</span>
                                      @endif
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </li>



                  <li class="nav-item ">
                      <a href="{{ route('admin.orders') }}"
                          class="nav-link {{ session('lsbsm') == 'orders' ? ' active ' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>{{ __('Orders') }}</p>
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="{{ route('admin.agentOrders') }}"
                         class="nav-link {{ session('lsbsm') == 'agentorders' ? ' active ' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>{{ __('Agent Orders') }}</p>
                      </a>
                  </li>
                  <li class="nav-item ">
                      <a href="{{ route('admin.customerOrders') }}"
                         class="nav-link {{ session('lsbsm') == 'customer' ? ' active ' : '' }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>{{ __('Customer Orders') }}</p>
                      </a>
                  </li>
                  {{-- ./top destination --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'media' ? ' menu-open ' : '' }}">
                      <a href="{{ route('admin.mediaAll') }}" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Media') }}
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>
                      {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.mediaAll') }}" class="nav-link {{ session('lsbsm') == 'allMedia' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Media') }}</p>
                </a>
              </li>
            </ul> --}}
                  </li>
                  {{-- ./pages --}}

                  {{-- image gallery --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'imageGallery' ? ' menu-open ' : '' }}">
                      <a href="{{ route('admin.imageGallery') }}" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Image Gallery') }}
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>

                  </li>
                  {{-- ./image gallery --}}


                  {{-- Company --}}
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'company' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Company') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.companiesAll') }}" class="nav-link {{ session('lsbsm') == 'companiesAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Companies') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.companiesAll',['status' =>'active']) }}" class="nav-link {{ session('lsbsm') == 'companiesAllactive' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Active Companies') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.companiesAll',['status' =>'inactive']) }}" class="nav-link {{ session('lsbsm') == 'companiesAllinactive' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Inactive Companies') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.companyAddNew') }}" class="nav-link {{ session('lsbsm') == 'companyAddNew' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Company') }}</p>
                </a>
              </li>
            </ul>
          </li> --}}
                  {{-- ./company --}}

                  {{-- Membership Application --}}
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'membershipApplication' ? ' menu-open ' : '' }}">
            <a href="{{route('admin.membershipApplication')}}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Membership Applications') }}

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('admin.membershipApplication')}}" class="nav-link {{ session('lsbsm') == 'all' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Applications') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('admin.membershipApplication', 'pending')}}" class="nav-link {{ session('lsbsm') == 'pending' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Pending Applications') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('admin.membershipApplication', 'confirmed')}}" class="nav-link {{ session('lsbsm') == 'confirmed' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Confirmed Applications') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('admin.membershipApplication', 'canceled')}}" class="nav-link {{ session('lsbsm') == 'canceled' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Canceled Applications') }}</p>
                </a>
              </li>

            </ul>
          </li> --}}
                  {{-- ./membership Application --}}

                  {{-- subject --}}
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'subject' ? ' menu-open ' : '' }}">
            <a href="{{route('admin.allSubjects')}}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Subjects') }}

              </p>
            </a>
          </li> --}}
                  {{-- ./subject --}}

                  {{-- course --}}
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'course' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.allCourses') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Courses') }}

              </p>
            </a>

          </li> --}}
                  {{-- ./course --}}


                  {{-- package --}}
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'package' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.allPackages') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Packages') }}

              </p>
            </a>

          </li> --}}
                  {{-- ./package --}}

                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'contact' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.contactMessages') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Contact Messages') }}

              </p>
            </a>
          </li> --}}

                  {{-- order --}}
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'order' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.order', 'pending') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              @php
                  $pendingOrderCount = App\Model\Order::where('order_status', 'pending')->get()->count();
              @endphp
              <span>Orders </span>

              @if ($pendingOrderCount > 0)
              <span class="badge badge-info right">{{ $pendingOrderCount }}</span>
              @endif
              <p>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">  </span>
                </span>

              </p>
            </a>

          </li> --}}
                  {{-- ./order --}}

                  {{-- User --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'user' ? ' menu-open ' : '' }}">
                      <a href="{{ route('admin.usersAll') }}" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('User') }}
                              {{-- <i class="right fas fa-angle-left"></i> --}}
                          </p>
                      </a>

                      {{-- <ul class="nav nav-treeview">

              <li class="nav-item ">
                <a href="{{ route('admin.newUserCreate') }}" class="nav-link {{ session('lsbsm') == 'newUserCreate' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Add New User') }}</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{ route('admin.usersAll') }}" class="nav-link {{ session('lsbsm') == 'usersAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Users') }}</p>
                </a>
              </li>
            </ul> --}}
                  </li>
                  {{-- ./user --}}

                  {{-- role --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'role' ? ' menu-open ' : '' }}">
                      <a href="#" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Role') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">


                          <li class="nav-item ">
                              <a href="{{ route('admin.adminsAll') }}"
                                  class="nav-link {{ session('lsbsm') == 'adminsAll' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  {{-- <p>{{ __('All Admins/Coordinators') }}</p> --}}
                                  <p>{{ __('All Admins') }}</p>

                              </a>
                          </li>
                      </ul>
                  </li>

                  <li class="nav-item has-treeview {{ session('lsbm') == 'report' ? ' menu-open ' : '' }}">
                      <a href="" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Report') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.report', ['type' => 'company']) }}"
                                  class="nav-link {{ session('lsbsm') == 'companyReport' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Company Report') }}</p>
                              </a>
                          </li>

                          <li class="nav-item ">
                              <a href="{{ route('admin.report', ['type' => 'customer']) }}"
                                  class="nav-link {{ session('lsbsm') == 'customerReport' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Customer Report') }}</p>
                              </a>
                          </li>

                      </ul>
                  </li>

{{--                  Transection History --}}
                  <li class="nav-item has-treeview {{ session('lsbm') == 'transaction_histories' ? ' menu-open ' : '' }}">
                      <a href="" class="nav-link ">
                          <i class="nav-icon far fa-circle nav-icon"></i>
                          <p>
                              {{ __('Transaction') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item ">
                              <a href="{{ route('admin.transactionHistory',['type'=>'agent']) }}"
                                 class="nav-link {{ session('lsbsm') == 'agent' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Agent Transaction History') }}</p>
                              </a>
                          </li>
                          <li class="nav-item ">
                              <a href="{{ route('admin.transactionHistory',['type'=>'customer']) }}"
                                 class="nav-link {{ session('lsbsm') == 'customer' ? ' active ' : '' }}">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('Customer Transaction History') }}</p>
                              </a>
                          </li>

                      </ul>
                      <ul class="py-4"></ul>
                  </li>
                  {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'report' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.report', 'all') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Report') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.messages') }}"
                    class="nav-link {{ session('Messages') == 'Messages' ? ' active ' : '' }}">
                    <i class="far fa-comments nav-icon"></i>
                    <p>{{ __('Messages') }}</p>
                </a>
          </li> --}}

                  {{-- ./role --}}

              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
