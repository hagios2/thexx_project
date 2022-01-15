<!-- Website Main Footer    -->
<footer id="main-footer">
    <div id="logo">
        <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies" />
    </div>
    <nav>
        <ul>
            <li>
                <a data-open="modal-login" title="Login">
                    Model Login
                </a>
            </li>
            <li>
                <a href="{{ route('terms-conditions') }}" title="Terms and Conditions">
                    Terms and Conditions
                </a>
            </li>
            <li>
                <a href="{{ route('privacy-policy') }}" title="Privacy Policy">
                    Privacy Policy
                </a>
            </li>
            <li>
                <a href="{{ route('law-compliance') }}" title="Law Compliance">
                    Law Compliance
                </a>
            </li>
            <li>
                <a href="{{ route('support') }}" title="Support">
                    Support
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="{{ route('affiliates') }}" title="Affiliates">--}}
                    {{--Affiliates--}}
                {{--</a>--}}
            {{--</li>--}}
            <li>
                <a href="{{ route('disable-account') }}" title="Disable Account">
                    Disable Account
                </a>
            </li>
        </ul>
    </nav>
    <div id="copyright">
        <p>
            {{--© {!! config("other.company_name") !!}, address address address, zip code, British Virgin Islands--}}
            © {!! config("other.company_name") !!}
        </p>
    </div>
</footer>
<!-- //Website Main Footer    -->
 @include('includes.templates.modals._modals')
 @include('includes._dropdown-panels')
 @include('includes.templates.header._main-navigation-bar')
<div class="scrollup"></div>
