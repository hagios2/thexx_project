<x-app-layout>
    <div id="main-area">
        <div id="wrapper-main-aside"> <!-- For responsiveness purposes  -->
            <main id="page-stream-model">
                <!-- Main content   -->
                <div class="inner-section">
                    <!-- Section header -->
                    <div id="wrapper-header">
                        @include('includes.templates.header._bar-head-model-profile')
                        <div id="view-model-profile">
                            <ul>
                                <li>
                                    @php
                                        $name = explode(' ', $model_info->name);
                                    @endphp
                                    <a href="#wrapper-model-profile" title="View First-name Profile" class="jumpLinks">
                                        View <span id="model-tag-name">{{ $name[0] }}</span> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#wrapper-model-video-gallery" title="More videos" class="jumpLinks">
                                        More videos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //Section header -->
                    <!-- Main stage -->
                    <div id="main-stage">
                        <div id="wrapper-stream-stage">
                            <div id="stream-stage">
                                @php
                                    if (isset(Auth::user()->id)) {
                                        $video_path = config('env_variables.upload_path') . $selected_video->video_url;
                                        $alt = '';
                                    }
                                    else {
                                        $video_path = '';
                                        $alt = 'Please login to see the video';
                                    }
                                @endphp
                                <div class="card-thumbnail video_player_wrapper">
                                    <div style="color: red;">{{ $alt }}</div>
                                    <video width="100%" style="height: inherit" controls alt="{{ $alt }}" controlsList="nodownload">
                                        <source src="{{ url($video_path) }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div id="wrapper-video-description">
                            <section id="video-description">
                                <header>
                                    <h1>
                                        Video description
                                    </h1>
                                </header>
                                <div class="wrapper-description show-more">
                                    <p>{{ $selected_video->video_description }}</p>
                                </div>
                            </section>
                            <div id="wrapper-info-box">
                                <div id="left-column">
                                    <ul>
                                        <li>
                                            @php
                                                $getID3 = new getID3;
                                                $file = $getID3->analyze(public_path() . '/uploads/' . $selected_video->video_url);
                                                $duration = $file['playtime_string'];
                                            @endphp
                                            <div class="title">
                                                Duration
                                            </div>
                                            <div class="data">
                                               {{ $duration }}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Quality
                                            </div>
                                            <div class="data">
                                                {{ $selected_video->video_quality }}
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div id="right-column">
                                    <div id="cost-tokens">
                                        <span class="data-injection">{{ $selected_video->price_tier }}</span> Tokens
                                    </div>
                                </div>
                            </div>
                            <div id="cta-download">
                                @if ($vip_status != '1') 
                                <!-- if not vip -->
                                <a title="Download video" data-open="modal-download" aria-controls="modal-download" data-token="{{ $selected_video->price_tier }}" data-model="{{ $selected_video->model_id }}" data-video="{{ $selected_video->id }}" onclick="downloadVideo(this)">
                                    Download video
                                </a>
                                @else
                                <a title="Download video" href="{{ $video_path }}">
                                    Download video
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Main stage -->
                    @include('includes.templates.model._model-profile')
                    @include('includes.templates.model._model-video-gallery')
                    <!-- Comments  -->
                    <section id="model-comments-ratings" class="wrapper-model-profile-sections">
                        <header>
                            <h1>
                                Comments & Ratings
                            </h1>
                        </header>
                        <div class="comments-list">
                            <ul>
                                @include('includes._comment-entry')  
                            </ul>
                            <!-- Add new comment    -->
                            <section id="add-new-comment">
                                <header>
                                    <h1>
                                        <svg height="682pt" viewBox="-21 -47 682.66669 682" width="682pt" xmlns="http://www.w3.org/2000/svg"><path d="m552.011719-1.332031h-464.023438c-48.515625 0-87.988281 39.464843-87.988281 87.988281v283.972656c0 48.414063 39.300781 87.816406 87.675781 87.988282v128.863281l185.191407-128.863281h279.144531c48.515625 0 87.988281-39.472657 87.988281-87.988282v-283.972656c0-48.523438-39.472656-87.988281-87.988281-87.988281zm50.488281 371.960937c0 27.835938-22.648438 50.488282-50.488281 50.488282h-290.910157l-135.925781 94.585937v-94.585937h-37.1875c-27.839843 0-50.488281-22.652344-50.488281-50.488282v-283.972656c0-27.84375 22.648438-50.488281 50.488281-50.488281h464.023438c27.839843 0 50.488281 22.644531 50.488281 50.488281zm0 0"/><path d="m171.292969 131.171875h297.414062v37.5h-297.414062zm0 0"/><path d="m171.292969 211.171875h297.414062v37.5h-297.414062zm0 0"/><path d="m171.292969 291.171875h297.414062v37.5h-297.414062zm0 0"/></svg>
                                        Add comment below
                                    </h1>
                                </header>
                                <div class="comments-widget">
                                    <p>Insert the Comments Widget here.</p>
                                    <form>
                                        @csrf
                                        <textarea id="live_Model_Comment" rows="5" placeholder="Describe yourself here..." value=""></textarea>
                                        <button style="padding:10px 30px ;background-color:#05BE70; border-radius:30px; color: white" type="button" onclick='liveModelComment("<?php echo $model_info->user_id; ?>","video_shop")' title="Save changes">
                                            Send
                                        </button>
                                    </form>
                                </div>
                            </section>
                            <!-- //Add new comment    -->
                        </div>
                    </section>

                    @include('includes.templates.banners._banners-size-small-bar')
                </div>
            </main>
        </div>
    </div>
    @include('includes.templates.modals.download_video')
</x-app-layout>
