<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                        <div class=" image">
                            <img
                                    src="{{ isset(auth()->user()->image[0]) ? auth()->user()->image[0]->url : url('admin//assets/images/default/noCustomer.svg')  }}"
                                    class="img-circle user-img-circle"
                                    alt="User Image"/>
                        </div>


                    </div>
                    <div class="profile-usertitle">
                        <div
                                class="sidebar-userpic-name"> {{ isset($currentUser) ?  $currentUser->name : "" }} {{ isset($currentUser) ? $currentUser->family : ""  }}</div>


                    </div>
                </li>

                {{-- start dashboard --}}
                <li>
                    <a href="{{ route('panel.dashboard.index')  }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>داشبورد</span>
                    </a>
                </li>
                {{-- end dashboard --}}


                <li>
                    <a href="{{ route('site.index')  }}">
                        <i class="fas fa-globe"></i>
                        <span>بازگشت به سایت</span>
                    </a>
                </li>


                @can('panel.profile.index')
                    {{-- start profile --}}
                    <li class="">
                        <a href="{{ route('panel.profile.index') }}">
                            <i class="fas fa-user-plus"></i>
                            <span> پروفایل من </span>
                        </a>
                    </li>
                    {{-- end profile --}}
                @endcan


                @if(
                 \Illuminate\Support\Facades\Gate::check('panel.users.index') ||
                  \Illuminate\Support\Facades\Gate::check('panel.role.index') ||
                 \Illuminate\Support\Facades\Gate::check('panel.permission.index')
                )
                    {{-- start users --}}
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="fas fa-users"></i>
                            <span> کاربران </span>
                        </a>
                        <ul class="ml-menu">
                            @can('panel.users.index')
                                <li>
                                    <a href="{{ route('panel.users.index') }}">
                                        <span> فهرست کاربران </span>
                                    </a>
                                </li>
                            @endcan
                            @can('panel.role.index')
                                <li>
                                    <a href="{{ route('panel.role.index') }}">
                                        <span> فهرست نقش های کاربری </span>
                                    </a>
                                </li>
                            @endcan
                            @can('panel.permission.index')
                                <li>
                                    <a href="{{ route('panel.permission.index') }}">
                                        <span> فهرست سطوح دسترسی </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>

                    </li>
                    {{-- end users --}}
                @endif




                @can('panel.category.index')
                    {{-- start category --}}
                    <li>
                        <a href=" {{ route('panel.category.index')  }} ">
                            <i class="fa fa-list"></i>
                            <span> دسته بندی ها </span>
                        </a>
                    </li>
                    {{-- end category --}}
                @endcan

                @if(
                \Illuminate\Support\Facades\Gate::check('panel.product.index') ||
                \Illuminate\Support\Facades\Gate::check('panel.brand.index')
                           )
                    {{-- start digital-product --}}
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="fas fa-archive"></i>
                            <span> محصولات  </span>
                        </a>
                        <ul class="ml-menu">
                            @can('panel.product.index')
                                <li>
                                    <a href="{{ route('panel.product.index') }}">
                                        <span>فهرست محصولات</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>

                    </li>
                    {{-- end digital-product --}}
                @endif



                @if(\Illuminate\Support\Facades\Gate::check('panel.order.index') ||
           \Illuminate\Support\Facades\Gate::check('panel.order.sending')
           )
                    {{-- start attribute --}}
                    <li>
                        <a href="#" onClick="return false;" class="menu-toggle">
                            <i class="fas fa-euro-sign"></i>
                            <span> سفارش ها </span>
                        </a>
                        <ul class="ml-menu">
                            @can('panel.order.index')
                                <li>
                                    <a href="{{ route('panel.order.index') }}">
                                        <span>فهرست سفارشات</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>

                    </li>
                    {{-- end attribute --}}
                @endif



                @can('panel.comments.index')
                    {{-- start comments --}}
                    <li>
                        <a href=" {{ route('panel.comments.index')  }} ">
                            <i class="fas fa-comment"></i>
                            <span>دیدگاه ها</span>
                            <span
                                    class="badge badge-danger side-nav-badge">{{ isset($countComment) ? $countComment : 0 }}</span>
                        </a>
                    </li>
                    {{-- end comments --}}
                @endcan


            </ul>


        </div>
    </aside>


</div>
