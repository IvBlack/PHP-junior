<li class="nav-item">
    <a class="nav-link"{{ request()->routeIs('Home')?'active':'' }} href="{{ route('Home') }}">Main</a>
</li>
<li class="nav-item">
    <a class="nav-link"href="/about">About us</a>
</li>
<li class="nav-item">
    <a class="nav-link" {{ request()->routeIs('news.index')?'active':'' }} href="{{route('news.index')}}">News</a>
</li>
<li class="nav-item">
    <a class="nav-link" {{ request()->routeIs('news.category.index')?'active':'' }} href="{{route('news.category.index')}}">Categories</a>
</li>
<li class="nav-item">
    <a class="nav-link" {{ request()->routeIs('admin.news.index') ?'active':''}} href="{{route('admin.news.index')}}">AdminBorder</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{route('vklogin')}}">VK login</a>
</li>
