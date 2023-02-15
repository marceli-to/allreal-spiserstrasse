<div class="mb-6 @if ($errors->has($name)) has-error @endif">
  @if($label ?? null)
    <label class="block font-mono font-semi text-sm text-gray-400 mb-3" for="{{ $name }}">
      {{ $label }} {{ ($required ?? false) ? '*' : '' }}
    </label>
  @endif
  <input
    class="{{ $errors->has($name) ? 'has-error' : '' }} relative block w-full border-transparent shadow-inner shadow shadow-primary-200:50 focus:shadow-md focus:shadow-gray-200 rounded-lg px-3 py-3 font-sans text-sm text-gray-900 placeholder:font-sans placeholder:text-sm placeholder:text-primary-900 focus:border-transparent focus:ring-0"
    type="{{ $type ?? 'text' }}"
    name="{{ $name }}"

    @if ($placeholder)
      placeholder="{{ $placeholder ?? '' }}"
    @endif
    value="{{ old($name, $value ?? '') }}"
    {{ ($required ?? false) ? 'required' : '' }}

    @if ($autocomplete != 'false')
      autocomplete="off"
    @endif
  >
</div>