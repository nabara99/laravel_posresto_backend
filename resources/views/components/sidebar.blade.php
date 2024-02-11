<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Resto App</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ str_contains(Route::currentRouteName(), 'dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fa-solid fa-gauge"></i></i><span>Dashboard</span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'user') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link"><i
                        class="fa-solid fa-users"></i><span>Pengguna</span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'product') ? 'active' : '' }}">
                <a href="{{ route('product.index') }}" class="nav-link"><i
                        class="fas fa-th-large"></i><span>Produk</span></a>
            </li>
            <li class="{{ str_contains(Route::currentRouteName(), 'category') ? 'active' : '' }}">
                <a href="{{ route('category.index') }}" class="nav-link"><i class="fa-solid fa-bars"></i></i><span>Kategori</span></a>
            </li>
        </ul>

    </aside>
    <script>
        window.setTimeout(function() {
            $('.alert').fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>
</div>
