<!-- Card   -->
@foreach($modelData as $model_data)

{{-- @php
    echo $model_data->video_id;
@endphp --}}
   @php
   if(!isset($model_data->video_id))
   {
       $id='';
   }
   else {
    $id=$model_data->video_id; 
   }
      
  @endphp
    <article id="image-{{ $model_data->user_id }}{{ $id }}"  class="card-cams cell small-6 medium-3 large-2">
        <div class="wrapper-thumbnail-area">
            <div class="card-thumbnail">
                @php
                    $url = '';
                    if ((isset($model_data->video_type) && $model_data->video_type == 'live') || $model_data->active_status == '1') {
                        
                        $url = '/page-stream-model/id=' . $model_data->user_id;
                    }
                    elseif ($model_data->video_type == 'no_live') {
                        $url = '/page-stream-model-product/video_id=' . $model_data->video_id . '/id=' . $model_data->user_id;
                    }
                @endphp
                <a href="{{ $url }}" title="Access {{ $model_data->camera_man_name }}">

                    <img src="{{ url('uploads/Live_Video_Screenshots/'.$model_data->cover_img_url) }}" alt="{{ $model_data->name }}" />

                    <!-- Use the class="deactivated" to apply GRAYSCALE FILTER when model is Offline. Example below.    -->
                    <!--<img src="mages/layout/model-sample.jpg" alt="Model name" class="deactivated" />-->
                </a>
            </div>
            <div class="top-card-options">
                <ul>
                    <li>
                        @php
      
                    if (isset($newmodelDatas[$model_data->user_id])) {
                        $check='1';
                    }
                    else {
                        $check='0';
                    }
                
                @endphp
                        @if ($check=='1')
                       
                          <img src="{{ url('images/icons/record-option-newmodel.svg') }}" alt="New model" />
                        @endif
                        @if ($check=='0')
                       
                      
                        @endif
                        {{-- @if (Session::has('new_model'))
                        <img src="{{ url('images/icons/record-option-newmodel.svg') }}" alt="New model" />
                        @endif --}}
                    </li>
                    <li>
                        @php
                             
                                if(!isset($model_data->video_type))
                                {
                                    $model_type='';
                                }
                                else {
                                    $model_type=$model_data->video_type;
                                }
                                    
                            
                            $video_type = $model_type;
                            $video_id = '';
                            if ($video_type == '' || $model_type == 'live') {
                                $video_type = 'live';
                            }
                            elseif ($video_type == 'no_live') {
                                $video_id = $model_data->video_id;
                                $video_type = 'no_live';
                            }
                            if (isset($favorite_model[$model_data->user_id]) || $favorite_page == 'true') {
                                $status = 1;
                                $icon = 'full';
                            }
                            else {
                                $status = 0;
                                $icon = 'outline';
                            }
                        @endphp
                        <div class="model_favorite" video_id="{{ $video_id }}" id="model-{{ $video_type }}-{{ $model_data->user_id }}" status="{{ $status }}"  page="{{ $favorite_page }}"    >
                            <img src="/images/icons/heart-{{ $icon }}.svg" alt="Add to Favorites" />
                        </div>
                    </li>
                </ul>
            </div>
            @php
            if ($video_type == 'live') {
            @endphp
            <div class="footer-card-options">
                <ul>
                    <li>
                        <img src="{{ url('images/icons/record-option-live.svg') }}" alt="LIVE RIGHT NOW!" />
                    </li>
                </ul>
            </div>
            @php
            }
            @endphp
        </div>

        @if ((isset($model_data->video_type) && $model_data->video_type == 'live') || $model_data->active_status == '1')
            <section class="model-metadata">
                <header>
                    <h1>
                        <a href="{{ $url }}" title="Access {{ $model_data->camera_man_name }}">
                            {{ $model_data->camera_man_name }}
                        </a>
                    </h1>
                </header>
                @if ($favorite_page == 'false')
                    @include('includes.templates.ratings._ratings')
                @else
                    <ul style="padding: 10px;"></ul>
                @endif
            </section>
        @else
            <section class="model-metadata videoshop">
                <header>
                    <h1>
                        <a href="{{ $url }}" title="Access {{ $model_data->name }} cam!">
                            {{ $model_data->video_title }}
                        </a>
                    </h1>
                    <h2>
                        {{ $model_data->name }}
                    </h2>
                </header>
            </section>
        @endif
    </article>
@endforeach
<!-- //Card -->
