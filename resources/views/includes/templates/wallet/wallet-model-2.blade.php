<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-accounts">
            <header id="theme-accounts">
                <header>
                    <h1>
                        YOUR CLUB WALLET
                    </h1>
                </header>
                @include('includes.templates.wallet._bar-wallet-model')
            </header>
            <!-- Manage your wallet    -->
            <div id="wrapper-manage-wallet" class="grid-x">
                <div id="tokens-info" class="cell small-12 medium-4 large-3">
                    <section class="bannerbox-info">
                        <div class="inner-box">
                            <header>
                                <h1>
                                    You are withdrawing
                                </h1>
                                <h2>
                                    <span class="data-injection">100</span> TOKENS
                                </h2>
                                <h3>
                                    $<span class="data-injection">30.50</span>
                                </h3>
                            </header>
                        </div>
                    </section>
                </div>
                <div id="wallet-data" class="cell small-12 medium-8 large-9">
                    <div id="withdrawing-confirmation" class="grid-x">
                        <div id="confirmation-form" class="cell small-12 medium-5">
                            <form>
                                <select id="option1" name="options">
                                    <option>Ethnicy</option>
                                    <option value="Option 1">Option 1</option>
                                    <option value="Option 2">Option 2</option>
                                    <option value="Option 3">Option 3</option>
                                    <option value="Option 4">Option 4</option>
                                </select>
                                <input type="text" placeholder="Set new Wiretransfer ID/account number" />
                                <div id="footer-options">
                                    <ul>
                                        <li>
                                            <a href="#" title="Withdraw">
                                                <span>Withdraw</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="wrapper-terms-conditions">
                                    <input id="c1" type="checkbox">
                                    <label class="checkbox-radio-switch-label" for="c1">Checkbox</label>
                                    <p>
                                        I've <a href="/terms-conditions" title="read and accept the Terms and Conditions">read and accept</a> the Terms and Conditions.
                                    </p>
                                </div>
                            </form>
                        </div>
                        <section id="confirmation-message" class="cell small-12 medium-5">
                            <header>
                                <h1>
                                    You are about to withdraw money from your XXX Club account.
                                </h1>
                            </header>
                            <p>
                                Current method is WireTransfer only. Please add or select an account. Transfers usually take 24 hours maximum.
                            </p>
                        </section>
                    </div>
                </div>
            </div>
            <!-- //Manage your wallet    -->

        </main>
    </div>
</x-app-layout>