 <div class="vertical-menu">

    <div data-simplebar class="h-100">

                    <!-- User details -->
        @php
        $id = Auth::user()->id;
        $adminData = App\Models\User::find($id);
        @endphp


        <div class="mt-3 text-center user-profile">

            <a href="{{ route('admin.profile') }}">

                <div>
                    <img class="avatar-md rounded-circle" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}"
                    alt="Header Avatar">
                </div>

                <div class="mt-3">
                    <h4 class="mb-1 font-size-16">{{ $adminData->name }}</h4>
                    <span class="text-muted"><i class="align-middle ri-record-circle-line font-size-14 text-success"></i>Online</span>
                </div>
        </a>
        </div>


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ url('/dashboard') }}" class="waves-effect">
                                    <i class="ri-home-fill"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-hotel-fill"></i>
                <span>Funding Source</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('supplier.all') }}">All Funding Source</a></li>

            </ul>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-shield-user-fill"></i>
                <span>Expense Sectors</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('customer.all') }}">All Expense Sector</a></li>
                 <li><a href="{{ route('credit.customer') }}">Advance Expense Report</a></li>

                 <li><a href="{{ route('paid.customer') }}">Payable Expense Report</a></li>
                  <li><a href="{{ route('customer.wise.report') }}">Expense Sector Wise Report</a></li>

            </ul>
        </li>


         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-delete-back-fill"></i>
                <span>Currencies</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('unit.all') }}">Currency List</a></li>

            </ul>
        </li>

         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-apps-2-fill"></i>
                <span>Fund Sectors</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('category.all') }}">All Fund Sector</a></li>

            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-reddit-fill"></i>
                <span>Months & Years</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('product.all') }}">Month & Year List</a></li>

            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-oil-fill"></i>
                <span>Deposit Funds</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('purchase.all') }}">All Deposit</a></li>
                <li><a href="{{ route('purchase.pending') }}">Pending Deposit</a></li>
                <li><a href="{{ route('daily.purchase.report') }}">Daily Deposit Report</a></li>

            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-compass-2-fill"></i>
                <span>Expenses</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('invoice.all') }}">All Expense</a></li>
                <li><a href="{{ route('invoice.pending.list') }}">Expense Pending</a></li>
                <li><a href="{{ route('print.invoice.list') }}">Print All Expense</a></li>
                  <li><a href="{{ route('daily.invoice.report') }}">Daily Expense Report</a></li>

            </ul>
        </li>

                            {{-- <li class="menu-title">Stock</li> --}}

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-gift-fill"></i>
            <span>Funds</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('stock.report') }}">Funds Report</a></li>
            <li><a href="{{ route('stock.supplier.wise') }}">Funding Source & Sector Wise Report</a></li>

        </ul>
    </li>

                            {{-- <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Support</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li> --}}






                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
