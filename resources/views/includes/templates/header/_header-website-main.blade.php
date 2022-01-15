<!-- Website main header    -->
<header id="main-header">
    <!-- Top division of the header -->
    <div id="inner-header-top" class="grid-x">
        <!-- Header:: Left section    -->
        <div id="wrapper-logo-menu" class="cell small-3 medium-6">
            <div id="wrapper-inner-logo-menu">
                <div id="logo">
                    <a href="/" title="Homepage">
                        <img src="{{ url('images/layout/logo-thexxxclub-default.svg') }}" alt="THE XXX CLUB | Unlock Your Fantasies"/>
                    </a>
                </div>
                <nav id="navigation-club-areas" class="show-for-medium show-for-landscape">
                    <ul>
                        <li>
                            <a href="/" title="Live cams">
                                Live cams
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('videoshop') }}" title="Videoshop">
                                Videoshop
                            </a>
                        </li>
                        {{--<li>--}}
                        {{--<a href="{{ route('win-tokens') }}" title="Win Tokens">--}}
                        {{--Win Tokens--}}
                        {{--</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="/categories/id=VideoshopCategories" title="Categories">
                                Categories
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- //Header:: Left section    -->
        <!-- Header:: Right section    -->
        <div id="wrapper-user-menu-main-nav" class="cell small-9 medium-6">
            <div id="wrapper-inner-user-menu-main-nav">
                @csrf
                @php
                    if (isset(Auth::user()->id)) {
                        if (Auth::user()->user_role == 'user') {
                            $panel = 'panel-user-member-account';
                            $user_role = 'Member';
                        }
                        else {
                            $panel = 'panel-user-account';
                            $user_role = 'Model';
                        }
                        echo '<ul id="user-options">';
                        echo '<li>';
                            /* '<a href="#" title="Add Tokens" class="highlighted-item">';
                            echo '<span>Welcome </span>';
                            echo $user_role;
                                echo '</a>';*/
                            echo '</li>';
                            if(Auth::check() && Auth::user()->user_role == "user"){
                                echo '<li>';
                                echo '<a href="/wallet-charge-1" title="Add Tokens" class="highlighted-item">Add Tokens</a>';
                                echo '</li>';
                            }
                            echo '<li>';
                                echo '<a data-toggle="' . $panel .  '" title="Account">';
                                echo '<span>Account</span>';
                                    echo '<svg width="9" height="6" viewBox="0 0 9 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.76739 0.532983C9.03587 0.823136 9.03587 1.29357 8.76739 1.58372L4.98614 5.67012C4.71765 5.96027 4.28235 5.96027 4.01386 5.67012L0.232615 1.58372C-0.0358709 1.29357 -0.0358709 0.823135 0.232615 0.532983C0.5011 0.24283 0.936401 0.24283 1.20489 0.532983L4.5 4.09402L7.79511 0.532983C8.0636 0.24283 8.4989 0.24283 8.76739 0.532983Z" fill="#C4C4C4"/>
                                    </svg>';
                                echo '</a>';
                            echo '</li>';
                            echo '<li>';
                                echo '<form method="POST" action="\logout">';
                @endphp
                @csrf
                @php
                    echo '<button type="submit">';
                        echo '<a title="">';
                            echo '<span>Logout</span>';
                        echo '</a>';
                    echo '</button>';
                echo '</form>';
            echo '</li>';
        echo '</ul>';
    }
    else {
        echo '<ul id="user-options">';
            echo '<li>';
                echo '<a href="/be-a-model-1" title="Be a Model" class="highlight-secondary">Be a Model</a>';
            echo '</li>';
            echo '<li>';
                echo '<a href="/be-a-user-1" title="Register for free" class="highlighted-item">';
                    echo 'Register <span class="show-for-medium">for free</span>';
                echo '</a>';
            echo '</li>';
            echo '<li>';
                echo '<a data-open="modal-login" title="Login" aria-controls="modal-login" aria-haspopup="true" tabindex="0">Login</a>';
            echo '</li>';
        echo '</ul>';
    }
                @endphp
                <ul id="lang-site-navigation-panel">
                    <!-- ATTENTION: ADD this only for inner pages  -->
                    <!--<li id="history-back" class="show-for-medium">
                        <a href="javascript: history.go(-1)" title="Previous page">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path d="M20 40C31.028 40 40 31.0279 40 19.9999C40 8.972 31.028 -1.97645e-06 20 -2.94055e-06C8.972 -3.90465e-06 1.52046e-06 8.97199 5.56373e-07 19.9999C-4.07725e-07 31.0279 8.972 40 20 40ZM20 3.63636C29.023 3.63636 36.3636 10.9771 36.3636 19.9999C36.3636 29.0228 29.023 36.3636 20 36.3636C10.977 36.3636 3.63636 29.0228 3.63636 19.9999C3.63637 10.9771 10.9771 3.63636 20 3.63636Z" fill="black"/>
                                    <path d="M17.5024 28.5581C18.2123 29.2681 19.3636 29.2681 20.0736 28.5581C20.7837 27.8482 20.7837 26.6969 20.0736 25.9868L15.9046 21.8178L28.4852 21.817C29.4893 21.817 30.3033 21.0028 30.3032 19.9987C30.3032 18.9946 29.489 18.1807 28.4849 18.1807L15.905 18.1814L20.0738 14.0125C20.7838 13.3026 20.7838 12.1513 20.0738 11.4413C19.7187 11.0862 19.2535 10.9087 18.7882 10.9087C18.3229 10.9087 17.8575 11.0862 17.5026 11.4413L10.2299 18.7141C9.88855 19.0553 9.69704 19.5176 9.69704 19.9999C9.69704 20.4822 9.88867 20.9447 10.2296 21.2855L17.5024 28.5581Z" fill="black"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="40" height="40" fill="white" transform="translate(40 40) rotate(-180)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>-->
                    {{--<li class="show-for-large">--}}
                    {{--<button title="Language Selectors" id="trigger-language-selector">--}}
                    {{--<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                    {{--<path d="M10 20C15.5062 20 20 15.5059 20 10C20 4.49375 15.5059 0 10 0C4.49379 0 0 4.4941 0 10C0 15.5063 4.4941 20 10 20ZM12.9667 18.3147C13.5333 17.5907 13.9676 16.7271 14.2938 15.859H16.5971C15.6211 16.957 14.3763 17.8102 12.9667 18.3147ZM17.4775 14.6875H14.6726C15.0184 13.4302 15.2213 12.0361 15.2644 10.5859H18.8082C18.7095 12.0855 18.2348 13.4838 17.4775 14.6875ZM17.4775 5.3125C18.2348 6.51621 18.7095 7.91453 18.8082 9.41406H15.2644C15.2213 7.96391 15.0184 6.56984 14.6726 5.3125H17.4775ZM16.5971 4.14062H14.2938C13.9677 3.27324 13.5334 2.40953 12.9666 1.68527C14.3763 2.18977 15.6211 3.04297 16.5971 4.14062ZM10.5859 1.27211C11.7358 1.66184 12.5607 3.02934 13.0325 4.14062H10.5859V1.27211ZM10.5859 5.3125H13.4542C13.8268 6.54602 14.0459 7.94543 14.0921 9.41406H10.5859V5.3125ZM10.5859 10.5855H14.0921C14.0459 12.0546 13.8268 13.454 13.4542 14.6875H10.5859V10.5855ZM10.5859 15.859H13.0325C12.5599 16.9725 11.7348 18.3385 10.5859 18.7279V15.859ZM3.40289 15.8594H5.70625C6.03234 16.7268 6.4666 17.5905 7.03336 18.3147C5.62371 17.8103 4.37887 16.957 3.40289 15.8594ZM9.41406 18.7279C8.26519 18.3385 7.4402 16.9727 6.96754 15.8594H9.41406V18.7279ZM9.41406 14.6875H6.54582C6.17324 13.454 5.95406 12.0546 5.90793 10.5859H9.41406V14.6875ZM9.41406 9.41406H5.90793C5.95406 7.94543 6.17324 6.54602 6.54582 5.3125H9.41406V9.41406ZM9.41406 1.27211V4.14062H6.96754C7.44016 3.02742 8.26512 1.66152 9.41406 1.27211ZM7.03332 1.68527C6.46672 2.4093 6.03246 3.27285 5.70621 4.14062H3.40289C4.37887 3.04297 5.62371 2.18973 7.03332 1.68527ZM2.52254 5.31211H5.32738C4.9816 6.56984 4.77875 7.96391 4.73563 9.41406H1.1918C1.29055 7.91453 1.76523 6.51621 2.52254 5.31211ZM1.1918 10.5859H4.73563C4.77875 12.0361 4.9816 13.4302 5.32738 14.6875H2.52254C1.76523 13.4838 1.29055 12.0855 1.1918 10.5859Z" fill="#828282"/>--}}
                    {{--</svg>--}}
                    {{--</button>--}}
                    {{--</li>--}}
                    <li>
                        <button title="Navigation" id="trigger-site-navigation">
                            <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="24" height="4" fill="#E1E1E1"/>
                                <rect y="8" width="24" height="4" fill="#E1E1E1"/>
                                <rect y="16" width="24" height="4" fill="#E1E1E1"/>
                            </svg>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <!-- //Header:: Right section    -->
    </div>
    <!-- //Top division of the header -->
    @include('includes.templates.header._secondary-header-bar')
</header>
<!-- //Website main header    -->