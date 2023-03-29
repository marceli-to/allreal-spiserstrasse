@extends('web.app')
@section('seo_title', __('Aktuelles'))
@section('page_title', __('Aktuelles'))
@section('content')

<x-layout.columns>
  <x-layout.content>
    <div class="mb-48">
      <x-news.picture :image="'news/Allreal_Spiserstrasse_Aktuelles_BAubeginn_an_der_Spiserstrasse'" :alt="'Baubeginn an der Spiserstrasse'" />
    </div>
    <x-content.article>
      <p class="mb-0 text-base">20. Februar 2022</p>
      <p class="mb-16 lg:mb-24">Baubeginn an der Spiserstrasse</p>
      <p class="mb-16 lg:mb-24">Im Anschluss an die Vorbereitungsarbeiten begann am 20. März 2023 der Rückbau der bestehenden Gebäude auf dem Areal der Wohnüberbauung Spiserstrasse. In der zweiten Aprilhälfte folgen dann die Sicherung der Baugrube und anschliessend die eigentlichen Aushubarbeiten.</p>
    </x-content.article>
  </x-layout.content>
</x-layout.columns>
@endsection