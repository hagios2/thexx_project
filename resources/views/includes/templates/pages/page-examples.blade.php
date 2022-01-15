<!doctype html>
<html class="no-js" lang="en">
    @include('includes.templates.header._html-header')
<body>
 @include('includes.templates.header._header-user-visitor')
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
                            list-style: decimal !important;
                            margin-left: 40px;
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
                            <a href="<?php echo BASE_URL; ?>" title="">
                                Homepage
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>account-model.php" title="">
                                account-model.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>account-user.php" title="">
                                account-user.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-model-1.php" title="">
                                be-a-model-1.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-model-2.php" title="">
                                be-a-model-2.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-model-3-2.php" title="">
                                be-a-model-3-2.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-model-3.php" title="">
                                be-a-model-3.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-model-4.php" title="">
                                be-a-model-4.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-model-5.php" title="">
                                be-a-model-5.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-user-1.php" title="">
                                be-a-user-1.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>be-a-user-2.php" title="">
                                be-a-user-2.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-examples-modals.php" title="">
                                page-examples-modals.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-examples.php" title="">
                                page-examples.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-startshow-golive.php" title="">
                                page-startshow-golive.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-stream-model.php" title="">
                                page-stream-model.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-your-videoshop-1.php" title="">
                                page-your-videoshop-1.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-your-videoshop-2.php" title="">
                                page-your-videoshop-2.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>pages-inner-design-theme.php" title="">
                                pages-inner-design-theme.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>subscribe-the-videoclub-1.php" title="">
                                subscribe-the-videoclub-1.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>subscribe-the-videoclub-2.php" title="">
                                subscribe-the-videoclub-2.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>wallet-charge-1.php" title="">
                                wallet-charge-1.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>wallet-charge-2.php" title="">
                                wallet-charge-2.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>wallet-model.php" title="">
                                wallet-model.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>win-tokens.php" title="">
                                win-tokens.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-startshow-golive.php" title="">
                                page-startshow-golive.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>win-tokens-weekly-lottery.php" title="">
                                win-tokens-weekly-lottery.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>win-tokens-unlock-the-slot.php" title="">
                                win-tokens-unlock-the-slot.php
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo BASE_URL; ?>page-videoshop.php" title="">
                                page-videoshop.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-stream-model-product.php" title="">
                                page-stream-model-product.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-theme-content-only.php" title="">
                                page-theme-content-only.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-terms-conditions.php" title="">
                                page-terms-conditions.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-privacy-policy.php" title="">
                                page-privacy-policy.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-law-compliance.php" title="">
                                page-law-compliance.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-support.php" title="">
                                page-support.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-affiliates.php" title="">
                                page-affiliates.php
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>page-disable-account.php" title="">
                                page-disable-account.php
                            </a>
                        </li>

                    </ul>
                </div>
            </section>
        </main>
    </div>
    <!--</div>-->
     @include('includes.templates.footer._footer')
     @include('includes._scripts')
</body>
</html>
