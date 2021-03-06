<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-accounts theme-wallet-vip-tokens"><!-- This layout page uses the theme-accounts styles while overwriting changes with theme-wallet-vip-tokens class  -->
            <header id="theme-accounts">
                <header>
                    <h1>
                        Charge the Wallet
                    </h1>
                    <h2 class="user-membership-level">
                        Buy More Get More
                    </h2>
                </header>
                <div id="number-of-tokens">
                    <svg width="40" height="36" viewBox="0 0 40 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M36.0312 8H6.25C5.55937 8 5 7.44063 5 6.75C5 6.05937 5.55937 5.5 6.25 5.5H36.25C36.9406 5.5 37.5 4.94063 37.5 4.25C37.5 2.17891 35.8211 0.5 33.75 0.5H5C2.23828 0.5 0 2.73828 0 5.5V30.5C0 33.2617 2.23828 35.5 5 35.5H36.0312C38.2203 35.5 40 33.818 40 31.75V11.75C40 9.68203 38.2203 8 36.0312 8ZM32.5 24.25C31.1195 24.25 30 23.1305 30 21.75C30 20.3695 31.1195 19.25 32.5 19.25C33.8805 19.25 35 20.3695 35 21.75C35 23.1305 33.8805 24.25 32.5 24.25Z" fill="#12EB90"/>
                    </svg>
                    <div id="infos">
                        You have<br />
                        <span>
                            <span class="data-injection">{{ $total_tokens }}</span> Tokens
                        </span>
                    </div>
                </div>
            </header>

            <!-- Landing section    -->
            <div id="landing-section">
                <div id="table-content-right">
                    <div id="wrapper-edit-options-sections">
                        <!-- Wallet charge  -->
                        <div id="wrapper-wallet-charge">
                            <div class="wrapper-banners">
                                <!-- Using Equalizer above to Watch inner div with class data-equalizer-watch to make those sections with the same height   -->
                                @foreach( $token_packages as $package)
                                    <section class="bannerbox-tokens my-tokens" data-equalizer-watch>
                                        <header>
                                            <h1>
                                                <span class="data-injection">{{ $package->tokens }}</span> TOKENS
                                            </h1>
                                            <h2>
                                            @php
                                                if ($package->bonus != 0) {
                                                    echo '+<span class="data-injection">' . $package->bonus . '</span>% Free';
                                                }
                                            @endphp
                                            </h2>
                                            <h3>
                                                @php
                                                    if ($package->package_type == 'vip') {
                                                        $rate = $token_rates->rates * $package->tokens;

                                                        $package_text = str_replace(['@token', '@rate', '@amount'], 
                                                        [$package->tokens, $rate, $package->amount], $package->vip_text);
                                                        echo '<span class="data-injection">' . $package_text . '</span>';
                                                    }
                                                @endphp
                                                <!-- (<span class="data-injection">5</span> Tokens) -->
                                            </h3>
                                        </header>
                                        <div class="cta">
                                            {{--<a id="package-{{ $package->id }}" title="Buy Tokens" data-token="{{ $package->tokens }}" data-bonus="{{ $package->bonus }}"--}}
                                               {{--data-amount="{{ $package->amount }}" data-type="{{ $package->package_type }}" onclick="buyToken(this.id)" title="Charge Now">--}}
                                                {{--Charge Now--}}
                                            {{--</a>--}}

                                            <a href="{{ $package->url }}" title="Charge Now">
                                                Charge Now
                                            </a>
                                        </div>
                                        <div class="tokens-euros">
                                            ???<span class="data-injection">{{ $package->amount }}</span>
                                        </div>
                                    </section>
                                @endforeach
                            </div>
                        </div>
                        <!-- //Wallet charge  -->
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
