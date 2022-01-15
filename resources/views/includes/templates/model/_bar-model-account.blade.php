<!-- Bar Model Account  -->
<div id="bar-model-account">
    <div id="wrapper-ratings">
        <div id="ratings">
            <img src="{{ url('images/icons/thumbs-up.svg') }}" alt="Likes" />
            <span class="data-injection">95</span>%
        </div>
        <!--<div id="comments-ratings">
            <a href="#" title="View all comments and ratings" id="trigger-comments-ratings-panel">
                View all comments and ratings
            </a>
        </div>-->
        <div id="favorites-you">
            <img src="{{ url('images/icons/heart-full.svg') }}" alt="Users who favorite you" />
            <span class="data-injection">1.024</span> users favorite you
        </div>
    </div>
    <div id="model-manage-options">
        <ul data-smooth-scroll>
            <li>
                <a title="Edit Account" data-toggle="landing-section span-edit-account span-close-edit-account">
                    <span id="span-edit-account" data-toggler=".inactive">
                        Edit your account
                    </span>
                    <span id="span-close-edit-account" data-toggler=".active">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20C4.48593 20 0 15.5141 0 10C0 4.48593 4.48593 0 10 0C15.5141 0 20 4.48593 20 10C20 15.5141 15.5141 20 10 20ZM10 1.42853C5.27374 1.42853 1.42853 5.27374 1.42853 10C1.42853 14.7263 5.27374 18.5715 10 18.5715C14.7263 18.5715 18.5715 14.7263 18.5715 10C18.5715 5.27374 14.7263 1.42853 10 1.42853Z" fill="black"/>
                            <path d="M13.5715 14.2857C13.3887 14.2857 13.2059 14.216 13.0665 14.0764L5.92367 6.93359C5.64458 6.65451 5.64458 6.20254 5.92367 5.92361C6.2026 5.64468 6.65472 5.64453 6.93365 5.92361L14.0764 13.0664C14.3555 13.3455 14.3555 13.7975 14.0764 14.0764C13.937 14.216 13.7543 14.2857 13.5715 14.2857V14.2857Z" fill="black"/>
                            <path d="M6.42858 14.2858C6.24578 14.2858 6.06313 14.2161 5.92367 14.0764C5.64458 13.7975 5.64458 13.3454 5.92367 13.0665L13.0665 5.92367C13.3455 5.64458 13.7975 5.64458 14.0764 5.92367C14.3554 6.2026 14.3555 6.65472 14.0764 6.93365L6.93365 14.0764C6.79418 14.2161 6.61138 14.2858 6.42858 14.2858V14.2858Z" fill="black"/>
                        </svg>
                        Close Edit
                    </span>
                </a>
            </li>
            <li>
                <a title="Comments and Ratings" data-toggle="wrapper-comments-ratings span-comments span-close-comments">
                    <span id="span-comments" data-toggler=".inactive">
                        Comments & Ratings
                    </span>
                    <span id="span-close-comments" data-toggler=".active">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20C4.48593 20 0 15.5141 0 10C0 4.48593 4.48593 0 10 0C15.5141 0 20 4.48593 20 10C20 15.5141 15.5141 20 10 20ZM10 1.42853C5.27374 1.42853 1.42853 5.27374 1.42853 10C1.42853 14.7263 5.27374 18.5715 10 18.5715C14.7263 18.5715 18.5715 14.7263 18.5715 10C18.5715 5.27374 14.7263 1.42853 10 1.42853Z" fill="black"/>
                            <path d="M13.5715 14.2857C13.3887 14.2857 13.2059 14.216 13.0665 14.0764L5.92367 6.93359C5.64458 6.65451 5.64458 6.20254 5.92367 5.92361C6.2026 5.64468 6.65472 5.64453 6.93365 5.92361L14.0764 13.0664C14.3555 13.3455 14.3555 13.7975 14.0764 14.0764C13.937 14.216 13.7543 14.2857 13.5715 14.2857V14.2857Z" fill="black"/>
                            <path d="M6.42858 14.2858C6.24578 14.2858 6.06313 14.2161 5.92367 14.0764C5.64458 13.7975 5.64458 13.3454 5.92367 13.0665L13.0665 5.92367C13.3455 5.64458 13.7975 5.64458 14.0764 5.92367C14.3554 6.2026 14.3555 6.65472 14.0764 6.93365L6.93365 14.0764C6.79418 14.2161 6.61138 14.2858 6.42858 14.2858V14.2858Z" fill="black"/>
                        </svg>
                        Close Comments
                    </span>
                </a>
            </li>
            <li>
                <a title="Manage Photo Gallery" data-toggle="wrapper-photo-gallery span-photo-gallery span-close-photo-gallery">
                    <span id="span-photo-gallery" data-toggler=".inactive">
                        Manage Photo Gallery
                    </span>
                    <span id="span-close-photo-gallery" data-toggler=".active">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20C4.48593 20 0 15.5141 0 10C0 4.48593 4.48593 0 10 0C15.5141 0 20 4.48593 20 10C20 15.5141 15.5141 20 10 20ZM10 1.42853C5.27374 1.42853 1.42853 5.27374 1.42853 10C1.42853 14.7263 5.27374 18.5715 10 18.5715C14.7263 18.5715 18.5715 14.7263 18.5715 10C18.5715 5.27374 14.7263 1.42853 10 1.42853Z" fill="black"/>
                            <path d="M13.5715 14.2857C13.3887 14.2857 13.2059 14.216 13.0665 14.0764L5.92367 6.93359C5.64458 6.65451 5.64458 6.20254 5.92367 5.92361C6.2026 5.64468 6.65472 5.64453 6.93365 5.92361L14.0764 13.0664C14.3555 13.3455 14.3555 13.7975 14.0764 14.0764C13.937 14.216 13.7543 14.2857 13.5715 14.2857V14.2857Z" fill="black"/>
                            <path d="M6.42858 14.2858C6.24578 14.2858 6.06313 14.2161 5.92367 14.0764C5.64458 13.7975 5.64458 13.3454 5.92367 13.0665L13.0665 5.92367C13.3455 5.64458 13.7975 5.64458 14.0764 5.92367C14.3554 6.2026 14.3555 6.65472 14.0764 6.93365L6.93365 14.0764C6.79418 14.2161 6.61138 14.2858 6.42858 14.2858V14.2858Z" fill="black"/>
                        </svg>
                        Close Gallery
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- //Bar Model Account  -->