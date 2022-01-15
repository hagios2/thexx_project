<!doctype html>
<html class="no-js" lang="en">
    @include('includes.templates.header._html-header')
<body>
    @include('includes.templates.header._header-user-model-logged-in')
<div id="main-area">
    <div id="wrapper-main-aside"> <!-- For responsiviness purposes  -->
        <main id="page-stream-model">
            <!-- Main content   -->
            <div class="inner-section">
                <!-- Section header -->
                <div id="wrapper-header">
                    <?php include('_bar-head-videoshop.php'); ?>
                    <!-- This bar if for this version purposes once it is static. The unused options in the footer were removed in this file. -->
                </div>
                <!-- //Section header -->

                <!-- Video Stream Secondary Stage options  -->
                <div class="wrapper-model-profile-sections">
                    <div id="video-stream-secondary-stage">
                        <!-- Add video    -->
                        <section id="wrapper-add-edit-video">
                            <header>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 20C7.32891 20 4.81766 18.9598 2.92891 17.0711C1.04016 15.1823 0 12.6711 0 10C0 7.32891 1.0402 4.8177 2.92891 2.92891C4.81762 1.04012 7.32891 0 10 0C12.6711 0 15.1823 1.04016 17.0711 2.92891C18.9598 4.81766 20 7.32891 20 10C20 12.6711 18.9598 15.1823 17.0711 17.0711C15.1824 18.9599 12.6711 20 10 20ZM10 1.25C5.17523 1.25 1.25 5.17523 1.25 10C1.25 14.8248 5.17523 18.75 10 18.75C14.8248 18.75 18.75 14.8248 18.75 10C18.75 5.17523 14.8248 1.25 10 1.25Z" fill="#575759"/>
                                    <path d="M10 9.375C9.13844 9.375 8.4375 8.67406 8.4375 7.8125C8.4375 6.95094 9.13844 6.25 10 6.25C10.8616 6.25 11.5625 6.95094 11.5625 7.8125C11.5625 8.15766 11.8423 8.4375 12.1875 8.4375C12.5327 8.4375 12.8125 8.15766 12.8125 7.8125C12.8125 6.47652 11.8759 5.35594 10.625 5.07086V4.375C10.625 4.02984 10.3452 3.75 10 3.75C9.6548 3.75 9.375 4.02984 9.375 4.375V5.07086C8.12414 5.35594 7.1875 6.47652 7.1875 7.8125C7.1875 9.36332 8.44918 10.625 10 10.625C10.8616 10.625 11.5625 11.3259 11.5625 12.1875C11.5625 13.0491 10.8616 13.75 10 13.75C9.13844 13.75 8.4375 13.0491 8.4375 12.1875C8.4375 11.8423 8.1577 11.5625 7.8125 11.5625C7.4673 11.5625 7.1875 11.8423 7.1875 12.1875C7.1875 13.5235 8.12414 14.6441 9.375 14.9291V15.625C9.375 15.9702 9.6548 16.25 10 16.25C10.3452 16.25 10.625 15.9702 10.625 15.625V14.9291C11.8759 14.6441 12.8125 13.5235 12.8125 12.1875C12.8125 10.6367 11.5508 9.375 10 9.375Z" fill="black"/>
                                </svg>
                                <h1>
                                    Edit Video
                                </h1>
                            </header>
                            <div class="wrapper-form">
                                <form>
                                    <div id="add-edit-video">
                                        <div class="left-column">
                                            <input type="text" placeholder="Video title" />
                                            <select id="option1" name="options">
                                                <option>Select video to upload</option>
                                                <option value="Option 1">Option 1</option>
                                                <option value="Option 2">Option 2</option>
                                                <option value="Option 3">Option 3</option>
                                                <option value="Option 4">Option 4</option>
                                            </select>
                                            <select id="option1" name="options">
                                                <option>Choose categories</option>
                                                <option value="Option 1">Option 1</option>
                                                <option value="Option 2">Option 2</option>
                                                <option value="Option 3">Option 3</option>
                                                <option value="Option 4">Option 4</option>
                                            </select>
                                            <select id="option1" name="options">
                                                <option>Set price tier</option>
                                                <option value="Option 1">Option 1</option>
                                                <option value="Option 2">Option 2</option>
                                                <option value="Option 3">Option 3</option>
                                                <option value="Option 4">Option 4</option>
                                            </select>
                                            <select id="option1" name="options">
                                                <option>Set video quality</option>
                                                <option value="Option 1">Option 1</option>
                                                <option value="Option 2">Option 2</option>
                                                <option value="Option 3">Option 3</option>
                                                <option value="Option 4">Option 4</option>
                                            </select>
                                        </div>
                                        <div class="right-column">
                                            <textarea rows="15" placeholder="Video text description"></textarea>
                                        </div>
                                    </div>
                                    <div id="wrapper-terms-conditions">
                                        <input id="c1" type="checkbox">
                                        <label class="checkbox-radio-switch-label" for="c1">Checkbox</label>
                                        <p>
                                            I've <a href="" title="read and accept the Terms and Conditions">read and accept</a> the Terms and Conditions.
                                        </p>
                                    </div>
                                    <div class="footer-options">
                                        <ul>
                                            <li>
                                                <a href="#" title="Save">
                                                    Save
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </section>
                        <!-- //Add video    -->
                    </div>
                </div>
                <!-- //Video Stream Scondary Stage options  -->
            </div>
        </main>
    </div>
</div>
@include('includes.templates.footer._footer')
@include('includes._scripts')
</body>
</html>