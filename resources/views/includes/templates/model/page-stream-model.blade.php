<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>

<x-app-layout>
    <div id="main-area">
        <div id="wrapper-main-aside"> <!-- For responsiveness purposes  -->
            <main id="page-stream-model">

            <!--@if(Auth::check())-->
            <!--<input indentity="user" id="auth" username="{{Auth::user()->name}}" auth-id="{{ Auth::user()->id }}" type="hidden" />-->


            <!--@endif-->


                @if(Auth::check())
                    <input indentity="user" id="auth" username="{{Auth::user()->name}}" auth-id="{{ Auth::user()->id }}" type="hidden"/>
                @else
                    <input indentity="user" id="auth" username="" auth-id="" type="hidden"/>

                @endif



                <input id="model" model-id="{{ $chat_data['friendInfo']->id }}" type="hidden"/>

                <!-- Main content   -->
                <div class="inner-section">
                    <!-- Section header -->
                    <div id="wrapper-header">
                        @include('includes.templates.header._bar-head-model-profile')
                        <div id="view-model-profile">
                            <ul>
                                <li>
                                    @php
                                        $name = explode(' ', $modelData->name);
                                    @endphp
                                    <a href="#wrapper-model-profile" title="View First-name Profile" class="jumpLinks">
                                        View <span id="model-tag-name">{{ $name[0] }}</span> Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //Section header -->
                    <!-- Main stage -->
                    <div id="main-stage" data-equalizer data-equalize-on="medium">
                        <div id="wrapper-stream-stage" data-equalizer-watch>
                            <div id="stream-stage">
                                <div class="card-thumbnail model-video-stream">
                                    <div class="iframe-wrapper">
                                        @php
                                            $video_url = $live_video_id->meeting_url .'&'. $type_user;
                                        @endphp
                                        <iframe id="live-video_player" src="{{ $video_url }}" width="100%" height="100%" frameborder="0"></iframe>

                                        <!-- Use the class="deactivated" to apply GRAYSCALE FILTER when model is Offline. Example below.    -->
                                        <!--<img src="images/layout/model-sample.jpg" alt="Model name" class="deactivated" />-->
                                    </div>
                                </div>
                                <div class="top-card-options">
                                    <ul>
                                        <li>
                                            <img src="{{ url('images/icons/record-option-newmodel.svg') }}" alt="New model"/>

                                        </li>
                                        <li>
                                            @php
                                                if ($favorite_model == true) {
                                                    $status = 1;
                                                    $icon = 'full';
                                                }
                                                else {
                                                    $status = 0;
                                                    $icon = 'outline';
                                                }
                                            @endphp
                                            <div class="model_favorite" id="model-{{ $modelData->user_id }}" status="{{ $status }}">
                                                <img src="/images/icons/heart-{{ $icon }}.svg" alt="Add to Favorites"/>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="footer-stream-card-options">
                                    <ul>
                                        <li>
                                            <img src="{{ url('images/icons/record-option-live.svg') }}" alt="LIVE RIGHT NOW!"/>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="stream-section-footer-options">
                                <div id="wrapper-gifts-section">
                                    <ul>
                                        <lh>
                                            <img src="{{ url('images/icons/offer-green.svg') }}" alt=""/>

                                            <h2>
                                                Offer a Gift
                                            </h2>
                                        </lh>
                                        <li>
                                            <a class="trigger-gift" data-open="modal-offer-gift">
                                                <img src="{{ url('images/icons/gifts-drink.svg') }}" alt=""/>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="trigger-gift" data-open="modal-offer-gift">
                                                <img src="{{ url('images/icons/gifts-bear.svg') }}" alt=""/>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="trigger-gift" data-open="modal-offer-gift">
                                                <img src="{{ url('images/icons/gifts-stilletto.svg') }}" alt=""/>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="trigger-gift" data-open="modal-offer-gift">
                                                <img src="{{ url('images/icons/gifts-lingerie.svg') }}" alt=""/>

                                            </a>
                                        </li>
                                        <li>
                                            <a class="trigger-more-gifts" data-open="modal-offer-gift">
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6.16675 3.33333H5.16675V4.83333H3.66675V5.83333H5.16675V7.33333H6.16675V5.83333H7.66675V4.83333H6.16675V3.33333ZM5.66675 0.333328C2.91675 0.333328 0.666748 2.58333 0.666748 5.33333C0.666748 8.08333 2.91675 10.3333 5.66675 10.3333C8.41675 10.3333 10.6667 8.08333 10.6667 5.33333C10.6667 2.58333 8.41675 0.333328 5.66675 0.333328ZM5.66675 9.33333C3.46675 9.33333 1.66675 7.53333 1.66675 5.33333C1.66675 3.13333 3.46675 1.33333 5.66675 1.33333C7.86675 1.33333 9.66675 3.13333 9.66675 5.33333C9.66675 7.53333 7.86675 9.33333 5.66675 9.33333Z"
                                                          fill="#575759"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Mkt section where user is invited to click to access premium access -->
                                <div id="mkt-trigger-for-new-members">
                                    <p>
                                        <a href="{{ route('be-a-user-1') }}" title="Click right NOW. ACCESS ALL CONTENTS!">
                                            CLICK HERE NOW. FULL ACCESS!
                                        </a>
                                    </p>
                                </div>
                                <!-- //Mkt section where user is invited to click to access premium access -->

                                <!-- User Actions with models   -->
                                <ul id="user-actions-with-model">
                                    <li>
                                        <a href="#" title="Cam2Cam">
                                            <button>
                                                Cam2Cam
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <button title="Go Private" type="button" id="btn_user_go_private" onclick="UserPageStrem.goPrivate();">
                                            Go Private
                                        </button>
                                    </li>
                                    <li class="hide">
                                        <button type="button" title="Leave Private Show" class="btn_red_outline" id="btn_user_leave_private_show" onclick="UserPageStrem.leavePrivate();">
                                            Leave Private Show
                                        </button>
                                    </li>
                                    <li>
                                        <a class="stream_buy_token" title="Buy Tokens" data-id="{{ $modelData->user_id }}">
                                            <button class="active">
                                                Buy Tokens
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                                <!-- //User Actions with models   -->
                            </div>
                        </div>
                        <div id="wrapper-chat" data-equalizer-watch>
                            <div id="chat-tabs">
                                <ul class="tabs" data-tabs id="chat-tabs">
                                    <li class="tabs-title is-active">
                                        <a href="#panel1" aria-selected="true">
                                            Chat
                                        </a>
                                    </li>
                                    <li class="tabs-title">
                                        <a data-tabs-target="panel2" href="#panel2">
                                            <!-- The class below is meant for devs to inject the followers model has    -->
                                            Users (<span class="data-injection">333</span>)
                                        </a>
                                    </li>
                                    {{--<li class="tabs-title">--}}
                                    {{--<a href="#panel3" aria-selected="true">--}}
                                    {{--PM--}}
                                    {{--</a>--}}
                                    {{--</li>--}}
                                </ul>
                                <div class="tabs-content" data-tabs-content="chat-tabs">


                                    <div class="tabs-panel is-active" id="panel1">
                                        <form>
                                            <div id="">


                                                <ul id="messageWrapper" class="chat-list">
                                                    @foreach ($chat_data['chats'] as $chat)

                                                        @if(Auth::check())
                                                            @if ($chat->sender_id == Auth::user()->id)
                                                                <li class="user-chat-line">

                                                                    <div class="user-thumb">
                                                                        <img src="{{ url('images/layout/user-sample-profile.jpg') }}" alt="Model Name here"/>

                                                                    </div>
                                                                    <div class="chat-balloon">
                                                                        <p>
                                                                            {{ $chat->message  }}
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endif
                                                        @if(Auth::check())
                                                            @if ($chat->sender_id != Auth::user()->id)
                                                                <li class="model-chat-line">

                                                                    <div class="user-thumb">
                                                                        <img src="{{ url('/images/icons/type-of-users-male.svg') }}" alt="Model Name here"/>

                                                                    </div>
                                                                    <div class="chat-balloon">
                                                                        <h5> {{$chat->camera_man_name }}</h5>
                                                                        <p>
                                                                            {{ $chat->message  }}
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                            @endif

                                                        @endif
                                                        @if(!Auth::check())

                                                            <li class="model-chat-line">

                                                                <div class="user-thumb">
                                                                    <img src="{{ url('/images/icons/type-of-users-male.svg') }}" alt="Model Name here"/>

                                                                </div>
                                                                <div class="chat-balloon">
                                                                    <h5> {{$chat->camera_man_name }}</h5>
                                                                    <p>
                                                                        {{ $chat->message  }}
                                                                    </p>
                                                                </div>
                                                            </li>


                                                        @endif
                                                    @endforeach

                                                </ul>
                                                <div class="input-section">
                                                    <input class="message_chat" id="message" type="text" placeholder="Say something!">
                                                    <button id="btn_send_chat_msg" type="button" onclick="sendMessage(document.getElementById('message').value,{{ $chat_data['friendInfo']->id }},{{$live_video_id->id}})">
                                                        Send
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <div class="tabs-panel" id="panel2">
                                        <ul id="model-followers-list-user">

                                        </ul>

                                    </div>
                                    {{--<div class="tabs-panel" id="panel3">--}}
                                    {{--<form>--}}
                                    {{--<!--<ul id="messageWrapper" class="chat-list">-->--}}
                                    {{--<!--    @foreach ($chat_data['chats'] as $chat)-->--}}
                                    {{--<!--    @if(Auth::check())-->--}}
                                    {{--<!--    @if ($chat->sender_id == Auth::user()->id)-->--}}
                                    {{--<!--        <li class="user-chat-line">-->--}}

                                    {{--<!--            <div class="user-thumb">-->--}}
                                    {{--<!--                <img src="{{ url('images/layout/user-sample-profile.jpg') }}" alt="Model Name here" />-->--}}

                                    {{--<!--            </div>-->--}}
                                    {{--<!--            <div class="chat-balloon">-->--}}
                                    {{--<!--                <p>-->--}}
                                    {{--<!--                {{ $chat->message  }}-->--}}
                                    {{--<!--                </p>-->--}}
                                    {{--<!--            </div>-->--}}
                                    {{--<!--        </li> -->--}}
                                    {{--<!--    @endif-->--}}
                                    {{--<!--    @endif-->--}}
                                    {{--<!--    @if(Auth::check())-->--}}
                                    {{--<!--    @if ($chat->sender_id != Auth::user()->id)-->--}}
                                    {{--<!--    <li class="model-chat-line">-->--}}

                                    {{--<!--        <div class="user-thumb">-->--}}
                                    {{--<!--            <img src="{{ url('images/icons/type-of-users-male.svg') }}" alt="Model Name here" />-->--}}

                                    {{--<!--        </div>-->--}}
                                    {{--<!--        <div class="chat-balloon">-->--}}
                                    {{--<!--            <h5> {{$chat->name }}</h5>-->--}}
                                    {{--<!--            <p>-->--}}
                                    {{--<!--           {{ $chat->message  }}-->--}}
                                    {{--<!--            </p>-->--}}
                                    {{--<!--        </div>-->--}}
                                    {{--<!--    </li>-->--}}
                                    {{--<!--    @endif-->--}}
                                    {{--<!--    @endif-->--}}
                                    {{--<!--    @if(!Auth::check())-->--}}

                                    {{--<!--    <li class="model-chat-line">-->--}}

                                    {{--<!--        <div class="user-thumb">-->--}}
                                    {{--<!--            <img src="{{ url('images/icons/type-of-users-male.svg') }}" alt="Model Name here" />-->--}}

                                    {{--<!--        </div>-->--}}
                                    {{--<!--        <div class="chat-balloon">-->--}}
                                    {{--<!--            <h5> {{$chat->name }}</h5>-->--}}
                                    {{--<!--            <p>-->--}}
                                    {{--<!--        {{ $chat->message  }}-->--}}
                                    {{--<!--            </p>-->--}}
                                    {{--<!--        </div>-->--}}
                                    {{--<!--    </li>-->--}}


                                    {{--<!--@endif-->--}}
                                    {{--<!--    @endforeach-->--}}
                                    {{----}}
                                    {{--<!--</ul>-->--}}
                                    {{--<div class="input-section">--}}
                                    {{--<input id="message" type="text" placeholder="Say something!">--}}
                                    {{--<button type="button" onclick="sendMessage(document.getElementById('message').value,{{ $chat_data['friendInfo']->id }})">--}}
                                    {{--Send--}}
                                    {{--</button>--}}
                                    {{--</div>--}}
                                    {{--</form>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                            <section id="cta-tips">
                                <header>
                                    <h1>
                                        Hey You! Wanna Tip Me?
                                    </h1>
                                    <h2>
                                        I'll perform something special!
                                    </h2>
                                </header>
                                <ul>
                                    <li>
                                        <a data-open="modal-tips" title="Hey You! Wanna Tip Me? I'll perform something special!">
                                            <img src="{{ url('images/icons/chat-tips.svg') }}" alt="Tip Model"/>
                                        </a>
                                    </li>
                                </ul>
                            </section>
                        </div>
                    </div>
                    <!-- Main stage -->
                @include('includes.templates.model._model-profile')
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
                                        <svg height="682pt" viewBox="-21 -47 682.66669 682" width="682pt" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m552.011719-1.332031h-464.023438c-48.515625 0-87.988281 39.464843-87.988281 87.988281v283.972656c0 48.414063 39.300781 87.816406 87.675781 87.988282v128.863281l185.191407-128.863281h279.144531c48.515625 0 87.988281-39.472657 87.988281-87.988282v-283.972656c0-48.523438-39.472656-87.988281-87.988281-87.988281zm50.488281 371.960937c0 27.835938-22.648438 50.488282-50.488281 50.488282h-290.910157l-135.925781 94.585937v-94.585937h-37.1875c-27.839843 0-50.488281-22.652344-50.488281-50.488282v-283.972656c0-27.84375 22.648438-50.488281 50.488281-50.488281h464.023438c27.839843 0 50.488281 22.644531 50.488281 50.488281zm0 0"/>
                                            <path d="m171.292969 131.171875h297.414062v37.5h-297.414062zm0 0"/>
                                            <path d="m171.292969 211.171875h297.414062v37.5h-297.414062zm0 0"/>
                                            <path d="m171.292969 291.171875h297.414062v37.5h-297.414062zm0 0"/>
                                        </svg>
                                        Add comment below
                                    </h1>
                                </header>
                                <div class="comments-widget">
                                    <p>Insert the Comments Widget here.</p>
                                    <form>
                                        @csrf
                                        <textarea id="live_Model_Comment" rows="5" placeholder="Describe yourself here..." value=""></textarea>
                                        <button style="padding:10px 30px ;background-color:#05BE70; border-radius:30px; color: white" type="button" onclick='liveModelComment("<?php echo $modelData->user_id; ?>","live")'
                                                title="Save changes">
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
    @include('includes.templates.modals.gift_modals')

</x-app-layout>


<script type="text/javascript">
    $(function () {
        $("input#message").keydown(function (e) {
            if (e.keyCode == 13) {
                $("#btn_send_chat_msg").trigger("click");
            }
        })

    });
</script>