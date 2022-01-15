<!-- Model Profile  -->
<section id="wrapper-model-video-gallery" class="wrapper-model-profile-sections">
    <header>
        <h1>
            <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.7717 1.45348C21.63 1.35481 21.4549 1.35096 21.3103 1.44364L16.2626 4.68363V2.73959C16.2611 1.22725 15.2186 0.00171225 13.9321 0H2.33051C1.04399 0.00171225 0.00145657 1.22725 0 2.73959V13.5567C0.00145657 15.069 1.04399 16.2946 2.33051 16.2963H13.9321C15.2186 16.2946 16.2611 15.069 16.2626 13.5567V11.648L21.3105 14.888C21.4549 14.9806 21.6302 14.977 21.7717 14.8783C21.9133 14.7795 22 14.6003 22 14.407V1.92456C22 1.73108 21.9132 1.55215 21.7717 1.45348ZM15.33 13.5569C15.3293 14.4644 14.7037 15.1996 13.9317 15.2007H2.33051C1.55853 15.1996 0.933114 14.4644 0.932203 13.5569V2.73959C0.933114 1.83232 1.55853 1.09691 2.33051 1.09584H13.9321C14.7039 1.09691 15.3295 1.83232 15.3304 2.73959L15.33 13.5569ZM21.0678 13.4837L16.2626 10.3995V5.93207L21.0678 2.84811V13.4837Z" fill="black"/>
            </svg>
            Available Videos
        </h1>
    </header>
    <div id="wrapper-model-contents" class="grid-x">
        <!-- This is the template for the video cards that have the ICON TO DELETE the video from model account YOUR VIDEOSHOP page -->
        <!-- This is loaded in this page:: page-your-videoshop-1.php  -->
        @foreach($model_videos as $model_video)
            @include('includes.templates.card._card-videoshop-delete-template')
        @endforeach
    </div>
</section>
