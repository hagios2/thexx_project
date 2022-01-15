<x-app-layout>
    <div id="main-area">
        <div id="wrapper-main-aside"> <!-- For responsiveness purposes  -->
            <main id="page-stream-model">
                <!-- Main content   -->
                <div class="inner-section">
                    <!-- Section header -->
                    <div id="wrapper-header">
                        @include('includes.templates.header._bar-head-videoshop')<!-- This bar if for this version purposes once it is static. The unused options in the footer were removed in this file. -->
                        <div class="trigger-options">
                            <ul>
                                <li>
                                    <a data-toggle="wrapper-model-videoshop span-new-video span-close-new-video" title="Add New Video">
                                        <span id="span-new-video" data-toggler=".inactive">
                                            Add New Video
                                        </span>
                                        <span id="span-close-new-video" data-toggler=".active">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 20C4.48593 20 0 15.5141 0 10C0 4.48593 4.48593 0 10 0C15.5141 0 20 4.48593 20 10C20 15.5141 15.5141 20 10 20ZM10 1.42853C5.27374 1.42853 1.42853 5.27374 1.42853 10C1.42853 14.7263 5.27374 18.5715 10 18.5715C14.7263 18.5715 18.5715 14.7263 18.5715 10C18.5715 5.27374 14.7263 1.42853 10 1.42853Z" fill="black"/>
                                                <path d="M13.5715 14.2857C13.3887 14.2857 13.2059 14.216 13.0665 14.0764L5.92367 6.93359C5.64458 6.65451 5.64458 6.20254 5.92367 5.92361C6.2026 5.64468 6.65472 5.64453 6.93365 5.92361L14.0764 13.0664C14.3555 13.3455 14.3555 13.7975 14.0764 14.0764C13.937 14.216 13.7543 14.2857 13.5715 14.2857V14.2857Z" fill="black"/>
                                                <path d="M6.42858 14.2858C6.24578 14.2858 6.06313 14.2161 5.92367 14.0764C5.64458 13.7975 5.64458 13.3454 5.92367 13.0665L13.0665 5.92367C13.3455 5.64458 13.7975 5.64458 14.0764 5.92367C14.3554 6.2026 14.3555 6.65472 14.0764 6.93365L6.93365 14.0764C6.79418 14.2161 6.61138 14.2858 6.42858 14.2858V14.2858Z" fill="black"/>
                                            </svg>
                                            Close
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //Section header -->

                    <!-- Video Stream Secondary Stage options  -->
                    <div id="wrapper-model-videoshop" class="wrapper-model-profile-sections" data-toggler=".active" data-animate="fade-in fade-out">
                        <div id="video-stream-secondary-stage">
                            <!-- Add video    -->
                            <section id="wrapper-add-edit-video">
                                <header>
                                    <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M21.7717 1.45348C21.63 1.35481 21.4549 1.35096 21.3103 1.44364L16.2626 4.68363V2.73959C16.2611 1.22725 15.2186 0.00171225 13.9321 0H2.33051C1.04399 0.00171225 0.00145657 1.22725 0 2.73959V13.5567C0.00145657 15.069 1.04399 16.2946 2.33051 16.2963H13.9321C15.2186 16.2946 16.2611 15.069 16.2626 13.5567V11.648L21.3105 14.888C21.4549 14.9806 21.6302 14.977 21.7717 14.8783C21.9133 14.7795 22 14.6003 22 14.407V1.92456C22 1.73108 21.9132 1.55215 21.7717 1.45348ZM15.33 13.5569C15.3293 14.4644 14.7037 15.1996 13.9317 15.2007H2.33051C1.55853 15.1996 0.933114 14.4644 0.932203 13.5569V2.73959C0.933114 1.83232 1.55853 1.09691 2.33051 1.09584H13.9321C14.7039 1.09691 15.3295 1.83232 15.3304 2.73959L15.33 13.5569ZM21.0678 13.4837L16.2626 10.3995V5.93207L21.0678 2.84811V13.4837Z" fill="black"/>
                                    </svg>
                                    <h1>
                                        Add Video
                                    </h1>
                                </header>
                                <div class="wrapper-form">
                                    <form>
                                        {{ csrf_field() }}
                                        <div id="add-edit-video">
                                            <div class="left-column">
                                                <input type="text" id="videoTitle" placeholder="Video title" />
                                                <label class="file">
                                                    <input type="file" id="video_file" name="document_file" onchange="id_document(event, this.id)" required>
                                                    <span id="video_files" class="file-custom"></span>
                                                </label>
                                                <select id="videoCategory" name="videoCategory">
                                                    <option value="0">--Categories--</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Couples">Couple</option>
                                                    <option value="Trans">Trans</option>
                                                </select>   
                                                <input id="priceTier" type="text" placeholder="Price Tier">
                                                <select id="videoQuality" name="videoQuality">
                                                    <option value="0">--Set video quality--</option>
                                                    <option value="4k Ultra HD">4K Ultra HD | 3840x2160</option>
                                                    <option value="Full HD 1080p">Full HD 1080p | 1920x1080</option>
                                                    <option value="HD 720p">HD 720p | 1280x720</option>
                                                    <option value="SD 480p">SD 480p | 848x480</option>
                                                </select>
                                            </div>
                                            <div class="right-column">
                                                <textarea rows="15" id="videoDescription" placeholder="Video text description"></textarea>
                                            </div>
                                        </div>
                                        <div id="wrapper-terms-conditions">
                                            <input id="termsConditionCheck" type="checkbox">
                                            <label class="checkbox-radio-switch-label" for="termsConditionCheck">Checkbox</label>
                                            <p>
                                                I've <a href="#" title="read and accept the Terms and Conditions">read and accept</a> the Terms and Conditions.
                                            </p>
                                        </div>
                                        <div class="footer-options">
                                            <ul>
                                                <li>
                                                <button type="button" onclick="UploadVideo()">
                                                    <a>Save</a>
                                                </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </section>
                            <!-- //Add video    -->
                        </div>
                    </div>

                    <!-- This file is included to add the videoshop cards with the option to delete video from account  -->
                    @include('includes.templates.model._model-edit-video-gallery')
                </div>
            </main>
        </div>
    </div>
</x-app-layout>
