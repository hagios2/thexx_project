<x-app-layout>
    <main id="main-area" class="theme-content-pages">
        <!-- Division for COPY content only -->
        <section id="only-content-main-section">
            <header>
                <h1>
                    Support
                </h1>
                <h2>
                    How can we help you?
                </h2>
            </header>
            <div id="wrapper-inner-content">
                <div id="wrapper-support" class="grid-x">
                    <section class="cell small-12 medium-6">
                        <header>
                            <h2>
                                Are you trying to find something?
                            </h2>
                        </header>
                        <div class="content">
                            <!-- Site Search -->
                            <div id="search-box">
                                <form>
                                    <label for="site-search">Search the site:</label>
                                    <input type="search" id="site-search" name="q" aria-label="Search through site content" placeholder="Search...">

                                    <button>
                                        <img src="{{ url('images/icons/search-white.svg') }}" alt="Search" />
                                    </button>
                                </form>
                            </div>
                        </div>
                    </section>
                    <section class="cell small-12 medium-6">
                        <header>
                            <h2>
                                Talk with us
                            </h2>
                        </header>
                        <div id="wrapper-contact-form">
                            <form>
                                @csrf
                                <input type="text" id="name" aria-label="Username" placeholder="Name">
                                <input type="email" id="email" aria-label="Email" placeholder="Email">
                                <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Your message"></textarea>
                                <button type="button" onclick="Support()">
                                    Send
                                </button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>