<!-- Comment Entry    -->
<li class="comment_block" style="display: none;">
    <div class="comment-balloon">
        <p></p>
    </div>
    <div class="user-thumbnail-ratings">
        <img src="{{ url('images/layout/default_image.jpg') }}"/>
        <div class="stars-ratings"></div>
    </div>
</li>
@foreach ($commentData as $item) 
<li>
    <div class="comment-balloon">
        <p>
           {{$item->comment}}
        </p>
    </div>
    <div class="user-thumbnail-ratings">
        <img src="{{ url('images/layout/default_image.jpg') }}"/>
        <div class="stars-ratings">
            {{$item->user_name}}
        </div>
    </div>
</li>
@endforeach 
<!-- //Comment Entry    -->