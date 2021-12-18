<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        <a href="{{route('product.index')}}" class="brand-logo">
            <img alt="Logo" class="w-130px" src="{{asset('Back/assets/media/project-logos/6.png')}}"/>
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside Menu-->
    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <!--begin::Menu Nav-->
            <ul class="menu-nav">
                <li class="menu-item {{ Route::is('category.*') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('category.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-group"></i>
                        <span class="menu-text">Kategori</span>
                    </a>
                </li>
                <li class="menu-item " aria-haspopup="true">
                    <a href="{{ route('category.create') }}" class="menu-link">
                        <i class="menu-icon flaticon2-group"></i>
                        <span class="menu-text">Kategori Oluştur</span>
                    </a>
                </li>

                <li class="menu-item {{ Route::is('product.*') ? 'menu-item-open' : '' }}" aria-haspopup="true">
                    <a href="{{ route('product.index') }}" class="menu-link">
                        <i class="menu-icon flaticon2-shield"></i>
                        <span class="menu-text">Ürünler</span>
                    </a>
                </li>

            </ul>
            <!--end::Menu Nav-->
        </div>
        <!--end::Menu Container-->
    </div>
    <!--end::Aside Menu-->
</div>
