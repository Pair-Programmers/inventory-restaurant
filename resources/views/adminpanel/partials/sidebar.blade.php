<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle"
                            src="{{ asset('storage') }}/images/users/{{ Auth::guard('admin')->user()->profile_image }}"
                            style="width: 70px; height: 70px" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong
                                    class="font-bold">{{Auth::guard('admin')->user()->name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::guard('admin')->user()->type }}<b
                                    class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        {{-- <li><a href="profile.html">Profile</a></li>
                                <li><a href="contacts.html">Contacts</a></li> --}}
                        <li><a href="{{route('admin.login')}}">Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="{{route('admin.logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="logo-element">
                    BB
                </div>
            </li>
            <li>
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-th-large">
                    </i> <span class="nav-label">Dashboard
                    </span>
                </a>

            </li>



            <li>
                <a href="{{ route('admin.expense.index') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Expense</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.expense.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.expense.index') }}">List / Report</a></li>
                    <li><a href="{{ route('admin.expense.category.index') }}">Manage Category</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.product.index') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Product</span><span
                    class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.product.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.product.index') }}">List / Report</a></li>
                    <li><a href="{{ route('admin.product.category.index') }}">Manage Category</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.sale_invoice.index') }}"><i class="fa fa-envelope"></i> <span class="nav-label">Sale Invoice</span><span
                    class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.sale_invoice.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.sale_invoice.index') }}">List / Report</a></li>
                </ul>
            </li>



            <li>
                <a href="{{ route('admin.login') }}"><i class="fa fa-bar-chart-o"></i> <span
                        class="nav-label">Contact Us</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.login') }}">Registered List</a></li>
                    <li><a href="{{ route('admin.login') }}">Download CV</a></li>
                    <li><a href="{{ route('admin.login') }}">Uploaded List</a></li>
                    <li><a href="{{ route('admin.login') }}">Import Excel</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.login') }}"><i class="fa fa-bar-chart-o"></i> <span
                        class="nav-label">Users</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.login') }}">Registered List</a></li>
                    <li><a href="{{ route('admin.login') }}">Download CV</a></li>
                    <li><a href="{{ route('admin.login') }}">Uploaded List</a></li>
                    <li><a href="{{ route('admin.login') }}">Import Excel</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.login') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">News
                        Management</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.login') }}">Registered List</a></li>
                    <li><a href="{{ route('admin.login') }}">Download CV</a></li>
                    <li><a href="{{ route('admin.login') }}">Uploaded List</a></li>
                    <li><a href="{{ route('admin.login') }}">Import Excel</a></li>
                </ul>
            </li>
            <!-- =====FAQS===== -->
            <li>
                <a href="{{ route('admin.login') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">FAQ's</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.login') }}">Registered List</a></li>
                    <li><a href="{{ route('admin.login') }}">Download CV</a></li>
                    <li><a href="{{ route('admin.login') }}">Uploaded List</a></li>
                    <li><a href="{{ route('admin.login') }}">Import Excel</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.login') }}"><i class="fa fa-bar-chart-o"></i> <span
                        class="nav-label">Admins</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.login') }}">Registered List</a></li>
                    <li><a href="{{ route('admin.login') }}">Download CV</a></li>
                    <li><a href="{{ route('admin.login') }}">Uploaded List</a></li>
                    <li><a href="{{ route('admin.login') }}">Import Excel</a></li>
                </ul>
            </li>


        </ul>

    </div>
</nav>
