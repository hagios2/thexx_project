<!doctype html>
<html class="no-js" lang="en">
    @include('includes.templates.header._html-header')
    <body>
         @include('includes.templates.header._header-user-visitor')
         <div id="main-area" class="inner-page-design">
            <main id="design-theme">
                <!-- Landing section    -->
                <div id="landing-section">
                    <section id="table-content-left">
                        <header>
                            <h1>
                                Be a model and start earning
                            </h1>
                            <h2>
                                Today!
                            </h2>
                        </header>
                        <ul>
                            <li>
                                <a href="#" title="Join us!">
                                    Join us!
                                </a>
                            </li>
                        </ul>
                    </section>
                    <div id="table-content-right">
                        <img src="{{ url('images/layout/composition-be-a-model.jpg') }}" alt="Be a model and start earning" />
                      
                    </div>
                </div>
                <!-- //Landing section    -->

                <div id="secondary-section">
                    <div id="wrapper-designtheme-boxes" class="grid-x" data-equalizer data-equalize-on="medium">
                        <section class="designtheme-boxes cell small-12 medium-4">
                            <div class="inner-box" data-equalizer-watch>
                                <header>
                                    <h1>
                                        Flexible Hours
                                    </h1>
                                    <img src="{{ url('images/icons/icons-yellow-hours.svg') }}" alt="Flexible Hours" />
                                    
                                </header>
                                <div class="content-stage">
                                    <p>
                                        Either performing everyday or a few hours per week. You're in total control!
                                    </p>
                                </div>
                            </div>
                        </section>
                        <section class="designtheme-boxes cell small-12 medium-4">
                            <div class="inner-box" data-equalizer-watch>
                                <header>
                                    <h1>
                                        Get paid anytime
                                    </h1>
                                    <img src="{{ url('images/icons/icons-yellow-dollar-circle.svg') }}" alt="Get paid anytime" />
                                    
                                </header>
                                <div class="content-stage">
                                    <p>
                                        No need to wait. You can withdraw your earnings whenever you want without limits.
                                    </p>
                                </div>
                            </div>
                        </section>
                        <section class="designtheme-boxes cell small-12 medium-4">
                            <div class="inner-box" data-equalizer-watch>
                                <header>
                                    <h1>
                                        Awards and earnings
                                    </h1>
                                    <img src="{{ url('images/icons/icons-yellow-lingerie.svg') }}" alt="Awards and earnings" />
                                   
                                </header>
                                <div class="content-stage">
                                    <p>
                                        We not only offer the best earnings on the market for models, we also offer you an awards scheme.
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </main>
            </div>
        </div>
        @include('includes.templates.footer._footer')
        @include('includes._scripts')
    </body>
</html>
