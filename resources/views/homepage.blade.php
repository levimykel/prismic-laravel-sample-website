@extends('layout')

@section('content')
    <section class="homepage-banner" style='background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url({{ $pageContent->getImage("homepage.backgroundImage")->getUrl() }})'>
        <div class="banner-content container">
            <h2 class="banner-title">
                {{ $pageContent->getText("homepage.title") }}
                <span class="edit-button" data-wio-id="{{ $pageContent->getID() }}"></span>
            </h2>
            <p class="banner-description">{{ $pageContent->getText("homepage.tagline") }}</p>

            {{-- include the button if both the button link and button text are defined in the prismic.io repo --}}
            @if ( $pageContent->getLink("homepage.buttonLink") && $pageContent->getText("homepage.buttonText") ) 
                <a href="{{ $pageContent->getLink('homepage.buttonLink')->getUrl($linkResolver) }}" class="banner-button">{{ $pageContent->getText("homepage.buttonText") }}</a>
            @endif
        </div>
    </section>

    <div class="container">
        
        {{-- If there are any slices --}}
        @if ( $pageContent->getSliceZone('homepage.body') !== null )

            {{-- Display the slices --}}
            @foreach ( $pageContent->getSliceZone('homepage.body')->getSlices() as $slice )

                {{-- Render the right markup for a given slice type --}}
                <?php 
                    switch($slice->getSliceType()) {
                        case 'heading': ?>
                            @include("slices/section-heading")
                            <?php break;
                        case 'textSection': ?>
                            @include("slices/text-section")
                            <?php break;
                        case 'fullWidthImage': ?>
                            @include("slices/full-width-image")
                            <?php break;
                        case 'highlight': ?>
                            @include("slices/highlight")
                            <?php break;
                        case 'gallery': ?>
                            @include("slices/gallery")
                            <?php break;
                    }
                ?>
            @endforeach
        @endif
    </div>

@stop