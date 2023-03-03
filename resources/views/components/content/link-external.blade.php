@props(['url', 'title'])
<a href="{{ $url }}" target="_blank" title="{{ $title }}" class="flex justify-between py-8 group hover:text-blue">
  {{ $slot }}
  <x-icon.link-external />
</a>