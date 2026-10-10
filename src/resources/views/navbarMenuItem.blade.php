{{-- The events are reported from the annotation tool as well as from the Ask BIIGLE
     chat of the navbar, so the listeners are loaded on every page that has a navbar.
     This mixin adds no menu item of its own. --}}
@once
    @push('scripts')
        {{vite_hot(base_path('vendor/biigle/metrics/hot'), ['src/resources/assets/js/main.js'], 'vendor/metrics')}}
    @endpush
@endonce
