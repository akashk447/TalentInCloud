<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none">
@include('admin.include.meta_header')
@include('admin.include.header')
@include('admin.include.side_bar')
<div class="main-content">
    @yield('main_content')
    @include('admin.helper_view.credit')
</div>
</div>
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top"><i class="ri-arrow-up-line"></i></button>
@if (request()->routeIs('admin_dashboard'))   
@include('admin.include.setting')
@endif
@include('admin.include.footer')
@yield('script')

</body>

</html>
