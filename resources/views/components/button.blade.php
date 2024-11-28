<button {{ $attributes->merge(['class' => 'px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700']) }}>
    {{ $slot }}
</button>
