<!-- Model Profile  -->
<section id="wrapper-model-profile" class="wrapper-model-profile-sections">
    <header>
        <h1>
            Model Profile
        </h1>
    </header>
    @php
        if (isset($model_info)) {
            $modelData = $model_info;
        }
    @endphp
    <div id="wrapper-model-contents">
        <div class="grid-x">
            <div id="model-info" class="cell small-12 medium-12 large-9">
                <div id="inner-contents-stage" class="grid-x">
                    @php
                        if (empty($image_path)) {
                            $image_path[0] = '/images/layout/default_image.jpg';
                        }
                    @endphp
                    <div id="model-thumbnail" class="cell small-12 medium-3">
                        <a href="{{ url($image_path[0]) }}" title="View photo" data-fancybox="gallery">
                            <img src="{{ url($image_path[0]) }}" alt="{{ $modelData->name }}" />
                        </a>
                    </div>
                    <div id="model-content" class="cell small-12 medium-9">
                        <ul>
                            <li>
                                <span class="title-info">
                                    Real name:
                                </span>
                                <span class="text-response">
                                {{ $modelData->name }} 
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Followers:
                                </span>
                                <span class="text-response">
                                    
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Birth date:
                                </span>
                                <span class="text-response">
                                {{  $modelData->birthday }}
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Age:
                                </span>
                                <span class="text-response">
                                    
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Chest size:
                                </span>
                                <span class="text-response">
                                    {{  $modelData->chest_size }} 
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Height:
                                </span>
                                <span class="text-response">
                                    
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Weight:
                                </span>
                                <span class="text-response">
                                    
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Show size:
                                </span>
                                <span class="text-response">
                                    
                                </span>
                            </li>
                        </ul>
                        <ul>
                            <li class="multiple-items"><!-- Add this class to when there's multiple items selection in the backoffice to display as list items  -->
                                <span class="title-info">
                                    Interested in:
                                </span>
                                <span class="text-response">
                                    <ul>
                                        <!-- <li>
                                            
                                        </li>
                                        <li>
                                            
                                        </li>
                                        <li>
                                            
                                        </li> -->
                                    </ul>
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Location:
                                </span>
                                <span class="text-response">
                                {{  $modelData->country }}
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Last broadcast: 
                                </span>
                                <span class="text-response">
                                      @if (isset($last_broadcast[0]->created_at))
                                        {{$last_broadcast[0]->created_at}}
                                    @endif
                                    @if (!isset($last_broadcast[0]->created_at))
                                    {{ "New Model" }}
                                @endif
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Language(s):
                                </span>
                                <span class="text-response">
                                {{  $modelData->languages }}
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Body type:
                                </span>
                                <span class="text-response">
                                {{  $modelData->figure }}
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Smoke/Drink:
                                </span>
                                <span class="text-response">
                                    
                                </span>
                            </li>
                            <li>
                                <span class="title-info">
                                    Body decorations:
                                </span>
                                <span class="text-response">
                                    
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="model-gallery" class="cell small-12 medium-12 large-3">
                <!-- for the gallery interaction I'm using here the Fancybox 3 Plugin https://www.fancyapps.com/fancybox/3/ -->
                <ul class="grid-x">
                    @foreach ($image_path as $image)
                    <li class="cell small-3">
                        <a href="{{ $image }}" title="View photo" data-fancybox="gallery">
                            <img src="{{ $image }}" alt="{{ $modelData->name }}" />
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</section>

<!-- //Model Profile  -->
