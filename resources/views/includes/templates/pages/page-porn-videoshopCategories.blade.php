<x-app-layout>
    <div id="main-area">
        <div id="wrapper-main-aside"> <!-- For responsiveness purposes  -->
            <main id="wrapper-listings">
                <!-- Main content   -->
                <section class="inner-section">
                    <!-- Posts queries  -->
                    <div  class="posts-listings grid-x">        
                        @include('includes._theclub-videoshop-categories') 
                    </div>
                </section>
            </main>
            @include('includes._aside-main') 
        </div>
        {{-- @include('includes._theclub-videoshop-categories')  --}}
        <div id="wrapper-additional-page-data">
            @include('includes.templates.banners._banners-size-small-bar') 
        </div>
    </div>
</x-app-layout>
