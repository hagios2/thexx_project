@foreach($favorite_model as $model_data)
    <div class="swiper-slide">
        <article class="card-cams" id="video-user-{{ $model_data->video_id }}">
            <div class="wrapper-thumbnail-area">
                <div class="card-thumbnail">
                    <a href="/page-stream-model/id={{ $model_data->user_id }}" title="Access {{ $model_data->camera_man_name }}">
                        <img src="{{ url('images/layout/model-sample.jpg') }}" alt="{{ $model_data->name }}"  />
                        <!-- Use the class="deactivated" to apply GRAYSCALE FILTER when model is Offline. Example below.    -->
                        <!--<img src="images/layout/model-sample.jpg" alt="Model name" class="deactivated" />-->
                    </a>
                </div>
                <div class="top-card-options">
                    <ul>
                        <li>
                            <img src="{{ url('images/icons/record-option-newmodel.svg') }}" alt="New model" />
                        </li>
                        <li>
                            <div class="model_favorite" video_id="{{ $model_data->video_id }}" id="model-no_live-{{ $model_data->user_id }}" status="1"  page="{{ $favorite_page }}">
                                <img src="{{ url('images/icons/heart-full.svg') }}" alt="Add to Favorites" />
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="footer-card-options">
                    <ul>
                        <li>
                            <img src="{{ url('images/icons/record-option-live.svg') }}" alt="LIVE RIGHT NOW!" />
                        </li>
                    </ul>
                </div>
            </div>
            <section class="model-metadata">
                <header>
                    <h1>
                        <a href="/page-stream-model/id={{ $model_data->model_id }}" title="Access {{ $model_data->camera_man_name }}">
                            {{ $model_data->camera_man_name }}
                        </a>
                    </h1>
                </header>
                @include('includes.templates.ratings._ratings')
            </section>
        </article>
    </div>
@endforeach
<!-- //Card   -->