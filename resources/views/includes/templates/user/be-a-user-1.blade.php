<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme">
            <!-- Landing section    -->
            <div id="landing-section">
                <section id="table-content-left">
                    <header>
                        <h1>
                            Unlock your Fantasies!
                        </h1>
                        <h2 class="small-headline"><!-- This one only applies for this file/User Registration page -->
                            Register your free account now!
                        </h2>
                        <h3>
                            You will receive <span class="highlight"><span class="shaker">50% discount</span></span> on your first token buy!
                        </h3>
                    </header>
                    <div class="register-edit-club-member">
                        @if ($errors->any())
                        <div class="alert alert-danger m-2" style="background-color: red">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="m-1">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                          <form >
                            {{ csrf_field() }}
                            <input id="userName" name="userName" type="text" placeholder="Username" minlength="4" required/>
                            <input id="userEmail" name="userEmail" type="email" placeholder="Your E-Mail" required />
                            <input id="userPassword" name="userPassword" type="password" placeholder="Set a password" required/>
                            <input id="userPasswordConfirmation" name="userPasswordConfirmation" type="password" placeholder="Confirm password" required />
                            <div id="footer-options">
                                <ul>
                                    <li>
                                        <button type="button" onclick="UserRegistration()">
                                            <a><span>Register</span></a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div id="wrapper-terms-conditions">
                                <input id="checkTermsConditions" type="checkbox" required>
                                <label class="checkbox-radio-switch-label" for="checkTermsConditions">Checkbox</label>
                                <p>
                                    I've <a href="#" title="read and accept the Terms and Conditions">read and accept</a> the Terms and Conditions.
                                </p>
                            </div>
                        </form>
                    </div>
                </section>
                <div id="table-content-right">
                    <div id="stage-video-teaser" class="responsive-embed">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/alknRmAm_Xw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
