<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">@lang('admin.sidebar.header')</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>@lang('admin.sidebar.user.title')</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('admin.users.index') }}"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.user.list')</a></li>
                <li><a href="{{ route('admin.users.create') }}"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.user.add')</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-files-o"></i> <span>@lang('admin.sidebar.category.title')</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('admin.parts.index') }}"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.category.list')</a></li>
                <li><a href="{{ route('admin.parts.create') }}"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.category.add')</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>@lang('admin.sidebar.test.title')</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('admin.tests.index') }}"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.test.list')</a></li>
                <li><a href="{{ route('admin.tests.create') }}"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.test.add')</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-asterisk"></i> <span>@lang('admin.sidebar.comment.title')</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="{{ route('admin.comments.index') }}"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.comment.list')</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-bomb"></i> <span>@lang('admin.sidebar.test_result.title')</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="#"><i class="fa fa-circle-o"></i> @lang('admin.sidebar.test_result.list')</a></li>
            </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>
