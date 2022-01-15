<x-app-layout>
    <main id="main-area" class="theme-content-pages">
        <section id="only-content-main-section">
            <header>
                <h1>
                    OMG! Are you leaving?!?!
                </h1>
                <h2>
                    Get your account disabled below...
                    <br />
                    but...Are you sure???
                </h2>
            </header>
            <div id="wrapper-inner-content">
                <section id="disable-account">
                    <header>
                        <h1>
                            So! Lets start the process of disabling your current account?
                        </h1>
                        <h2>
                            Please write below, in the input field, the words <span class="delete-highlight">"DISABLE MY ACCOUNT"</span> to being the process.
                        </h2>
                    </header>
                    <div id="disable-form">
                        <form>
                            <label for="site-search">Search the site:</label>
                            <input type="text" aria-label="Delete account" id="disabled_text" placeholder="Write the words 'DISABLE MY ACCOUNT' and hit Disabled">
                        </form>
                        <button data-open="modal-disable-account" onclick="disabledAccount()">DISABLE</button>
                    </div>
                </section>
            </div>
        </section>
    </main>
</x-app-layout>
