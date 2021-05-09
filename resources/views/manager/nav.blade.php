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
            </li>

            <li class="nav-item dropdown @if(\Request::segment(2)==='branches') open @endif">
                <a class="dropdown-toggle" href="{{ route('manager.branches')}}">
                    <span class="icon-holder">
                     <i class="las la-store-alt"></i>
                    </span>
                    <span class="title">Branches</span>
                    <span class="arrow">
                      <i class="lni lni-chevron-right"></i>
                    </span>
                </a>
            </li>

            <li class="nav-item dropdown @if(\Request::segment(2)==='couriers') open @endif">
                <a class="dropdown-toggle" href="javascript:void(0)" >
                    <span class="icon-holder">
                      <i class="las la-boxes"></i>
                    </span>
                    <span class="title">Couriers</span>
                    <span class="arrow">
                      <i class="lni lni-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu sub-down">
                    <li>
                        <a href="{{__(route('manager.couriers.index'))}}">Courier Index</a>
                        <a href="{{ route('manager.couriers.processing')}}">Processing Couriers</a>
                        <a href="{{ route('manager.couriers.picked') }}">Picked Couriers</a>
                        <a href="{{ route('manager.couriers.delivery') }}">Ready for Delivery</a>
                    </li>

                </ul>
            </li>


            <li class="nav-item dropdown @if(\Request::segment(2)==='employees') open @endif">
                <a class="dropdown-toggle" href="{{__(route('manager.employees'))}}">
                    <span class="icon-holder">
                     <i class="las la-users"></i>
                    </span>
                    <span class="title">Employees</span>
                    <span class="arrow">
                      <i class="lni lni-chevron-right"></i>
                    </span>
                </a>
            </li>

        </ul>
    </div>
</div>

