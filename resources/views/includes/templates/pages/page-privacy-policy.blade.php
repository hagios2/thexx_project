<x-app-layout>
    <main id="main-area" class="theme-content-pages">
        <section id="only-content-main-section">
            <header>
                <h1>
                    @lang("privacy_policy.title")
                </h1>
            </header>
            <div id="wrapper-inner-content" class="text-justify text-content">

                @foreach(Lang::get("privacy_policy.initial_text") as $iItem)
                    <p>{!! $iItem !!}</p>
                @endforeach

                @foreach(Lang::get("privacy_policy.items") as $iItem)
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