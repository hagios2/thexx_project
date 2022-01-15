<x-app-layout>
    <main id="main-area">
        <div id="wrapper-main-aside">
            <!-- For responsiveness purposes  -->
            <main id="wrapper-listings">
                <!-- Main content   -->
                <section class="inner-section video-shop-section">
                    <!-- Section header -->
                    <header>
                        <div class="title-division">
                            <h1>
                                VideoShop <span class="small-subtitle">The most amazing porn live cams. Free sex content and Premium Footage for your pleasure.</span>
                            </h1>
                        </div>
                        @include('includes.templates.filters._filters-videoshop')
                    </header>
                    <!-- //Section header -->

                    @include('includes.templates.filters._panel-filters-videoshop')

                    <!-- Posts queries  -->
                    <div class="posts-listings grid-x">
                        @php
                            $count = 1;
                        @endphp
                        @foreach ($model_videos as $video)
                            @include('includes.templates.card._card-videoshop')
                            
                         @php
                            if ($count % 7 == 0) {
                            @endphp

                                @include('includes.templates.banners._banner-small-grid')
                            
                            @php
                            }
                                $count = $count + 1;
                            @endphp
                        @endforeach
                    </div>
                    <!-- //Posts queries  -->
                    @include('includes._page-navigation')
                </section>
            </main>
            @include('includes._aside-main')
        </div>
        @include('includes._theclub-videoshop-categories')
        <div id="wrapper-additional-page-data">
            @include('includes.templates.banners._banners-size-small-bar')
        </div>
    </main>
</x-app-layout>