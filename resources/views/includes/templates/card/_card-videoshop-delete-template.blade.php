<!-- Card   -->
<article class="card-cams cell small-6 medium-2" id="video{{ $model_video->id }}-{{ $model_video->model_id }}">
    <div class="wrapper-thumbnail-area">
        <div class="card-thumbnail">
            @php 
                $video_url = config('env_variables.upload_path') . $model_video->video_url
            @endphp
            <a href="/page-stream-model-product/video_id={{ $model_video->id }}/id={{ $model_video->model_id }}" title="Access {{ $model_video->name }} cam!">
                <video width="230" height="152" alt="Model {{ $model_video->name }}" >
                    <source src="{{ url($video_url) }}" type="video/mp4">
                </video>
                <!-- Use the class="deactivated" to apply GRAYSCALE FILTER when model is Offline. Example below.    -->
                <!--<img src="images/layout/model-sample.jpg" alt="Model name" class="deactivated" />-->
            </a>
        </div>
        <div class="top-card-options">
            <ul class="videoshop">
                <li>
                    <a id="{{ $model_video->id }}-{{ $model_video->model_id }}" path="{{ $model_video->video_url }}" onclick="deleteVideo(this.id)" title="Delete video">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 0C4.48578 0 0 4.48578 0 10C0 15.5142 4.48578 20 10 20C15.5142 20 20 15.5142 20 10C20 4.48578 15.5142 0 10 0Z" fill="#F44336"/>
                            <path d="M13.6824 12.5041C14.0082 12.8301 14.0082 13.3566 13.6824 13.6826C13.5199 13.8451 13.3066 13.9267 13.0931 13.9267C12.8798 13.9267 12.6665 13.8451 12.504 13.6826L9.99989 11.1783L7.49577 13.6826C7.33326 13.8451 7.11994 13.9267 6.90662 13.9267C6.69315 13.9267 6.47984 13.8451 6.31733 13.6826C5.99155 13.3566 5.99155 12.8301 6.31733 12.5041L8.8216 10L6.31733 7.49589C5.99155 7.16996 5.99155 6.64338 6.31733 6.31745C6.64326 5.99168 7.16984 5.99168 7.49577 6.31745L9.99989 8.82172L12.504 6.31745C12.8299 5.99168 13.3565 5.99168 13.6824 6.31745C14.0082 6.64338 14.0082 7.16996 13.6824 7.49589L11.1782 10L13.6824 12.5041Z" fill="#FAFAFA"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <section class="model-metadata videoshop">
        <header>
            <h1>
                <a href="/page-stream-model-product/video_id={{ $model_video->id }}/id={{ $model_video->model_id }}" title="Access {{ $model_video->name }} cam!">
                    {{ $model_video->video_title }}
                </a>
            </h1>
            <h2>
                {{ $model_video->name }}
            </h2>
        </header>
    </section>
</article>
<!-- //Card   -->
