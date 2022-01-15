<x-app-layout>
    <main id="main-area" class="theme-content-pages">
        <!-- Division for COPY content only -->
        <section id="only-content-main-section">
            <header>
                <h1>
                    @lang("terms_conditions.title")
                </h1>
                <h2>
                    @lang("terms_conditions.effective_date")
                </h2>
            </header>
            <div id="wrapper-inner-content" class="text-justify text-content">

                @foreach(Lang::get("terms_conditions.items") as $iItem)
                    <div class="mb-5">
                        <header>
                            <h2>
                                {!! $iItem["title"] !!}
                            </h2>
                        </header>
                        @include("includes.templates.pages.page-terms-conditions_aux", $iItem["items"])
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</x-app-layout>