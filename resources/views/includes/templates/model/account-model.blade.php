<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-accounts">
            <header id="theme-accounts">
                <header>
                    <h1>
                        Welcome <span class="data-injection">{{ $accountDetails->name }}</span>!
                    </h1>
                </header>
                @include('includes.templates.model._bar-model-account');
            </header>
            <!-- Landing section    -->
            <div id="landing-section" class="model-account-edit" data-toggler=".active" data-animate="fade-in fade-out">
                <div id="inner-edit">
                    <div id="table-content-left" class="model-account-page">
                        <!-- This class applies the styles to this page: MODEL ACCOUNT PAGE account-model    -->
                        <section class="register-edit-club-member">
                            <header>
                                <svg width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.375 0.625C8.67188 0.625 0 9.29688 0 20C0 30.7031 8.67188 39.375 19.375 39.375C30.0781 39.375 38.75 30.7031 38.75 20C38.75 9.29688 30.0781 0.625 19.375 0.625ZM19.375 8.125C23.1719 8.125 26.25 11.2031 26.25 15C26.25 18.7969 23.1719 21.875 19.375 21.875C15.5781 21.875 12.5 18.7969 12.5 15C12.5 11.2031 15.5781 8.125 19.375 8.125ZM19.375 35C14.7891 35 10.6797 32.9219 7.92969 29.6719C9.39844 26.9062 12.2734 25 15.625 25C15.8125 25 16 25.0312 16.1797 25.0859C17.1953 25.4141 18.2578 25.625 19.375 25.625C20.4922 25.625 21.5625 25.4141 22.5703 25.0859C22.75 25.0312 22.9375 25 23.125 25C26.4766 25 29.3516 26.9062 30.8203 29.6719C28.0703 32.9219 23.9609 35 19.375 35Z" fill="black" />
                                </svg>
                                <h1>
                                    Edit your account
                                </h1>
                            </header>
                            <form>
                                @csrf
                                <input type="text" id="user_name_Account" name="user_name" value="{{ $accountDetails->user_name }}" readonly>

                                <input id="email_Account" name="email" type="email" placeholder="Your E-Mail" value="{{ $accountDetails->email }}" readonly />
                                <input id="pwd_Account" minlength="6" name="password" type="password" placeholder="Set a password" required />
                                <input id="password_Confirmation_Account" minlength="6" name="password_confirmation" type="password" placeholder="Confirm password" required />

                                <input type="hidden" id="gender_Account_temp" value="{{ $accountDetails->gender }}" />
                                <select id="gender_Account" name="gender">
                                    <option value="0">Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Transgender">Transgender</option>
                                </select>
                                <input id="birthday_Account" value="{{ $accountDetails->birthday }}" name="birthday" type="date" placeholder="Birthday" readonly />

                                <input type="hidden" id="country_Account_temp" value="{{ $accountDetails->country }}" />
                                <select id="country_Account" name="country">
                                    <option value="0">-Country of residence-</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                                <label class="file">
                                    <input disabled type="file" id="file_Account" name="type_of_document" placeholder="Identification file (upload/edit/remove)">
                                    <span id="document_files" class="file-custom">Identification file
                                        (upload/edit/remove)</span>
                                </label>
                                <div id="footer-options">
                                    <ul>
                                        <li>
                                            <button type="button" onclick="AccountModelUpdatePart1()" title="Save changes">
                                                <a><span>Save</span></a>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </section>
                    </div>
                    <div class="table-content-medium-right">
                        <section class="register-edit-club-member">
                            <header>
                                <svg width="39" height="40" viewBox="0 0 39 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.375 0.625C8.67188 0.625 0 9.29688 0 20C0 30.7031 8.67188 39.375 19.375 39.375C30.0781 39.375 38.75 30.7031 38.75 20C38.75 9.29688 30.0781 0.625 19.375 0.625ZM19.375 8.125C23.1719 8.125 26.25 11.2031 26.25 15C26.25 18.7969 23.1719 21.875 19.375 21.875C15.5781 21.875 12.5 18.7969 12.5 15C12.5 11.2031 15.5781 8.125 19.375 8.125ZM19.375 35C14.7891 35 10.6797 32.9219 7.92969 29.6719C9.39844 26.9062 12.2734 25 15.625 25C15.8125 25 16 25.0312 16.1797 25.0859C17.1953 25.4141 18.2578 25.625 19.375 25.625C20.4922 25.625 21.5625 25.4141 22.5703 25.0859C22.75 25.0312 22.9375 25 23.125 25C26.4766 25 29.3516 26.9062 30.8203 29.6719C28.0703 32.9219 23.9609 35 19.375 35Z" fill="black" />
                                </svg>
                                <h1>
                                    Edit your Club Account
                                </h1>
                            </header>
                            <form>
                                @csrf
                                <input id="camera_name_Acc" type="text" placeholder="Camera name" value="{{ $accountDetails->camera_man_name }}" />
                                <input type="hidden" id="categories_temp" value="{{ $accountDetails->categories }}" />
                                <select id="categories" name="options">
                                    <option value="0">--Categories--</option>
                                    <option value="Celebrity Category">Celebrity Category</option>
                                    <option value="Hot First Category">Hot First Category</option>
                                    <option value="Nude Category">Nude Category</option>
                                    <option value="Amateur Category">Amateur Category</option>
                                </select>
                                <input type="hidden" id="performs_temp" value="{{ $accountDetails->performs }}" />
                                <select id="performs" name="options">
                                    <option value="0">--Performs--</option>
                                    <option value="Dance">Dance</option>
                                    <option value="Sing">Sing</option>
                                    <option value="play">play</option>
                                    <option value="Jump">Jump</option>
                                </select>

                                <label class="register-edit-club-member" style="color: white;" for="tags">Add tags
                                    separated by comma(,)</label>
                                <input id="tags" type="text" placeholder="Set Tags" value="{{ $accountDetails->tags }}" />

                                <input type="hidden" id="languages_temp" value="{{ $accountDetails->languages }}" />
                                <select id="languages" name="options">
                                    <option value="0">--Languages--</option>
                                    <option value="Italian">Italian</option>
                                    <option value="German">German</option>
                                    <option value="English">English</option>
                                    <option value="Sanskrit">Sanskrit</option>
                                </select>
                                <input type="hidden" id="eye_color_temp" value="{{ $accountDetails->eye_color }}" />
                                <select id="eye_color" name="options">
                                    <option value="0">--Eye Color--</option>
                                    <option value="Blue">Blue</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Black">Black</option>
                                    <option value="Green">Green</option>
                                    <option value="Grey">Grey</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="hidden" id="hair_length_temp" value="{{ $accountDetails->hair_length }}" />
                                <select id="hair_length" name="options">
                                    <option value="0">--Hair Length--</option>
                                    <option value="Bald">Bald</option>
                                    <option value="Crew Cut">Crew Cut</option>
                                    <option value="Short">Short</option>
                                    <option value="Shoulder Length">Shoulder Length</option>
                                    <option value="Long">Long</option>
                                </select>
                                <input type="hidden" id="hair_color_temp" value="{{ $accountDetails->hair_color }}" />
                                <select id="hair_color" name="options">
                                    <option value="0">--Hair Color--</option>
                                    <option value="Brown">Brown</option>
                                    <option value="Fire Red">Fire Red</option>
                                    <option value="Auburn">Auburn</option>
                                    <option value="Orange">Orange</option>
                                    <option value="Pink">Pink</option>
                                    <option value="Other">Other</option>
                                </select>
                                <input type="hidden" id="figure_temp" value="{{ $accountDetails->figure }}" />
                                <select id="figure" name="options">
                                    <option value="0">--Figure--</option>
                                    <option value="Petite">Petite</option>
                                    <option value="Sporty">Sporty</option>
                                    <option value="Average">Average</option>
                                    <option value="Above Average">Above Average</option>
                                    <option value="Curvy">Curvy</option>
                                </select>
                                <input type="hidden" id="sexual_preference_temp" value="{{ $accountDetails->sexual_preference }}" />
                                <select id="sexual_preference" name="options">
                                    <option value="0">--Sexual Preference --</option>
                                    <option value="Bisexual">Bisexual</option>
                                    <option value="Straight">Straight</option>
                                    <option value="Lesbian">Lesbian</option>

                                </select>
                                <input type="hidden" id="chest_size_temp" value="{{ $accountDetails->chest_size }}" />
                                <select id="chest_size" name="options">
                                    <option value="0">--Chest Size --</option>
                                    <option value="A Cup">A Cup</option>
                                    <option value="B Cup">B Cup</option>
                                    <option value="C Cup">C Cup</option>
                                    <option value="D+ Cup">D+ Cup</option>
                                </select>
                                <div id="footer-options">
                                    <ul>
                                        <li>
                                            <button type="button" onclick="AccountModelUpdatePart2()" title="Save changes">
                                                <a><span>Save</span></a>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </section>
                    </div>
                    <div class="table-content-medium-right">
                        <section class="register-edit-club-member">
                            <header>
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10 0C4.486 0 0 4.48582 0 9.99945C0 15.5132 4.486 19.999 10 19.999C15.514 19.999 20 15.5132 20 9.99945C20 4.48582 15.514 0 10 0ZM10 18.1808C5.48855 18.1808 1.81818 14.5107 1.81818 9.99952C1.81818 5.4883 5.48855 1.81818 10 1.81818C14.5115 1.81818 18.1818 5.4883 18.1818 9.99945C18.1818 14.5108 14.5115 18.1808 10 18.1808Z" fill="#C4C4C4" />
                                    <path d="M9.99991 7.87891C9.49785 7.87891 9.09082 8.28594 9.09082 8.788V14.8476C9.09082 15.3496 9.49785 15.7567 9.99991 15.7567C10.502 15.7567 10.909 15.3496 10.909 14.8476V8.788C10.909 8.286 10.502 7.87891 9.99991 7.87891Z" fill="#C4C4C4" />
                                    <path d="M9.99991 4.24219C9.76052 4.24219 9.52652 4.33916 9.35688 4.50825C9.18779 4.67734 9.09082 4.91188 9.09082 5.15128C9.09082 5.39067 9.18779 5.62461 9.35688 5.79431C9.52597 5.9634 9.76052 6.06037 9.99991 6.06037C10.2393 6.06037 10.4732 5.9634 10.6429 5.79431C10.812 5.62461 10.909 5.39067 10.909 5.15128C10.909 4.91188 10.812 4.67734 10.6429 4.50825C10.4732 4.3391 10.2393 4.24219 9.99991 4.24219Z" fill="#C4C4C4" />
                                </svg>
                                <h1>
                                    Other Informations
                                </h1>
                            </header>
                            <form>
                                <input id="sex_toy_id" type="text" placeholder="Define Sex Toy ID" value="{{ $accountDetails->sex_toy_id }}" />
                                <textarea id="model_description" rows="20" placeholder="Describe yourself here..." value="{{ $accountDetails->model_description }}">{{ $accountDetails->model_description }}</textarea>
                                <div id="footer-options">
                                    <ul>
                                        <li>
                                            <button type="button" onclick="AccountModelUpdatePart3()" title="Save changes">
                                                <a><span>Save</span></a>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
            <!-- //Landing section    -->
            <!-- Comments and Ratings   -->
            <section id="wrapper-comments-ratings" data-toggler=".active" data-animate="fade-in fade-out">
                <header>
                    <h1>
                        Comments and Ratings
                    </h1>
                </header>
                <section class="stage-toggled-comments">
                    <header>
                        <h1>
                            Members comments
                        </h1>
                    </header>
                    <div class="comments-list">
                        <ul>
                            @include('includes._comment-entry')
                           
                        </ul>
                    </div>
                </section>
            </section>
            <!-- Photo Gallery  -->
            <section id="wrapper-photo-gallery" data-toggler=".active" data-animate="fade-in fade-out">
                <header>
                    <h1>
                        Manage Photo Gallery
                    </h1>
                </header>
                <div id="model-gallery">
                    <ul class="grid-x">
                        <lh class="cell small-12 medium-3 upload-photo">
                            <section>
                                <header>
                                    <h1>
                                        Add more photos to your gallery and keep Visitors and Members with max interest!
                                    </h1>
                                </header>
                                <div class="cta">
                                    <input type="file" id="photo_file" name="photo_file" onchange="id_photo(event, this.id)" required>
                                    <button type="button" onclick="UploadPhotoInGallery()">
                                        <a><span>Upload</span></a>
                                    </button>
                                </div>
                            </section>
                        </lh>
                        <li id="" class="cell small-12 medium-3 delete_temp">
                            <div class="edit-options">
                                <ul>
                                    <li>
                                        <button onclick='' title="Delete photo">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 0C4.48578 0 0 4.48578 0 10C0 15.5142 4.48578 20 10 20C15.5142 20 20 15.5142 20 10C20 4.48578 15.5142 0 10 0Z" fill="#F44336" />
                                                <path d="M13.6824 12.5041C14.0082 12.8301 14.0082 13.3566 13.6824 13.6826C13.5199 13.8451 13.3066 13.9267 13.0931 13.9267C12.8798 13.9267 12.6665 13.8451 12.504 13.6826L9.99989 11.1783L7.49577 13.6826C7.33326 13.8451 7.11994 13.9267 6.90662 13.9267C6.69315 13.9267 6.47984 13.8451 6.31733 13.6826C5.99155 13.3566 5.99155 12.8301 6.31733 12.5041L8.8216 10L6.31733 7.49589C5.99155 7.16996 5.99155 6.64338 6.31733 6.31745C6.64326 5.99168 7.16984 5.99168 7.49577 6.31745L9.99989 8.82172L12.504 6.31745C12.8299 5.99168 13.3565 5.99168 13.6824 6.31745C14.0082 6.64338 14.0082 7.16996 13.6824 7.49589L11.1782 10L13.6824 12.5041Z" fill="#FAFAFA" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <img src="" alt="" />
                        </li>
                        @foreach ($image_path as $image)
                        @php
                           $image_new = substr($image, 0, strpos($image, "&")); 
                           $image_id = substr($image, strpos($image, "&") + 1); 
                        @endphp
                        <li id="delete_image{{$image_id}}" class="cell small-12 medium-3">
                            <div class="edit-options">
                                <ul>
                                    <li>
                                        <button onclick='DeleteImage("<?php echo $image_id; ?>" ,this)' title="Delete photo">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 0C4.48578 0 0 4.48578 0 10C0 15.5142 4.48578 20 10 20C15.5142 20 20 15.5142 20 10C20 4.48578 15.5142 0 10 0Z" fill="#F44336" />
                                                <path d="M13.6824 12.5041C14.0082 12.8301 14.0082 13.3566 13.6824 13.6826C13.5199 13.8451 13.3066 13.9267 13.0931 13.9267C12.8798 13.9267 12.6665 13.8451 12.504 13.6826L9.99989 11.1783L7.49577 13.6826C7.33326 13.8451 7.11994 13.9267 6.90662 13.9267C6.69315 13.9267 6.47984 13.8451 6.31733 13.6826C5.99155 13.3566 5.99155 12.8301 6.31733 12.5041L8.8216 10L6.31733 7.49589C5.99155 7.16996 5.99155 6.64338 6.31733 6.31745C6.64326 5.99168 7.16984 5.99168 7.49577 6.31745L9.99989 8.82172L12.504 6.31745C12.8299 5.99168 13.3565 5.99168 13.6824 6.31745C14.0082 6.64338 14.0082 7.16996 13.6824 7.49589L11.1782 10L13.6824 12.5041Z" fill="#FAFAFA" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            
                            <img src="{{ $image_new }}" alt="Model name here!" />
                        </li>
                        @endforeach

                    </ul>
                </div>
            </section>
            <!-- Banners Section    -->
            <div id="wrapper-info-banners" data-equalizer data-equalize-on="medium" class="grid-x">
                <!-- Using Equalizer above to Watch inner div with class data-equalizer-watch to make those sections with the same height   -->
                <section class="bannerbox-info cell small-12 medium-4">
                    <div class="inner-box" data-equalizer-watch>
                        <header>
                            <svg class="wallet-icon-fix" width="50" height="44" viewBox="0 0 50 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.8125 10.5H45.0391C47.2772 10.5 49 12.2074 49 14.1875V39.1875C49 41.1676 47.2772 42.875 45.0391 42.875H6.25C3.35014 42.875 1 40.5249 1 37.625V6.375C1 3.47514 3.35014 1.125 6.25 1.125H42.1875C44.2241 1.125 45.875 2.77592 45.875 4.8125C45.875 5.1235 45.6235 5.375 45.3125 5.375H7.8125C6.39693 5.375 5.25 6.52193 5.25 7.9375C5.25 9.35307 6.39693 10.5 7.8125 10.5ZM36.5 26.6875C36.5 28.9654 38.3471 30.8125 40.625 30.8125C42.9029 30.8125 44.75 28.9654 44.75 26.6875C44.75 24.4096 42.9029 22.5625 40.625 22.5625C38.3471 22.5625 36.5 24.4096 36.5 26.6875Z" stroke="white" stroke-width="2" />
                            </svg>
                            <h1>
                                You have received
                            </h1>
                            <h2>
                                <span class="data-injection">{{ $total_tokens }}</span> TOKENS
                            </h2>
                        </header>
                        <div class="cta">
                            <a href="{{ route('wallet-model') }}" title="Manage your Wallet">
                                Manage your Wallet
                            </a>
                        </div>
                    </div>
                </section>
                <section class="bannerbox-info cell small-12 medium-4">
                    <div class="inner-box" data-equalizer-watch>
                        <header>
                            <!--<svg width="50" height="44" viewBox="0 0 50 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.8125 10.5H45.0391C47.2772 10.5 49 12.2074 49 14.1875V39.1875C49 41.1676 47.2772 42.875 45.0391 42.875H6.25C3.35014 42.875 1 40.5249 1 37.625V6.375C1 3.47514 3.35014 1.125 6.25 1.125H42.1875C44.2241 1.125 45.875 2.77592 45.875 4.8125C45.875 5.1235 45.6235 5.375 45.3125 5.375H7.8125C6.39693 5.375 5.25 6.52193 5.25 7.9375C5.25 9.35307 6.39693 10.5 7.8125 10.5ZM36.5 26.6875C36.5 28.9654 38.3471 30.8125 40.625 30.8125C42.9029 30.8125 44.75 28.9654 44.75 26.6875C44.75 24.4096 42.9029 22.5625 40.625 22.5625C38.3471 22.5625 36.5 24.4096 36.5 26.6875Z" stroke="white" stroke-width="2"/>
                            </svg>-->
                            <!--<img src=" echo BASE_URL; images/icons/live.svg" alt="" />-->
                            <svg id="Capa_1" enable-background="new 0 0 512.002 512.002" height="512" viewBox="0 0 512.002 512.002" width="512" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="m467.001 242.002h-422c-24.813 0-45 20.187-45 45v180c0 24.813 20.187 45 45 45h422c24.813 0 45-20.187 45-45v-180c0-24.813-20.187-45-45-45zm15 225c0 8.271-6.729 15-15 15h-422c-8.271 0-15-6.729-15-15v-180c0-8.271 6.729-15 15-15h422c8.271 0 15 6.729 15 15z" />
                                    <path d="m136.001 422.002h-45v-105c0-8.284-6.716-15-15-15s-15 6.716-15 15v120c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15s-6.716-15-15-15z" />
                                    <path d="m196.001 302.002c-8.284 0-15 6.716-15 15v120c0 8.284 6.716 15 15 15s15-6.716 15-15v-120c0-8.284-6.716-15-15-15z" />
                                    <path d="m436.001 332.002c8.284 0 15-6.716 15-15s-6.716-15-15-15h-60c-8.284 0-15 6.716-15 15v120c0 8.284 6.716 15 15 15h60c8.284 0 15-6.716 15-15s-6.716-15-15-15h-45v-30h45c8.284 0 15-6.716 15-15s-6.716-15-15-15h-45v-30z" />
                                    <path d="m319.639 302.45c-8.038-2.007-16.181 2.877-18.19 10.914l-15.448 61.791-15.448-61.791c-2.009-8.037-10.155-12.924-18.19-10.914-8.037 2.009-12.923 10.153-10.914 18.19l30 120c1.669 6.677 7.669 11.362 14.552 11.362s12.883-4.685 14.552-11.362l30-120c2.009-8.037-2.877-16.181-10.914-18.19z" />
                                    <path d="m144.993 206.996c6.625-4.974 7.962-14.377 2.988-21.002-35.809-47.688-35.809-114.299 0-161.986 4.975-6.625 3.637-16.027-2.988-21.002-6.624-4.974-16.027-3.637-21.001 2.988-43.773 58.294-43.773 139.72 0 198.014 4.979 6.633 14.384 7.957 21.001 2.988z" />
                                    <path d="m367.009 206.996c6.612 4.965 16.018 3.65 21.001-2.988 43.773-58.294 43.773-139.72 0-198.014-4.974-6.625-14.377-7.963-21.001-2.988-6.625 4.974-7.962 14.377-2.988 21.002 35.809 47.688 35.809 114.299 0 161.986-4.974 6.625-3.636 16.027 2.988 21.002z" />
                                    <path d="m198.923 176.175c6.171-5.527 6.694-15.01 1.167-21.181-25.523-28.501-25.523-71.486 0-99.986 5.526-6.171 5.004-15.654-1.167-21.181-6.171-5.526-15.653-5.004-21.181 1.167-17.218 19.227-26.701 44.089-26.701 70.007s9.482 50.78 26.701 70.007c5.509 6.152 14.99 6.711 21.181 1.167z" />
                                    <path d="m313.079 176.175c6.199 5.551 15.679 4.976 21.181-1.167 17.218-19.227 26.701-44.089 26.701-70.007s-9.482-50.78-26.701-70.007c-5.526-6.171-15.009-6.693-21.181-1.167-6.171 5.527-6.694 15.01-1.167 21.181 25.523 28.501 25.523 71.486 0 99.986-5.527 6.172-5.005 15.654 1.167 21.181z" />
                                    <path d="m256.001 150.001c24.813 0 45-20.187 45-45s-20.187-45-45-45-45 20.187-45 45 20.187 45 45 45zm0-60c8.271 0 15 6.729 15 15s-6.729 15-15 15-15-6.729-15-15 6.729-15 15-15z" />
                                </g>
                            </svg>
                            <h1>
                                Ready. Set. Go!
                            </h1>
                            <h2>
                                Start Earning Money!
                            </h2>
                        </header>
                        <div class="cta highlighted">
                            <a href="{{ route('page-startshow-golive') }}" title="Start Show | Go Live">
                                Go Live!
                            </a>
                        </div>
                    </div>
                </section>
                <section class="bannerbox-info cell small-12 medium-4">
                    <div class="inner-box" data-equalizer-watch>
                        <header>
                            <svg width="22" height="17" viewBox="0 0 22 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.7717 1.45348C21.63 1.35481 21.4549 1.35096 21.3103 1.44364L16.2626 4.68363V2.73959C16.2611 1.22725 15.2186 0.00171225 13.9321 0H2.33051C1.04399 0.00171225 0.00145657 1.22725 0 2.73959V13.5567C0.00145657 15.069 1.04399 16.2946 2.33051 16.2963H13.9321C15.2186 16.2946 16.2611 15.069 16.2626 13.5567V11.648L21.3105 14.888C21.4549 14.9806 21.6302 14.977 21.7717 14.8783C21.9133 14.7795 22 14.6003 22 14.407V1.92456C22 1.73108 21.9132 1.55215 21.7717 1.45348ZM15.33 13.5569C15.3293 14.4644 14.7037 15.1996 13.9317 15.2007H2.33051C1.55853 15.1996 0.933114 14.4644 0.932203 13.5569V2.73959C0.933114 1.83232 1.55853 1.09691 2.33051 1.09584H13.9321C14.7039 1.09691 15.3295 1.83232 15.3304 2.73959L15.33 13.5569ZM21.0678 13.4837L16.2626 10.3995V5.93207L21.0678 2.84811V13.4837Z" fill="black" />
                            </svg>

                            <h1>
                                Ready. Set. Go!
                            </h1>
                            <h2>
                                Start Earning Money!
                            </h2>
                        </header>
                        <div class="cta highlighted">
                            <a href="{{ route('page-your-videoshop-1') }}" title="Your Videoshop">
                                Your Videoshop
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</x-app-layout>
