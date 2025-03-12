@props(['employer', 'width' => 90])

@php
    use Illuminate\Support\Str;

    $logoUrl = Str::startsWith($employer->logo, 'logos')
        ? asset($employer->logo)
        : 'http://picsum.photos/seed/' . rand(0, 100000) . '/' . $width;
@endphp

<img src="{{ $logoUrl }}" width="{{ $width }}" alt="" class="rounded-xl">
