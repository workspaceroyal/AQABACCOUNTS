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
                    <span class="text-muted"><i class="align-middle ri-record-circle-line font-size-14 text-success"></i>অনলাইন</span>
                </div>
        </a>
        </div>


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">মেনু</li>

                            <li>
                                <a href="{{ url('/user/dashboard') }}" class="waves-effect">
                                    <i class="ri-home-fill"></i>
                                    <span>ড্যাশবোর্ড</span>
                                </a>
                            </li>


        {{-- <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-hotel-fill"></i>
                <span>আয়ের উৎস</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('user.supplier.all') }}">আয়ের সকল উৎস</a></li>

            </ul>
        </li>


        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-shield-user-fill"></i>
                <span>ব্যয়ের খাত</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('user.customer.all') }}">ব্যয়ের সকল খাত</a></li>
                 <li><a href="{{ route('user.credit.customer') }}">অগ্রিম ব্যয়ের রিপোর্ট</a></li>

                 <li><a href="{{ route('user.paid.customer') }}">পরিশোধনীয় ব্যয়ের রিপোর্ট</a></li>
                  <li><a href="{{ route('user.customer.wise.report') }}">খাত ভিত্তিক ব্যয়ের রিপোর্ট</a></li>

            </ul>
        </li>


         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-delete-back-fill"></i>
                <span>মুদ্রা</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('user.unit.all') }}">মুদ্রা তালিকা</a></li>

            </ul>
        </li>

         <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-apps-2-fill"></i>
                <span>অর্থের খাত</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('unit.category.all') }}">অর্থের সকল খাত</a></li>

            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-reddit-fill"></i>
                <span>তহবিল খাত</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('user.product.all') }}">তহবিল খাত তালিকা</a></li>

            </ul>
        </li> --}}


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-oil-fill"></i>
                <span>অর্থ জমা</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('user.purchase.all') }}">সকল জমা</a></li>
                <li><a href="{{ route('user.purchase.pending') }}">জমা পেন্ডিং</a></li>
                <li><a href="{{ route('user.daily.purchase.report') }}">জমা রিপোর্ট</a></li>

            </ul>
        </li>


          <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ri-compass-2-fill"></i>
                <span>খরচ</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('user.invoice.all') }}">সকল খরচ</a></li>
                <li><a href="{{ route('user.invoice.pending.list') }}">খরচ পেন্ডিং</a></li>
                <li><a href="{{ route('user.print.invoice.list') }}">খরচ প্রিন্ট</a></li>
                <li><a href="{{ route('user.daily.invoice.report') }}">খরচ রিপোর্ট</a></li>

            </ul>
        </li>

                            {{-- <li class="menu-title">Stock</li> --}}

    {{-- <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="ri-gift-fill"></i>
            <span>তহবিল</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="{{ route('stock.report') }}">তহবিল রিপোর্ট</a></li>
            <li><a href="{{ route('stock.supplier.wise') }}">উৎস ও খাত ভিত্তিক তহবিল রিপোর্ট</a></li>

        </ul>
    </li> --}}

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
