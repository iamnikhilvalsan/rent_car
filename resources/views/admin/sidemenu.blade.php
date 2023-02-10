<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li
                @if(Route::current()->getName() === 'admin')
                    class="active"
                @endif>
                <a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
            </li>
            <li class="treeview
                @if(Route::current()->getName() === 'booking-requests' || Route::current()->getName() === 'confirmed-bookings' || Route::current()->getName() === 'completed-bookings' || Route::current()->getName() === 'rejected-bookings')
                    active
                @endif" >
                <a href="#" title="">
                    <i class="fa fa-calendar"></i> <span>Bookings</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li
                        @if(Route::current()->getName() === 'booking-requests')
                            class="active"
                        @endif>
                        <a href="{{ route('booking-requests') }}" title=""><i class="fa fa-circle-o"></i> Pending Bookings</a>
                    </li>
                    <li @if(Route::current()->getName() === 'confirmed-bookings')
                            class="active"
                        @endif>
                        <a href="{{ route('confirmed-bookings') }}" title=""><i class="fa fa-circle-o"></i> Confirmed Bookings</a>
                    </li>
                    <li @if(Route::current()->getName() === 'completed-bookings')
                            class="active"
                        @endif>
                        <a href="{{ route('completed-bookings') }}" title=""><i class="fa fa-circle-o"></i> Completed Bookings</a>
                    </li>
                    <li @if(Route::current()->getName() === 'rejected-bookings')
                            class="active"
                        @endif>
                        <a href="{{ route('rejected-bookings') }}" title=""><i class="fa fa-circle-o"></i> Rejected Bookings</a>
                    </li>
                </ul>
            </li>
            <li class="treeview
                @if(Route::current()->getName() === 'add-vehicles' || Route::current()->getName() === 'view-vehicles' || Route::current()->getName() === 'edit-vehicles')
                    active
                @endif" >
                <a href="#" title="">
                    <i class="fa fa-car"></i> <span>Manage Cars</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li
                        @if(Route::current()->getName() === 'add-vehicles')
                            class="active"
                        @endif>
                        <a href="{{ route('add-vehicles') }}" title=""><i class="fa fa-circle-o"></i> Add Vehicles</a>
                    </li>
                    <li @if(Route::current()->getName() === 'view-vehicles' || Route::current()->getName() === 'edit-vehicles')
                            class="active"
                        @endif>
                        <a href="{{ route('view-vehicles') }}" title=""><i class="fa fa-circle-o"></i> View Vehicles</a>
                    </li>
                </ul>
            </li><li
                @if(Route::current()->getName() === 'view-customers')
                    class="active"
                @endif>
                <a href="{{ route('view-customers') }}"><i class="fa fa-users"></i> <span>Customers</span></a>
            </li>
        </ul>
    </section>
</aside>