<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Under the Hood: How eZ Platform Works](31429659.html)
5.  [Content Model: Content is King!](31429709.html)
6.  [Content items, Content Types and Fields](31430275.html)
7.  [Field Types reference](Field-Types-reference_31430495.html)

</div>
**Developer : Media Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Jan 04, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This Field Type represents and handles media (audio/video) binary file.

<div class="table-wrap">
<table style="width:71%;">
<colgroup>
<col width="19%" />
<col width="25%" />
<col width="26%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Internal name</th>
<th align="left">Expected input</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>Media</code></td>
<td align="left"><code>ezmedia</code></td>
<td align="left"><code>mixed</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type represents and handles a media (audio/video) binary file.

It is capable of handling following types of files:

-   Apple QuickTime
-   Adobe Flash
-   Microsoft Windows Media
-   Real Media
-   Silverlight
-   HTML5 Video
-   HTML5 Audio

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="52%" />
<col width="22%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Type</th>
<th align="left">Description</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>string</code></td>
<td align="left">Path to the media file.</td>
<td align="left"><code>/Users/jane/butterflies.mp4</code></td>
</tr>
<tr class="even">
<td align="left"><code>eZ\Publish\Core\FieldType\Media\Value</code></td>
<td align="left">Media FieldType Value Object with path to the media file as the value of <code>id</code> property.</td>
<td align="left">See <code>Value</code> object section below.</td>
</tr>
</tbody>
</table>

</div>
**Value object**

**Properties**

**`eZ\Publish\Core\FieldType\Media\Value`** offers the following properties.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Note that both **`Media`** and **`BinaryFile`** Value and Type inherit from the **`BinaryBase`** abstract Field Type and share common properties.

</div>
</div>
<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Property</th>
<th align="left">Type</th>
<th align="left">Description</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>id</code></td>
<td align="left">string</td>
<td align="left">Media file identifier. This ID depends on the IO
Handler &lt;https://d
oc.ez.no/display/D
EVELOPER/Clusterin
g#Clustering-Binar
yfilesclustering&gt; __ that is being used. With the native, default handlers (FileSystem and Legacy), the ID is the file path, relative to the binary file storage root dir (<code>var/&lt;vardir&gt;/st orage/original</code> by default).</td>
<td align="left">application/63cd47 2dd7819da7b75e8e2f ee507c68.mp4</td>
</tr>
<tr class="even">
<td align="left"><code>fileName</code></td>
<td align="left">string</td>
<td align="left">The human-readable file name, as exposed to the outside. Used when sending the file for download in order to name the file.</td>
<td align="left">butterflies.mp4</td>
</tr>
<tr class="odd">
<td align="left"><code>fileSize</code></td>
<td align="left">int</td>
<td align="left">File size, in bytes.</td>
<td align="left">1077923</td>
</tr>
<tr class="even">
<td align="left"><code>mimeType</code></td>
<td align="left">string</td>
<td align="left">The file's mime type.</td>
<td align="left">video/mp4</td>
</tr>
<tr class="odd">
<td align="left"><code>uri</code></td>
<td align="left">string</td>
<td align="left"><p>The binary file's HTTP uri. If the URI doesn't include a host or protocol, it applies to the request domain.</p>
<p><strong><strong>The URI is not publicly readable, and must NOT be used to link to the file for download.</strong></strong> Use  `ez_render_field ` to generate a valid link to the download controller.</p></td>
<td align="left">/var/ezdemo_site/ storage/original/a pplication/63cd472 dd7819da7b75e8e2fe e507c68.mp4</td>
</tr>
<tr class="even">
<td align="left"><code>hasController</code></td>
<td align="left">boolean</td>
<td align="left">Whether the media has a controller when being displayed.</td>
<td align="left">true</td>
</tr>
<tr class="odd">
<td align="left"><code>autoplay</code></td>
<td align="left">boolean</td>
<td align="left">Whether the media should be automatically played.</td>
<td align="left">true</td>
</tr>
<tr class="even">
<td align="left"><code>loop</code></td>
<td align="left">boolean</td>
<td align="left">Whether the media should be played in a loop.</td>
<td align="left">false</td>
</tr>
<tr class="odd">
<td align="left"><code>height</code></td>
<td align="left">int</td>
<td align="left">Height of the media.</td>
<td align="left">300</td>
</tr>
<tr class="even">
<td align="left"><code>width</code></td>
<td align="left">int</td>
<td align="left">Width of the media.</td>
<td align="left">400</td>
</tr>
<tr class="odd">
<td align="left"><code>path</code></td>
<td align="left">string</td>
<td align="left"><strong>deprecated</strong>Renamed to <code>id</code> starting from eZ Publish 5.2. Can still be used, but it is recommended not to use it anymore as it will be removed.</td>
<td align="left"> </td>
</tr>
</tbody>
</table>

</div>
**Hash format**

The hash format mostly matches the value object. It has the following keys:

-   `id`
-   `path` (for backwards compatibility)
-   `fileName`
-   `fileSize`
-   `mimeType`
-   `uri`
-   `hasController`
-   `autoplay`
-   `loop`
-   `height`
-   `width`

**Validation**

The Field Type supports `FileSizeValidator`, defining maximum size of media file in bytes:

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Name .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Type .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Default value .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Description .. raw:: html &lt;/div&gt;</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>maxFileSize</code></td>
<td align="left"><code>int</code></td>
<td align="left">false</td>
<td align="left">Maximum size of the file in bytes.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using Media Field Type validator in PHP**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Media\Type;

$contentTypeService = $repository->getContentTypeService();
$mediaFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( "media", "ezmedia" );

// Setting maximum file size to 5 megabytes
$mediaFieldCreateStruct->validatorConfiguration = array(
    "FileSizeValidator" => array(
        "maxFileSize" => 5 * 1024 * 1024
    )
);
```

</div>
</div>
**Settings**

The Field Type supports `mediaType` setting, defining how the media file should be handled in output.

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Name .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Type .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Default value .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Description .. raw:: html &lt;/div&gt;</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>mediaType</code></td>
<td align="left"><code>mixed</code></td>
<td align="left"><pre><code>Type::TYPE_HTM</code></pre>
L5_VIDEO</td>
<td align="left">Type of the media, accepts one of the predefined constants.</td>
</tr>
</tbody>
</table>

</div>
List of all available `mediaType` constants defined in **`eZ\Publish\Core\FieldType\Media\Type`** class:

<div class="table-wrap">
<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-header-inner&quot;&gt; Name .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-header-inner&quot;&gt; Description .. raw:: html &lt;/div&gt;</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><pre><code>TYPE_FLASH</code></pre></td>
<td align="left">Adobe Flash</td>
</tr>
<tr class="even">
<td align="left"><pre><code>TYPE_QUICKTIME</code></pre></td>
<td align="left">Apple QuickTime</td>
</tr>
<tr class="odd">
<td align="left"><pre><code>TYPE_REALPLAYER</code></pre></td>
<td align="left">Real Media</td>
</tr>
<tr class="even">
<td align="left"><pre><code>TYPE_SILVERLIGHT</code></pre></td>
<td align="left">Silverlight</td>
</tr>
<tr class="odd">
<td align="left"><pre><code>TYPE_WINDOWSMEDIA</code></pre></td>
<td align="left">Microsoft Windows Media</td>
</tr>
<tr class="even">
<td align="left"><pre><code>TYPE_HTML5_VIDEO</code></pre></td>
<td align="left">HTML5 Video</td>
</tr>
<tr class="odd">
<td align="left"><pre><code>TYPE_HTML5_AUDIO</code></pre></td>
<td align="left">HTML5 Audio</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using Media Field Type settings in PHP**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Media\Type;
 
$contentTypeService = $repository->getContentTypeService();
$mediaFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( "media", "ezmedia" );

// Setting Adobe Flash as the media type
$mediaFieldCreateStruct->fieldSettings = array(
    "mediaType" => Type::TYPE_FLASH,
);
```

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
 

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

