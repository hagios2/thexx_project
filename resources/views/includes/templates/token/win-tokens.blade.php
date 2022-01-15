<x-app-layout>
    <div id="main-area" class="inner-page-design">
        <main id="design-theme" class="theme-accounts theme-wallet-vip-tokens">
            <!-- This layout page uses the theme-accounts styles while overwriting changes with theme-wallet-vip-tokens class  -->
            <header id="theme-accounts">
                <header>
                    <h1>
                        Try your luck to unlock a ton of tokens!
                    </h1>
                    <h2 class="user-membership-level">
                        Play one our games and try your chance to win great prizes to spend on your XXX Club!
                    </h2>
                </header>
                <div id="number-of-tokens">
                    <svg width="40" height="36" viewBox="0 0 40 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M36.0312 8H6.25C5.55937 8 5 7.44063 5 6.75C5 6.05937 5.55937 5.5 6.25 5.5H36.25C36.9406 5.5 37.5 4.94063 37.5 4.25C37.5 2.17891 35.8211 0.5 33.75 0.5H5C2.23828 0.5 0 2.73828 0 5.5V30.5C0 33.2617 2.23828 35.5 5 35.5H36.0312C38.2203 35.5 40 33.818 40 31.75V11.75C40 9.68203 38.2203 8 36.0312 8ZM32.5 24.25C31.1195 24.25 30 23.1305 30 21.75C30 20.3695 31.1195 19.25 32.5 19.25C33.8805 19.25 35 20.3695 35 21.75C35 23.1305 33.8805 24.25 32.5 24.25Z" fill="#12EB90" />
                    </svg>
                    <div id="infos">
                        You have<br />
                        <span>
                            <span class="data-injection">150</span> Tokens
                        </span>
                    </div>
                </div>
            </header>
            <!-- Win Tokens -->
            <div id="wrapper-win-tokens">
                <div id="win-tokens" class="grid-x">
                    <div class="wrapper-section cell small-12 medium-6">
                        <section class="weekly-lottery">
                            <header>
                                <h1>
                                    Weekly Lottery!
                                </h1>
                                <h2>
                                    Choose your numbers and win up to 1.000 tokens!
                                </h2>
                            </header>
                            <div class="middle-stage">
                                <div id="countdown">
                                    24:00:05 left!
                                </div>
                                <svg width="32" height="28" viewBox="0 0 32 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M31.4885 12.7149L19.9322 0.773104C19.6023 0.432224 19.1626 0.245117 18.6938 0.245117C18.2245 0.245117 17.7851 0.432493 17.4552 0.773104L16.406 1.85757C16.0764 2.19792 15.8948 2.65251 15.8948 3.13722C15.8948 3.62165 16.0764 4.09157 16.406 4.43191L23.1478 11.4138H1.72877C0.763051 11.4138 0 12.195 0 13.1932V14.7263C0 15.7245 0.763051 16.5845 1.72877 16.5845H23.2243L16.4062 23.6053C16.0766 23.9462 15.895 24.3884 15.895 24.8731C15.895 25.3573 16.0766 25.806 16.4062 26.1466L17.4555 27.2276C17.7853 27.5684 18.2248 27.7542 18.6941 27.7542C19.1629 27.7542 19.6026 27.566 19.9325 27.2251L31.4888 15.2836C31.8194 14.9416 32.0013 14.4852 32 13.9999C32.001 13.5131 31.8194 13.0563 31.4885 12.7149Z" fill="white" />
                                </svg>
                                <div class="cta">
                                    <a href="{{ route('win-tokens-weekly-lottery') }}" title="Bet Now!" class="shaker">
                                        Bet Now
                                    </a>
                                </div>
                            </div>
                            <div class="footer-notice">
                                <p>Starts from 1 Token!</p>
                            </div>
                        </section>
                    </div>
                    <div class="wrapper-section cell small-12 medium-6">
                        <section class="unlock-the-slot">
                            <header>
                                <h1>
                                    Unlock the slot
                                </h1>
                            </header>
                            <div class="unlock-content grid-x">
                                <div class="left-section cell small-12 medium-8">
                                    <h2>
                                        Bet 1 token and ride the slot!
                                    </h2>
                                    <p>
                                        Get three identical figures and win 500 tokens!
                                    </p>
                                </div>
                                <div class="right-section cell small-12 medium-4">
                                    <div class="arrow-down">
                                        <svg width="40" height="42" viewBox="0 0 40 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M28.7688 33.5048L33.3326 17.5258C33.4628 17.0697 33.405 16.5953 33.1706 16.1893C32.936 15.7829 32.554 15.496 32.0941 15.3806L30.6303 15.0142C30.1707 14.8989 29.6862 14.969 29.2665 15.2113C28.8469 15.4535 28.5308 15.8458 28.4008 16.3014L25.7253 25.6309L15.0158 7.08148C14.5329 6.24514 13.4748 5.97493 12.6104 6.47402L11.2826 7.2406C10.4182 7.73968 10.055 8.8305 10.5378 9.66684L21.2856 28.2825L11.7963 25.8883C11.3363 25.7733 10.8625 25.8371 10.4428 26.0795C10.0235 26.3216 9.72569 26.7032 9.59552 27.159L9.18399 28.6081C9.05372 29.0642 9.11255 29.5376 9.34721 29.9441C9.58162 30.3501 9.96442 30.6368 10.4246 30.752L26.5444 34.7893C27.0059 34.9047 27.4921 34.834 27.9117 34.5902C28.3339 34.3477 28.6386 33.9621 28.7688 33.5048Z" fill="#FFF50A" />
                                        </svg>
                                    </div>
                                    <div class="cta">
                                        <a href="{{ route('win-tokens-unlock-the-slot') }}" title="Play Now!" class="shaker">
                                            Play Now!
                                        </a>
                                    </div>
                                    <div class="footer-notice">
                                        <p>Starts from 1 Token!</p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
