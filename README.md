![iPasteBin](https://raw.githubusercontent.com/neshaani/neshaani/master/resources/files/neshaani-logo.jpg)

# 🔗 [Neshaani](https://neshaani.com) App

This is the primary codebase that powers the API for [Neshaani.com](https://neshaani.com). 

Neshaani is an open-source URL Shortener API based on [Slim](http://www.slimframework.com/) micro framework for PHP.

## Installation
1. Clone the repo
	```
	git clone https://github.com/neshaani/neshaani.git
	```
2. Install [Composer](https://getcomposer.org/download/).

3. Install [NPM](https://docs.npmjs.com/getting-started/installing-node).

4. ```npm install && composer install```

5. Modify ```/app/database.php``` accordingly.

6. Set the baseURL in: ```/app/bootstrap.php```

7. Import ```/resources/database/neshaani_**.sql``` into your mysql db.

8. Make a POST request at ```/api/generate``` with your desired url.

**It's recommended that you change the following variables in a production environment:**

- ```/app/bootstrap.php```: ```ini_set('display_errors', 'Off');```

- ```/app/bootstrap.php```: ```'displayErrorDetails' => false```


## API Usage
Method: POST

End Point: [baseURL]/api/generate/


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
