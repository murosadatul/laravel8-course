{{-- exxtends adalah blade helper digunakan untuk menggunakan kode program lain sebagai kerangka --}}
@extends('layouts.app')

{{-- section adalah blade helper yang digunakan untuk mengisi yield yang sebelumnya di buat di layouts/app.blade --}}
{{-- start section content --}}
@section('content')
      <div class="col-md-8">
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
          Articles - Tags {{$tag_name->name}}
        </h3>
        {{-- showing articles --}}
        @forelse ($post as $key=>$item)
        <article class="blog-post">
            <h2 class="blog-post-title">{{$item->title}}</h2>
            <p class="blog-post-meta">{{ date("F d, Y", strtotime($item->created_at)) }} by <a href="#">{{$item->author}}</a></p>

            <image class="img img-circle" width="180" src="{{asset($item->image)}}"/>
            <p>{{$item->body}}</p>
            <a href="/post/view/{{$item->id}}" class="btn btn-sm btn-primary ">Readmore</a>
        </article>
          <hr>
        @empty
        <p><i class="fa fa-folder-open"></i> Data not found.</p>
        @endforelse
        {{-- information & pagination --}}
        @if(empty(!$post->firstItem()))
        <div class="row">
            <div class="col-6">
                Showing {{ $post->firstItem() }} to {{ $post->lastItem() }} from {{ $post->total() }}
            </div>
            <div class="col-6 d-flex justify-content-end">
                {!! $post->links() !!}
            </div>
        </div>
        @endif

      </div>
@endsection
{{-- end section content --}}
