<section class="gallery content-section">
    
    {{-- Loop through the gallery items --}}
    @foreach ( $slice->getValue()->getArray() as $galleryItem )
  
        <div class="gallery-item">
            <img src="{{ $galleryItem->getImage("image")->getUrl() }}"/>
            {!! $galleryItem->getStructuredText("description")->asHtml($linkResolver) !!}

            {{-- If there is a link and text text --}}
            @if ( $galleryItem->getLink("link") && $galleryItem->getText("linkText") )
                <p class="gallery-link"><a href="{{ $galleryItem->getLink('link')->getUrl($linkResolver) }}">{{ $galleryItem->getText("linkText") }}</a></p>
            @endif
    </div>
    @endforeach
</section>