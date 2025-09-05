@props(['label' => '', 'name', 'id', 'placeholder', 'class' => '', 'data' => null])

<div class="mb-4">
    <label class="block text-gray-700" for="{{ $name }}">{{ $label }}</label>
    <textarea name="{{ $name }}" id="{{ $id }}" class="w-full px-4 py-2 border rounded focus:outline-none {{ $class }}"
        placeholder="{{ $placeholder }}">{{ old($name, $data->$name ?? '') }}</textarea>
    @error($name)
    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
    @enderror
</div>