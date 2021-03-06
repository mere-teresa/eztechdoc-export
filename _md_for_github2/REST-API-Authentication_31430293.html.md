1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[API](API_31429524.html)</span>
4.  <span>[REST API Guide](REST-API-Guide_31430286.html)</span>

<span id="title-text"> Developer : REST API Authentication </span>
==================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Apr 22, 2016

The REST API supports two authentication methods: session, and basic. 

-   **Session-based authentication** is meant to be used for AJAX operations. It will let you re-use the visitor's session to execute operations with their permissions.
-   **Basic authentication** is often used when writing cross-server procedures, when one remote application executes operations on one/several eZ Platform instances (remote publishing, maintenance, etc).

Session-based is the default authentication method, as this is needed for UI.

Session based authentication
----------------------------

This authentication method requires a Session cookie to be sent with each request.

If this authentication method is used with a web browser, this session cookie is automatically available as soon as your visitor logs in. Add it as a cookie to your REST requests, and the user will be authenticated.

### Logging in

It is also possible to create a session for the visitor if they aren't logged in yet. This is done by sending a <span style="color: rgb(0,0,255);">**`POST`**</span> request to <span style="color: rgb(255,102,0);">`/user/sessions`</span>. Logging out is done using a **<span style="color: rgb(0,0,255);">`DELETE`</span>** request on the same resource.

More information

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
<a href="https://github.com/ezsystems/ezp-next/blob/master/doc/specifications/rest/REST-API-V2.rst#123%C2%A0%C2%A0%C2%A0session-based-authentication" class="external-link">Session-based authentication chapter of the REST specifications</a>

HTTP Basic authentication
-------------------------

To enable HTTP Basic authentication, you need to edit app`/config/security.yml`, and add/uncomment the following block. Note that this is enabled by default.

**ezplatform.yml**

``` brush:
        ezpublish_rest:
            pattern: ^/api/ezp/v2
            stateless: true
            ezpublish_http_basic:
                realm: eZ Publish REST API
```

Basic authentication requires the username and password to be sent *(username:password)*, based 64 encoded, with each request, as explained in <a href="http://tools.ietf.org/html/rfc2617" class="external-link">RFC 2617</a>.

Most HTTP client libraries as well as REST libraries do support this method one way or another.

**Raw HTTP request with basic authentication**

``` brush:
GET / HTTP/1.1
Host: api.example.com
Accept: application/vnd.ez.api.Root+json
Authorization: Basic QWxhZGRpbjpvcGVuIHNlc2FtZQ==
```

#### In this topic:

-   [Session based authentication](#RESTAPIAuthentication-Sessionbasedauthentication)
    -   [Logging in](#RESTAPIAuthentication-Loggingin)
-   [HTTP Basic authentication](#RESTAPIAuthentication-HTTPBasicauthentication)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


