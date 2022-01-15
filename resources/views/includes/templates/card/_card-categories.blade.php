<!-- Card   -->
<article class="card-cams cell small-6 medium-3 large-2">
    <div class="wrapper-thumbnail-area">
        <div class="card-thumbnail">
            @php 
                $video_url = config('env_variables.upload_path') . $video->video_url
            @endphp
            <a href="/page-stream-model-product/video_id={{ $video->id }}/id={{ $video->model_id }}" title="Access {{ $video->name }} cam!">
                <video width="230" height="152" alt="Model {{ $video->name }}" >
                    <source src="{{ url($video_url) }}" type="video/mp4">
                </video>
            </a>
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
