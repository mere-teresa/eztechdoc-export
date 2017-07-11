1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and
    Fields](31430275.html)</span>
7.  <span>[Field Types
    reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : Media Field Type </span> {#title-heading .pagetitle}
===========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> André Rømcke</span> on Jan 04, 2017

This Field Type represents and handles media (audio/video) binary file.

| Name    | Internal name | Expected input |
|---------|---------------|----------------|
| `Media` | `ezmedia`     | `mixed`        |

Description {#MediaFieldType-Description}
-----------

This Field Type represents and handles a media (audio/video) binary
file.

It is capable of handling following types of files:

-   Apple QuickTime
-   Adobe Flash
-   Microsoft Windows Media
-   Real Media
-   Silverlight
-   HTML5 Video
-   HTML5 Audio

PHP API Field Type  {#MediaFieldType-PHPAPIFieldType}
-------------------

### Input expectations {#MediaFieldType-Inputexpectations}

| Type                                    | Description                                                                                          | Example                           |
|-----------------------------------------|------------------------------------------------------------------------------------------------------|-----------------------------------|
| `string`                                | Path to the media file.                                                                              | `/Users/jane/butterflies.mp4`     |
| `eZ\Publish\Core\FieldType\Media\Value` | <span>Media FieldType Value Object with path to the media file as the value of `id` property.</span> | See `Value` object section below. |

### Value object {#MediaFieldType-Valueobject}

##### Properties {#MediaFieldType-Properties}

**`eZ\Publish\Core\FieldType\Media\Value`** offers the following
properties.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Note that both **`Media`** and **`BinaryFile`** Value and Type inherit
from the **`BinaryBase`** abstract Field Type and share common
properties.

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
<td align="left"><p>Media file identifier. This ID depends on the <a href="https://doc.ez.no/display/DEVELOPER/Clustering#Clustering-Binaryfilesclustering">IO Handler</a> that is being used. With the native, default handlers (FileSystem and Legacy), the ID is the file path, relative to the binary file storage root dir (<code>var/&lt;vardir&gt;/storage/original</code> by default).</p></td>
<td align="left">application/63cd472dd7819da7b75e8e2fee507c68.<span>mp4</span></td>
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
<td align="left">The file’s mime type.</td>
<td align="left"><p>video/mp4</p></td>
</tr>
<tr class="odd">
<td align="left"><code>uri</code></td>
<td align="left">string</td>
<td align="left"><p>The binary file’s HTTP uri. If the URI doesn’t include a host or protocol, it applies to the request domain.</p>
<p><strong><strong>The URI is not publicly readable, and must NOT be used to link to the file for download.</strong></strong> Use <code>ez_render_field</code> to generate a valid link to the download controller.</p></td>
<td align="left">/var/ezdemo_site/storage/original/application/63cd472dd7819da7b75e8e2fee507c68.<span>mp4</span></td>
</tr>
<tr class="even">
<td align="left"><code>hasController</code></td>
<td align="left">boolean</td>
<td align="left"><p><span>Whether the media has a controller when being displayed.</span></p></td>
<td align="left">true</td>
</tr>
<tr class="odd">
<td align="left"><code>autoplay</code></td>
<td align="left">boolean</td>
<td align="left"><p><span>Whether the media should be automatically played.</span></p></td>
<td align="left">true</td>
</tr>
<tr class="even">
<td align="left"><code>loop</code></td>
<td align="left">boolean</td>
<td align="left"><p><span>Whether the media should be played in a loop.</span></p></td>
<td align="left">false</td>
</tr>
<tr class="odd">
<td align="left"><code>height</code></td>
<td align="left">int</td>
<td align="left"><p><span>Height of the media.</span></p></td>
<td align="left">300</td>
</tr>
<tr class="even">
<td align="left"><code>width</code></td>
<td align="left">int</td>
<td align="left"><p><span>Width of the media.</span></p></td>
<td align="left">400</td>
</tr>
<tr class="odd">
<td align="left"><code>path</code></td>
<td align="left">string</td>
<td align="left"><p><strong><span style="color: rgb(255,0,0);">deprecated</span><br />
</strong>Renamed to <code>id</code> starting from eZ Publish 5.2. Can still be used, but it is recommended not to use it anymore as it will be removed.</p></td>
<td align="left"> </td>
</tr>
</tbody>
</table>

### Hash format {#MediaFieldType-Hashformat}

The hash format mostly matches the value object. It has the following
keys:

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

### Validation {#MediaFieldType-Validation}

The Field Type supports `FileSizeValidator`, defining maximum size of
media file in bytes:

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div class="tablesorter-header-inner">
Name
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Type
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Default value
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Description
</div></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>maxFileSize</code></td>
<td align="left"><code>int</code></td>
<td align="left"><span>false</span></td>
<td align="left">Maximum size of the file in bytes.</td>
</tr>
</tbody>
</table>

**Example of using Media Field Type validator in PHP**

~~~~ brush:
use eZ\Publish\Core\FieldType\Media\Type;
 
$contentTypeService = $repository->getContentTypeService();
$mediaFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( "media", "ezmedia" );

// Setting maximum file size to 5 megabytes
$mediaFieldCreateStruct->validatorConfiguration = array(
    "FileSizeValidator" => array(
        "maxFileSize" => 5 * 1024 * 1024
    )
);
~~~~

### Settings {#MediaFieldType-Settings}

The Field Type supports `mediaType` setting, defining how the media file
should be handled in output.

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div class="tablesorter-header-inner">
Name
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Type
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Default value
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Description
</div></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>mediaType</code></td>
<td align="left"><code>mixed</code></td>
<td align="left"><pre><code>Type::TYPE_HTML5_VIDEO</code></pre></td>
<td align="left">Type of the media, accepts one of the predefined constants.</td>
</tr>
</tbody>
</table>

List of all available `mediaType` constants defined
in **`eZ\Publish\Core\FieldType\Media\Type`** class:

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div class="tablesorter-header-inner">
Name
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Description
</div></th>
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
<td align="left"><p>Microsoft Windows Media</p></td>
</tr>
<tr class="even">
<td align="left"><pre><code>TYPE_HTML5_VIDEO</code></pre></td>
<td align="left">HTML5 Video</td>
</tr>
<tr class="odd">
<td align="left"><pre><code>TYPE_HTML5_AUDIO</code></pre></td>
<td align="left"><p>HTML5 Audio</p></td>
</tr>
</tbody>
</table>

**Example of using Media Field Type settings in PHP**

~~~~ brush:
use eZ\Publish\Core\FieldType\Media\Type;
 
$contentTypeService = $repository->getContentTypeService();
$mediaFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( "media", "ezmedia" );

// Setting Adobe Flash as the media type
$mediaFieldCreateStruct->fieldSettings = array(
    "mediaType" => Type::TYPE_FLASH,
);
~~~~

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


