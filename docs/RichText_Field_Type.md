# RichText Field Type

This Field Type validates and stores structured rich text, and exposes it in several formats.

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
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
<td align="left"><pre><code>RichText</code></pre></td>
<td align="left"><pre><code>ezrichtext</code></pre></td>
<td align="left"><pre><code>mixed</code></pre></td>
</tr>
</tbody>
</table>

## PHP API Field Type 

### Input expectations

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
<td align="left"><pre><code>string</code></pre></td>
<td align="left">XML document in one of the Field Type's input formats as a string.</td>
<td align="left">See the example below.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>DOMDocument</code></pre></td>
<td align="left"><p>XML document in one of the Field Type's input formats as a</p>
<p><strong><code>DOMDocument</code></strong> object.</p></td>
<td align="left">See the example below.</td>
</tr>
<tr class="odd">
<td align="left"><pre><code>eZ\Publish\Core\FieldType\RichText\Value</code></pre></td>
<td align="left">An instance of the Field Type's <strong><code>Value</code></strong> object.</td>
<td align="left">See the example below.</td>
</tr>
</tbody>
</table>

##### Input formats

Field Type works with XML and also expects an XML value as input, whether as a string, DOMDocument object or Field Type's Value object. When the value is given as a string or a DOMDocument object, it will be checked for conformance with one of the supported input formats, then dispatched to the appropriate converter, to be converted to the Field Type's internal format. No conversion will be performed if providing the value in Field Type's internal format or as Field Type's Value object. In the latter case it will be expected that Value object holds the value in Field Type's internal format.

Currently supported input formats are described in the table below:

| Name                       | Description                                                                               |
|----------------------------|-------------------------------------------------------------------------------------------|
| eZ Publish Docbook variant | FieldType's internal format                                                               |
| XHTML5 editing format      | Typically used with in-browser HTML editor                                                |
| Legacy eZXML format        | Compatibility with legacy eZXML format, used by  [XmlText Field Type](XmlText_Field_Type) |

##### Example of the Field Type's internal format

```
<?xml version="1.0" encoding="UTF-8"?>
<section xmlns="http://docbook.org/ns/docbook"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         xmlns:ezxhtml="http://ez.no/xmlns/ezpublish/docbook/xhtml"
         xmlns:ezcustom="http://ez.no/xmlns/ezpublish/docbook/custom"
         version="5.0-variant ezpublish-1.0">
    <title ezxhtml:level="2">This is a title.</title>
    <para ezxhtml:class="paraClass">This is a paragraph.</para>
</section>
```

##### Example of the Field Type's XHTML5 edit format

This format is used by eZ Platform Online Editor and will change with its needs as we continue to evolve this part of the UI.

```
<?xml version="1.0" encoding="UTF-8"?>
<section xmlns="http://ez.no/namespaces/ezpublish5/xhtml5/edit">
    <h2>This is a title.</h2>
    <p class="paraClass">This is a paragraph.</p>
</section>
```

For more information about internal format and input formats, see [Field Type's conversion test fixtures on GitHub](https://github.com/ezsystems/ezpublish-kernel/tree/master/eZ/Publish/Core/FieldType/Tests/RichText/Converter/Xslt/_fixtures).

For example, ezxml does not use explicit level attributes for &lt;header&gt; elements, instead &lt;header&gt; element levels are indicated through the level of nesting inside &lt;section&gt; elements.

##### Example of using XML document in internal format as a string

```
...
 
$contentService = $repository->getContentService();
$contentTypeService = $repository->getContentTypeService();
 
$contentType = $contentTypeService->loadContentTypeByIdentifier( "article" );
$contentCreateStruct = $contentService->newContentCreateStruct( $contentType, "eng-GB" );
 
$inputString = <<<DOCBOOK
<?xml version="1.0" encoding="UTF-8"?>
<section xmlns="http://docbook.org/ns/docbook"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         xmlns:ezxhtml="http://ez.no/xmlns/ezpublish/docbook/xhtml"
         xmlns:ezcustom="http://ez.no/xmlns/ezpublish/docbook/custom"
         version="5.0-variant ezpublish-1.0">
    <title ezxhtml:level="2">This is a title.</title>
    <para ezxhtml:class="paraClass">This is a paragraph.</para>
</section>
DOCBOOK;
 
$contentCreateStruct->setField( "description", $inputString );
 
...
```

### Value object

eZ\\Publish\\Core\\FieldType\\RichText\\Value offers following properties:

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
<td align="left"><pre><code>xml</code></pre></td>
<td align="left"><pre><code>DOMDocument</code></pre></td>
<td align="left">Internal format value as an instance of DOMDocument.</td>
</tr>
</tbody>
</table>

## REST API specifics

### Creating or updating Content

When creating RichText content with the REST API, it is possible to provide data as a string, using the "xml" fieldValue key:

```
<fieldValue>
    <value key="xml">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;section xmlns="http://docbook.org/ns/docbook" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ezxhtml="http://ez.no/xmlns/ezpublish/docbook/xhtml" xmlns:ezcustom="http://ez.no/xmlns/ezpublish/docbook/custom" version="5.0-variant ezpublish-1.0"&gt;
&lt;title ezxhtml:level="2"&gt;This is a title.&lt;/title&gt;
&lt;/section&gt;
</value>
</fieldValue>
```

When the value given over REST API is transformed into a Field Type's Value object, it will be treated as a string. This means you can use any supported input format for input over REST API.

For further informations [about the internal implementation of RichText Field Type, see in the doc/ directory](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rich_text/ezdocbook.md)

 


