<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [API](API_31429524.html)
4.  [REST API Guide](REST-API-Guide_31430286.html)

</div>
**Developer : General REST usage**

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
As explained in the [introduction](REST-API-Guide_31430286.html), the
REST API is based on a very limited list of general principles:

-   each resource (uri) interacts with a part of the system (Content,
    URL aliases, User Groups, etc.),
-   for each resource, one or more verbs are available, each having a
    different effect (delete a Content item, get a URL Alias, list user
    groups, etc.),
-   media-type request headers indicate what type of data (Content /
    ContentInfo), and data format (JSON or XML), are expected as a
    response, and what can be requested.

**Anatomy of a REST call**

**What we can learn from a GET request**

This verb is used to query the API for information. It is one of the two
operations web browsers implement, and the one most commonly used.

**Request**

The only requirement for this verb is usually the resource URI, and the
accept header. On top of that, cache request headers can be added, like
`If-None-Match`, but those aren’t fully implemented yet in eZ Publish
5.0.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Load ContentInfo request**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
GET /content/objects/23 HTTP/1.1
Accept: application/vnd.ez.api.ContentInfo+xml
```

</div>
</div>
**Response headers**

The API will reply with:

-   an **HTTP response code**,
-   a few **headers**,
-   the XML representation of the ContentInfo for content with ID 23 in
    XML format, as specified in the Accept header.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Load ContentInfo response**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
HTTP/1.1 200 OK
Accept-Patch: application/vnd.ez.api.ContentUpdate+xml;charset=utf8
Content-Type: application/vnd.ez.api.ContentInfo+xml
Content-Length: xxx
```

</div>
</div>
The length of our content, provided by the Content-Length header,
isn’t *that* useful.

**HTTP Code**

The API responded here with a standard 200 OK HTTP response code, which
is the expected response code for a “normal” GET request. Some GET
requests, like [getting a Content item’s current
version](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rest/REST-API-V2.rst#13241%C2%A0%C2%A0%C2%A0get-current-version),
may reply with a 301 Moved permanently, or 307 Temporary redirect code.

Errors will be indicated with HTTP error codes, like 404 for Not Found,
or 500 for Internal server error. The [REST
specifications](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rest/REST-API-V2.rst)
provide the list of every HTTP response code you can expect from
implemented resources.

**Content-Type header**

As long as a response contains an actual HTTP body, the Content-Type
header will be used to specify which Content-Type is contained in the
response. In that case, a ContentInfo
(`Content-Type: application/vnd.ez.api.ContentInfo`) in XML
(`Content-Type: application/vnd.ez.api.ContentInfo+xml`)

**Accept-Patch header**

This is a very interesting one.

It tells us we can modify the received content by patching
(`Accept-Patch: application/vnd.ez.api.ContentUpdate+xml;charset=utf8`)
it with a
[ContentUpdateStruct](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/API/Repository/Values/Content/ContentUpdateStruct.php)
(`Accept-Patch: application/vnd.ez.api.ContentUpdate+xml;charset=utf8`) in
XML
(`Accept-Patch: application/vnd.ez.api.ContentUpdate+xml;charset=utf8`)
format. Of course, JSON would also work, with the proper format.

This last part means that if we send a PATCH /content/objects/23 request
with a
[ContentUpdateStruct](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/API/Repository/Values/Content/ContentUpdateStruct.php) XML
payload, we will update this Content. 

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
REST will use the `Accept-Patch` header to indicate how to **modify**
the returned **data**.

</div>
</div>
**Other headers: Location**

Depending on the resource, request & response headers will vary. For
instance, [creating
content](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rest/REST-API-V2.rst#13231%C2%A0%C2%A0%C2%A0creating-content),
or [getting a Content item’s current
version](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rest/REST-API-V2.rst#13241%C2%A0%C2%A0%C2%A0get-current-version) will
both send a `Location` header to provide you with the requested
resource’s ID.

Those particular headers generally match a specific list of HTTP
response codes. Location is sent by `201 Created`,
`301 Moved permanently,` `307 Temporary redirect responses`. This list
isn’t finished, but you can expect those HTTP responses to provide you
with a Location header.

**Other headers: Destination**

This request header is the request counterpart of the Location response
header. It is used in a COPY / MOVE operation, like [copying a Content
item](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rest/REST-API-V2.rst#13236%C2%A0%C2%A0%C2%A0copy-content),
on a resource to indicate where the resource should be moved to, using
the ID of the destination.

**Response body**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl hide-border-bottom"
style="border-bottom-width: 1px;">
**Load ContentInfo response body**  Expand source

</div>
<div class="codeContent panelContent pdl hide-toolbar">
``` {.sourceCode .brush:}
<?xml version="1.0" encoding="UTF-8"?>
<Content href="/content/objects/23" id="23"
  media-type="application/vnd.ez.api.Content+xml" remoteId="qwert123">
  <ContentType href="/content/types/10" media-type="application/vnd.ez.api.ContentType+xml" />
  <Name>This is a title</Name>
  <Versions href="/content/objects/23/versions" media-type="application/vnd.ez.api.VersionList+xml" />
  <CurrentVersion href="/content/objects/23/currentversion"
    media-type="application/vnd.ez.api.Version+xml"/>
  <Section href="/content/sections/4" media-type="application/vnd.ez.api.Section+xml" />
  <MainLocation href="/content/locations/1/4/65" media-type="application/vnd.ez.api.Location+xml" />
  <Locations href="/content/objects/23/locations" media-type="application/vnd.ez.api.LocationList+xml" />
  <Owner href="/user/users/14" media-type="application/vnd.ez.api.User+xml" />
  <lastModificationDate>2012-02-12T12:30:00</lastModificationDate>
  <publishedDate>2012-02-12T15:30:00</publishedDate>
  <mainLanguageCode>eng-US</mainLanguageCode>
  <alwaysAvailable>true</alwaysAvailable>
</Content>
```

</div>
</div>
The XML body is a serialized version of a
[ContentInfo](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/API/Repository/Values/Content/ContentInfo.php)
struct. Most REST API calls will actually involve exchanging XML / JSON
representations of the public API. This consistency, which we took very
seriously, was a hard requirement for us, as it makes documentation much
better by requiring *less* of it.

As explained above, the API has told us that we could modify content
object 23 by sending a `vendor/application/vnd.ez.ContentUpdate+xml`.
This media type again matches a Value in the API,
[ContentUpdateStruct](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/API/Repository/Values/Content/ContentUpdateStruct.php).

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
The REST API data structs mostly match a PHP Public API value object

</div>
</div>
**Value objects representation**

Value objects like
[ContentInfo](https://github.com/ezsystems/ezp-next/blob/master/eZ/Publish/API/Repository/Values/Content/ContentInfo.php) basically
feature two types of fields: basic, local fields (modified, name…) and
foreign field(s) references (sectionId, mainLocationId).

Local fields will be represented in XML / JSON with a primitive type
(integer, string), while foreign key references will be represented as a
link to another resource. This resource will be identified with its URI
(`/content/objects/23/locations`), and the media-type that should be
requested when calling that resource
(`media-type="application/vnd.ez.api.LocationList+xml"`). Depending on
how much data you need, you may choose to crawl those relations, or to
ignore them.

<div
class="confluence-information-macro confluence-information-macro-information">
XSD files

<div class="confluence-information-macro-body">
For each XML structure known to the REST API, you can find XSD files in
the XSD folder of the specifications. Those will allow you to validate
your XML, and learn about every option those XML structures feature.

<https://github.com/ezsystems/ezpublish-kernel/tree/master/doc/specifications/rest/xsd> 

</div>
</div>
**Request parameters**

So far, we have seen that responses will depend on:

-   The URI,
-   Request headers, like the Accept one

URI parameters are of course also used. They usually serve as filters /
options for the requested resource. For instance, they can be used to
customize a list’s offset/limit, to filter a list, specify which fields
you want from a content… For almost all resources, those parameters must
be provided as GET ones. This request would return the 5 first relations
for Version 2 of Content 59:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**GET request with limit parameter**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
GET /content/objects/59/versions/2/relations&limit=5 HTTP/1.1
Accept: application/vnd.ez.api.RelationList+xml
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
Working with value objects IDs

<div class="confluence-information-macro-body">
Resources that accept a reference to another resource expect this
reference to be given as a REST ID, not a Public API ID. As such, the
URI to request users that are assigned the role with ID 1 would be
`GET /api/ezp/v2/user/users?roleId=/api/ezp/v2/user/roles/1`.

</div>
</div>
**Custom HTTP verbs**

In addition to the usual GET, POST, PUT and DELETE HTTP verbs, the API
supports a few custom ones: COPY, MOVE
(<http://tools.ietf.org/html/rfc2518>), PATCH
(<http://tools.ietf.org/html/rfc5789>) and PUBLISH. While it should
generally not be a problem, some HTTP servers may fail to recognize
those. If you face this situation, you can customize a standard verb
(POST, PUT) with the `X-HTTP-Method-Override` header.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**PATCH HTTP request**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
POST /content/objects/59 HTTP/1.1
X-HTTP-Method-Override: PATCH
```

</div>
</div>
Both methods are always mentioned, when applicable, in the
specifications.

**Specifying a siteaccess**

One of the principles of REST is that the same resource (Content,
Location, ContentType, etc.) should be unique. The purpose is mostly to
make it simple to cache your REST API using a reverse proxy like
Varnish. If the same resource is available at multiple locations, cache
purging becomes much more complex.

Due to this, we decided not to enable siteaccess matching with REST. In
order to specify a siteaccess when talking to the REST API, a custom
header, `X-Siteaccess`, needs to be provided. If it isn’t, the default
one will be used:

<div>
 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**X-Siteaccess header example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
GET / HTTP/1.1
Host: api.example.com
Accept: application/vnd.ez.api.Root+json
X-Siteaccess: ezdemo_site_admin
```

</div>
</div>
 

</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375987836">
-   [Anatomy of a REST call](#GeneralRESTusage-AnatomyofaRESTcall)
    -   [What we can learn from a GET
        request](#GeneralRESTusage-WhatwecanlearnfromaGETrequest)
-   [Request parameters](#GeneralRESTusage-Requestparameters)
-   [Custom HTTP verbs](#GeneralRESTusage-CustomHTTPverbs)
-   [Specifying a siteaccess](#GeneralRESTusage-Specifyingasiteaccess)

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

