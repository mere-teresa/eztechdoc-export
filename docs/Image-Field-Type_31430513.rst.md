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
**Developer : Image Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Feb 23, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Field Type identifier: `ezimage`\
Validators: File size\
Value object: `\eZ\Publish\Core\FieldType\Image\Value` Associated
Services: `ezpublish.fieldType.ezimage.variation_service`

</div>
</div>
The Image Field Type allows you to store an image file.

A **variation service** handles conversion of the original image into
different formats and sizes through a set of preconfigured named
variations: large, small, medium, black & white thumbnail, etc.

**PHP API Field Type**

**Value object**

The `value` property of an Image Field will return an
`\eZ\Publish\Core\FieldType\Image\Value` object with the following
properties:

**Properties**

<div class="table-wrap">
  ---------------------------------------------------------------------------
  Property           Type               Example            Description
  ------------------ ------------------ ------------------ ------------------
  `id`               string             \`0/8/4/1/1480-1-e The image’s unique
                                        ng-GB/image.png    identifier.
                                        \`                 Usually the path,
                                                           or a part of the
                                                           path. To get the
                                                           full path, use
                                                           `URI` property.

  \`alternativeText  string             `This is a piece o The alternative
  \`                                    f text`            text, as entered
                                                           in the Field’s
                                                           properties

  `fileName`         string             `image.png`        The original
                                                           image’s filename,
                                                           without the path

  `fileSize`         int                `37931`            The original
                                                           image’s size, in
                                                           bytes

  `uri`              string             `var/ezdemo_site/  The original
                                        storage/images/0/8 image’s URI
                                         /4/1/1480-1-eng-G 
                                        B /image.png`      

  `imageId`          string             `240-1480`         A special image
                                                           ID, used by REST
  ---------------------------------------------------------------------------

</div>
**Image Variations**

Using the variation Service, variations of the original image can be
obtained. Those
are `\eZ\Publish\SPI\Variation\Values\ImageVariation` objects with the
following properties:

<div class="table-wrap">
  -------------------------------------------------------------------------
  Property         Type       Example      Description
  ---------------- ---------- ------------ --------------------------------
  `width`          int        `640`        The variation’s width in pixels

  `height`         int        `480`        The variation’s height in pixels

  `name`           string     `medium`     The variation’s identifier

  `info`           mixed                   Extra info, such as EXIF data

  `fileSize`       int                      

  `mimeType`       string                   

  `fileName`       string                   

  `dirPath`        string                   

  `uri`            string                  The variation’s uri

  `lastModified`   DateTime                When the variation was last
                                           modified
  -------------------------------------------------------------------------

</div>
**Field Defintion options**

The Image Field Type supports one FieldDefinition option: the maximum
size for the file.

**Using an Image Field**

**Template Rendering**

When displayed using `ez_render_field`, an Image Field will output this
type of HTML:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<img src="var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/image_medium.png" width="844" height="430" alt="Alternative text" />
```

</div>
</div>
The template called by [the **ez\_render\_field()** Twig
function](ez_render_field_32114041.html) while rendering a Image field
accepts the following the parameters:

<div class="table-wrap">
  -------------------------------------------------------------------------
  Param Type  Default  Description
  eter                 
  ----- ----- -------- ----------------------------------------------------
  `alia `stri `"origin The image variation name, must be defined in your
  s`    ng`   al``"`   site access `image_variations` settings. Defaults to
                       “original”, the originally uploaded image.

  `widt `int`          Optionally to specify a different width set on the
  h`                   image html tag then then one from image alias.

  `heig int            Optionally to specify a different height set on the
  ht`                  image html tag then then one from image alias.

  `clas `stri          Optionally to specify a specific html class for use
  s`    ng`            in custom javascript and/or css.
  -------------------------------------------------------------------------

</div>
 

Example: 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{{ ez_render_field( content, 'image', { 'parameters':{ 'alias': 'imagelarge', 'width': 400, 'height': 400 } } ) }}
```

</div>
</div>
The raw Field can also be used if needed. Image variations for the
Field’s content can be obtained using the `ez_image_alias` Twig helper:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% set imageAlias = ez_image_alias( field, versionInfo, 'medium' ) %}
```

</div>
</div>
The variation’s properties can be used to generate the required output:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<img src="{{ asset( imageAlias.uri ) }}" width="{{ imageAlias.width }}" height="{{ imageAlias.height }}" alt="{{ field.value.alternativeText }}" />
```

</div>
</div>
 

**With the REST API**

Image Fields within REST are exposed by the
`application/vnd.ez.api.Content` media-type. An Image Field will look
like this:

<div
class="confluence-information-macro confluence-information-macro-information">
inputUri

<div class="confluence-information-macro-body">
From 5.2 version, new images must be input using the `inputUri` property
from `Image\Value`.

**The keys `id` and `path` still work, but a deprecation warning will be
thrown.**

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Version &gt;= 5.2**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<field>
    <id>1480</id>
    <fieldDefinitionIdentifier>image</fieldDefinitionIdentifier>
    <languageCode>eng-GB</languageCode>
    <fieldValue>
        <value key="inputUri">/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/kidding.png</value>
        <value key="alternativeText"></value>
        <value key="fileName">kidding.png</value>
        <value key="fileSize">37931</value>
        <value key="imageId">240-1480</value>
        <value key="uri">/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/kidding.png</value>
        <value key="variations">
            <value key="articleimage">
                <value key="href">/api/ezp/v2/content/binary/images/240-1480/variations/articleimage</value>
            </value>
            <value key="articlethumbnail">
                <value key="href">/api/ezp/v2/content/binary/images/240-1480/variations/articlethumbnail</value>
            </value>
        </value>
    </fieldValue>
</field>
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl hide-border-bottom"
style="border-bottom-width: 1px;">
**Before 5.2**  Expand source

</div>
<div class="codeContent panelContent pdl hide-toolbar">
``` {.sourceCode .brush:}
<field>
    <id>1480</id>
    <fieldDefinitionIdentifier>image</fieldDefinitionIdentifier>
    <languageCode>eng-GB</languageCode>
    <fieldValue>
        <value key="id">var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/kidding.png</value>
        <value key="path">/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/kidding.png</value>
        <value key="alternativeText"></value>
        <value key="fileName">kidding.png</value>
        <value key="fileSize">37931</value>
        <value key="imageId">240-1480</value>
        <value key="uri">/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/kidding.png</value>
        <value key="variations">
            <value key="articleimage">
                <value key="href">/api/ezp/v2/content/binary/images/240-1480/variations/articleimage</value>
            </value>
            <value key="articlethumbnail">
                <value key="href">/api/ezp/v2/content/binary/images/240-1480/variations/articlethumbnail</value>
            </value>
        </value>
    </fieldValue>
</field>
```

</div>
</div>
 

Children of the fieldValue node will list the general properties of the
Field’s original image (fileSize, fileName, inputUri, etc.), as well as
variations. For each variation, a uri is provided. Requested through
REST, this resource will generate the variation if it doesn’t exist yet,
and list the variation details:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<ContentImageVariation media-type="application/vnd.ez.api.ContentImageVariation+xml" href="/api/ezp/v2/content/binary/images/240-1480/variations/tiny">
  <uri>/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/kidding_tiny.png</uri>
  <contentType>image/png</contentType>
  <width>30</width>
  <height>30</height>
  <fileSize>1361</fileSize>
</ContentImageVariation>
```

</div>
</div>
**From PHP code**

**Getting an image variation**

The variation service, `ezpublish.fieldType.ezimage.variation_service`,
can be used to generate/get variations for a Field. It expects a
VersionInfo, the Image Field and the variation name, as a string
(`large`, `medium`, etc.)

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$variation = $imageVariationHandler->getVariation(
    $imageField, $versionInfo, 'large'
);

echo $variation->uri;
```

</div>
</div>
**Manipulating image content**

**From PHP**

As for any Field Type, there are several ways to input content to a
Field. For an Image, the quickest is to call `setField()` on the
ContentStruct:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$createStruct = $contentService->newContentCreateStruct(
    $contentTypeService->loadContentType( 'image' ),
    'eng-GB'
);

$createStruct->setField( 'image', '/tmp/image.png' );
```

</div>
</div>
In order to customize the Image’s alternative texts, you must first get
an Image\\Value object, and set this property. For that, you can use the
`Image\Value::fromString()` method that accepts the path to a local
file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$createStruct = $contentService->newContentCreateStruct(
    $contentTypeService->loadContentType( 'image' ),
    'eng-GB'
);

$imageField = \eZ\Publish\Core\FieldType\Image\Value::fromString( '/tmp/image.png' );
$imageField->alternativeText = 'My alternative text';
$createStruct->setField( 'image', $imageField );
```

</div>
</div>
You can also provide a hash of `Image\Value` properties, either to
`setField()`, or to the constructor:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$imageValue = new \eZ\Publish\Core\FieldType\Image\Value(
    array(
        'id' => '/tmp/image.png',
        'fileSize' => 37931,
        'fileName' => 'image.png',
        'alternativeText' => 'My alternative text'
    )
);

$createStruct->setField( 'image', $imageValue );
```

</div>
</div>
**From REST**

The REST API expects Field values to be provided in a hash-like
structure. Those keys are identical to those expected by the
`Image\Value` constructor: `fileName`, `alternativeText`. In addition,
image data can be provided using the `data` property, with the image’s
content encoded as base64.

**Creating an image Field**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<?xml version="1.0" encoding="UTF-8"?>
<ContentCreate>
    <!-- [...metadata...] -->

    <fields>
        <field>
            <id>247</id>
            <fieldDefinitionIdentifier>image</fieldDefinitionIdentifier>
            <languageCode>eng-GB</languageCode>
            <fieldValue>
                <value key="fileName">rest-rocks.jpg</value>
                <value key="alternativeText">HTTP</value>
                <value key="data"><![CDATA[/9j/4AAQSkZJRgABAQEAZABkAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcG
BwcICQsJCAgKCAcHCg0KCgsMDAwMBwkODw0MDgsMDAz/2[...]</value>
            </fieldValue>
        </field>
    </fields>
</ContentCreate>
```

</div>
</div>
**Updating an image Field**

Updating an Image Field requires that you re-send existing data. This
can be done by re-using the Field obtained via REST, **removing the
variations key**, and updating `alternativeText`, `fileName` or `data`.
If you do not want to change the image itself, do not provide the `data`
key.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<?xml version="1.0" encoding="UTF-8"?>
<VersionUpdate>
    <fields>
        <field>
            <id>247</id>
            <fieldDefinitionIdentifier>image</fieldDefinitionIdentifier>
            <languageCode>eng-GB</languageCode>
            <fieldValue>
                <value key="id">media/images/507-1-eng-GB/Existing-image.png</value>
                <value key="alternativeText">Updated alternative text</value>
                <value key="fileName">Updated-filename.png</value>
            </fieldValue>
        </field>
    </fields>
</VersionUpdate>
```

</div>
</div>
**Naming**

Each storage engine determines how image files are named.

**Legacy Storage Engine naming**

Images are stored within the following directory structure:

`<varDir>/<StorageDir>/<ImagesStorageDir>/<FieIdId[-1]>/<FieIdId[-2]>/<FieIdId[-3]>/<FieIdId[-4]>/<FieldId>-<VersionNumber>-<LanguageCode>/`

With the following values:

-   `VarDir` = var (default)
-   `StorageDir` = `storage` (default)
-   `ImagesStorageDir` = `images` (default)
-   `FieldId` = `1480`
-   `VersionNumber` = `1`
-   `LanguageCode` = `eng-GB`

Images will be stored
to `web/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB`.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Using the field ID digits in reverse order as the folder structure
maximizes sharding of files through multiple folders on the filesystem.

</div>
</div>
Within this folder, images will be named like the uploaded file,
suffixed with an underscore and the variation name:

-   MyImage.png
-   MyImage\_large.png
-   MyImage\_rss.png

 

 

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

