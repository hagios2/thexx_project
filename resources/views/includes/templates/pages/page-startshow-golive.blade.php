<x-app-layout>
    <div id="main-area">
        <div id="wrapper-main-aside"> <!-- For responsiveness purposes  -->
            <main id="page-stream-model">
                <input indentity="model" username="{{$camera_name}}" id="auth" auth-id="{{ Auth::user()->id }}" type="hidden"/>
                <input id="model" model-id="{{  Auth::user()->id }}" type="hidden"/>
                <!-- Main content   -->
                <div class="inner-section">
                    <!-- Section header -->
                    <div id="wrapper-header">
                        @include('includes.templates.header._bar-head-video-stream')
                        <div class="trigger-options">
                            <ul>
                                <li>
                                    <a href="#video-stream-secondary-stage" class="jumpLinks" title="Set Pricing">
                                        Set Pricing/Report User
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
                                        <iframe id="live-video_player" src="" width="100%" height="100%" frameborder="0" class="bg-dark" allow="camera;microphone"></iframe>
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
                                            <a href="#" title="">
                                                <img src="{{ url('images/icons/heart-outline.svg') }}" alt="Add to Favourites"/>

                                            </a>
                                            <input type="hidden" value="{{Auth::user()->id}}" id="user_id">
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
                            <div id="stream-section-footer-options" class="video-stream">
                                <!-- User Actions with models   -->
                                <ul id="user-actions-with-model">
                                    <li class="hide">
                                        <a title="END SHOW" onclick="endShowButton()">
                                            <button class="end_show active" id="btn_end_show">
                                                END SHOW
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="START SHOW" id="main_startshow" onclick="startShow()">
                                            <button class="start_show active" id="btn_start_show">
                                                START SHOW
                                            </button>
                                        </a>
                                    </li>
                                    <li class="hide">
                                        <a title="START PRIVATE SHOW" onclick="startPrivateShow()">
                                            <button class="start_show active" id="btn_start_private_show">
                                                START PRIVATE SHOW
                                            </button>
                                        </a>
                                    </li>
                                    <li class="hide">
                                        <a title="END PRIVATE SHOW" onclick="endPrivateShow()">
                                            <button class="end_show active" id="btn_end_private_show">
                                                END PRIVATE SHOW
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
                                            Users (<span class="data-injection">144</span>)
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
                                            <ul id="messageWrapper" class="chat-list">
                                                @foreach ($chat_data['chats'] as $chat)

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
                                                    @if ($chat->sender_id != Auth::user()->id)
                                                        <li class="model-chat-line">

                                                            <div class="user-thumb">
                                                                <img src="{{ url('/images/icons/type-of-users-male.svg') }}" alt="Model Name here"/>

                                                            </div>
                                                            <div class="chat-balloon">
                                                                <h4> {{$chat->name }}</h4>
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
                                                <button type="button" onclick="sendMessage(document.getElementById('message').value)" id="btn_chat_send_msg">
                                                    Send
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tabs-panel" id="panel2">
                                        <ul id="model-followers-list-model">


                                        </ul>
                                    </div>
                                    {{--<div class="tabs-panel" id="panel3">--}}
                                        {{--<form>--}}
                                            {{--<ul id="messageWrapper" class="chat-list">--}}
                                                {{--@foreach ($chat_data['chats'] as $chat)--}}

                                                    {{--@if ($chat->sender_id == Auth::user()->id)--}}
                                                        {{--<li class="user-chat-line">--}}

                                                            {{--<div class="user-thumb">--}}
                                                                {{--<img src="{{ url('images/layout/user-sample-profile.jpg') }}" alt="Model Name here"/>--}}

                                                            {{--</div>--}}
                                                            {{--<div class="chat-balloon">--}}
                                                                {{--<p>--}}
                                                                    {{--{{ $chat->message  }}--}}
                                                                {{--</p>--}}
                                                            {{--</div>--}}
                                                        {{--</li>--}}
                                                    {{--@endif--}}
                                                    {{--@if ($chat->sender_id != Auth::user()->id)--}}
                                                        {{--<li class="model-chat-line">--}}

                                                            {{--<div class="user-thumb">--}}
                                                                {{--<img src="{{ url('images/icons/type-of-users-male.svg') }}" alt="Model Name here"/>--}}

                                                            {{--</div>--}}
                                                            {{--<div class="chat-balloon">--}}
                                                                {{--<h4> {{$chat->name }}</h4>--}}
                                                                {{--<p>--}}
                                                                    {{--{{ $chat->message  }}--}}
                                                                {{--</p>--}}
                                                            {{--</div>--}}
                                                        {{--</li>--}}
                                                    {{--@endif--}}
                                                {{--@endforeach--}}
                                            {{--</ul>--}}
                                            {{--<div class="input-section">--}}
                                                {{--<input type="text" placeholder="Say something!">--}}
                                                {{--<button>--}}
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
                    <!-- //Main stage -->

                    <!-- Video Stream Secondary Stage options  -->
                    <div class="wrapper-model-profile-sections">
                        <div id="video-stream-secondary-stage">
                            <!-- Set Pricing    -->
                            <section>
                                <header>
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 20C7.32891 20 4.81766 18.9598 2.92891 17.0711C1.04016 15.1823 0 12.6711 0 10C0 7.32891 1.0402 4.8177 2.92891 2.92891C4.81762 1.04012 7.32891 0 10 0C12.6711 0 15.1823 1.04016 17.0711 2.92891C18.9598 4.81766 20 7.32891 20 10C20 12.6711 18.9598 15.1823 17.0711 17.0711C15.1824 18.9599 12.6711 20 10 20ZM10 1.25C5.17523 1.25 1.25 5.17523 1.25 10C1.25 14.8248 5.17523 18.75 10 18.75C14.8248 18.75 18.75 14.8248 18.75 10C18.75 5.17523 14.8248 1.25 10 1.25Z"
                                              fill="#575759"/>
                                        <path d="M10 9.375C9.13844 9.375 8.4375 8.67406 8.4375 7.8125C8.4375 6.95094 9.13844 6.25 10 6.25C10.8616 6.25 11.5625 6.95094 11.5625 7.8125C11.5625 8.15766 11.8423 8.4375 12.1875 8.4375C12.5327 8.4375 12.8125 8.15766 12.8125 7.8125C12.8125 6.47652 11.8759 5.35594 10.625 5.07086V4.375C10.625 4.02984 10.3452 3.75 10 3.75C9.6548 3.75 9.375 4.02984 9.375 4.375V5.07086C8.12414 5.35594 7.1875 6.47652 7.1875 7.8125C7.1875 9.36332 8.44918 10.625 10 10.625C10.8616 10.625 11.5625 11.3259 11.5625 12.1875C11.5625 13.0491 10.8616 13.75 10 13.75C9.13844 13.75 8.4375 13.0491 8.4375 12.1875C8.4375 11.8423 8.1577 11.5625 7.8125 11.5625C7.4673 11.5625 7.1875 11.8423 7.1875 12.1875C7.1875 13.5235 8.12414 14.6441 9.375 14.9291V15.625C9.375 15.9702 9.6548 16.25 10 16.25C10.3452 16.25 10.625 15.9702 10.625 15.625V14.9291C11.8759 14.6441 12.8125 13.5235 12.8125 12.1875C12.8125 10.6367 11.5508 9.375 10 9.375Z"
                                              fill="black"/>
                                    </svg>
                                    <h1>
                                        Set Pricing
                                    </h1>
                                </header>
                                <div class="wrapper-form">
                                    <form>
                                        <select id="option1" name="options">
                                            <option>For each private minute</option>
                                            @foreach($private_pricing_DS as $pPrice)
                                                <option value="{{ $pPrice["tokens"] }}">{{ $pPrice["description"] }}</option>
                                            @endforeach
                                        </select>
                                        {{--<select id="option2" name="options">--}}
                                            {{--<option>For Cam2Cam</option>--}}
                                            {{--@foreach($cam2cam_pricing_DS as $pPrice)--}}
                                                {{--<option value="{{ $pPrice["tokens"] }}">{{ $pPrice["description"] }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                        {{--<select id="option3" name="options">--}}
                                            {{--<option>For sex toy use</option>--}}
                                            {{--@foreach($sex_toy_pricing_DS as $pPrice)--}}
                                                {{--<option value="{{ $pPrice["tokens"] }}">{{ $pPrice["description"] }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                        <div class="footer-options">
                                            <ul>
                                                <li>
                                                    <a href="#" title="Save">
                                                        Save
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <!-- //Set Pricing    -->
                            <!-- Report user    -->
                            <section>
                                <header class="report">
                                    <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.88193 7.27091C3.3761 8.89132 4.646 10.5749 6.35835 10.5749C8.07071 10.5749 9.34348 8.89132 9.83478 7.27091C10.2571 7.12438 10.6105 6.70204 10.7484 6.15615C10.9381 5.40628 10.6594 4.71099 10.1192 4.50126C10.1681 4.30301 10.1939 4.09903 10.1939 3.88929C10.1939 2.11086 8.42122 0.674316 6.23478 0.674316C4.04837 0.674316 2.26993 2.11373 2.26993 3.88929C2.26993 4.14212 2.31015 4.38921 2.37624 4.6248C1.9855 4.92073 1.80737 5.51833 1.96826 6.15902C2.1062 6.70204 2.45956 7.12438 2.88193 7.27091ZM2.61757 5.20516C2.67504 5.11035 2.74974 5.04714 2.84455 5.02128C2.86179 5.01841 2.88477 5.01554 2.90488 5.01554C2.92212 5.01554 2.93649 5.01554 2.95372 5.01841L3.22667 5.04427L3.26689 4.7742C3.35021 4.21108 3.52547 3.70541 3.77255 3.27445C4.23512 3.79448 5.1545 4.14787 6.21467 4.14787C7.41274 4.14787 8.43269 3.6968 8.80906 3.06472C9.1251 3.53878 9.3492 4.11626 9.44685 4.7742L9.48708 5.04427L9.76002 5.01841C9.80024 5.01554 9.83759 5.01554 9.8692 5.02128C9.88931 5.02416 9.90083 5.03852 9.92091 5.04427C10.168 5.15345 10.2944 5.58728 10.1881 6.01824C10.0789 6.45782 9.79162 6.7164 9.56468 6.74513L9.37503 6.77099L9.32331 6.95487C8.90962 8.46611 7.76039 10.0003 6.35255 10.0003C4.94474 10.0003 3.79551 8.46898 3.38753 6.95487L3.33582 6.77099L3.14619 6.74513C2.91922 6.7164 2.63191 6.45208 2.52273 6.01824C2.45096 5.70795 2.49406 5.39478 2.61757 5.20516Z"
                                              fill="#05BE70"/>
                                        <path d="M9.73399 9.27637C9.36624 9.9027 8.94102 10.4342 8.37503 10.7186C7.21143 11.3134 6.34663 11.796 6.34663 11.796L6.34376 11.7932V11.7788L6.32939 11.7845L6.31503 11.7788V11.7932L6.31215 11.796C6.31215 11.796 5.44736 11.3163 4.28376 10.7186C3.72064 10.4284 3.29542 9.8998 2.92479 9.27637C1.20385 9.97453 0 11.5863 0 12.9884C0 14.468 0 15.9017 0 15.9017H6.31215H6.33514H12.653C12.653 15.9017 12.653 14.468 12.653 12.9884C12.6588 11.5863 11.455 9.9774 9.73399 9.27637Z"
                                              fill="#05BE70"/>
                                    </svg>
                                    <h1>
                                        Report user
                                    </h1> <span>( You can only upload maximum 5 documents )<span>
                                </header>
                                <div class="wrapper" style=" margin-left: 10px ;
                                margin-right: 10px;">
                                    <form>
                                        @csrf
                                        <input id="user_Report" name="user" type="text" aria-label="User Name" placeholder="Client User Name">
                                        <textarea id="description_Report" name="description" rows="20" placeholder="Incident Description..." value=""></textarea>
                                        <input type="file" id="url_Report" name="url[]" onchange="id_proof(event, this.id)">


                                        <div class="footer-options">
                                            <ul>
                                                <li>
                                                    <button type="button" onclick="UploadReport()">
                                                        <a>Report</a>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <!-- //Report user    -->
                            <section id="session-earnings">
                                <section class="bannerbox-info">
                                    <div class="inner-box">
                                        <header>
                                            <h1>
                                                Session earnings
                                            </h1>
                                            <h2>
                                                <span class="data-injection">200</span> TOKENS
                                            </h2>
                                            <h3>
                                                $<span class="data-injection">60.99</span>
                                            </h3>
                                        </header>
                                    </div>
                                </section>
                            </section>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">SR.No.</th>
                            <th scope="col">Incident Id</th>
                            <th scope="col">Username</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                        @if (!isset($reports[0]))
                            <td id="td-temp" colspan="4" style="width:100%">No incident reported yet!!</td>
                        @endif
                        @foreach ($reports as $report)
                            <tr>
                                <td scope="row">{{$i}}</td>
                                <td>{{$report->incident_id}}</td>
                                <td>{{$report->user_name}}</td>
                                @if ($report->status == '0')
                                    <td>Under Analysis</td>
                                @endif
                                @if ($report->status == '1')
                                    <td>Approved</td>
                                @endif
                                @if ($report->status == '2')
                                    <td>Rejected</td>
                                @endif
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        </tbody>
                    </table>
                    <!-- //Video Stream Secondary Stage options  -->
                </div>
            </main>
        </div>
    </div>

</x-app-layout>


<script type="text/javascript">
    $(function () {
        $("input#message").keydown(function (e) {
            if (e.keyCode == 13) {
                $("#btn_chat_send_msg").trigger("click");
            }
        })

    });
</script>

