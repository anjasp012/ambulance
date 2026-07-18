<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body class="h-full bg-slate-100 flex justify-center items-start overflow-y-auto">
        <!-- Simulated Mobile Frame -->
        <div class="w-full max-w-[480px] min-h-screen bg-slate-50 border-x border-slate-200/80 flex flex-col relative shadow-2xl overflow-x-hidden">
            {{ $slot }}
        </div>

        @livewireScripts

        {{-- Lucide Icons --}}
        <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
        <script>
            // Initialize once on DOM load
            document.addEventListener('DOMContentLoaded', () => lucide.createIcons());

            // Use MutationObserver to watch for Livewire updates and re-initialize icons immediately
            const observer = new MutationObserver(() => {
                if (document.querySelector('i[data-lucide]')) {
                    observer.disconnect();
                    lucide.createIcons();
                    observer.observe(document.body, {
                        childList: true,
                        subtree: true
                    });
                }
            });

            // Start observing the body
            observer.observe(document.body, {
                childList: true,
                subtree: true
            });
        </script>
    </body>
</html>
