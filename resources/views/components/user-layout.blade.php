<!-- resources/views/components/user-layout.blade.php -->

<x-app-layout>
    <!-- Remove or comment out the sections you don't want, like the dashboard and logo -->
    <div>
        <!-- You can add custom content here, or just leave it empty to show only the user section -->
        {{ $slot }}
    </div>
</x-app-layout>
