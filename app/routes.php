<?php

use Neshaani\Models\Link as Link;

$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.twig');
});


$app->get('/{token}', function ($request, $response) use ($app) {

    $token = $request->getAttribute('token');

    $link = Link::where('token', $token)->first();

    if (!$link) { // The provided token is not found
    	return $response->withStatus(404)
            			->withHeader('Content-Type', 'text/html')
            			->write('Page not found');
    } else { // Token found, proceed with the request
		return $response->withStatus(302)
						->withHeader('Location', $link->url);
    }

});


$app->post('/api/generate', function ($request, $response) use ($app) {

	$payload = $request->getParsedBody();
	$url = trim($payload["url"]);

	if (empty($payload) || empty($url)) {
		return $response->withStatus(400)
						->withJson([
							'error' => [
								'code' 		=> 100,
								'message' 	=> 'a URL is required.'
							]
						]);
	}

	if (!filter_var($url, FILTER_VALIDATE_URL)) {
		return $response->withStatus(400)
						->withJson([
							'error' => [
								'code' 		=> 101,
								'message' 	=> 'The URL is not valid.'
							]
						]);
	}

	$link = Link::where('url', $url)->first();

	if ($link) {

		// There is a duplicate, return it in response
		return $response->withStatus(201)
				->withJson([
					'url' => $url,
					'generate' => [
						'url' 	=> $this->get('settings')['baseURL'].$link->token,
						'token' => $link->token
					]
				]);

	}

	// Ok, the URL is new and ok	
	$newLink = Link::create([
			'url' => $url
		]);

	$newLink->update([
			'token' => $newLink->generateToken()
		]);

	return $response->withStatus(201)
					->withJson([
					'url' => $url,
					'generate' => [
						'url' 	=> $this->get('settings')['baseURL'].$newLink->token,
						'token' => $newLink->token
					]
					]);
});
