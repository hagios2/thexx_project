<!-- website tag cloud -->
<ul id="tag-cloud">
    @php
        $count = 0;
    @endphp
    @foreach($model_tags as $tag)
        @if ($count < 5)
        <li>
            <a href="#" title="{{ $tag }}">
                #{{ $tag }}
            </a>
        </li>
        @else
            @break
        @endif
        @php
            $count = $count + 1;
        @endphp
    @endforeach
</ul>
<!-- //website tag cloud -->
