<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-accounts theme-wallet-vip-tokens"><!-- This layout page uses the theme-accounts styles while overwriting changes with theme-wallet-vip-tokens class  -->
            <header id="theme-accounts">
                @php
                    $time = '';
                    if ($user_transaction != '') {
                        $text = 'Wow, You have a VIP Account';
                        $subtext = 'You have the access to Model VideoShop, Private Chat with Models, Ads free website';
                        $time = 'You are a vip member since ' . explode(' ', $user_transaction->created_at)[0];
                    }
                    else {
                        $text = 'You don\'t have a VIP Account';
                        $subtext = 'Buy more, Get more';
                    }
                @endphp
                <header style="width: 100%;">
                    <h1>
                        {{ $text }}
                    </h1>
                    <h2 class="user-membership-level">
                        {{ $subtext }}
                    </h2>
                    
                    <h2 class="user-membership-level" style="float: right;">
                        {{ $time }}
                    </h2>
                </header>
            </header>

            <!-- Landing section    -->
            <div id="landing-section">
                <div id="table-content-right">
                    <div id="wrapper-edit-options-sections">
                        <!-- Wallet charge  -->
                        <div id="wrapper-wallet-charge">
                            <h5 style="color:white">Available VIP packages</h5>
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
                                        <a id="package-{{ $package->id }}" title="Buy Tokens" data-token="{{ $package->tokens }}" data-bonus="{{ $package->bonus }}"
                                            data-amount="{{ $package->amount }}" data-type="{{ $package->package_type }}" onclick="buyToken(this.id)" title="Charge Now">
                                                Charge Now
                                            </a>
                                        </div>
                                        <div class="tokens-euros">
                                            $<span class="data-injection">{{ $package->amount }}</span>
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
