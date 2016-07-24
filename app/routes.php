<?php

use Neshaani\Models\Link as Link;

/*
|--------------------------------------------------------------------------
| baseurl: a Static page displaying API public welcome screen
|--------------------------------------------------------------------------
*/

$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.twig');
});

/*
|--------------------------------------------------------------------------
| /{token} redirects to the requested page
|--------------------------------------------------------------------------
*/

$app->get('/{token}', function ($request, $response) use ($app) {

    $token = $request->getAttribute('token');
    $link = Link::where('token', $token)->first();

    if (!$link) { // Token is not found
        return $response->withStatus(404)
                        ->withHeader('Content-Type', 'text/html')
                        ->write('Page not found. <br><br>Click <a href="/">here</a> to go to homepage.');
    } else { // Token found, proceed with the request
        return $response->withStatus(302)
                        ->withHeader('Location', $link->url);
    }

});

/*
|--------------------------------------------------------------------------
| /api/generate accepts POST and returns the generation result
|--------------------------------------------------------------------------
*/

$app->post('/api/generate', function ($request, $response) use ($app) {

    $payload = $request->getParsedBody();
    $url = trim($payload["url"]);

    if (empty($payload) || empty($url)) {
        return $response->withStatus(400)
                        ->withJson([
                            'error' => [
                                'code'      => 100,
                                'message'   => 'a URL is required.'
                            ]
                        ]);
    }

    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        return $response->withStatus(400)
                        ->withJson([
                            'error' => [
                                'code'      => 101,
                                'message'   => 'The URL is not valid.'
                            ]
                        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Check if the URL already exists in the db
    |--------------------------------------------------------------------------
    */
    $link = Link::where('url', $url)->first();

    if ($link) {

        return $response->withStatus(201)
                ->withJson([
                    'url' => $url,
                    'generate' => [
                        'url'   => $this->get('settings')['baseURL'].$link->token,
                        'token' => $link->token
                    ]
                ]);

    }

    $newLink = Link::create([
            'url' => $url
        ]);

    $newLink->update(['token' => $newLink->generateToken()]);

    return $response->withStatus(201)
                    ->withJson([
                    'url' => $url,
                    'generate' => [
                        'url'   => $this->get('settings')['baseURL'].$newLink->token,
                        'token' => $newLink->token
                    ]
                    ]);
});
