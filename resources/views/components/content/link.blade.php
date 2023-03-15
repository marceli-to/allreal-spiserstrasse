@props(['url', 'title', 'target' => '_self'])
<a href="{{ $url }}" target="{{ $target }}" title="{{ $title }}" class="flex justify-between py-10 group hover:text-blue">
  {{ $slot }}
</a>