# Neshaani

This is the primary codebase that powers [Neshaani.com](https://neshaani.com). 

Neshaani is an open-source URL Shortener based on [Slim](http://www.slimframework.com/) micro framework for PHP.

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
[@neshaaniapp](https://twitter.com/neshaaniapp)