<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme">
            <!-- Landing section    -->
            <div id="landing-section" class="model-account-page">
                <section id="table-content-left">
                    <header>
                        <h1>
                            Welcome to the XXX Club
                        </h1>
                    </header>
                    <div class="register-edit-club-member">
                        <section id="thank-you-message">
                            <h2>
                                Thank you for joining our Club!
                            </h2>
                            <div class="content">
                                <p>
                                    You can now interact directly and easily with the best models online.
                                </p>
                            </div>
                            <ul>
                                <li>
                                    <button title="Login into your account" data-open="modal-login">
                                        Login
                                    </button>
                                </li>
                            </ul>
                        </section>
                    </div>
                </section>
                <div id="table-content-right">
                    <div id="wrapper-edit-options-sections">
                        <div class="wrapper-banners" data-equalizer data-equalize-on="medium">
                            <!-- Using Equalizer above to Watch inner div with class data-equalizer-watch to make those sections with the same height   -->
                            <div class="bannerbox-pitch background-one" data-equalizer-watch>
                                <header>
                                    <h1>
                                        1st TIME?
                                        <br />
                                        CHARGE YOUR WALLET
                                    </h1>
                                    <h2>
                                        GET +25% TOKENS FOR FREE!
                                    </h2>
                                </header>
                                <div class="cta">
                                    <a href="{{ route('wallet-charge-1') }}" title="Charge Now">
                                        Charge Now
                                    </a>
                                </div>
                            </div>
                            <div class="bannerbox-pitch background-two" data-equalizer-watch>
                                <header>
                                    <h1>
                                        BECOME A MEMBER OF OUR EXCLUSIVE CLUB
                                    </h1>
                                    <h2>
                                        UNLOCK MANY BENEFITS
                                    </h2>
                                </header>
                                <div class="cta">
                                    <a href="{{ route('subscribe-the-videoclub-1') }}" title="Subscribe Now">
                                        Subscribe Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Landing section    -->

            <div id="secondary-section">
                <div id="wrapper-designtheme-boxes" class="grid-x" data-equalizer data-equalize-on="medium">
                    <section class="designtheme-boxes cell small-12 medium-4">
                        <div class="inner-box" data-equalizer-watch>
                            <header>
                                <h1>
                                    Someone for everyone
                                </h1>
                                <img src="{{ url('images/icons/icon-white-movie.svg') }}" alt="Someone for everyone"/>
                                
                            </header>
                            <div class="content-stage">
                                <p>
                                    The XXX Club offers the best models of all genders and orientations, willing to unlock all your fantasies.
                                </p>
                            </div>
                        </div>
                    </section>
                    <section class="designtheme-boxes cell small-12 medium-4">
                        <div class="inner-box" data-equalizer-watch>
                            <header>
                                <h1>
                                    Be part of the Club
                                </h1>
                                <img src="{{ url('images/icons/icon-white-star.svg') }}" alt="Be part of the Club"/>
                                
                            </header>
                            <div class="content-stage">
                                <p>
                                    Join our exclusive Club for a small monthly fee and get all ads-removed, cheaper tokens and access to VIP models.
                                </p>
                            </div>
                        </div>
                    </section>
                    <section class="designtheme-boxes cell small-12 medium-4">
                        <div class="inner-box" data-equalizer-watch>
                            <header>
                                <h1>
                                    Win tokens
                                </h1>
                                <img src="{{ url('images/icons/icon-white-dice.svg') }}" alt="Win tokens"/>
                                
                            </header>
                            <div class="content-stage">
                                <p>
                                    Play on our gaming system and win direct tokens and not discounts!
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>