<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Supriadi Roadman</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SR</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="{{ route('home') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-pencil-alt"></i>
                    <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('posts.index') }}">List Post</a></li>
                    <li><a class="nav-link" href="{{ route('posts.trash') }}">Trash Post</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-archive"></i>
                    <span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('categories.index') }}">List Kategori</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i>
                    <span>Tags</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('tags.index') }}">List Tags</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
