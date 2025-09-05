@props(['label' => '', 'name', 'id', 'placeholder', 'class' => '', 'type' => 'text', 'data' => null])

<div class="mb-4">
    <label class="block text-gray-700" for="{{ $name }}">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}"
        class="w-full px-4 py-2 border rounded focus:outline-none {{ $class }}"
        value="{{ old($name, $data->$name ?? '') }}" placeholder="{{ $placeholder }}" />
    @error($name)
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror
</div>