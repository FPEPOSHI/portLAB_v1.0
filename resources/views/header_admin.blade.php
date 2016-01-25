<header class="main-header">
    <nav class="navbar navbar-static-top" >
        <div class="container">
            <div class="navbar-header">
                {{--<a href="{!! URL::route("home") !!}" class="navbar-brand"><b>port</b>LAB</a>--}}
            </div>
        <!-- Sidebar toggle button-->
        {{--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
        {{--</a>--}}
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{--<div class="navbar-form navbar-left" role="search">--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="form-control" id="navbar-search-input" placeholder="Search">--}}
                    {{--</div>--}}
                {{--</div>--}}

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{!! asset('uploads/no_img.jpg') !!}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">Welcome Admin</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            {{--<img src="{!! asset('uploads/no_img.png'!!}" class="img-circle" alt="User Image" >--}}
                            <p>
                               Admin
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{!! URL::route('logout') !!}" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        </div>
    </nav>
</header>