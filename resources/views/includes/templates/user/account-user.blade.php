<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-accounts">
            <header id="theme-accounts">
                <header>
                    <h1>
                        Welcome <span class="data-injection">{{ $accountDetails->user_name }}</span>!
                    </h1>
                    <h2 class="user-membership-level">
                        Regular user
                    </h2>
                </header>
            </header>
            <div id="scrollto-edit-account-cta" class="hide-for-medium">
                <a href="#table-content-left" title="Edit Account Details" class="jumpLinks">
                    Edit Account Details
                </a>
            </div>
            <!-- Landing section    -->
            <div id="landing-section">
                <div id="table-content-left">
                    <section class="register-edit-club-member">
                        <header>
                            <svg width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.375 0.625C8.67188 0.625 0 9.29688 0 20C0 30.7031 8.67188 39.375 19.375 39.375C30.0781 39.375 38.75 30.7031 38.75 20C38.75 9.29688 30.0781 0.625 19.375 0.625ZM19.375 8.125C23.1719 8.125 26.25 11.2031 26.25 15C26.25 18.7969 23.1719 21.875 19.375 21.875C15.5781 21.875 12.5 18.7969 12.5 15C12.5 11.2031 15.5781 8.125 19.375 8.125ZM19.375 35C14.7891 35 10.6797 32.9219 7.92969 29.6719C9.39844 26.9062 12.2734 25 15.625 25C15.8125 25 16 25.0312 16.1797 25.0859C17.1953 25.4141 18.2578 25.625 19.375 25.625C20.4922 25.625 21.5625 25.4141 22.5703 25.0859C22.75 25.0312 22.9375 25 23.125 25C26.4766 25 29.3516 26.9062 30.8203 29.6719C28.0703 32.9219 23.9609 35 19.375 35Z" fill="black"/>
                            </svg>
                            <h1>
                                Edit your account
                            </h1>
                        </header>
                        <form>
                            @csrf
                            <input id="userEditName"  readonly type="text" placeholder="Username" value="{{ $accountDetails->user_name }}" />
                            <input id="userEditEmail" readonly type="email" placeholder="Your e-mail" value="{{ $accountDetails->email }}" />
                            <input id="userEditPassword" type="password" placeholder="Set a password" />
                            <input  id="userEditConfirmPassword" type="password" placeholder="Confirm password" />
                            <div id="footer-options">
                                <ul>
                                    <li>
                                        
                                        <button type="button" onclick="UserUpdation()">
                                            <a><span>Register</span></a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </section>
                </div>
                <div id="table-content-right">
                    <div id="wrapper-edit-options-sections">
                        <div class="wrapper-banners" data-equalizer data-equalize-on="medium">
                            <!-- Using Equalizer above to Watch inner div with class data-equalizer-watch to make those sections with the same height   -->
                            <section class="bannerbox-tokens my-tokens" data-equalizer-watch>
                                <header>
                                    <svg width="40" height="36" viewBox="0 0 40 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M36.0312 8H6.25C5.55937 8 5 7.44063 5 6.75C5 6.05937 5.55937 5.5 6.25 5.5H36.25C36.9406 5.5 37.5 4.94063 37.5 4.25C37.5 2.17891 35.8211 0.5 33.75 0.5H5C2.23828 0.5 0 2.73828 0 5.5V30.5C0 33.2617 2.23828 35.5 5 35.5H36.0312C38.2203 35.5 40 33.818 40 31.75V11.75C40 9.68203 38.2203 8 36.0312 8ZM32.5 24.25C31.1195 24.25 30 23.1305 30 21.75C30 20.3695 31.1195 19.25 32.5 19.25C33.8805 19.25 35 20.3695 35 21.75C35 23.1305 33.8805 24.25 32.5 24.25Z" fill="#12EB90"/>
                                    </svg>
                                    <h1>
                                        You have
                                    </h1>
                                    <h2>
                                        <span class="data-injection">{{ $total_tokens }}</span> TOKENS
                                    </h2>
                                </header>
                                <div class="cta">
                                    <a href="{{ route('wallet-charge-1') }}" title="Charge Now">
                                        Charge Now
                                    </a>
                                </div>
                            </section>
                            <section class="bannerbox-pitch background-two" data-equalizer-watch>
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
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Landing section    -->
        </main>
    </div>
    <div id="wrapper-additional-page-data">
        <!-- Favorites  -->
        <section class="favorites-swiper-list">
            <header class="section-header">
                <h1>
                    <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.4185 6.69858L8.37452 12.8272L2.33124 6.6986L2.33117 6.69853C0.0951262 4.43182 1.70951 0.558594 4.83838 0.558594C6.34865 0.558594 7.12322 1.37625 7.66026 1.94316C7.81209 2.10344 7.94493 2.24367 8.07005 2.33972L8.37462 2.57354L8.67912 2.33963C8.80324 2.24428 8.93551 2.10487 9.08685 1.94535C9.6244 1.37877 10.4026 0.558594 11.9107 0.558594C15.0475 0.558594 16.6456 4.44078 14.4185 6.69854L14.4185 6.69858Z" stroke="white"/>
                    </svg>
                    Favorite Models
                </h1>
            </header>
            <!-- Swiper USER FAVORITES -->
            <div class="swiper-wrapper-favorites">
                <div class="swiper-wrapper">
                        <!--
                            Card to use inside of the static php version to be able to use "swiper-slide" class to be added as a swiper slide.
                            In the final code this class "swiper-slide" should be injected only for the posts/live cams inside a swiper JS division.
                            function-swiper.js file handles the behavior.
                        -->
                            @include('includes.templates.card._card-cams-SWIPER')
                        
                </div>
            </div>
            <!-- //Swiper USER FAVORITES -->
        </section>
        <!-- //Favorites  -->
            @include('includes.templates.banners._banners-size-small-bar')
    </div>
</x-app-layout>
