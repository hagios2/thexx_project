<!-- Modal Windows  -->
<!-- Modal for login and reset password USER MODELS -->

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script> --}}

<section class="reveal" id="modal-login" data-reveal data-animation-in="fade-in" data-animation-out="fade-out" data-close-on-click="false">
    <header>
        <h1>
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
        </h1>
        <h2>
            Welcome Back!
        </h2>
    </header>
    <x-guest-layout>
        <x-jet-validation-errors class="mb-4"/>
    </x-guest-layout>
    <div class="modal-stage">

        {{-- @if (session('status'))
        
          <h4>{{ session('status') }}</h4>   --}}
        <h5 id="load" style="display:none;color:red">Wrong!!!</h5>

        {{-- @endif --}}
        {{-- <form method="POST" action="{{ route('login') }}"> --}}

        <form>
            @csrf
            <input type="email" id="email" name="email" placeholder="Your E-Mail"/>
            <input type="password" id="pwd" name="password" placeholder="Your password"/>

            <div id="footer-options">
                <ul>
                    <li>
                        <a data-open="modal-reset-password" title="History back">
                            <span class="reset-password">Reset Password</span>
                        </a>
                    </li>
                    <li>
                        <button style="color: white" type="button" onclick="SubmitLogin()">
                            <a><span>Login</span></a>
                        </button>
                    </li>
                </ul>
            </div>
        </form>
        <div id="wrapper-register-account">
            <h2>
                Don't have an account yet?
            </h2>
            <a href="{{ route('be-a-user-1') }}" title="Don't have an account yet? Click here!">
                Click here!
            </a>
        </div>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</section>
<!-- //Modal for login and reset password USER MODELS -->

<!-- Reset Password process step 1 -->
<section class="reveal" id="modal-reset-password" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <header>
        <h1>
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
        </h1>
        <h2>
            Reset your password now.
        </h2>
        <h5 id="load_reset" style="display:none;color:red">Please wait...</h5>

    </header>
    <div class="modal-stage">
        <form>
            @csrf
            <input id="Email_ResetPwd" name="Email_ResetPwd" type="email" placeholder="Your E-Mail"/>
            <div id="footer-options">
                <ul>
                    <li>
                        <!--<a data-open="modal-login" title="Back to Login">-->
                        <!--    <span class="reset-password">Back to Login</span>-->
                        <!--</a>-->
                    </li>
                    <li>
                        <a id="reset_class_1" onclick="ResetPassword()" data-open="modal-success-reset-password" title="Reset your password now!">
                            <span>Reset Password</span>
                        </a>
                        {{-- <a id="reset_class_2"  data-open="modal-success-reset-password" title="Reset your password now!" style="display:none">
                            <span>Reset Password1</span>
                        </a>
                         --}}
                        {{-- <button  data-open="modal-success-reset-password" style="color: white" type="button" onclick="ResetPassword()" >
                            <a><span>Reset Password</span></a>
                          </button> --}}
                        {{-- <button type="button">Reset Password</button> --}}
                    </li>
                </ul>
            </div>
        </form>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</section>
<!-- //Reset Password process step 1 -->

<!-- Reset Password process step 2 -->
<section class="reveal" id="modal-success-reset-password" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <header>
        <h1>
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
        </h1>
        <h2>
            Your new website access instructions has been sent to your email.
        </h2>
        <h3>
            See you soon!
        </h3>
    </header>
    <div class="modal-stage">
        <div id="footer-options">
            <ul>
                <li>
                    <a data-open="modal-login" title="Login into your account!">
                        <span>Start Now</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</section>
<!-- //Reset Password process step 2 -->

<!-- Upload Video -->
<section class="reveal" id="modal-upload-video" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <header>
        <h4 style="width: 200px; margin: auto">
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
        </h4>
        <h4 style="color: #05BE70; margin-top: 20px;">
            Uploading file...
        </h4>
        <h4 style="color: white; margin-top: 20px;">
            Please wait
        </h4>
    </header>
</section>

<!--live  streaming start show-->
<section class="reveal" id="live-streaming-show" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <header>
        <h4 style="width: 200px; margin: auto">
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
        </h4>
        <h4 style="color: #05BE70; margin-top: 20px;">
            Starting live stream
        </h4>
        <h4 style="color: white; margin-top: 20px;">
            Please wait..
        </h4>
    </header>
</section>

<!-- Modal Success More Tokens -->
<div class="reveal" id="modal-more-tokens" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <header>
        <h1>
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
        </h1>
        <div class="info-icon">
            <img src="{{ url('images/icons/wallet-green.svg') }}" alt="You've added More Tokens!!!"/>
        </div>
        <h2>
            You have added +<span class="data-infection">79.99</span> TOKENS
        </h2>
        <h3>
            Enjoy your time!
        </h3>
    </header>
    <div class="modal-stage">
        <div id="footer-options">
            <ul>
                <li>
                    <a data-open="modal-login" title="Login into your account!">
                        <span>Start Now</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal Success More Tokens -->

<!-- Modal Banner Teaser 50% Discount   -->
<div class="reveal mkt" id="modal-50-discount" data-reveal data-animation-in="spin-in" data-animation-out="spin-out">
    <div class="modal-stage">
        <a href="#" title="Register an account today!">
            <img src="{{ url('images/layout/banner-teaser-50-discount.jpg') }}" alt="50% Discount! UNKLOCK YOUR FANTASIES NOW!"/>
        </a>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal Banner Teaser 50% Discount   -->

<!-- Modal Disable Account   -->
<div class="reveal negative-status" id="modal-disable-account" data-reveal data-animation-in="fade-in" data-animation-out="fade-out">
    <section class="modal-stage">
        <header>
            <div class="wrapper-alert">
                <div class="title-alert">
                    <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M29.7137 23.3728L16.829 1.05598C16.4473 0.394746 15.7635 0 15 0C14.2365 0 13.5527 0.394746 13.171 1.05598L0.286348 23.3728C-0.0954492 24.034 -0.0954492 24.8236 0.286348 25.4848C0.668086 26.146 1.35182 26.5407 2.11535 26.5407H27.8846C28.6482 26.5407 29.3319 26.146 29.7137 25.4848C30.0954 24.8236 30.0954 24.034 29.7137 23.3728ZM28.1895 24.6048C28.1516 24.6705 28.0614 24.7808 27.8847 24.7808H2.11535C1.93852 24.7808 1.8484 24.6706 1.81055 24.6048C1.77264 24.5391 1.72213 24.4059 1.81055 24.2528L14.6951 1.93594C14.7836 1.78283 14.9241 1.75992 14.9999 1.75992C15.0759 1.75992 15.2164 1.78277 15.3047 1.93594L28.1895 24.2528C28.2779 24.4059 28.2274 24.5391 28.1895 24.6048Z"
                              fill="black"/>
                        <path d="M15.8803 8.00244H14.1204V17.389H15.8803V8.00244Z" fill="black"/>
                        <path d="M15.0002 21.4957C15.6483 21.4957 16.1736 20.9704 16.1736 20.3224C16.1736 19.6744 15.6483 19.149 15.0002 19.149C14.3522 19.149 13.8269 19.6744 13.8269 20.3224C13.8269 20.9704 14.3522 21.4957 15.0002 21.4957Z"
                              fill="black"/>
                    </svg>
                    <h1>
                        Attention!
                    </h1>
                    <h2>
                        We are about to disable your account :(
                    </h2>
                </div>
            </div>
        </header>
        <div class="wrapper-content">
            <ul class="confirmation-options">
                <li>
                    <a id="cancel_disabled" title="Cancel Account deactivation">
                        I've Thought better... I'm staying!
                    </a>
                </li>
                <li class="btn-disable-account">
                    <a id="account_disabled" title="Disable Account">
                        <svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M29.7137 23.3728L16.829 1.05598C16.4473 0.394746 15.7635 0 15 0C14.2365 0 13.5527 0.394746 13.171 1.05598L0.286348 23.3728C-0.0954492 24.034 -0.0954492 24.8236 0.286348 25.4848C0.668086 26.146 1.35182 26.5407 2.11535 26.5407H27.8846C28.6482 26.5407 29.3319 26.146 29.7137 25.4848C30.0954 24.8236 30.0954 24.034 29.7137 23.3728ZM28.1895 24.6048C28.1516 24.6705 28.0614 24.7808 27.8847 24.7808H2.11535C1.93852 24.7808 1.8484 24.6706 1.81055 24.6048C1.77264 24.5391 1.72213 24.4059 1.81055 24.2528L14.6951 1.93594C14.7836 1.78283 14.9241 1.75992 14.9999 1.75992C15.0759 1.75992 15.2164 1.78277 15.3047 1.93594L28.1895 24.2528C28.2779 24.4059 28.2274 24.5391 28.1895 24.6048Z"
                                  fill="black"/>
                            <path d="M15.8803 8.00244H14.1204V17.389H15.8803V8.00244Z" fill="black"/>
                            <path d="M15.0002 21.4957C15.6483 21.4957 16.1736 20.9704 16.1736 20.3224C16.1736 19.6744 15.6483 19.149 15.0002 19.149C14.3522 19.149 13.8269 19.6744 13.8269 20.3224C13.8269 20.9704 14.3522 21.4957 15.0002 21.4957Z"
                                  fill="black"/>
                        </svg>
                        <span>I'm sure! Disable my account</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<!-- //Modal Disable account   -->

<!-- //Modal Windows  -->

{{--+18 CONSENT--}}
<section class="reveal modal" id="modal_over_18_consent" data-reveal data-animation-in="fade-in" data-animation-out="fade-out" data-close-on-click="false">
    <header>
        <h1>
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
        </h1>
        <h2>
            The {{ config("app.name") }} contains adult content. By using this site, you are stating and confirming that you are more than 18 years of age.
        </h2>
    </header>
    <div class="modal-stage">

        {{-- @if (session('status'))

          <h4>{{ session('status') }}</h4>   --}}
        {{--<h5 id="load" style="display:none;color:red">Wrong!!!</h5>--}}

        {{-- @endif --}}
        {{-- <form method="POST" action="{{ route('login') }}"> --}}

        <div class="footer-options">
            <ul>
                <li>
                    <button class="btn_green_full_round" type="button" id="btn_over_18_consent">
                        Accept
                    </button>
                </li>
            </ul>
        </div>
    </div>
</section>
