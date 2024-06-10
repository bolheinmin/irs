<aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh">
    <!-- Brand Logo -->
    <div class="text-center">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">IMS</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ Request::segment(1) === 'dashboard' ? 'custom-active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link" @if(Request::segment(1) === 'dashboard') style="color: #0a0e14"  @endif>
                    <i class="nav-icon far fa-address-book"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Internships -->
            @can('internship-list')
                <li class="nav-item {{ Request::segment(1) === 'internships' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Internships<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('internships.index') }}" class="nav-link {{ request()->route()->getName() === 'internships.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        @can('internship-create')
                            <li class="nav-item">
                                <a href="{{ route('internships.create') }}" class="nav-link {{ request()->route()->getName() === 'internships.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- End Internships -->

            <!-- Weekly Report -->
            @can('weekly-report-list')
                <li class="nav-item {{ Request::segment(1) === 'weekly-reports' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Weekly Reports<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('weekly-reports.index') }}" class="nav-link {{ request()->route()->getName() === 'weekly-reports.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        @can('weekly-report-create')
                            <li class="nav-item">
                                <a href="{{ route('weekly-reports.create') }}" class="nav-link {{ request()->route()->getName() === 'weekly-reports.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- End Weekly Report -->

            <!-- Intern Report -->
            @can('intern-report-list')
                <li class="nav-item {{ Request::segment(1) === 'intern-reports' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Intern Reports<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('intern-reports.index') }}" class="nav-link {{ request()->route()->getName() === 'intern-reports.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endcan
            <!-- End Weekly Report -->

            <!-- Interns -->
            @can('intern-list')
                <li class="nav-item {{ Request::segment(1) === 'interns' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Interns<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('interns.index') }}" class="nav-link {{ request()->route()->getName() === 'interns.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        @can('intern-create')
                            <li class="nav-item">
                                <a href="{{ route('interns.create') }}" class="nav-link {{ request()->route()->getName() === 'interns.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- End Interns -->

            <!-- Companies -->
            @can('company-list')
            <li class="nav-item {{ Request::segment(1) === 'companies' ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Companies<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('companies.index') }}" class="nav-link {{ request()->route()->getName() === 'companies.index' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Lists</p>
                        </a>
                    </li>
                    @can('company-create')
                    <li class="nav-item">
                        <a href="{{ route('companies.create') }}" class="nav-link {{ request()->route()->getName() === 'companies.create' ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Create</p>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endcan
            <!-- End Companies -->

            <!-- Company Supervisors -->
            @can('company-supervisor-list')
                <li class="nav-item {{ Request::segment(1) === 'company-supervisors' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Company Supervisors<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('company-supervisors.index') }}" class="nav-link {{ request()->route()->getName() === 'company-supervisors.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        @can('company-supervisor-create')
                            <li class="nav-item">
                                <a href="{{ route('company-supervisors.create') }}" class="nav-link {{ request()->route()->getName() === 'company-supervisors.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- End Company Supervisors -->

            <!-- Universities -->
            @can('university-list')
                <li class="nav-item {{ Request::segment(1) === 'universities' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Universities<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('universities.index') }}" class="nav-link {{ request()->route()->getName() === 'universities.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        @can('company-create')
                            <li class="nav-item">
                                <a href="{{ route('universities.create') }}" class="nav-link {{ request()->route()->getName() === 'universities.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- End Universities -->

            <!-- University Supervisors -->
            @can('university-supervisor-list')
                <li class="nav-item {{ Request::segment(1) === 'university-supervisor-supervisors' ? 'menu-is-opening menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>University Supervisors<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('university-supervisors.index') }}" class="nav-link {{ request()->route()->getName() === 'university-supervisors.index' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lists</p>
                            </a>
                        </li>
                        @can('university-supervisor-create')
                            <li class="nav-item">
                                <a href="{{ route('university-supervisors.create') }}" class="nav-link {{ request()->route()->getName() === 'university-supervisors.create' ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            <!-- End University Supervisors -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
