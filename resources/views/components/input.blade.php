<div class="{{ $mbtm }}">
    <label
        for="{{ $name }}"
        @class([
            "mb-2 text-sm",
            "block" => !empty($label),
            "hidden" => empty($label),
            "text-red-500 font-medium" => $errors->has($name),
            "text-gray-500" => !$errors->has($name)
        ])
    >
        {{ $label }}
    </label>
    <div class="form-group relative">
        <div
            @class([
                "form-input-icon absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none transition-all duration-300",
                "text-gray-400" => !$errors->has($name),
                "text-red-500" => $errors->has($name),
            ])
        >
            <i class="fa-solid fa-{{ $icon }}"></i>
        </div>
        <style>
            input[type="time"]::-webkit-calendar-picker-indicator {
                   display: none;
                }
        </style>
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name,$value) }}"
            autocomplete="off"
            @class([
                "form-input bg-gray-50 border border-gray-300 text-gray-700 font-medium text-sm focus:outline-none block w-full $rounded ps-10 p-2.5 appearance-none",
                "focus:border-gray-600" => !$errors->has($name),
                "border-red-500" => $errors->has($name),
            ])
        >
    </div>
    @error($name)
        <div class="text-red-500 text-sm font-medium mt-2">{{ $message }}</div>
    @enderror
</div>
@pushOnce('inputscript')
    <script src="{{ asset('asset/js/input.js') }}" type="text/javascript"></script>
@endPushOnce

{{-- <x-input type="text" name="email" icon="envelope" placeholder="name@kbtc.edu.mm" label="Email address" mbtm="mb-10" /> --}}