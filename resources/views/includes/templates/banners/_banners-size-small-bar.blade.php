<!-- Banners bar    -->
<div id="wrapper-banners-bar" class="small-banner-size grid-x">
    <div class="swiper-banner-small-size">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            @foreach( $token_packages as $package)
                @php
                    if ($package->package_type == 'vip') {
                        $rate = $token_rates->rates * $package->tokens;
    
                        $package_text = str_replace(['@token', '@rate', '@amount'], 
                        [$package->tokens, $rate, $package->amount], $package->vip_text);
    
                        $type="vip";
                    }
                    else {
                        $type="";
                        $package_text = $package->tokens . ' tokens for €' . $package->amount . ' EUR';
                        if ($package->bonus != 0) {
                            $package_text .= ' (' . $package->bonus .  '% bonus)';
                        }
                    }
                @endphp
                <div class="banner-small swiper-slide token_package">
                    {{--<a id="package-{{ $package->id }}" title="Buy Tokens" data-token="{{ $package->tokens }}" data-bonus="{{ $package->bonus }}"--}}
                       {{--data-amount="{{ $package->amount }}" data-type="{{ $type }}" onclick="buyToken(this.id)">--}}
                        {{--<img class="flame" src="{{ asset("/images/icons/flame.svg") }}" alt="{{ $package_text }}" title="{{ $package_text }}">--}}
                        {{--<h5>{{ $package_text }}</h5>--}}
                    {{--</a>--}}

                    <a title="Buy Tokens" href="{{ $package->url }}">
                        <img class="flame" src="{{ asset("/images/icons/flame.svg") }}" alt="{{ $package_text }}" title="{{ $package_text }}">
                        <h5>{{ $package_text }}</h5>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- //Banners bar    -->