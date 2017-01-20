<?php
$textSectionSlice = $slice;
$textSection = $slice->getValue();
?>

{{-- Add the class that defines the number of columns --}}
@if ( $textSectionSlice->getLabel() )
    <?php $sectionClass = "text-section-" . $textSectionSlice->getLabel(); ?>
@else 
    <?php $sectionClass = "text-section-1col"; ?>
@endif

<section class="content-section {{ $sectionClass }}">
  {!! $textSectionSlice->asHtml($linkResolver) !!}
</section>