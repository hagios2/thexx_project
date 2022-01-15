<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.templates.header._html-header')
    @include('includes.templates.header._header-website-main')

    <body class="font-sans antialiased">
    
        <div class="min-h-screen bg-gray-100">

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        @include('includes.templates.footer._footer')
        @include('includes._scripts')
    </body>
</html>
