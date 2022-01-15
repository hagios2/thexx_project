<!-- Modal GIFTS   -->
<div class="reveal mkt gamification-panels" id="modal-offer-gift" data-reveal data-animation-in="spin-in" data-animation-out="fade-out">
    <section class="modal-stage">
        <input type="hidden" id="gift_model_id" value="{{ $modelData->user_id }}">
        <header>
            <div class="wrapper-title">
                <img src="{{ url('images/icons/offer-green.svg') }}" alt="" />
                <div class="title-model">
                    <h1>
                        Send a Gift to
                        <span class="data-injection">
                            {{ $name[0] }}
                        </span>
                    </h1>
                </div>
            </div>
            <div class="model-thumbnail show-for-large">
                <img src="{{ url('images/layout/model-sample-portrait.jpg') }}" alt="Model name here!" />
            </div>
        </header>
        <div class="options">
            <ul>
                <li>
                    <div class="icon">
                        <img src="{{ url('images/icons/gifts-flower.svg') }}" alt="Send a Flower" />
                    </div>
                    <div class="cta">
                        <button data-open="modal-offer-gift-confirmation" data-token="1" data-gift="Flower">
                            Send a Flower
                        </button>
                    </div>
                    <div class="total-tokens">
                        <span class="data-infection">1</span> Token
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="{{ url('images/icons/gifts-drink.svg') }}" alt="Send a Drink" />
                    </div>
                    <div class="cta">
                        <button data-open="modal-offer-gift-confirmation" data-token="1" data-gift="drink">
                            Send a Drink
                        </button>
                    </div>
                    <div class="total-tokens">
                        <span class="data-infection">1</span> Token
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="{{ url('images/icons/gifts-kiss.svg') }}" alt="Send a Kiss" />
                    </div>
                    <div class="cta">
                        <button data-open="modal-offer-gift-confirmation" data-token="2" data-gift="Kiss">
                            Send a Kiss
                        </button>
                    </div>
                    <div class="total-tokens">
                        <span class="data-infection">2</span> Token
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="{{ url('images/icons/gifts-bear.svg') }}" alt="" />
                    </div>
                    <div class="cta">
                        <button data-open="modal-offer-gift-confirmation" data-token="3" data-gift="Teddy Bear">
                            Send a Teddy Bear
                        </button>
                    </div>
                    <div class="total-tokens">
                        <span class="data-infection">3</span> Token
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="{{ url('images/icons/gifts-lingerie.svg') }}" alt="" />
                    </div>
                    <div class="cta">
                        <button data-open="modal-offer-gift-confirmation" data-token="4" data-gift="Lingerie">
                            Offer Lingerie
                        </button>
                    </div>
                    <div class="total-tokens">
                        <span class="data-infection">4</span> Token
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal GIFTS   -->

<!-- Modal GIFTS THANK YOU   -->
<div class="reveal mkt gamification-panels" id="modal-offer-gift-confirmation" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
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
            <div class="model-thumbnail show-for-large">
                <img src="{{ url('images/layout/model-sample-portrait.jpg') }}" alt="Model name here!" />
            </div>
            <section class="thankyou-message">
                <header>
                    <h2>
                        You just sent me a <span  id="gift_change" class="data-injection" >Flower</span>!
                    </h2>
                </header>
                <div class="icon">
                    <img src="{{ url('images/icons/gifts-flower.svg') }}" alt="Send a Flower" />
                </div>
                <div class="thankyou-content">
                    <div class="inner-content">
                        <h2>
                            You’re Awesome!
                        </h2>
                        <h3>
                            Thanks for caring ;)
                        </h3>
                        <p>
                            Love, <span class="data-injection">{{ $name[0] }}</span>.
                        </p>
                    </div>
                    <div class="cta">
                        <button data-open="modal-offer-gift">
                            Send another GIFT
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal GIFTS THANK YOU   -->

<!-- Modal TIPs   -->
<div class="reveal small gamification-panels" id="modal-tips" data-reveal data-animation-in="spin-in" data-animation-out="fade-out">
    <section class="modal-stage">
        <header>
            <div class="wrapper-title">
                <img src="{{ url('images/icons/chat-tips.svg') }}" alt="TIPS" />
                <div class="title-model">
                    <h1>
                        Send a TIP to
                        <span class="data-injection">
                            {{ $name[0] }}
                        </span>
                    </h1>
                </div>
            </div>
            <div class="model-thumbnail show-for-large">
                <img src="{{ url('images/layout/model-sample-portrait.jpg') }}" alt="Model name here!" />
            </div>
        </header>
        <div class="options tips">
            <ul>
                <li>
                    <div class="cta">
                        <button data-open="modal-tips-confirmation" data-token="1">
                            1
                        </button>
                    </div>
                    <div class="total-tokens">
                        Token
                    </div>
                </li>
                <li>
                    <div class="cta">
                        <button data-open="modal-tips-confirmation" data-token="5">
                            5
                        </button>
                    </div>
                    <div class="total-tokens">
                        Tokens
                    </div>
                </li>
                <li>
                    <div class="cta">
                        <button data-open="modal-tips-confirmation" data-token="10">
                            10
                        </button>
                    </div>
                    <div class="total-tokens">
                        Tokens
                    </div>
                </li>
                <li>
                    <div class="cta">
                        <button data-open="modal-tips-confirmation" data-token="15">
                            15
                        </button>
                    </div>
                    <div class="total-tokens">
                        Tokens
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal TIPs   -->

<!-- Modal TIPS THANK YOU   -->
<div class="reveal mkt gamification-panels" id="modal-tips-confirmation" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
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
            <div class="model-thumbnail show-for-large">
                <img src="{{ url('images/layout/model-sample-portrait.jpg') }}" alt="Model name here!" />
            </div>
            <section class="thankyou-message">
                <header>
                    <h2>
                        I've received your Tip!
                    </h2>
                </header>
                <div class="icon">
                    <img src="{{ url('images/icons/chat-tips.svg') }}" alt="I've received your Tip!" />
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
                    <div class="cta">
                        <button data-open="modal-tips">
                            Send another TIP
                        </button>
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
