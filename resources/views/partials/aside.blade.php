<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">OVERVIEW</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li class="active"><a href="{{url('/home')}}"><i class="fa fa-circle-o"></i> Home</a></li>
        </ul>
    </li>

    <li class="treeview">

        <a href="#">
            <i class="fa fa-university"></i>
            <span>Manage Bank</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="{{ url('/admin/manage/banks') }}"><i class="fa fa fa-circle-o"></i> Banks</a>
        </li>

        </ul>
    </li>

    <li class="treeview">

        <a href="#">
            <i class="fa fa-cc"></i> <span>Manage Type of Account</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <li>
            <a href="{{ url('/admin/manage/account/types')}}"><i class="fa fa-circle-o"></i> Account Types</a>
            </li>
        </ul>
    </li>


    <li class="treeview">
        <a href="#">
            <i class="fa fa-money"></i>
            <span>Mnage Currencies</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{ url('/admin/manage/currency') }}"><i class="fa fa-circle-o"></i> Currencies</a>
            </li>

            <li>
                <a href="{{ url('/admin/manage/currency/create') }}"><i class="fa fa-circle-o"></i> Add Currency</a>
            </li>
        </ul>
    </li>

</ul>
</section>
<!-- /.sidebar -->
</aside>
