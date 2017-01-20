@extends('layout')

@section('content')

    <div class="container">
        <span class="edit-button" data-wio-id="{{ $pageContent->getID() }}"></span>
        
        {{-- If there are any slices --}}
        @if ( $pageContent->getSliceZone('page.body') !== null )

            {{-- Display the slices --}}
            @foreach ( $pageContent->getSliceZone('page.body')->getSlices() as $slice )

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