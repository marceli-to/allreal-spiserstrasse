<a href="{{ $url }}" target="_blank" title="{{ $title }}" class="flex justify-between py-8 group hover:text-blue">
  {{ $slot }}
  @include('web.icons.link-external')
</a>