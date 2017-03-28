# REST API Guide

The REST API v2 introduced in eZ Platform allows you to interact with an eZ Platform installation using the HTTP protocol, following a [REST](http://en.wikipedia.org/wiki/Representational_state_transfer) interaction model.

## Accessing the REST API

The REST API is available at the URI `/api/ezp/v2` . HTTPS is available as long as your server is properly configured. Refer to the Getting started with the REST API page to start using the API.

## Basics

REST (**RE**presentational **S**tate **T**ransfer) is a web services architecture that follows the HTTP Protocol very closely. The eZ Platform REST API supports both [JSON](http://www.json.org/) and [XML](http://www.w3.org/XML/) in terms of request format.

### Resources

The API provides a set of URIs, each of them identifying and providing access to operations on a certain resource. For instance, the URI `/content/objects/59` will allow you to interact with the Content with ID 59, while `/content/types/1` will allow you to interact with the Content Type with ID 1.

### HTTP verbs

It uses HTTP verbs ( **`GET`** , **`POST`** , but also **`PUT`** , **`DELETE`** , etc...), as well as HTTP headers to specify the type of request. Depending on the used HTTP verb, different actions will be possible. Example:

-   `        GET  /content/objects/2     ` will provide you with data about Content \#2,
-   `        PATCH  /content/objects/2     ` will update the Content \#2's metadata (section, main language, main location...),
-   `        DELETE  /content/objects/2     ` will delete Content \#2,
-   `        COPY  /content/objects/2     ` will create a copy of this Content.

Caution with custom HTTP verbs

Using custom HTTP verbs, those besides the standard (GET, POST, PUT, DELETE, OPTIONS, TRACE), can cause issues with several HTTP proxies, network firewall/security solutions and simpler web servers. To avoid issues with this REST API allows you to set these using a HTTP header instead using HTTP verb POST. Example: `X-HTTP-Method-Override: PUBLISH`

 

### Media type headers

On top of verbs, HTTP request headers will allow you to personalize the request's behavior. On every resource, you can use the Accept header to indicate which format you want to communicate in, JSON or XML. This header is also used to specify the response type you want the server to send when multiple ones are available.

-   `Accept: application/vnd.ez.api.Content+xml     ` to get **Content** (full data, fields included) as **XML**
-   `Accept: application/vnd.ez.api.ContentInfo+json     ` to get **ContentInfo** (metadata only) as **JSON**

More information

[REST specifications chapter "Media Types"](https://github.com/ezsystems/ezp-next/blob/master/doc/specifications/rest/REST-API-V2.rst#111%C2%A0%C2%A0%C2%A0media-types)

### Other headers

Other headers will be used in HTTP requests for specifying the siteaccess to interact with, and of course [authentication credentials](REST_API_Authentication).

Responses returned by the API will also use custom headers to indicate information about the executed operation.

 

#### In this topic:

-   [Accessing the REST API](#RESTAPIGuide-AccessingtheRESTAPI)
-   [Basics](#RESTAPIGuide-Basics)
    -   [Resources](#RESTAPIGuide-Resources)
    -   [HTTP verbs](#RESTAPIGuide-HTTPverbs)
    -   [Media type headers](#RESTAPIGuide-Mediatypeheaders)
    -   [Other headers](#RESTAPIGuide-Otherheaders)

#### Related topics:

-   [REST API reference](REST_API_reference)
-   [Getting started with the REST API](Getting_started_with_the_REST_API)


