<!-- Card   -->
<article class="card-cams cell small-6 medium-3 large-2">
    <div class="wrapper-thumbnail-area">
        <div class="card-thumbnail">
            <a href="/page-stream-model-product/video_id={{ $video->id }}/id={{ $video->model_id }}" title="Access {{ $video->name }} cam!">
                <video width="230" height="152" alt="Model {{ $video->name }}" >
                    <source src="{{ asset($video->final_video_url) }}" type="video/mp4">
                </video>
            </a>
        </div>
        <div class="top-card-options">
            <ul class="videoshop">
                <li>
                    @php
                        if (isset($favorite_models[$video->id]) || $favorite_page == 'true') {
                            $status = 1;
                            $icon = 'full';
                        }
                        else {
                            $status = 0;
                            $icon = 'outline';
                        }
                    @endphp
                    <div class="model_favorite" video_id="{{ $video->id }}" id="model-no_live-{{ $video->model_id }}" status="{{ $status }}"  page="{{ $favorite_page }}"    >
                        <img src="/images/icons/heart-{{ $icon }}.svg" alt="Add to Favorites" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <section class="model-metadata videoshop">
        <header>
            <h1>
                <a href="/page-stream-model-product/video_id={{ $video->id }}/id={{ $video->model_id }}" title="Access {{ $video->name }} cam!">
                    {{ $video->video_title }}
                </a>
            </h1>
            <h2>
                {{ $video->name }}
            </h2>
        </header>
    </section>
</article>
<!-- //Card   -->
