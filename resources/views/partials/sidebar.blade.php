@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            
            @can('expense_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-money"></i>
                    <span>@lang('quickadmin.expense-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('expense_category_access')
                    <li>
                        <a href="{{ route('admin.expense_categories.index') }}">
                            <i class="fa fa-list"></i>
                            <span>@lang('quickadmin.expense-category.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('income_category_access')
                    <li>
                        <a href="{{ route('admin.income_categories.index') }}">
                            <i class="fa fa-list"></i>
                            <span>@lang('quickadmin.income-category.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('income_access')
                    <li>
                        <a href="{{ route('admin.incomes.index') }}">
                            <i class="fa fa-arrow-circle-right"></i>
                            <span>@lang('quickadmin.income.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('expense_access')
                    <li>
                        <a href="{{ route('admin.expenses.index') }}">
                            <i class="fa fa-arrow-circle-left"></i>
                            <span>@lang('quickadmin.expense.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('monthly_report_access')
                    <li>
                        <a href="{{ route('admin.monthly_reports.index') }}">
                            <i class="fa fa-line-chart"></i>
                            <span>@lang('quickadmin.monthly-report.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

