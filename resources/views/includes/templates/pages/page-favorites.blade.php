<x-app-layout>
    <div id="main-area">
        <div id="wrapper-main-aside"> <!-- For responsiveness purposes  -->
            <main id="wrapper-listings">
                <!-- Main content   -->
                <section class="inner-section">
                    <!-- Section header -->
                    <header>
                        <div class="title-division">
                            <h1>
                                Live Cams <span class="small-subtitle">Most Viewed</span>
                            </h1>
                        </div>
                        @include('includes.templates.filters._filters-livecams') 
                    </header>
                    <!-- //Section header -->

                    @include('includes.templates.filters._panel-filters-livecams') 

                    <!-- Posts queries  -->
                    <div  class="posts-listings grid-x">
                        @include('includes.templates.card._card-cams')

                        {{-- @include('includes.templates.banners._banner-small-grid')  --}}

                    </div>
                    <!-- //Posts queries  -->
                </section>
            </main>
            @include('includes._aside-main') 
        </div>
        @include('includes._theclub-videoshop-categories') 
        <div id="wrapper-additional-page-data">
            @include('includes.templates.banners._banners-size-small-bar') 
        </div>
    </div>
</x-app-layout>
