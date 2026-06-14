<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GearMaster') }}</title>

        <!-- Fonts & Icons -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=JetBrains+Mono:wght@500&amp;family=Sora:wght@600;700;800&amp;display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Global Premium Styling */
            .glass-input {
                background: rgba(255, 255, 255, 0.03);
                border: 1px solid rgba(255, 255, 255, 0.1);
                transition: all 0.3s ease;
            }
            .glass-input:focus {
                background: rgba(255, 255, 255, 0.05);
                border-color: #a4e6ff;
                box-shadow: 0 0 15px rgba(164, 230, 255, 0.2);
                outline: none;
            }
            
            .btn-primary {
                background-color: #a4e6ff;
                color: #0B0B0C;
                border: 1px solid transparent;
                transition: all 0.3s ease;
            }
            .btn-primary:hover {
                box-shadow: 0 0 15px rgba(164, 230, 255, 0.4);
            }

            .btn-secondary {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                color: #e5e2e1;
                transition: all 0.3s ease;
            }
            .btn-secondary:hover {
                border-color: #a4e6ff;
                color: #a4e6ff;
                box-shadow: 0 0 15px rgba(164, 230, 255, 0.1);
            }
            
            .active-field label {
                color: #a4e6ff !important;
            }
            .active-field span {
                color: #a4e6ff !important;
            }
        </style>
    </head>
    <body class="font-inter antialiased bg-background text-on-surface selection:bg-primary selection:text-on-primary">
        <div class="min-h-screen bg-background flex flex-col">
            <x-header />

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-surface-container-low border-b border-white/10 py-6">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow pb-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                    <x-add-alert />
                </div>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
