<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->gravatar('168') }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! Auth::user()->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i>{!! Request::ip() !!}</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form hidden">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search for hotels..."/>
                <span class="input-group-btn">
                  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <ul class="sidebar-menu">
            <li @if(true) class="active hidden" @endif>
                <a href="{!! url('dashboard') !!}"><i class="fa fa-dashboard"></i><span> Dashboard</span></a>
            </li>
            <li class="header">My Projects</li>
            
            <li @if(Request::is('dashboard/posts')) class="active" @endif>
                <a href="{!! url('dashboard/posts') !!}"><i class="fa fa-book"></i><span> Posts</span></a>
            </li>
            
            <li @if(Request::is('dashboard/manage/pages')) class="active" @endif>
                <a href="{!! url('dashboard/manage/pages') !!}"><i class="fa fa-book"></i><span> Pages</span></a>
            </li>
            <li @if(Request::is('dashboard/manage/groupes')) class="active" @endif>
                <a href="{!! url('dashboard/manage/groupes') !!}"><i class="fa fa-book"></i><span> Groupes</span></a>
            </li>

        </ul>

        <ul class="sidebar-menu">
            <li class="header">Media Gallery</li>

            <li @if(Request::is('dashboard/images')) class="active" @endif>
                <a href="{!! url('dashboard/images') !!}"><i class="fa fa-book"></i><span> Image Creator</span></a>
            </li>
            <li @if(Request::is('dashboard/gifs')) class="active" @endif>
                <a href="{!! url('dashboard/gifs') !!}"><i class="fa fa-book"></i><span> Gif Creator</span></a>
            </li>
            <li @if(Request::is('dashboard/quizes')) class="active" @endif>
                <a href="{!! url('dashboard/quizes') !!}"><i class="fa fa-book"></i><span> Quiz Creator</span></a>
            </li>
        </ul>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">System Management</li>
            
            <li @if(Request::is('dashboard/users')) class="active" @endif>
                <a href="{!! url('dashboard/users') !!}"><i class="fa fa-users"></i><span> Users</span></a>
            </li>

            <li @if(Request::is('dashboard/settings')) class="active" @endif>
                <a href="{!! url('dashboard/settings') !!}"><i class="fa fa-cog"></i><span>  Site Settings</span></a>
            </li>
            <li @if(Request::is('dashboard/ips')) class="active" @endif>
                <a href="{!! url('dashboard/ips') !!}"><i class="fa fa-ban"></i><span>  Ban User</span></a>
            </li>
            <li @if(Request::is('dashboard/settings/maintenance')) class="active" @endif>
                <a href="{!! url('dashboard/settings/maintenance') !!}"><i class="fa fa-tasks"></i><span>  Maintenance</span></a>
            </li>
            <li @if(Request::is('dashboard/miscellaneous')) class="active" @endif>
                <a href="{!! url('dashboard/miscellaneous') !!}"><i class="fa fa-bolt"></i><span>  Miscellaneous</span></a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>