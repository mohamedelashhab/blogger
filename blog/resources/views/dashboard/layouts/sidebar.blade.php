        <div id="wrapper" class="toggled">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand"> <a href="#"> Blog </a> </li>
                    <li> <a href="#">Dashboard</a> </li>
                    <li> <a href="{{route('dashboard.users.index')}}">Users</a> </li>
                    <li> <a href="{{route('dashboard.posts.index')}}">Posts</a> </li>
                    <li> <a href="{{route('dashboard.pages.index')}}">Pages</a> </li>
                    <li style="color:white">Settings</li>
                    <li> <a href="{{route('dashboard.menus.index')}}">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Menus</a> </li>
                    <li> <a href="{{route('dashboard.settings.site')}}"> &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Edit Site Name</a> </li>
                    
                </ul>
            </div> <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    @yield('content')
                    @include('dashboard.layouts.error')
                </div>
            </div> <!-- /#page-content-wrapper -->
        </div> <!-- /#wrapper -->