@extends('frontend.layouts.master')

@section('contents')
    {{-- BANNER PART --}}
    @include('frontend.home.section.hero-section')

    {{-- CATEGORY SLIDER  --}}
    @include('frontend.home.section.category-slider-section')

    {{-- FEATURES PART  --}}
    @include('frontend.home.section.features-section')

    {{-- COUNTER PART  --}}
    @include('frontend.home.section.counter-section')

    {{-- OUR CATEGORY  --}}
    @include('frontend.home.section.our-category-section')

    {{-- OUR LOCATION  --}}
    @include('frontend.home.section.our-location-section')

    {{-- FEATURED LISTING  --}}
    @include('frontend.home.section.featured-listing-section')

    {{-- OUR PACKAGE  --}}
    @include('frontend.home.section.our-package-section')

    {{-- TESTIMONIAL PART  --}}
    @include('frontend.home.section.testimonial-section')

    {{-- BLOG PART  --}}
    @include('frontend.home.section.blog-section')
@endsection
