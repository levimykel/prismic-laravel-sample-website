<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
| 
| If you decide to change the URLs, make sure to change the LinkResolver 
| in app/LinkResolver.php as well to make sure the links in your site are 
| generating correctly.
|
*/

use Prismic\Api;
use Prismic\LinkResolver;
use Prismic\Predicates;
use Illuminate\Http\Request;


/**
 * Route for prismic.io preview functionality
 */
Route::get('/preview', function (Request $request) {
    $token = $request->input('token');
    $url = $request['api']->previewSession($token, $request['linkResolver'], '/');
    setcookie(Prismic\PREVIEW_COOKIE, $token, time() + 1800, '/', null, false, false); 
    return response(null, 302)->header('Location', $url);
});

/**
 * Homepage Route
 */
Route::get('/', function (Request $request) {
    
    // Query the homepage
    $pageContent = $request['api']->getSingle('homepage');
    
    // Render the homepage
    return view('homepage', [
        'pageContent' => $pageContent,
        'isHomepage' => true
    ]);
});

/**
 * Page Route
 */
Route::get('/{uid}', function ($uid, Request $request) {
    
    // Query the page by its uid
    $pageContent = $request['api']->getByUID('page', $uid);
    
    // Render the 404 page if no document is found
    if (!$pageContent) {
        return view('404', [ 'pageContent' => null ]);
    }
    
    // Render the page
    return view('page', [ 'pageContent' => $pageContent ]);
});
