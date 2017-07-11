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

<span id="title-text"> Developer : XmlText Field Type </span> {#title-heading .pagetitle}
=============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Apr 29, 2016

<span
class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
The XmlText Field Type isn’t officially supported by eZ Platform. It can
be installed by requiring ezsystems/ezplatform-xmltext-fieldtype.
PlatformUI does not support wysiwyg editing of this type of Field.

<span style="color: rgb(0,0,0);">  
</span>

<span style="color: rgb(0,0,0);">This Field Type validates and stores
formatted text using the eZ Publish legacy format, ezxml. </span>

| Name      | Internal name | Expected input |
|-----------|---------------|----------------|
| `XmlText` | `ezxmltext`   | `mixed`        |

Input expectations {#XmlTextFieldType-Inputexpectations}
------------------

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
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
<td align="left">XML document in the Field Type internal format as a string.</td>
<td align="left"><p>See the example below.</p></td>
</tr>
<tr class="even">
<td align="left"><pre><code>eZ\Publish\Core\FieldType\XmlText\Input</code></pre></td>
<td align="left">An instance of the class implementing Field Type abstract <strong><code>Input</code></strong> class.</td>
<td align="left"><span>See the example below.</span></td>
</tr>
<tr class="odd">
<td align="left"><pre><code>eZ\Publish\Core\FieldType\XmlText\Value</code></pre></td>
<td align="left"><span>An instance of the Field Type <strong><code>Value</code></strong> object.</span></td>
<td align="left"><span>See the example below.</span></td>
</tr>
</tbody>
</table>

### Example of the Field Type’s internal format {#XmlTextFieldType-ExampleoftheFieldType'sinternalformat}

~~~~ brush:
<?xml version="1.0" encoding="utf-8"?>
<section
    xmlns:custom="http://ez.no/namespaces/ezpublish3/custom/"
    xmlns:image="http://ez.no/namespaces/ezpublish3/image/"
    xmlns:xhtml="http://ez.no/namespaces/ezpublish3/xhtml/">
    <paragraph>This is a paragraph.</paragraph>
</section>
~~~~

### For XHTML Input {#XmlTextFieldType-ForXHTMLInput}

<span style="color: rgb(0,0,0);">The eZ XML output uses &lt;strong&gt;
and &lt;em&gt; by default, respecting the semantic XHTML notation.  
</span>

Learn more about &lt;strong&gt;, &lt;b&gt;, &lt;em&gt;, &lt;i&gt;

-   [Read the share.ez.no forum about our choice of semantic tags with
    eZ
    XML](http://share.ez.no/forums/ez-publish-5-platform/strong-vs-b-and-em-vs-i){.external-link}
-   Learn more [about the semantic tags vs the
    presentational tags.](http://html5doctor.com/i-b-em-strong-element/){.external-link}

<span style="color: rgb(0,0,0);">  
</span>

Input object API {#XmlTextFieldType-InputobjectAPI}
----------------

<span style="color: rgb(0,0,0);">`Input` object is intended as a vector
for different input formats. It should accept input value in a foreign
format and convert it to the Field Type’s internal format.</span>

<span style="color: rgb(0,0,0);">It should implement
abstract </span>**`eZ\Publish\Core\FieldType\XmlText\Input`** class,
which defines only one method:

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Method</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><pre><code>getInternalRepresentation</code></pre></td>
<td align="left">The method should return the input value in the internal format.</td>
</tr>
</tbody>
</table>

<span style="color: rgb(0,0,0);">At the moment there is only one
implementation of the **`Input`**</span><span
style="color: rgb(0,0,0);"> class,
</span>**`eZ\Publish\Core\FieldType\XmlText\Input\EzXml`**<span
style="color: rgb(0,0,0);">, which accepts input value in the internal
format, and therefore only performs validation of the input
value.</span>

**Example of using the Input object**

~~~~ brush:
...
 
use eZ\Publish\Core\FieldType\XmlText\Input\EzXml as EzXmlInput;

...

$contentService = $repository->getContentService();
$contentTypeService = $repository->getContentTypeService();
 
$contentType = $contentTypeService->loadContentTypeByIdentifier( "article" );
$contentCreateStruct = $contentService->newContentCreateStruct( $contentType, "eng-GB" );

$inputString = <<<EZXML
<?xml version="1.0" encoding="utf-8"?>
<section
    xmlns:custom="http://ez.no/namespaces/ezpublish3/custom/"
    xmlns:image="http://ez.no/namespaces/ezpublish3/image/"
    xmlns:xhtml="http://ez.no/namespaces/ezpublish3/xhtml/">
    <paragraph>This is a paragraph.</paragraph>
</section>
EZXML;
 
$ezxmlInput = new EzXmlInput( $inputString );

$contentCreateStruct->setField( "description", $ezxmlInput );
 
...
~~~~

Value object API {#XmlTextFieldType-ValueobjectAPI}
----------------

**`eZ\Publish\Core\FieldType\XmlText\Value`** offers following
properties:

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Property</th>
<th align="left">Type</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>xml</code></td>
<td align="left"><pre><code>DOMDocument</code></pre></td>
<td align="left">Internal format value as an instance of <span style="line-height: 1.4285715;"><code>DOMDocument</code>.</span></td>
</tr>
</tbody>
</table>

Validation {#XmlTextFieldType-Validation}
----------

<span style="color: rgb(0,0,0);">Validation of the internal format is
performed in
the **`eZ\Publish\Core\FieldType\XmlText\Input\EzXml`** class.</span>

Settings {#XmlTextFieldType-Settings}
--------

<span style="color: rgb(0,0,0);">Following settings are
available:</span>

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Type</th>
<th align="left">Default value</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>numRows</code></p></td>
<td align="left"><code>int</code></td>
<td align="left"><code>10</code></td>
<td align="left">Defines the number of rows for the online editor in the administration interface.</td>
</tr>
<tr class="even">
<td align="left"><p><code>tagPreset</code></p></td>
<td align="left"><code>mixed</code></td>
<td align="left"><code>Type::TAG_PRESET_DEFAULT</code></td>
<td align="left"><p><span>Preset of tags for the online editor in the administration interface.</span></p></td>
</tr>
</tbody>
</table>

### Tag presets {#XmlTextFieldType-Tagpresets}

<span style="color: rgb(0,0,0);">Following tag presets are available as
constants in the **`eZ\Publish\Core\FieldType\XmlText`** class:</span>

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Constant</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><pre><code>TAG_PRESET_DEFAULT</code></pre></td>
<td align="left">Default tag preset.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>TAG_PRESET_SIMPLE_FORMATTING</code></pre></td>
<td align="left"><p><span>Preset of tags for online editor intended for simple formatting options.</span></p></td>
</tr>
</tbody>
</table>

**Example of using settings in PHP**

~~~~ brush:
...
 
use eZ\Publish\Core\FieldType\XmlText\Type;

...

$contentTypeService = $repository->getContentTypeService();
$xmltextFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( "description", "ezxmltext" );

$xmltextFieldCreateStruct->fieldSettings = array(
    "numRows" => 25,
    "tagPreset" => Type::TAG_PRESET_SIMPLE_FORMATTING
);
 
...
~~~~

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


