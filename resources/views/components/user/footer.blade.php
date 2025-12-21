{{-- resources/views/components/admin/footer.blade.php --}}
@props([
    'brand' => 'SILAB UNMUL',
    'year' => date('Y'),
])

<footer {{ $attributes->merge(['class' => 'mt-10 border-t border-gray-200 pt-6']) }}>
    <div class="flex flex-col lg:flex-row items-center justify-between gap-4 text-sm text-gray-500">
        <div>
            © {{ $year }}, made with <span class="text-red-500"></span> by
            <a href="#" class="font-semibold text-gray-700 hover:underline">{{ $brand }}</a>.
        </div>

        <div class="flex items-center gap-4">
            <a href="#" class="hover:text-gray-700">About</a>
            <a href="#" class="hover:text-gray-700">Blog</a>
            <a href="#" class="hover:text-gray-700">License</a>
        </div>
    </div>
</footer>
