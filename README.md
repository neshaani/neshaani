# 🔗 [Neshaani](https://api.neshaani.com) API

This is the primary codebase that powers the API for [Neshaani.com](https://neshaani.com). 

Neshaani is an open-source [URL Shortener](https://en.wikipedia.org/wiki/URL_shortening) API based on [Slim](http://www.slimframework.com/) micro framework for PHP.

## Installation
1. Clone the Repository
	```
	git clone https://github.com/neshaani/neshaani.git
	```
2. Install [Composer](https://getcomposer.org/download/) and [NPM](https://docs.npmjs.com/getting-started/installing-node).

3. Run ```composer install && npm install```

4. Rename ```/app/config.php.example``` to ```/app/config.php``` and modify it accordingly.

5. Import ```/resources/database/neshaani_**.sql``` into your db.

6. Make a POST request at ```BASE_URL/api/generate``` with your desired url.



## API Usage
Method: ```POST``` | End Point: ```[baseURL]/api/generate/```

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

## Follow Neshaani
[@neshaaniapp](https://twitter.com/neshaaniapp)
