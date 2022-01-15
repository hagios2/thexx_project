<x-app-layout>
    <div id="main-area" class="inner-page-design">
        @if(Session::has('success_' . $user_id))
            <div id="bar-model-account" style="background: forestgreen">
                <div id="wrapper-ratings">
                    <div id="favorites-you">
                        <p class="pay_success">{{ Session::get('success_' . $user_id) }}</p>
                    </div>
                </div>
            </div>
            @php
                Session::forget('success_' . $user_id);
            @endphp
        @endif
        <main id="design-theme" class="theme-accounts">
            <header id="theme-accounts">
                <header>
                    <h1>
                        YOUR CLUB WALLET
                    </h1>
                </header>
            </header>
            <!-- Manage your wallet    -->
            <div id="wrapper-manage-wallet" class="grid-x">
                @php
                    if (isset(Auth::user()->id)) {
                        if (Auth::user()->user_role == 'user') {
                            $panel = 'false';
                        }
                        else {
                            $panel = 'true';
                        }
                                                     }
                @endphp


                <div id="tokens-info" class="cell small-12 medium-4 large-3">
                    <section class="bannerbox-info">
                        <div class="inner-box">
                            <header>
                                <svg width="50" height="44" viewBox="0 0 50 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.8125 10.5H45.0391C47.2772 10.5 49 12.2074 49 14.1875V39.1875C49 41.1676 47.2772 42.875 45.0391 42.875H6.25C3.35014 42.875 1 40.5249 1 37.625V6.375C1 3.47514 3.35014 1.125 6.25 1.125H42.1875C44.2241 1.125 45.875 2.77592 45.875 4.8125C45.875 5.1235 45.6235 5.375 45.3125 5.375H7.8125C6.39693 5.375 5.25 6.52193 5.25 7.9375C5.25 9.35307 6.39693 10.5 7.8125 10.5ZM36.5 26.6875C36.5 28.9654 38.3471 30.8125 40.625 30.8125C42.9029 30.8125 44.75 28.9654 44.75 26.6875C44.75 24.4096 42.9029 22.5625 40.625 22.5625C38.3471 22.5625 36.5 24.4096 36.5 26.6875Z"
                                          stroke="white" stroke-width="2"/>
                                </svg>
                                <h1>
                                    You have
                                    @if ($panel == "true")
                                        <span>received</span>
                                    @endif
                                </h1>
                                <h2>
                                    <span class="data-injection">{{ $total_tokens }}</span> TOKENS
                                </h2>
                                <h3>
                                    $<span class="data-injection">{{ $total_amount }}</span>
                                </h3>
                            </header>
                        </div>
                    </section>
                    @if ($panel == "true")
                        <div class="withdraw-options">
                            <form>
                                <ul>
                                    <li>
                                        <input type="text" placeholder="Define amount"/>
                                    </li>
                                    <li id="cta-options">
                                        <ul>
                                            <li>
                                                <button>
                                                    Half
                                                </button>
                                            </li>
                                            <li>
                                                <button>
                                                    All
                                                </button>
                                            </li>
                                            <li class="cta-highlight">
                                                <a href="{{ route('wallet-model-2') }}" title="Withdraw">
                                                    Withdraw
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    @endif
                </div>


                <div id="wallet-data" class="cell small-12 medium-8 large-9">
                    <div id="inner-waller-data"><!-- this div is layout oriented only. Necessary for styling    -->
                        <!-- Calendar picker    -->
                        <!--<div id="wrapper-calendar-interval">-->
                        <!--    <label for="begin">Start date</label>-->
                        <!--    <input type="date" id="begin" name="startdate" onchange="calendarInterval_begin()">-->
                        <!--    <label for="end">End date:</label>-->
                        <!--    <input type="date" id="end-date" name="enddate" -->
                        <!--    onchange="calendarInterval_end()">-->

                        <!--</div>-->
                        <div id="wrapper-calendar-interval">
                            <form method="post" action="{{ route('wallet-model') }}" enctype="multipart/form-data" class="w-100">
                                {{ csrf_field() }}
                                <label for="begin">Start date</label>


                                @if (Session::has('start_date'))
                                    <input type="date" id="begin" value={{ Session::get('start_date')}} name="startdate">
                                @else
                                    <input type="date" id="begin" name="startdate">
                                @endif

                                <label for="end">End date:</label>
                                @if (Session::has('end_date'))
                                    <input type="date" id="end-date" value={{ Session::get('end_date')}} name="enddate">
                                @else
                                    <input type="date" id="end-date" name="enddate">
                                @endif

                                <input type="submit" value="Filter"/>
                            </form>
                        </div>

                        <!-- //Calendar picker    -->

                        <!-- Wallet content list    -->
                        <div id="wallet-content-list" class="grid-x">
                            <div id="left-column" class="cell small-12 medium-6">
                                <section class="wrapper-wallet-listings">
                                    <header>
                                        <h1>
                                            Transactions History
                                        </h1>
                                    </header>
                                    <ul class="history-listings">
                                        @foreach ($token_buy as $list)
                                            @php
                                                $addon = '';
                                                if ($list->user_role == 'user') {
                                                    $addon = '-';
                                                    // minus for only users because they can only buy the tokens
                                                    // which means the amount is debited always.
                                                }
                                            @endphp
                                            <li>
                                                <div class="history-title">
                                                    {{ $addon }}{{ $list->amount }}$ ({{ $list->tokens }} tokens)
                                                </div>
                                                @php
                                                    $created_at = explode(' ', $list->created_at);
                                                @endphp
                                                <div class="history-date">
                                                    {{ $created_at[0] }}
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </section>
                            </div>
                            <div id="right-column" class="cell small-12 medium-6">
                                <section class="wrapper-wallet-listings">
                                    <header>
                                        <h1>
                                            Earnings History
                                        </h1>
                                        <h3>

                                            @if (Session::has('message_range_data'))
                                                {{ Session::get('message_range_data')}}
                                            @endif
                                        </h3>
                                    </header>
                                    <ul class="history-listings">
                                    @foreach ($token_earning as $list)
                                        @if ($list->user_role == 'model')
                                            <!-- Only for models, they are credited the tokens from the users -->
                                                <li>
                                                    <div class="earnings-title">
                                                        <span class="green-title">
                                                            <span class="data-injection">{{ $list->tokens }}</span> tokens
                                                        </span>
                                                        from {{ $list->name }}
                                                    </div>
                                                    @php
                                                        $created_at = explode(' ', $list->created_at);
                                                    @endphp
                                                    <div class="history-date">
                                                        {{ $created_at[0] }}
                                                    </div>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </section>
                            </div>
                        </div>
                        <!-- //Wallet content list    -->
                    </div>
                </div>
            </div>
            <!-- //Manage your wallet    -->
        </main>
    </div>
</x-app-layout>
