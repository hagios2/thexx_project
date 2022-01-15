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
                                    <select id="type_of_document" name="type_of_document" required>
                                        <option value="0">Type of Document</option>
                                        <option value="ID Card">ID Card</option>
                                        <option value="Passport">Passport</option>
                                        <option value="Driving License">Driving License</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <input type="text" placeholder="ID number" maxlength="20" minlength="6" id="id_number" name="id_number" required />
                                <div class="two-columns">
                                    <input type="date" id="expiry_date" name="expiry_date" max="2100-01-01" required>  
                                </div>
                                <label class="file">
                                    <input type="file" id="document_file" name="document_file" onchange="id_document(event, this.id)" required>
                                    <span id="document_files" class="file-custom"></span>
                                </label>

                                <div id="footer-options">
                                    <ul>
                                        <li>
                                            <a  id="back_button" href="javascript: history.go(-1)" title="History back">
                                                <span class="previous">Back</span>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" onclick="SavePage4()">
                                                <a><span>Next</span></a>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="wrapper-terms-conditions">
                                    <input id="termsConditionCheck" onchange="toggleCheckbox(this)"  type="checkbox" required>
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
</x-app-layout>
