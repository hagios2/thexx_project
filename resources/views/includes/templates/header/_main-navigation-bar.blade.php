<div id="menu-overlay"></div>
<div id="main-nav">
    <div id="wrapper-logo">
        <div id="logo">
            <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies">
        </div>
        <div class="close-btn">
            <button class="trigger-close">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 20C4.48593 20 0 15.5141 0 10C0 4.48593 4.48593 0 10 0C15.5141 0 20 4.48593 20 10C20 15.5141 15.5141 20 10 20ZM10 1.42853C5.27374 1.42853 1.42853 5.27374 1.42853 10C1.42853 14.7263 5.27374 18.5715 10 18.5715C14.7263 18.5715 18.5715 14.7263 18.5715 10C18.5715 5.27374 14.7263 1.42853 10 1.42853Z" fill="black"></path>
                    <path d="M13.5715 14.2857C13.3887 14.2857 13.2059 14.216 13.0665 14.0764L5.92367 6.93359C5.64458 6.65451 5.64458 6.20254 5.92367 5.92361C6.2026 5.64468 6.65472 5.64453 6.93365 5.92361L14.0764 13.0664C14.3555 13.3455 14.3555 13.7975 14.0764 14.0764C13.937 14.216 13.7543 14.2857 13.5715 14.2857V14.2857Z" fill="black"></path>
                    <path d="M6.42858 14.2858C6.24578 14.2858 6.06313 14.2161 5.92367 14.0764C5.64458 13.7975 5.64458 13.3454 5.92367 13.0665L13.0665 5.92367C13.3455 5.64458 13.7975 5.64458 14.0764 5.92367C14.3554 6.2026 14.3555 6.65472 14.0764 6.93365L6.93365 14.0764C6.79418 14.2161 6.61138 14.2858 6.42858 14.2858V14.2858Z" fill="black"></path>
                </svg>

            </button>
        </div>
    </div>
    <nav role="navigation">
        <div id="main-menu">
            <!-- Section for club areas -->
            <ul id="panel-menu-club-areas">
                <li>
                    <a href="/" title="Live Cams">
                        <img src="{{ url('images/icons/live.svg') }}" alt="Win tokens"> <span>Live Cams</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('videoshop') }}" title="Videoshop">
                        <img src="{{ url('images/icons/video-camera.svg') }}" alt="Win tokens"> <span>Videoshop</span>
                    </a>
                </li>
                {{--<li>--}}
                    {{--<a href="{{ route('win-tokens') }}" title="Win Tokens">--}}
                        {{--<img src="{{ url('images/icons/dice.svg') }}" alt="Win tokens"> <span>Win Tokens</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                <li>
                    <a href="{{ route('win-tokens') }}" title="Categories">
                        <img src="{{ url('images/icons/dice.svg') }}" alt="Categories"> <span>Categories</span>
                    </a>
                </li>
            </ul>
            <!-- //Section for club areas -->
            <!-- Section for club areas -->
            <ul id="panel-menu-pages">
                <li>
                    <a data-open="modal-login" title="Login" aria-controls="modal-login" aria-haspopup="true" tabindex="0">
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
            <!-- //Section for club areas -->
        </div>
        <footer id="main-nav-footer">
            <ul id="social-bar">
                <li>
                    <a href="#" title="">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.093 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.563V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" fill="#E1E1E1"></path></svg>
                    </a>
                </li>
                <li>
                    <a href="#" title="">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="M6.292 18.125c7.545 0 11.673-6.253 11.673-11.673 0-.176-.004-.356-.012-.532A8.332 8.332 0 0 0 20 3.796a8.09 8.09 0 0 1-2.355.645 4.125 4.125 0 0 0 1.804-2.27 8.247 8.247 0 0 1-2.605.996A4.108 4.108 0 0 0 9.85 6.91a11.654 11.654 0 0 1-8.456-4.284A4.108 4.108 0 0 0 2.664 8.1a4.108 4.108 0 0 1-1.86-.512v.051a4.102 4.102 0 0 0 3.293 4.023 4.078 4.078 0 0 1-1.851.07 4.111 4.111 0 0 0 3.831 2.852A8.23 8.23 0 0 1 0 16.282a11.64 11.64 0 0 0 6.292 1.843z" fill="#E1E1E1"></path></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h20v20H0z"></path></clipPath></defs></svg>
                    </a>
                </li>
                <li>
                    <a href="#" title="">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 1.8c2.672 0 2.988.012 4.04.06.976.042 1.503.206 1.855.343.464.18.8.399 1.148.746.352.352.566.684.746 1.149.137.351.3.882.344 1.855.047 1.055.058 1.371.058 4.04 0 2.671-.011 2.987-.058 4.038-.043.977-.207 1.504-.344 1.856-.18.465-.398.8-.746 1.148a3.077 3.077 0 0 1-1.148.746c-.352.137-.883.301-1.856.344-1.055.047-1.371.059-4.039.059-2.672 0-2.988-.012-4.04-.059-.976-.043-1.503-.207-1.855-.344a3.1 3.1 0 0 1-1.148-.746 3.076 3.076 0 0 1-.746-1.148c-.137-.352-.3-.883-.344-1.856-.047-1.054-.058-1.37-.058-4.039 0-2.672.011-2.988.058-4.039.043-.976.207-1.504.344-1.855.18-.465.398-.801.746-1.149a3.076 3.076 0 0 1 1.148-.746c.352-.137.883-.3 1.856-.344 1.05-.046 1.367-.058 4.039-.058zM10 0C7.285 0 6.945.012 5.879.059 4.816.105 4.086.277 3.453.523A4.88 4.88 0 0 0 1.68 1.68 4.9 4.9 0 0 0 .523 3.45C.277 4.085.105 4.811.06 5.874.012 6.945 0 7.285 0 10s.012 3.055.059 4.121c.046 1.063.218 1.793.464 2.426.258.66.598 1.219 1.157 1.773a4.888 4.888 0 0 0 1.77 1.153c.636.246 1.362.418 2.425.465 1.066.046 1.406.058 4.121.058 2.715 0 3.055-.012 4.121-.058 1.063-.047 1.793-.22 2.426-.465a4.888 4.888 0 0 0 1.77-1.153 4.888 4.888 0 0 0 1.152-1.77c.246-.636.418-1.363.465-2.425.047-1.066.058-1.406.058-4.121 0-2.715-.011-3.055-.058-4.121-.047-1.063-.22-1.793-.465-2.426A4.683 4.683 0 0 0 18.32 1.68 4.889 4.889 0 0 0 16.55.527C15.915.281 15.188.11 14.126.062 13.055.012 12.715 0 10 0z" fill="#E1E1E1"></path><path d="M10 4.863A5.138 5.138 0 0 0 4.863 10a5.138 5.138 0 0 0 10.273 0c0-2.836-2.3-5.137-5.136-5.137zm0 8.469a3.333 3.333 0 1 1 .001-6.665A3.333 3.333 0 0 1 10 13.332zm6.54-8.672a1.2 1.2 0 1 1-2.4 0 1.2 1.2 0 0 1 2.4 0z" fill="#E1E1E1"></path></svg>
                    </a>
                </li>
                <li>
                    <a href="#" title="">
                        <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path d="M14.182 2.362H1.818A1.32 1.32 0 0 0 .5 3.68v7.64a1.32 1.32 0 0 0 1.318 1.319h12.364A1.32 1.32 0 0 0 15.5 11.32V3.68a1.32 1.32 0 0 0-1.318-1.318zm-.172.879l-.176.146-5.31 4.422a.817.817 0 0 1-1.047 0l-5.31-4.422-.177-.146h12.02zm-12.631.634l4.327 3.603-4.327 2.88V3.875zm12.803 7.885H1.818a.44.44 0 0 1-.43-.352L6.41 8.065l.504.42a1.693 1.693 0 0 0 2.17 0l.505-.42 5.022 3.343a.44.44 0 0 1-.43.352zm.44-1.402l-4.328-2.88 4.327-3.603v6.483z" fill="#fff"></path></g><defs><clipPath id="a"><path fill="#fff" transform="translate(.5)" d="M0 0h15v15H0z"></path></clipPath></defs></svg>
                    </a>
                </li>
            </ul>
        </footer>
    </nav>
</div>
