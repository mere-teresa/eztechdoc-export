1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[API](API_31429524.html)</span>
4.  <span>[REST API Guide](REST-API-Guide_31430286.html)</span>

<span id="title-text"> Developer : Using the JavaScript REST API Client </span>
===============================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Oct 03, 2016

The JavaScript REST API Client is a JavaScript library meant to ease the use of the eZ Platform REST API. For now, it can only be used in a web browser.

Installation
------------

### In the PlatformUIAssetsBundle

Since the JavaScript REST Client is one of the foundations of [the Platform Backend Interface](Extending-eZ-Platform_31429689.html), the client is provided by the <a href="https://github.com/ezsystems/PlatformUIAssetsBundle" class="external-link">PlatformUIAssetsBundle</a> which is installed by default. As a result, the client is directly available and can be embedded in any Platform-generated page with the following Twig code:

**Embedding the JavaScript REST Client**

``` brush:
<script src="{{ asset('bundles/ezplatformuiassets/vendors/ez-js-rest-client/dist/CAPI.js') }}"></script>
<!-- or the minified version -->
<!-- <script src="{{ asset('bundles/ezplatformuiassets/vendors/ez-js-rest-client/dist/CAPI-min.js') }}"></script> -->
```

### With Bower

Alternatively, the JavaScript REST Client can be installed directly in any project with <a href="http://bower.io/" class="external-link">Bower</a>:

**Installing with bower**

``` brush:
$ bower install --save ezsystems/ez-js-rest-client
```

After using this command, `dist/CAPI.js` or `dist/CAPI-min.js` are available in `bower\_components/ez-js-rest-client/`.

### Manual install

It is also possible to directly retrieve either `dist/CAPI.js` or `dist/CAPI-min.js` in <a href="https://github.com/ezsystems/ez-js-rest-client/" class="external-link">the Github repository of the project</a>.

Usage examples
--------------

Once included, `CAPI.js` exports the `eZ` namespace which contains `eZ.CAPI`, the constructor function of the client. This constructor must receive the API end point and an authentication agent responsible for handling the authentication (session or basic auth). This is detailed in the <a href="http://doc.ez.no#UsingtheJavaScriptRESTAPIClient-Instantiationandauthentication" class="external-link">Instantiation and authentication</a> section below.

<a href="http://ezsystems.github.io/javascript-rest-client" class="external-link">The auto-generated API documentation of the JavaScript REST API client is available online.</a> Like in the Public API, the code is organized around 3 main services:

-   <a href="http://ezsystems.github.io/javascript-rest-client/classes/ContentService.html" class="external-link">the Content Service</a>
-   <a href="http://ezsystems.github.io/javascript-rest-client/classes/ContentTypeService.html" class="external-link">the Content Type Service</a>
-   <a href="http://ezsystems.github.io/javascript-rest-client/classes/UserService.html" class="external-link">the User Service</a>

In essence, the operations available through those services are asynchronous, so all the corresponding methods accept a callback function as its last argument. This callback function will be called when the operation has been done and it will receive two arguments:

1.  `error`: depending on the success of the operation, this parameter is either `false` or a <a href="http://ezsystems.github.io/javascript-rest-client/classes/CAPIError.html" class="external-link"><code>CAPIError</code></a> instance representing the error
2.  `response`: it's always of a <a href="http://ezsystems.github.io/javascript-rest-client/classes/Response.html" class="external-link"><code>Response</code></a> instance allowing you to retrieve any information from the REST API response

### Instantiation and authentication

<a href="http://ezsystems.github.io/javascript-rest-client/classes/CAPI.html" class="external-link">The <code>eZ.CAPI</code> constructor function</a> expects two parameters:

1.  the API end point URI
2.  an authentication agent instance to configure the client for [the authentication mechanism configuration in eZ Platform](REST-API-Authentication_31430293.html).

The JavaScript REST Client comes with two authentication agents for the Session and Basic Auth authentication mechanism.

#### Session auth

The Session Auth Agent expects an object describing the existing Session or containing the credentials for the user to create the corresponding session. So if the user is not yet authenticated, the client can be instantiated with:

**Session Authentication (new session)**

``` brush:
var capi,
    credentials = {
        login: 'admin',
        password: 'publish',
    };

capi = new eZ.CAPI(
    'http://example.com',
    new eZ.SessionAuthAgent(credentials)
);
capi.logIn(function (error, response) {
    if ( error ) {
        console.log('Error!');
        return;
    }
    console.log("I'm logged in");
});
```

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Instead of passing the `credentials` to the `eZ.SessionAuthAgent` constructor, it is also possible to pass this object as <a href="http://ezsystems.github.io/javascript-rest-client/classes/CAPI.html#method_logIn" class="external-link">the first parameter of the <code>logIn</code> method</a>.

If the user already has a session, the agent expects an object describing the session, something like:

**Session Authentication (existing session)**

``` brush:
var capi,
    sessionInfo = {
        name: 'eZSESSID', // name of the session, might also be something like eZSESSID98defd6ee70dfb1dea416cecdf391f58
        identifier: '6pp87ah63m44jdf53b35qlt2i7', // session id
        href: '/api/ezp/v2/user/sessions/6pp87ah63m44jdf53b35qlt2i7',
        csrfToken: 'memEneT7WvX9WmSlG2wDqUj0eeLRC7hXG--pLUx4dFE', // can be retrieved with @security.csrf.token_manager Symfony service
    };

capi = new eZ.CAPI(
    'http://example.com',
    new eZ.SessionAuthAgent(sessionInfo)
);
capi.isLoggedIn(function (error, response) {
    if ( error ) {
        console.log('Error!');
        return;
    }
    console.log("I'm logged in");
});
```

#### Basic auth

When configured in the Basic Authentication, the basic auth agent just expects the user's credentials:

**Basic Authentication**

``` brush:
var capi,
    credentials = {
        login: 'admin',
        password: 'publish',
    };

capi = new eZ.CAPI(
    'http://example.com',
    new eZ.HttpBasicAuthAgent(credentials)
);
capi.logIn(function (error, response) {
    if ( error ) {
        console.log('Error!');
        return;
    }
    console.log("The credentials are valid");
});
```

### Loading a ContentInfo or a Content

To load a ContentInfo, you need <a href="http://ezsystems.github.io/javascript-rest-client/classes/ContentService.html" class="external-link">the Content Service</a>, it is returned by the `getContentService` method on the client instance:

**Loading a ContentInfo**

``` brush:
var capi, contentService,
    contentRestId = '/api/ezp/v2/content/objects/1',
    credentials = {
        login: 'admin',
        password: 'publish',
    };

capi = new eZ.CAPI(
    'http://example.com',
    new eZ.SessionAuthAgent(credentials)
);
contentService = capi.getContentService();
contentService.loadContentInfo(contentRestId, function (error, response) {
    if ( error ) {
        console.log('Error!');
        return;
    }
    // response.document contains the parsed JSON structure
    console.log('Content name: ' + response.document.Content.Name);
})
```

If you run this example, you should see in the browser network panel a GET HTTP request to <a href="http://example.com/api/ezp/v2/content/objects/1" class="uri" class="external-link">http://example.com/api/ezp/v2/content/objects/1</a> with the necessary headers to get a JSON representation of the ContentInfo. If you want to load the Content instead, you can use <a href="http://ezsystems.github.io/javascript-rest-client/classes/ContentService.html#method_loadContent" class="external-link">the <code>loadContent</code> method</a>.

### Moving a Location

To move a Location, <a href="http://ezsystems.github.io/javascript-rest-client/classes/ContentService.html" class="external-link">the Content Service</a> is also needed, this operation will generate a MOVE HTTP request. If configured for the session authentication mechanism, the client will automatically add the CSRF Token.

**Moving a Location**

``` brush:
var capi, contentService,
    locationRestId = '/api/ezp/v2/content/locations/1/43/53', // Media/Multimedia in a default install
    newParentLocationRestId = '/api/ezp/v2/content/locations/1/43/52', // Media/Files in a default install
    credentials = {
        login: 'admin',
        password: 'publish',
    };

capi = new eZ.CAPI(
    'http://example.com',
    new eZ.SessionAuthAgent(credentials)
);
contentService = capi.getContentService();
contentService.moveSubtree(locationRestId, newParentLocationRestId, function (error, response) {
    if ( error ) {
        console.log('Error!');
        return;
    }
    console.log('Media/Multimedia is now Media/Files/Multimedia');
})
```

### Searching for Content or Location

Searching for Content or Location can be done with <a href="https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rest/REST-API-V2.rst#views" class="external-link">REST views</a>. REST views can be configured with <span class="confluence-link">the [search engine criteria](Search_31429673.html#Search-SearchCriteriaReference)</span> to match some Content items or Locations:

**REST views**

``` brush:
var capi, contentService, query,
    credentials = {
        login: 'admin',
        password: 'publish',
    };

capi = new eZ.CAPI(
    'http://example.com',
    new eZ.SessionAuthAgent(credentials)
);
contentService = capi.getContentService();
query = contentService.newViewCreateStruct('test-rest-view', 'LocationQuery'); // use 'ContentQuery' to retrieve a list of Content items
query.body.ViewInput.LocationQuery.Criteria = { // use 'ContentQuery' here as well
    FullTextCriterion: "ez",
};
query.body.ViewInput.LocationQuery.limit = 10;
// query.body.ViewInput.LocationQuery.offset = 0;
contentService.createView(query, function (error, response) {
    if ( error ) {
        console.log('Error!');
        return;
    }
    console.log("Search results", response.document.View.Result.searchHits.searchHit);
})
```

REST views

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
REST views are designed to be persisted but this feature is not yet implemented. As a result, when calling `createView`, the POST request does not create the view but directly returns the results.

#### In this topic:

-   [Installation](#UsingtheJavaScriptRESTAPIClient-Installation)
    -   [In the PlatformUIAssetsBundle](#UsingtheJavaScriptRESTAPIClient-InthePlatformUIAssetsBundle)
    -   [With Bower](#UsingtheJavaScriptRESTAPIClient-WithBower)
    -   [Manual install](#UsingtheJavaScriptRESTAPIClient-Manualinstall)
-   [Usage examples](#UsingtheJavaScriptRESTAPIClient-Usageexamples)
    -   [Instantiation and authentication](#UsingtheJavaScriptRESTAPIClient-Instantiationandauthentication)
    -   [Loading a ContentInfo or a Content](#UsingtheJavaScriptRESTAPIClient-LoadingaContentInfooraContent)
    -   [Moving a Location](#UsingtheJavaScriptRESTAPIClient-MovingaLocation)
    -   [Searching for Content or Location](#UsingtheJavaScriptRESTAPIClient-SearchingforContentorLocation)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


