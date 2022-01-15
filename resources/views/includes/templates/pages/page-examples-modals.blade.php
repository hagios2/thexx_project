<!doctype html>
<html class="no-js" lang="en">
@include('includes.templates.header._html-header');
<body>
@include('includes.templates.header._header-user-visitor'); 
<!--<div id="main-area" class="grid-x">-->
<div id="main-area">
    <!--<main id="wrapper-listings" class="cell small-12 large-10">-->
    <div id="wrapper-main-aside"> <!-- For responsiviness purposes  -->
        <main id="wrapper-listings">
            <!-- Main content   -->
            <section class="inner-section">
                <!-- Section header -->
                <header>
                    <div class="title-division">
                        <h1>
                            Modals examples
                        </h1>
                    </div>
                </header>
                <!-- //Section header -->
                <div>
                    <style>
                        #sample-list {
                            background: grey;
                            padding: 20px;
                        }
                        #sample-list li {
                            list-style: disc !important;
                            margin-bottom: 30px;
                        }
                        #sample-list a {
                            font-size: 2rem;
                            line-height: 2.25rem;
                            color: black !important;
                            text-decoration: underline !important;
                        }
                        #sample-list a:hover {
                            color: white !important;
                        }
                    </style>
                    <ul id="sample-list">
                        <li>
                            <a data-open="modal-login" title="Login & Reset Password">
                                Login & Reset Password
                            </a>
                        </li>
                        <li>
                            <a data-open="modal-offer-gift" title="Modal More OFFER GIFTS">
                                Modal More OFFER GIFTS + Success Message (Secondary modal)
                                <br />
                                (Access by clicking in the type of offer).
                            </a>
                        </li>
                        <li>
                            <a data-open="modal-tips" title="Tips">
                                Tips + Success Message (Secondary modal)
                            </a>
                        </li>
                        <li>
                            <a data-open="modal-50-discount" title="Modal Banner Teaser 50% Discount">
                                Modal Banner Teaser 50% Discount<br />
                                This banner should display from time to time to capture users interest.
                            </a>
                        </li>
                        <li>
                            <a data-open="modal-more-tokens" title="Modal More Tokens Confirmations">
                                Modal More Tokens Confirmations
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </main>
    </div>
    <!--</div>-->
    @include('includes.templates.footer._footer'); 
    @include('includes._scripts');
</body>
</html>
