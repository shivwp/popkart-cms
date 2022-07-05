<!--APP-SIDEBAR-->
<style type="text/css">
    .newss{
        background-color: rgb(53, 162, 255) !important;
        color: white !important;
    }
</style>
<div class="app-sidebar__overlay " data-toggle="sidebar"></div>

                <aside class="app-sidebar ">

                    <div class="side-header newss">

                         <img width="70%" src="{{ asset('assets/images/popkart.png') }}" alt="logo">

                        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto text-white" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->

                    </div>

                    <div class="app-sidebar__user ">

                        <div class="dropdown user-pro-body text-center">

                            <div class="user-pic ">

                                <img src="{{ asset('assets/images/icon.png') }}" alt="user-img" class="avatar-xl rounded-circle">

                            </div>

                            <div class="user-info ">

                                <h6 class=" mb-0 ">{{ ucfirst(Auth::user()->first_name) }}</h6>
                                <span class=" app-sidebar__user-name text-sm">{{ ucfirst(Auth::user()->roles->first()->title) }}</span>

                            </div>

                        </div>

                    </div>

                    <div class="sidebar-navs d-flex justify-content-center">

                        <ul class="nav  nav-pills-circle text-center">

                            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">

                                <a href="{{ route('dashboard.users.edit', Auth::id()) }}" class="nav-link text-center m-2">

                                    <i class="fe fe-settings "></i>

                                </a>

                            </li>

                            <!-- <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Chat">

                                <a class="nav-link text-center m-2">

                                    <i class="fe fe-mail"></i>

                                </a>

                            </li> -->

                            <!-- <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Followers">

                                <a class="nav-link text-center m-2">

                                    <i class="fe fe-user"></i>

                                </a>

                            </li> -->



           

                            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">

                                <a href="{{ route('logout') }}" class="nav-link text-center m-2"  onclick="event.preventDefault();

                                                     document.getElementById('logout-form').submit();">

                                    <i class="fe fe-power "></i>

                                </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                                        @csrf

                                    </form>

                            </li>

                        </ul>

                    </div>

                    <ul class="side-menu mt-3" >

                        

                        <li class="slide">

                            <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='home') }}"><i class="side-menu__icon  ti-home"></i><span class="side-menu__label ">Dashboard</span></a>

                          

                        @can('product_management')

                        <li class="slide">

                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon  fe fe-package"></i><span class="side-menu__label ">Items</span><i class="angle fa fa-angle-right "></i></a>

                            <ul class="slide-menu">

                                @can('product_access')

                                <li><a href="{{ route('dashboard.product.index') }}" class="slide-item ">All Item</a></li>

                                @endcan

                                @can('category_access')

                                <li><a href="{{ route('dashboard.category.index') }}" class="slide-item ">Category</a></li>

                                @endcan

                            </ul>

                        </li>

                        @endcan
                         <li>

                            <a class="side-menu__item " href="{{ route('dashboard.list.index') }}"><i class="side-menu__icon fe fe-list "></i><span class="side-menu__label">Grocery List</span></a>

                        </li>
                       <li>

                            <a class="side-menu__item " href="{{ route('dashboard.pages.index') }}"><i class="side-menu__icon fe fe-list "></i><span class="side-menu__label">Pages</span></a>

                        </li>

                         @can('gift_card_access')
                          <li class="slide">

                            <a class="side-menu__item" data-toggle="slide" href="{{ route('dashboard.gift-card.index') }}"><i class=" side-menu__icon icon icon-trophy"></i><span class="side-menu__label ">Rewards</span></a>

                        </li>
                         @endcan

                        @can('coupon_access')

                         <li>

                            <a class="side-menu__item" href="{{ route('dashboard.coupon.index') }}"><i class="side-menu__icon icon icon-present "></i><span class="side-menu__label ">Coupon</span></a>

                        </li>

                        @endcan
                         <li>

                              <a class="side-menu__item" href="{{ route('dashboard.healthtips.index') }}"><i class="side-menu__icon icon fe fe-heart "></i><span class="side-menu__label ">Health Notification</span></a>

                         </li>


                         @can('store_settings')
                            <li class="slide">

                            <a class="side-menu__item " data-toggle="slide" href="{{ route('dashboard.vendorsettings.index') }}"><i class="side-menu__icon fe fe-shopping-bag "></i><span class="side-menu__label ">Stores</span></a>


                        </li>
                         @endcan
                       
                        <li>

                            <a class="side-menu__item" href="{{ route('dashboard.pakage.index') }}"><i class="side-menu__icon icon icon-credit-card "></i><span class="side-menu__label ">Subcriptions</span></a>

                        </li>
                       

                         @can('user_management_access')

                           <li class="slide">

                                <a class="side-menu__item" data-toggle="slide" href="#"> <i class="side-menu__icon fe fe-user "></i><span class="side-menu__label ">Users Management</span><i class="angle fa fa-angle-right "></i></a>

                                <ul class="slide-menu">

                                    @can('role_access')

                                    <li><a href="{{ route('dashboard.roles.index') }}" class="slide-item ">User Roles</a></li>

                                     @endcan

                                     @can('permission_access')

                                    <li><a href="{{ route('dashboard.permissions.index') }}" class="slide-item ">Role Permissions</a></li>

                                     @endcan

                                     @can('user_access')

                                    <li><a href="{{ route('dashboard.users.index') }}" class="slide-item ">User</a></li>

                                     @endcan

                                </ul>

                           </li>

                         @endcan

                    

                          <li class="slide">

                            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fe fe-settings"></i><span class="side-menu__label"> Web Settings</span><i class="angle fa fa-angle-right"></i></a>

                            <ul class="slide-menu">

                                <li><a href="{{ route('dashboard.mail.index') }}" class="slide-item">Mail Template</a></li>

                                <li><a href="{{ route('dashboard.settings.index') }}" class="slide-item">Settings</a></li>

                            </ul>

                        </li>

                 

                      

                        </li>

                           

                    </ul>

                </aside>

<!--/APP-SIDEBAR-->

