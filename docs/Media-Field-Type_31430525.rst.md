<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
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
  Name           Internal name      Expected input
  -------------- ------------------ -------------------
  `Media`        `ezmedia`          `mixed`

</div>
**Description**

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

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
  -------------------------------------------------------------------------
  Type               Description                           Example
  ------------------ ------------------------------------- ----------------
  `string`           Path to the media file.               `/Users/jane/but
                                                           terflies.mp4`

  `eZ\Publish\Core\F Media FieldType Value Object with     See `Value`
  ieldType\Media\Val path to the media file as the value   object section
  ue`                of `id` property.                     below.
  -------------------------------------------------------------------------

</div>
**Value object**

**Properties**

**`eZ\Publish\Core\FieldType\Media\Value`** offers the following
properties.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Note that both **`Media`** and **`BinaryFile`** Value and Type inherit
from the **`BinaryBase`** abstract Field Type and share common
properties.

</div>
</div>
<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Property           | Type               | Description        | Example            |
+====================+====================+====================+====================+
| `id`               | string             | Media file         | application/63cd47 |
|                    |                    | identifier. This   | 2dd7819da7b75e8e2f |
|                    |                    | ID depends on      | ee507c68.mp4       |
|                    |                    | the IO             |                    |
|                    |                    | Handler &lt;https: |                    |
|                    |                    | //d                |                    |
|                    |                    | oc.ez.no/display/D |                    |
|                    |                    | EVELOPER/Clusterin |                    |
|                    |                    | g\#Clustering-Bina |                    |
|                    |                    | r                  |                    |
|                    |                    | yfilesclustering&g |                    |
|                    |                    | t;                 |                    |
|                    |                    | \_\_ that is being |                    |
|                    |                    | used. With the     |                    |
|                    |                    | native, default    |                    |
|                    |                    | handlers           |                    |
|                    |                    | (FileSystem and    |                    |
|                    |                    | Legacy), the ID is |                    |
|                    |                    | the file path,     |                    |
|                    |                    | relative to the    |                    |
|                    |                    | binary file        |                    |
|                    |                    | storage root dir   |                    |
|                    |                    | (`var/<vardir>/st  |                    |
|                    |                    | orage/original`    |                    |
|                    |                    | by default).       |                    |
+--------------------+--------------------+--------------------+--------------------+
| `fileName`         | string             | The human-readable | butterflies.mp4    |
|                    |                    | file name, as      |                    |
|                    |                    | exposed to the     |                    |
|                    |                    | outside. Used when |                    |
|                    |                    | sending the file   |                    |
|                    |                    | for download in    |                    |
|                    |                    | order to name the  |                    |
|                    |                    | file.              |                    |
+--------------------+--------------------+--------------------+--------------------+
| `fileSize`         | int                | File size, in      | 1077923            |
|                    |                    | bytes.             |                    |
+--------------------+--------------------+--------------------+--------------------+
| `mimeType`         | string             | The file’s mime    | video/mp4          |
|                    |                    | type.              |                    |
+--------------------+--------------------+--------------------+--------------------+
| `uri`              | string             | The binary file’s  | /var/ezdemo\_site/ |
|                    |                    | HTTP uri. If the   | storage/original/a |
|                    |                    | URI doesn’t        | pplication/63cd472 |
|                    |                    | include a host or  | dd7819da7b75e8e2fe |
|                    |                    | protocol, it       | e507c68.mp4        |
|                    |                    | applies to the     |                    |
|                    |                    | request domain.    |                    |
|                    |                    |                    |                    |
|                    |                    | ****The URI is not |                    |
|                    |                    | publicly readable, |                    |
|                    |                    | and must NOT be    |                    |
|                    |                    | used to link to    |                    |
|                    |                    | the file for       |                    |
|                    |                    | download.**** Use  |                    |
|                    |                    | \`ez\_render\_fiel |                    |
|                    |                    | d                  |                    |
|                    |                    | \` to generate a   |                    |
|                    |                    | valid link to the  |                    |
|                    |                    | download           |                    |
|                    |                    | controller.        |                    |
+--------------------+--------------------+--------------------+--------------------+
| `hasController`    | boolean            | Whether the media  | true               |
|                    |                    | has a controller   |                    |
|                    |                    | when being         |                    |
|                    |                    | displayed.         |                    |
+--------------------+--------------------+--------------------+--------------------+
| `autoplay`         | boolean            | Whether the media  | true               |
|                    |                    | should be          |                    |
|                    |                    | automatically      |                    |
|                    |                    | played.            |                    |
+--------------------+--------------------+--------------------+--------------------+
| `loop`             | boolean            | Whether the media  | false              |
|                    |                    | should be played   |                    |
|                    |                    | in a loop.         |                    |
+--------------------+--------------------+--------------------+--------------------+
| `height`           | int                | Height of the      | 300                |
|                    |                    | media.             |                    |
+--------------------+--------------------+--------------------+--------------------+
| `width`            | int                | Width of the       | 400                |
|                    |                    | media.             |                    |
+--------------------+--------------------+--------------------+--------------------+
| `path`             | string             | **deprecated**Rena |                    |
|                    |                    | med                |                    |
|                    |                    | to `id` starting   |                    |
|                    |                    | from eZ Publish    |                    |
|                    |                    | 5.2. Can still be  |                    |
|                    |                    | used, but it is    |                    |
|                    |                    | recommended not to |                    |
|                    |                    | use it anymore as  |                    |
|                    |                    | it will be         |                    |
|                    |                    | removed.           |                    |
+--------------------+--------------------+--------------------+--------------------+

</div>
**Hash format**

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

**Validation**

The Field Type supports `FileSizeValidator`, defining maximum size of
media file in bytes:

<div class="table-wrap">
  ---------------------------------------------------------------------------
  .. raw:: html      .. raw:: html      .. raw:: html      .. raw:: html
  &lt;div            &lt;div            &lt;div            &lt;div
  class=“tablesor    class=“tablesor    class=“tablesor    class=“tablesor
  ter-header-inner”& ter-header-inner”& ter-header-inner”& ter-header-inner”&
  gt;                gt;                gt;                gt;
  Name .. raw:: html Type .. raw:: html Default value ..   Description ..
  &lt;/div&gt;       &lt;/div&gt;       raw:: html         raw:: html
                                        &lt;/div&gt;       &lt;/div&gt;
  ------------------ ------------------ ------------------ ------------------
  `maxFileSize`      `int`              false              Maximum size of
                                                           the file in bytes.
  ---------------------------------------------------------------------------

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using Media Field Type validator in PHP**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

The Field Type supports `mediaType` setting, defining how the media file
should be handled in output.

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| .. raw:: html      | .. raw:: html      | .. raw:: html      | .. raw:: html      |
| &lt;div            | &lt;div            | &lt;div            | &lt;div            |
| class=“tablesor    | class=“tablesor    | class=“tablesor    | class=“tablesor    |
| ter-header-inner”& | ter-header-inner”& | ter-header-inner”& | ter-header-inner”& |
| gt;                | gt;                | gt;                | gt;                |
| Name .. raw:: html | Type .. raw:: html | Default value ..   | Description ..     |
| &lt;/div&gt;       | &lt;/div&gt;       | raw:: html         | raw:: html         |
|                    |                    | &lt;/div&gt;       | &lt;/div&gt;       |
+====================+====================+====================+====================+
| `mediaType`        | `mixed`            |     Type::TYPE_HTM | Type of the media, |
|                    |                    |                    | accepts one of the |
|                    |                    | L5\_VIDEO          | predefined         |
|                    |                    |                    | constants.         |
+--------------------+--------------------+--------------------+--------------------+

</div>
List of all available `mediaType` constants defined
in **`eZ\Publish\Core\FieldType\Media\Type`** class:

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| .. raw:: html &lt;div                | .. raw:: html &lt;div                |
| class=“tablesorter-header-inner”&gt; | class=“tablesorter-header-inner”&gt; |
| Name .. raw:: html &lt;/div&gt;      | Description .. raw:: html            |
|                                      | &lt;/div&gt;                         |
+======================================+======================================+
|     TYPE_FLASH                       | Adobe Flash                          |
+--------------------------------------+--------------------------------------+
|     TYPE_QUICKTIME                   | Apple QuickTime                      |
+--------------------------------------+--------------------------------------+
|     TYPE_REALPLAYER                  | Real Media                           |
+--------------------------------------+--------------------------------------+
|     TYPE_SILVERLIGHT                 | Silverlight                          |
+--------------------------------------+--------------------------------------+
|     TYPE_WINDOWSMEDIA                | Microsoft Windows Media              |
+--------------------------------------+--------------------------------------+
|     TYPE_HTML5_VIDEO                 | HTML5 Video                          |
+--------------------------------------+--------------------------------------+
|     TYPE_HTML5_AUDIO                 | HTML5 Audio                          |
+--------------------------------------+--------------------------------------+

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using Media Field Type settings in PHP**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

