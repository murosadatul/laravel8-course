<div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <a class="link-secondary" href="#">Subscribe</a>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="/">Portal Berita</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a class="link-secondary" href="#" aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
          </a>
          <a class="btn btn-sm btn-outline-secondary" href="/register">Register</a>&nbsp;
          <a class="btn btn-sm btn-outline-primary" href="/login">Login</a>

        </div>
      </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
      <nav class="nav d-flex ">
        <a class="p-2 {{ empty($active_navbar) ? 'link-secondary' : '' }}" href="/"><i class="fa fa-home"></i> Home</a>
        {{-- tampilkan kategori --}}
        @foreach ($category as $item)
            <a class="p-2 {{ $active_navbar == $item->id ? 'link-secondary' : '' }} " href="/post/categories/{{$item->id}}">{{$item->name}}</a>
        @endforeach
      </nav>
    </div>
</div>
