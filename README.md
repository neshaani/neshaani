# Neshaani

This is the primary codebase that powers [Neshaani.com](https://www.neshaani.com). 

Neshaani is an open-source URL Shortener based on [Slim](http://www.slimframework.com/) micro framework for PHP.

## Project Layout
```
app/
	Neshaani/
		Models/
			Links.php
	bootstrap.php
	database.php
	routes.php
public/
	.htaccess
	index.php
resources/
	database/
	files/
	js/
		main.js
	sass/
		modules/
		variables.scss
		main.scss
	views/
		home.twig
```

## API Documentation
Method: POST

End Point: /api/generate/


Sample Request:
```
{
  "url": "http://YOUR_VALID_URL"
}
```

Sample Response:
```
{
  "url": "http://YOUR_VALID_URL",
  "generate": {
    "url": "http://neshaani.app/1000",
    "token": 1000
  }
}
```

## Contributions
Coming Soon

## Follow Neshaani
Coming Soon