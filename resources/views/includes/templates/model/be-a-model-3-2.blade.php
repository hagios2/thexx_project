<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-register">
            <!-- Landing section    -->
            <div id="landing-section">
                <section id="center-title-theme">
                    <header>
                        <h1>
                            Create account
                        </h1>
                    </header>
                </section>
            </div>
            <!-- //Landing section    -->

            <div id="secondary-section">
                <div id="wrapper-create-account-steps">
                    <ul id="steps-tabs">
                        <li>
                            Create account
                        </li>
                        <li>
                            Personal data
                        </li>
                        <li class="active">
                            Documents
                        </li>
                    </ul>
                    <div id="wrapper-content-inner-pages" class="small-center-division">
                        <div id="steps-panel" class="dropdowns-small">
                            @if ($errors->any())
                            <div class="alert alert-danger m-2" style="background-color: red">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="m-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form>
                                {{ csrf_field() }}
                                <div class="two-columns">
                                    <select id="eyeColor" name="eyeColor" required>
                                        <option value="0" selected>-Eye Color-</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Black">Black</option>
                                        <option value="Green">Green</option>
                                        <option value="Grey">Grey</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    <select id="hairColor" name="hairColor" required>
                                        <option value="0" selected>-Hair Color-</option>
                                        <option value="Black">Black</option>
                                        <option value="Brown">Brown</option>
                                        <option value="Fire Red">Fire Red</option>
                                        <option value="Auburn">Auburn</option>
                                        <option value="Orange">Orange</option>
                                        <option value="Pink">Pink</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="two-columns">
                                    <select id="hairLength" name="hairLength" required>
                                        <option value="0" selected>-Hair Length-</option>
                                        <option value="Bald">Bald</option>
                                        <option value="Crew Cut">Crew Cut</option>
                                        <option value="Short">Short</option>
                                        <option value="Shoulder Length">Shoulder Length</option>
                                        <option value="Long">Long</option>
                                    </select>
                                    <select id="modelFigure" name="figure" required>
                                        <option value="0" selected>-Figure-</option>
                                        <option value="Petite">Petite</option>
                                        <option value="Sporty">Sporty</option>
                                        <option value="Average">Average</option>
                                        <option value="Above Average">Above Average</option>
                                        <option value="Curvy">Curvy</option>
                                    </select>
                                </div>

                                <div class="two-columns">
                                    <select id="sexualPreference" name="sexualPreference" required>
                                        <option value="0" selected>-Sexual Preference-</option>
                                        <option value="Bisexual">Bisexual</option>
                                        <option value="Straight">Straight</option>
                                        <option value="Lesbian">Lesbian</option>
                                    </select>
                                    <select id="chestSize" name="chestSize" required>
                                        <option value="0" selected>-Breast / Chest Size-</option>
                                        <option value="A Cup">A Cup</option>
                                        <option value="B Cup">B Cup</option>
                                        <option value="C Cup">C Cup</option>
                                        <option value="D+ Cup">D+ Cup</option>
                                    </select>
                                </div>


                                <div id="footer-options">
                                    <ul>
                                        <li>
                                            <a id="back_button" href="javascript: history.go(-1)" title="History back">
                                                <span class="previous">Back</span>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" onclick="SavePage3_2()">
                                                <a><span>Next</span></a>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="wrapper-terms-conditions">
                                    <input id="termsConditionCheck" onchange="toggleCheckbox(this)" type="checkbox" required>
                                    <label class="checkbox-radio-switch-label" for="termsConditionCheck">Checkbox</label>
                                    <p>
                                        I've <a href="/terms-conditions" title="read and accept the Terms and Conditions">read and accept</a> the Terms and Conditions.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        </div>
    </div>
</x-app-layout>
