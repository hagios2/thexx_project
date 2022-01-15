<!doctype html>
<html class="no-js" lang="en">
    @include('includes.templates.header._html-header')
    <body>
         @include('includes.templates.header._header-user-visitor')
        <main id="main-area" class="theme-content-pages">
            <!-- Division for COPY content only -->
            <section id="only-content-main-section">
                <header>
                    <h1>
                        Title of page here
                    </h1>
                    <h2>
                        If there's any sub-title included it here.
                    </h2>
                </header>
                <div id="wrapper-inner-content">
                    <!-- DON'T COPY THESE STYLES BELOW!!! They're inline only for the sake of this example page.
                    No need to have them inline in the production version.
                     -->
                    <style>
                        #styling-outline {
                            background: #e1e1e1;
                            border: 4px solid yellow;
                            padding: 20px;
                            margin-bottom: 50px;
                        }
                    </style>
                    <div id="styling-outline">
                        <p>
                            This is a page template.<br />
                            Please find bellow every TEXT and List element of HTML styled to accommodate all the needs of these <b>COPY CONTENT PAGES</b>.
                        </p>
                        <ul>
                            <lh>
                                Elements formated:
                            </lh>
                            <li>
                                All Headings from h1 to h6.
                            </li>
                            <li>
                                < p >
                            </li>
                            <li>
                                < ul > + < ol > + < lh > + < li >
                            </li>
                            <li>
                                < table > + tbody + thead + row + columns + cells
                            </li>
                        </ul>
                    </div>

                    <!-- Styled content -->
                    <header>
                        <h1>
                            Heading 1
                        </h1>
                        <h2>
                            Heading 2
                        </h2>
                        <h3>
                            Heading 3
                        </h3>
                        <h4>
                            Heading 4
                        </h4>
                        <h5>
                            Heading 5
                        </h5>
                        <h6>
                            Heading 6
                        </h6>
                    </header>
                    <div>
                        <p>
                            Hey! I'm a paragraph!
                        </p>
                        <p>
                            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        </p>
                    </div>
                    <div>
                        <ul>
                            <lh>
                                List header of and UNORDERED list
                            </lh>
                            <li>
                                Unordered List item
                            </li>
                            <li>
                                Unordered List item
                            </li>
                            <li>
                                Unordered List item
                            </li>
                            <li>
                                Unordered List item
                            </li>
                        </ul>
                        <ol>
                            <lh>
                                List header of and ORDERED list
                            </lh>
                            <li>
                                Ordered List item
                            </li>
                            <li>
                                Ordered List item
                            </li>
                            <li>
                                Ordered List item
                            </li>
                            <li>
                                Ordered List item
                            </li>
                        </ol>
                    </div>
                    <div>
                        <table>
                            <caption>The Table Caption</caption>
                            <tr>
                                <td>Cell data</td>
                                <td>Cell data</td>
                            </tr>
                            <tr>
                                <td>Cell data</td>
                                <td>Cell data</td>
                            </tr>
                            <tr>
                                <td>Cell data</td>
                                <td>Cell data</td>
                            </tr>
                            <tr>
                                <td>Cell data</td>
                                <td>Cell data</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>

        </main>
        @include('includes.templates.footer._footer')
        @include('includes._scripts')
    </body>
</html>
