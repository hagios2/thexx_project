<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-register">
            <!-- Landing section    -->
            <div id="landing-section">
                <section id="center-title-theme">
                    <header>
                        <h1>
                            Create account
                        </h1>
                    </header>
                </section>
            </div>
            <!-- //Landing section    -->

            <div id="secondary-section">
                <div id="wrapper-create-account-steps">
                    <ul id="steps-tabs">
                        <li class="active">
                            Create account
                        </li>
                        <li>
                            Personal data
                        </li>
                        <li>
                            Documents
                        </li>
                    </ul>
                    <div id="wrapper-content-inner-pages" class="small-center-division">
                        @if ($errors->any())
                            <div class="alert alert-danger m-2" style="background-color: red">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="m-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div id="steps-panel">
                            <form>
                                {{ csrf_field() }}

                                <input type="email" id="emailModel" name="email" placeholder="Your E-Mail" required />
                                <input type="password" minlength="6" id="passwordModel" name="password" placeholder="Set a password" required autocomplete="new-password" />
                                <input type="password" minlength="6" id="passwordConfirmationModel" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password"  />
                                <div id="footer-options">
                                    <ul>
                                        <li>
                                            <a id="back_button" href="javascript: history.go(-1)" title="History back">
                                                <span class="previous">Back</span>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" onclick="SavePage2()">
                                                <a><span>Next</span></a>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="wrapper-terms-conditions">
                                    <input id="termsConditionCheck" onchange="toggleCheckbox(this)" type="checkbox" required>
                                    <label class="checkbox-radio-switch-label" for="termsConditionCheck">Checkbox</label>
                                    <p>
                                        I've <a href="/terms-conditions" title="read and accept the Terms and Conditions">read and accept</a> the Terms and Conditions.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
