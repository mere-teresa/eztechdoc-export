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
**Developer : XmlText Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Apr 29, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div
class="confluence-information-macro confluence-information-macro-warning">
<div class="confluence-information-macro-body">
The XmlText Field Type isn't officially supported by eZ Platform. It can be installed by requiring ezsystems/ezplatform-xmltext-fieldtype. PlatformUI does not support wysiwyg editing of this type of Field.

</div>
</div>
This Field Type validates and stores formatted text using the eZ Publish legacy format, ezxml. 

<div class="table-wrap">
<table style="width:74%;">
<colgroup>
<col width="22%" />
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
<td align="left"><code>XmlText</code></td>
<td align="left"><code>ezxmltext</code></td>
<td align="left"><code>mixed</code></td>
</tr>
</tbody>
</table>

</div>
**Input expectations**

<div class="table-wrap">
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
<td align="left">See the example below.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>eZ\Publish\Core\Fiel</code></pre>
dTypeXmlTextInput</td>
<td align="left">An instance of the class implementing Field Type abstract <strong><code>Input</code></strong> class.</td>
<td align="left">See the example below.</td>
</tr>
<tr class="odd">
<td align="left"><pre><code>eZ\Publish\Core\Fiel</code></pre>
dTypeXmlTextValue</td>
<td align="left">An instance of the Field Type <strong><code>Value</code></strong> object.</td>
<td align="left">See the example below.</td>
</tr>
</tbody>
</table>

</div>
**Example of the Field Type's internal format**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
<?xml version="1.0" encoding="utf-8"?>
<section
    xmlns:custom="http://ez.no/namespaces/ezpublish3/custom/"
    xmlns:image="http://ez.no/namespaces/ezpublish3/image/"
    xmlns:xhtml="http://ez.no/namespaces/ezpublish3/xhtml/">
    <paragraph>This is a paragraph.</paragraph>
</section>
```

</div>
</div>
**For XHTML Input**

The eZ XML output uses &lt;strong&gt; and &lt;em&gt; by default, respecting the semantic XHTML notation.

<div
class="confluence-information-macro has-no-icon confluence-information-macro-information">
Learn more about &lt;strong&gt;, &lt;b&gt;, &lt;em&gt;, &lt;i&gt;

<div class="confluence-information-macro-body">
-   [Read the share.ez.no forum about our choice of semantic tags with eZ XML](http://share.ez.no/forums/ez-publish-5-platform/strong-vs-b-and-em-vs-i)
-   Learn more [about the semantic tags vs the presentational tags.](http://html5doctor.com/i-b-em-strong-element/)

</div>
</div>
**Input object API**

`Input` object is intended as a vector for different input formats. It should accept input value in a foreign format and convert it to the Field Type's internal format.

It should implement abstract **`eZ\Publish\Core\FieldType\XmlText\Input`** class, which defines only one method:

<div class="table-wrap">
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

</div>
At the moment there is only one implementation of the **`Input`** class, **`eZ\Publish\Core\FieldType\XmlText\Input\EzXml`**, which accepts input value in the internal format, and therefore only performs validation of the input value.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using the Input object**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
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
```

</div>
</div>
**Value object API**

**`eZ\Publish\Core\FieldType\XmlText\Value`** offers following properties:

<div class="table-wrap">
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
<td align="left">Internal format value as an instance of <code>DOMDocument</code>.</td>
</tr>
</tbody>
</table>

</div>
**Validation**

Validation of the internal format is performed in the **`eZ\Publish\Core\FieldType\XmlText\Input\EzXml`** class.

**Settings**

Following settings are available:

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
<th align="left">Name</th>
<th align="left">Type</th>
<th align="left">Default value</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>numRows</code></td>
<td align="left"><code>int</code></td>
<td align="left"><code>10</code></td>
<td align="left">Defines the number of rows for the online editor in the administration interface.</td>
</tr>
<tr class="even">
<td align="left"><code>tagPreset</code></td>
<td align="left"><code>mixed</code></td>
<td align="left"><code>Type::TAG_PRESET _DEFAULT</code></td>
<td align="left">Preset of tags for the online editor in the administration interface.</td>
</tr>
</tbody>
</table>

</div>
**Tag presets**

Following tag presets are available as constants in the **`eZ\Publish\Core\FieldType\XmlText`** class:

<div class="table-wrap">
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
<td align="left">Preset of tags for online editor intended for simple formatting options.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using settings in PHP**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
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

