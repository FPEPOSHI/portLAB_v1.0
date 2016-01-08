<header class="main-header">
    <!-- Logo -->
    {{--*/$image = "uploads/no_img.png" /*--}}
    @if(!empty($details_header[0]->image))
        {{--*/$image = $details_header[0]->image /*--}}
    @else
        {{--*/ $image = 'no_img.png' /*--}}
    @endif


    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" >
        <div class="container">
            <div class="navbar-header">
                <a href="{!! URL::route("home") !!}" class="navbar-brand"><b>port</b>LAB</a>
            </div>
        <!-- Sidebar toggle button-->
        {{--<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
        {{--</a>--}}
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                {{--<form class="navbar-form navbar-left" role="search">--}}
                    {{--<div class="form-group">--}}
                        {{--<input type="text" class="form-control" id="navbar-search-input" placeholder="Search">--}}
                    {{--</div>--}}
                {{--</form>--}}
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog fa-fw"></i>

                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Settings</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#" id="inf_up">
                                        <i class="fa fa-key fa-fw"></i>General Account Settings

                                    </a>
                                    <a href="#" id="pass_up">
                                        <i class="fa fa-key fa-fw"></i>Passsword

                                    </a>

                                </li><!-- end notification -->
                            </ul>
                        </li>

                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks Menu -->
                <li class="dropdown tasks-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9 tasks</li>
                        <li>
                            <!-- Inner menu: contains the tasks -->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <!-- Task title and progress text -->
                                        <h3>
                                            Design some buttons
                                            <small class="pull-right">20%</small>
                                        </h3>
                                        <!-- The progress bar -->
                                        <div class="progress xs">
                                            <!-- Change the css width attribute to simulate progress -->
                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li><!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{!! asset('uploads/'.$details_header[0]->photo) !!}" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">Welcome {!! $details_header[0]->name !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{!! asset('uploads/'.$details_header[0]->photo) !!}" class="img-circle" alt="User Image" />
                            <p>
                                {!! $details_header[0]->name !!}
                                <small>{!! $details_header[0]->email !!}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        {{--<li class="user-body">--}}
                            {{--<div class="col-xs-4 text-center">--}}
                                {{--<a href="#">Profile</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 text-center">--}}
                                {{--<a href="#">Sales</a>--}}
                            {{--</div>--}}
                            {{--<div class="col-xs-4 text-center">--}}
                                {{--<a href="#">Friends</a>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{!! URL::route("profile") !!}" class="btn btn-default btn-flat">Profile</a>
                            </div>

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