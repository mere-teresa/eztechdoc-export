# Error handling

Error handling in the REST API is fully based on HTTP error codes. As a web developer, you are probably familiar with the most common ones: 401 Unauthorized, 404 Not Found or 500 Internal Server Error. The REST API uses those, along with a few more, to allow proper error handling.

The complete list of error codes used and the conditions in which they apply are specified in the [reference documentation](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rest/REST-API-V2.rst).

## General error codes

A few error codes apply to most resources (if they *are* applicable)

### 500 Internal Server Error

The server encountered an unexpected condition, usually an exception, which prevented it from fulfilling the request: database down, permissions or configuration error.

### 501 Not Implemented

Returned when the requested method has not yet been implemented. As of eZ Publish 5.0, most of User, User group, Content, Location and Content Type have been implemented. Some of their methods, as well as other features, may return a 501.

### 404 Not Found

Returned when the request failed because the request object was not found. You should be familiar with this one.

### 405 Method Not Allowed

Returned when the requested REST API resource doesn't support the HTTP verb that was used.

### 406 Not Acceptable

Returned when an accept header sent with the requested isn't supported.

## Error handling in your REST implementation

It is up to you, in your client implementation, to handle those codes by checking if an error code (4xx or 5xx) was returned instead of the expected 2xx or 3xx.

#### In this topic:

-   [General error codes](#Errorhandling-Generalerrorcodes)
    -   [500 Internal Server Error](#Errorhandling-500InternalServerError)
    -   [501 Not Implemented](#Errorhandling-501NotImplemented)
    -   [404 Not Found](#Errorhandling-404NotFound)
    -   [405 Method Not Allowed](#Errorhandling-405MethodNotAllowed)
    -   [406 Not Acceptable](#Errorhandling-406NotAcceptable)
-   [Error handling in your REST implementation](#Errorhandling-ErrorhandlinginyourRESTimplementation)


