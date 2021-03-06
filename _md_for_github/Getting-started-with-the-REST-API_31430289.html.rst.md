<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [API](API_31429524.html)
4.  [REST API Guide](REST-API-Guide_31430286.html)

</div>
**Developer : Getting started with the REST API**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Apr 22, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Installation**

No special preparations are necessary to use the REST API. As long as your eZ Platform is correctly configured, the REST API is available on your site using the URI `/api/ezp/v2/`. If you have installed eZ Platform in a subfolder, prepend the path with this subfolder: http://example.com/**sub/folder/ezpublish**/api/ezp/v2/.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Please note that the `/api/ezp/v2` prefix will be used in all REST hrefs, but not in URIs.

</div>
</div>
**Configuration**

**Authentication**

As explained in more detail in the [authentication page](REST-API-Authentication_31430293.html), two authentication methods are currently supported: session and basic. By default, session authentication is the active mode, it uses a session cookie. The alternative, basic auth authentication requires a login / password to be sent using basic HTTP authentication.

To enable basic auth based authentication, you need to edit `app/config/security.yml` and uncomment the configuration block about REST

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**security.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
security:
    # ...
    firewalls:
        # ...
        ezpublish_rest:
            pattern: ^/api/ezp/v2
            ezpublish_http_basic:
                realm: eZ Platform REST API
```

</div>
</div>
**Testing the API**

A standard web browser is not sufficient to fully test the API. You can, however, try opening the root resource with it, using the session authentication: http://example.com/api/ezp/v2/. Depending on how your browser understands XML, it will either download the XML file, or open it in the browser.

To test further, you can use browser extensions, like [Advanced REST client for Chrome](https://chrome.google.com/webstore/detail/advanced-rest-client/hgmloofddffdnphfgcellkdfbfbjeloo) or [RESTClient for Firefox](https://addons.mozilla.org/firefox/addon/restclient/), or dedicated tools. For command line users, [HTTPie](https://github.com/jkbr/httpie) is a good tool.

**JavaScript example**

One of the main reasons for this API is to help implement JavaScript / AJAX interaction. You can see here an example of an AJAX call that retrieves ContentInfo (e.g. metadata) for a Content item:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**REST API with JavaScript**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<pre id="rest-output"></pre>
<script>
var resource = '/api/ezp/v2/content/objects/59',
    log = document.getElementById('rest-output'),
    request = new XMLHttpRequest();

log.innerHTML = "Loading the content info from " + resource + "...";

request.open('GET', resource, true);
request.onreadystatechange = function () {
    if ( request.readyState === 4 ) {
        log.innerHTML = "HTTP response from " + resource + "\n\n" + request.getAllResponseHeaders() + "\n" + request.responseText;
    }
};
request.setRequestHeader('Accept', 'application/vnd.ez.api.ContentInfo+json');
request.send();
</script>
```

</div>
</div>
In order to test it, just save this code to some test.html file in the web folder of your eZ Platform installation. If you use the rewrite rules, don't forget to allow this file to be served directly.

If necessary, substitute`59` with the Content item ID of an item from your database. You will get the ContentInfo for item 59 in JSON encoding.

Note that by default, session authentication is used. This means that the session cookie will be transparently sent together with the request, and every AJAX call will have the same permissions as the currently logged in user.

<div
class="confluence-information-macro confluence-information-macro-information">
JavaScript REST Client

<div class="confluence-information-macro-body">
To ease the use of the eZ Platform REST API, we provide a JavaScript REST Client. Its basic usage is explained in [Using the JavaScript REST API Client](Using-the-JavaScript-REST-API-Client_31430299.html).

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375987682">
-   [Installation](#GettingstartedwiththeRESTAPI-Installation)
-   [Configuration](#GettingstartedwiththeRESTAPI-Configuration)
    -   [Authentication](#GettingstartedwiththeRESTAPI-Authentication)
-   [Testing the API](#GettingstartedwiththeRESTAPI-TestingtheAPI)
    -   [JavaScript example](#GettingstartedwiththeRESTAPI-JavaScriptexample)

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:19

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

