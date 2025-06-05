<div style="background-color: #003153;" id="kt_header" class="header align-items-stretch">
    <div class="container-xxl d-flex align-items-stretch justify-content-between">
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
            <a href="/">
                <img alt="Logo" src="{{ asset('asset/image/logo2.png') }}" class="h-20px h-lg-50px" />
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <div class="d-flex align-items-stretch" id="kt_header_nav">
                <div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu"
                    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true"
                    data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-white menu-state-title-dark menu-state-icon-primary menu-state-bullet-primary menu-arrow-dark fw-bold my-5 my-lg-0 align-items-stretch"
                        id="#kt_header_menu" data-kt-menu="true">

                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title dark">User</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div
                                class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                @if ( Auth::user()->yetki == 1)
                                    <div class="menu-item">
                                    <a class="menu-link py-3" href="/user/create">
                                        <span class="menu-title dark-title">Create User</span>
                                    </a>
                                </div>
                                @else

                                @endif
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/user">
                                        <span class="menu-title dark-title">All Users</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Inventory</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                @if ( Auth::user()->yetki == 1)
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/inventory-define/create">
                                        <span class="menu-title dark-title">Define Inventory</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/inventory/create">
                                        <span class="menu-title dark-title">Add Brand</span>
                                    </a>
                                </div>
                                @else

                                @endif

                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/inventory">
                                        <span class="menu-title dark-title">All Brands</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/inventory-define">
                                        <span class="menu-title dark-title">All Inventories</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Category</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                @if ( Auth::user()->yetki == 1)
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/category/create">
                                        <span class="menu-title dark-title">Add Category</span>
                                    </a>
                                </div>
                                @else

                                @endif

                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/category">
                                        <span class="menu-title dark-title">All Categories</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">Department</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                @if ( Auth::user()->yetki == 1)
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/team/create">
                                        <span class="menu-title dark-title">Add Department</span>
                                    </a>
                                </div>
                                @else

                                @endif

                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/team">
                                        <span class="menu-title dark-title">Departments</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">GSM System</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/gsm-assigned">
                                        <span class="menu-title dark-title">GSM Table</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/gsm-assigned/create">
                                        <span class="menu-title dark-title">Assign GSM to User</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            class="menu-item menu-lg-down-accordion me-lg-1">
                            <span class="menu-link py-3">
                                <span class="menu-title">GSM Packages and Content</span>
                                <span class="menu-arrow d-lg-none"></span>
                            </span>
                            <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/gsm-package">
                                        <span class="menu-title dark-title">GSM Packages</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link py-3" href="/gsm-package-content">
                                        <span class="menu-title dark-title">GSM Contents</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-30px symbol-md-50px" data-kt-menu-trigger="click"
                        data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <img src="{{ asset('asset/image/person.png') }}" alt="user" />
                    </div>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{ asset('asset/image/icon.png') }}" style="width: 100%"/>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bolder d-flex align-items-center fs-5">
                                        {{ Auth::user()->name }}
                                        <span
                                            class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Permission</span>
                                    </div>
                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{
                                        Auth::user()->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="separator my-2"></div>
                        <div class="menu-item px-5">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"
                                class="menu-link px-5">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
                    <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                        id="kt_header_menu_mobile_toggle">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
