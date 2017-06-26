1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and Fields](31430275.html)</span>
7.  <span>[Field Types reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : Image Field Type </span>
===========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Feb 23, 2017

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Field Type identifier: `ezimage`
Validators: File size
Value object: `\eZ\Publish\Core\FieldType\Image\Value`<span>
Associated Services: `ezpublish.fieldType.ezimage.variation_service`</span>

The Image Field Type allows you to store an image file.

A **variation service** handles conversion of the original image into different formats and sizes through a set of preconfigured named variations: large, small, medium, black & white thumbnail, etc.

PHP API Field Type
------------------

### Value object

The `value` property of an Image Field will return an `\eZ\Publish\Core\FieldType\Image\Value` object with the following properties:

##### Properties

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
<th align="left">Example</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>id</code></td>
<td align="left">string</td>
<td align="left"><code>0/8/4/1/1480-1-eng-GB/image.png  </code></td>
<td align="left"><p>The image's unique identifier. Usually the path, or a part of the path. To get the full path, use <code>URI</code> property.</p></td>
</tr>
<tr class="even">
<td align="left"><code>alternativeText</code></td>
<td align="left">string</td>
<td align="left"><code>This is a piece of text</code></td>
<td align="left">The alternative text, as entered in the Field's properties</td>
</tr>
<tr class="odd">
<td align="left"><code>fileName</code></td>
<td align="left">string</td>
<td align="left"><code>image.png</code></td>
<td align="left">The original image's filename, without the path</td>
</tr>
<tr class="even">
<td align="left"><code>fileSize</code></td>
<td align="left">int</td>
<td align="left"><code>37931</code></td>
<td align="left">The original image's size, in bytes</td>
</tr>
<tr class="odd">
<td align="left"><code>uri</code></td>
<td align="left">string</td>
<td align="left"><code>var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/image.png</code></td>
<td align="left">The original image's URI</td>
</tr>
<tr class="even">
<td align="left"><code>imageId</code></td>
<td align="left">string</td>
<td align="left"><code>240-1480</code></td>
<td align="left">A special image ID, used by REST</td>
</tr>
</tbody>
</table>

### Image Variations

Using the variation Service, variations of the original image can be obtained. Those are `\eZ\Publish\SPI\Variation\Values\ImageVariation`<span style="line-height: 1.4285715;"> objects with the following properties:</span>

| Property       | Type     | Example  | Description                          |
|----------------|----------|----------|--------------------------------------|
| `width`        | int      | `640`    | The variation's width in pixels      |
| `height`       | int      | `480`    | The variation's height in pixels     |
| `name`         | string   | `medium` | The variation's identifier           |
| `info`         | mixed    |          | Extra info, such as EXIF data        |
| `fileSize`     | int      |          |                                      |
| `mimeType`     | string   |          |                                      |
| `fileName`     | string   |          |                                      |
| `dirPath`      | string   |          |                                      |
| `uri`          | string   |          | The variation's uri                  |
| `lastModified` | DateTime |          | When the variation was last modified |

### Field Defintion options

The Image Field Type supports one FieldDefinition option: the maximum size for the file.

Using an Image Field
--------------------

### Template Rendering

When displayed using `ez_render_field`, an Image Field will output this type of HTML:

``` brush:
<img src="var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/image_medium.png" width="844" height="430" alt="Alternative text" />
```

The template called by [the **ez\_render\_field()** Twig function](ez_render_field_32114041.html) while rendering a Image field accepts the following the parameters:

| Parameter | Type             | Default        | Description                                                                                                                                       |
|-----------|------------------|----------------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| `alias`   | `string`         | `"original``"` | The image variation name, must be defined in your site access `image_variations` settings. Defaults to "original", the originally uploaded image. |
| `width`   | `int`            |                | Optionally to specify a different width set on the image html tag then then one from image alias.                                                 |
| `height`  | <span>int</span> |                | <span>Optionally to specify a different height set on the image html tag then then one from image alias.</span>                                   |
| `class`   | `string`         |                | <span>Optionally to specify a specific html class for use in custom javascript and/or css.</span>                                                 |

 

Example: 

``` brush:
{{ ez_render_field( content, 'image', { 'parameters':{ 'alias': 'imagelarge', 'width': 400, 'height': 400 } } ) }}
```

The raw Field can also be used if needed. Image variations for the Field's content can be obtained using the `ez_image_alias` Twig helper:

``` brush:
{% set imageAlias = ez_image_alias( field, versionInfo, 'medium' ) %}
```

<span style="line-height: 1.4285715;">The variation's properties can be used to generate the required output:</span>

``` brush:
<img src="{{ asset( imageAlias.uri ) }}" width="{{ imageAlias.width }}" height="{{ imageAlias.height }}" alt="{{ field.value.alternativeText }}" />
```

 

### With the REST API

Image Fields within REST are exposed by the `application/vnd.ez.api.Content` media-type. An Image Field will look like this:

inputUri

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
From 5.2 version, new images must be input using the `inputUri` property from `Image\Value`.

**The keys `id` and `path` still work, but a deprecation warning will be thrown.**

**Version &gt;= 5.2**

``` brush:
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

**Before 5.2** <span class="collapse-source expand-control"><span class="expand-control-icon icon"> </span><span class="expand-control-text">Expand source</span></span>

``` brush:
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

 

Children of the fieldValue node will list the general properties of the Field's original image (fileSize, fileName, inputUri, etc.), as well as variations. For each variation, a uri is provided. Requested through REST, this resource will generate the variation if it doesn't exist yet, and list the variation details:

``` brush:
<ContentImageVariation media-type="application/vnd.ez.api.ContentImageVariation+xml" href="/api/ezp/v2/content/binary/images/240-1480/variations/tiny">
  <uri>/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB/kidding_tiny.png</uri>
  <contentType>image/png</contentType>
  <width>30</width>
  <height>30</height>
  <fileSize>1361</fileSize>
</ContentImageVariation>
```

### From PHP code

#### Getting an image variation

The variation service, `ezpublish.fieldType.ezimage.variation_service`, can be used to generate/get variations for a Field. It expects a VersionInfo, the Image Field and the variation name, as a string (`large`, `medium`, etc.)

``` brush:
$variation = $imageVariationHandler->getVariation(
    $imageField, $versionInfo, 'large'
);

echo $variation->uri;
```

Manipulating image content
--------------------------

### From PHP

As for any Field Type, there are several ways to input content to a Field. For an Image, the quickest is to call `setField()` on the ContentStruct:

``` brush:
$createStruct = $contentService->newContentCreateStruct(
    $contentTypeService->loadContentType( 'image' ),
    'eng-GB'
);

$createStruct->setField( 'image', '/tmp/image.png' );
```

In order to customize the Image's alternative texts, you must first get an Image\\Value object, and set this property. For that, you can use the `Image\Value::fromString()` method that accepts the path to a local file:

``` brush:
$createStruct = $contentService->newContentCreateStruct(
    $contentTypeService->loadContentType( 'image' ),
    'eng-GB'
);

$imageField = \eZ\Publish\Core\FieldType\Image\Value::fromString( '/tmp/image.png' );
$imageField->alternativeText = 'My alternative text';
$createStruct->setField( 'image', $imageField );
```

You can also provide a hash of `Image\Value` properties, either to `setField()`, or to the constructor:

``` brush:
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

### From REST

The REST API expects Field values to be provided in a hash-like structure. Those keys are identical to those expected by the `Image\Value` constructor: `fileName`, `alternativeText`. In addition, image data can be provided using the `data` property, with the image's content encoded as base64.

#### Creating an image Field

``` brush:
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

#### Updating an image Field

Updating an Image Field requires that you re-send existing data. This can be done by re-using the Field obtained via REST, **removing the variations key**, and updating `alternativeText`, `fileName` or `data`. If you do not want to change the image itself, do not provide the `data` key.

``` brush:
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

Naming
------

Each storage engine determines how image files are named.

### Legacy Storage Engine naming

Images are stored within the following directory structure:

`<varDir>/<StorageDir>/<ImagesStorageDir>/<FieIdId[-1]>/<FieIdId[-2]>/<FieIdId[-3]>/<FieIdId[-4]>/<FieldId>-<VersionNumber>-<LanguageCode>/`

With the following values:

-   `VarDir` = var (default)
-   `StorageDir` = `storage` (default)
-   <span>`ImagesStorageDir` = `images` (default)</span>
-   <span>`FieldId` = `1480`</span>
-   <span>`VersionNumber` = `1`</span>
-   <span>`LanguageCode` = `eng-GB`</span>

<span>Images will be stored to `web/var/ezdemo_site/storage/images/0/8/4/1/1480-1-eng-GB`.</span>

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Using the field ID digits <span>in reverse order </span>as the folder structure maximizes sharding of files through multiple folders on the filesystem.

Within this folder, images will be named like the uploaded file, suffixed with an underscore and the variation name:

-   MyImage.png
-   MyImage\_large.png
-   MyImage\_rss.png

 

 

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


