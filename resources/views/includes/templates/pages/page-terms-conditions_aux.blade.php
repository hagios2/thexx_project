@if($type == "text")

    @foreach($content as $iItem)

        @if(!is_array($iItem))
            <p>{!! $iItem !!}</p>
        @else
            @include("includes.templates.pages.page-terms-conditions_aux", $iItem)
        @endif

    @endforeach

@elseif($type == "ul")

    <ul>
        @foreach($content as $iItem)

            @if(!is_array($iItem))
                <li>{!! $iItem !!}</li>
            @else
                @include("includes.templates.pages.page-terms-conditions_aux", $iItem)
            @endif

        @endforeach
    </ul>

@elseif($type == "ol")
    <ol>
        @foreach($content as $iItem)

            @if(!is_array($iItem))
                <li>{!! $iItem !!}</li>
            @else
                @include("includes.templates.pages.page-terms-conditions_aux", $iItem)
            @endif

        @endforeach
    </ol>
@endif
