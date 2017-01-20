<?php

namespace App;
use Prismic\LinkResolver;

/**
 * The link resolver is the code building URLs for pages corresponding to
 * a Prismic document.
 *
 * If you want to change the URLs of your site, you need to update this class
 * as well as the routes in app.php.
 */
class PrismicLinkResolver extends LinkResolver
{
//    /**
//     * Where to redirect users after registration.
//     *
//     * @var object
//     */
//    private $prismic;
//    
//    /**
//     * Create a new LinkResolver instance.
//     *
//     * @return void
//     */
//    public function __construct($prismic)
//    {
//        $this->prismic = $prismic;
//    }

    /**
     * Resolve the link depending on the document type.
     *
     * @param object $link
     * @return string
     */
    public function resolve($link)
    {
        // For pages
        if ($link->getType() == 'page') {
            return '/' . $link->getUid();
        }

        // Default case returns the homepage
        return '/';
    }
}
