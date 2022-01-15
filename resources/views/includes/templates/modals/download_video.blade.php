<!-- Modal Download   -->
<div class="reveal small gamification-panels download_video-modal" id="modal-download" data-reveal data-animation-in="spin-in" data-animation-out="fade-out">
    <section class="modal-stage">
        <header>
            <div class="wrapper-title">
                <img src="{{ url('images/icons/chat-tips.svg') }}" alt="TIPS" />
                <div class="title-model" style="margin-top: 20px;">
                    <h1>
                    </h1>
                </div>
            </div>
        </header>
        <div class="options tips download">
            <ul>
                <li>
                    <div class="cta">
                        <a class="download_video_token" data-open="modal-token-confirmation" data-video="{{ $selected_video->id }}" data-model="{{ $selected_video->model_id }}" data-token="{{ $selected_video->price_tier }}">
                            {{ $selected_video->price_tier }} Tokens
                        </a>
                    </div>
                </li>
                <li style="display: none">
                    <a class="stream_buy_token buy_token" title="Buy Tokens" data-id="{{ $model_info->user_id }}">
                        <button class="active">
                            Buy Tokens
                        </button>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal Download   -->

<!-- Modal TIPS THANK YOU   -->
<div class="reveal mkt gamification-panels" id="modal-token-confirmation" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <section class="modal-stage">
        <header>
            <div class="wrapper-title">
                <img src="{{ url('images/icons/offer-green.svg') }}" alt="" />
                <div class="title-model">
                    <h1>
                        Thank You!
                    </h1>
                </div>
            </div>
        </header>
        <div class="wrapper-content">
            <section class="thankyou-message">
                <header>
                    <h2>
                        I've received your Token!
                    </h2>
                </header>
                <div class="icon">
                    <img src="{{ url('images/icons/chat-tips.svg') }}" alt="I've received your Token!" />
                </div>
                <div class="thankyou-content">
                    <div class="inner-content">
                        <h2>
                            You’re Awesome!
                        </h2>
                        <h3>
                            Thanks for caring
                        </h3>
                        <p>
                            Love, <span class="data-injection">{{ $name[0] }}</span>.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal TIPS THANK YOU   -->
