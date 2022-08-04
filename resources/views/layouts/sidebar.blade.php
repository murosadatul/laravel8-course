<div class="col-md-4">
    <div class="position-sticky border border-2" style="top: 2rem;">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="fst-italic">{{$about->title}}</h4>
        <p class="mb-0">{{$about->body}}</p>
      </div>

      <div class="p-4">
        <h4 class="fst-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($archive as $item)
            <li><a href="/post/archive/{{$item->created}}">{{$item->created}} ({{$item->total}})</a></li>
            @endforeach
        </ol>
      </div>

      <div class="p-4">
        <h4 class="fst-italic">Tags</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($tag as $item)
            <li><a class="{{ isset($tag_id) && $tag_id == $item->id ? 'link-secondary' : '' }}" href="/post/tags/{{$item->id}}">{{$item->name}}</a></li>
            @endforeach
        </ol>
      </div>

      <div class="p-4">
        <h4 class="fst-italic">Contact</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">LinkedIn</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>
    </div>
</div>
