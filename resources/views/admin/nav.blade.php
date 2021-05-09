<div class="side-nav toggled">
    <div class="side-nav-inner">
        <ul class="side-nav-menu">
            <li class="side-nav-header">
                <span>Navigation</span>
            </li>

            <li class="nav-item dropdown @if(\Request::segment(2)==='dashboard') open @endif">
                <a href="{{ __(route('admin')) }}" class="dropdown-toggle">
                  <span class="icon-holder ">
                    <i class="lni lni-dashboard"></i>
                  </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="nav-item dropdown @if(\Request::segment(2)==='admins') open @endif">
                <a class="dropdown-toggle" href="{{__(route('admins.all'))}}">
                    <span class="icon-holder">
                      <i class="las la-users-cog"></i>
                    </span>
                    <span class="title">Admins</span>
                    <span class="arrow">
                      <i class="lni lni-chevron-right"></i>
                    </span>
                </a>
{{--                <ul class="dropdown-menu sub-down ">--}}
{{--                    <li >--}}
{{--                        <a href="#" class="d-flex justify-content-between">--}}
{{--                            <i class="lni lni-list"></i>Admin List--}}
{{--                        </a>--}}
{{--                        <a href="#" class="d-flex justify-content-between">--}}
{{--                            <i class="fas fa-user-plus"></i>Add New Admin--}}
{{--                        </a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
            </li>

            <li class="nav-item dropdown @if(\Request::segment(2)==='branches') open @endif">
                <a class="dropdown-toggle" href="{{ route('branches.index')}}">
                    <span class="icon-holder">
                     <i class="las la-store-alt"></i>
                    </span>
                    <span class="title">Branches</span>
                    <span class="arrow">
                      <i class="lni lni-chevron-right"></i>
                    </span>
                </a>
            </li>

            <li class="nav-item dropdown @if(\Request::segment(2)==='managers') open @endif">
                <a class="dropdown-toggle" href="{{ route('managers.index')  }}">
                    <span class="icon-holder">
                      <i class="las la-user-lock"></i>
                    </span>
                    <span class="title">Managers</span>
                    <span class="arrow">
                      <i class="lni lni-chevron-right"></i>
                    </span>
                </a>
            </li>


            <li class="nav-item dropdown @if(\Request::segment(2)==='employees') open @endif">
                <a class="dropdown-toggle" href="#">
                    <span class="icon-holder">
                     <i class="las la-users"></i>
                    </span>
                    <span class="title">Employees</span>
                    <span class="arrow">
                      <i class="lni lni-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu sub-down">
                    <li>
                        <a href="{{ route('employees.index')  }}">All Employees</a>
                        <a href="{{ route('employees.create') }}">Add Employee</a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>
