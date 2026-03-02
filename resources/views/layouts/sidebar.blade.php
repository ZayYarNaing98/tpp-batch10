<nav id="sidebar">
    <p class="sidebar-heading">Main</p>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
        </li>
    </ul>

    <p class="sidebar-heading mt-2">Management</p>
    <ul class="nav flex-column">
        @can('productList')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <i class="bi bi-bag"></i> Products
                </a>
            </li>
        @endcan
        @can('categoryList')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}"
                    href="{{ route('categories.index') }}">
                    <i class="bi bi-tags"></i> Categories
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <i class="bi bi-people"></i> Users
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('articles*') ? 'active' : '' }}" href="/articles">
                <i class="bi bi-journal-text"></i> Articles
            </a>
        </li>
    </ul>

    <p class="sidebar-heading mt-2">Access Control</p>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                <i class="bi bi-shield-lock"></i> Roles
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">
                <i class="bi bi-key"></i> Permissions
            </a>
        </li>
    </ul>
</nav>
