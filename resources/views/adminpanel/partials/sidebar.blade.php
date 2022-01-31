<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img-circle"
                            src="{{ asset('adminpanel') }}/img/admin_profile.JPG"
                            style="width: 70px; height: 70px" />
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong
                                    class="font-bold">{{Auth::user()->name }}</strong>
                            </span> <span class="text-muted text-xs block">{{ Auth::user()->role }}<b
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
                <a href="{{ route('admin.rack.index') }}">
                    <i class="fa fa-cube"></i> <span class="nav-label">Racks</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.rack.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.rack.index') }}">List / Report</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('admin.book.index') }}">
                    <i class="fa fa-arrow-circle-up"></i> <span class="nav-label">Books</span><span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('admin.book.create') }}">Create</a></li>
                    <li><a href="{{ route('admin.book.index') }}">List / Report</a></li>
                </ul>
            </li>




        </ul>

    </div>
</nav>
