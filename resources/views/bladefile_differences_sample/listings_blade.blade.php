{{--Showing Differences between Blade File & Non-Blade File--}}

<h1>{{$heading}}</h1>

@foreach($listings as $listing)
<h2>
    <a href="/listings/{{$listing['id']}}"> {{$listing['title']}}</a>
</h2>
<p>
    {{$listing['description']}}
</p>
@endforeach

@php
    echo "Hello";
    $test = 1;
@endphp

<p> {{$test}} </p>

{{-- can use if or unless --}}

@if(empty($listings))
    <p>No Listing Found !</p>
@else
    <p>Listing Exist ! </p>
@endif

@unless(empty($listings))
    <p> Listing Exist ! </p>
@else
    <p> No Listing Found </p>
@endunless

    
