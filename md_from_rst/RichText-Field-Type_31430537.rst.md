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
**Developer : RichText Field Type**

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
This Field Type validates and stores structured rich text, and exposes
it in several formats.

<div class="table-wrap">
+--------------------------+--------------------------+--------------------------+
| Name                     | Internal name            | Expected input           |
+==========================+==========================+==========================+
|     RichText             |     ezrichtext           |     mixed                |
+--------------------------+--------------------------+--------------------------+

</div>
**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
+--------------------------+--------------------------+--------------------------+
| Type                     | Description              | Example                  |
+==========================+==========================+==========================+
|     string               | XML document in one of   | See the example below.   |
|                          | the Field Type’s input   |                          |
|                          | formats as a string.     |                          |
+--------------------------+--------------------------+--------------------------+
|     DOMDocument          | XML document in one of   | See the example below.   |
|                          | the Field Type’s input   |                          |
|                          | formats as a             |                          |
|                          |                          |                          |
|                          | **`DOMDocument`**        |                          |
|                          | object.                  |                          |
+--------------------------+--------------------------+--------------------------+
|     eZ\Publish\Core\Fiel | An instance of the Field | See the example below.   |
|                          | Type’s **`Value`** o     |                          |
| dTypeRichTextValue       | bject.                   |                          |
+--------------------------+--------------------------+--------------------------+

</div>
**Input formats**

Field Type works with XML and also expects an XML value as input,
whether as a string, **`DOMDocument`** object or Field
Type’s **`Value`** object. When the value is given as a string or a
**`DOMDocument`** object, it will be checked for conformance with one of
the supported input formats, then dispatched to the appropriate
converter, to be converted to the Field Type’s internal format. No
conversion will be performed if providing the value in Field Type’s
internal format or as Field Type’s **`Value`** object. In the latter
case it will be expected that **`Value`** object holds the value in
Field Type’s internal format.

Currently supported input formats are described in the table below:

<div class="table-wrap">
  ------------------------------------------------------------------------
  Name            Description
  --------------- --------------------------------------------------------
  eZ Publish      FieldType’s internal format
  Docbook variant 

  XHTML5 editing  Typically used with in-browser HTML editor
  format          

  Legacy eZXML    Compatibility with legacy eZXML format, used by
  format           [XmlText Field Type](XmlText-Field-Type_31430551.html)
                  
  ------------------------------------------------------------------------

</div>
**Example of the Field Type’s internal format**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

</div>
</div>
**Example of the Field Type’s XHTML5 edit format**

<div
class="confluence-information-macro confluence-information-macro-warning">
<div class="confluence-information-macro-body">
This format is used by eZ Platform Online Editor and will change with
its needs as we continue to evolve this part of the UI.

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<?xml version="1.0" encoding="UTF-8"?>
<section xmlns="http://ez.no/namespaces/ezpublish5/xhtml5/edit">
    <h2>This is a title.</h2>
    <p class="paraClass">This is a paragraph.</p>
</section>
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
For more information about internal format and input formats, see [Field
Type’s conversion test fixtures on
GitHub](https://github.com/ezsystems/ezpublish-kernel/tree/master/eZ/Publish/Core/FieldType/Tests/RichText/Converter/Xslt/_fixtures).

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
For example, ezxml does not use explicit level attributes for
&lt;header&gt; elements, instead &lt;header&gt; element levels are
indicated through the level of nesting inside &lt;section&gt; elements.

</div>
</div>
**Example of using XML document in internal format as a string**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

</div>
</div>
**Value object**

**`eZ\Publish\Core\FieldType\RichText\Value`** offers following
properties:

<div class="table-wrap">
+--------------------------+--------------------------+--------------------------+
| Property                 | Type                     | Description              |
+==========================+==========================+==========================+
|     xml                  |     DOMDocument          | Internal format value as |
|                          |                          | an instance              |
|                          |                          | of `DOMDocument`.        |
+--------------------------+--------------------------+--------------------------+

</div>
**REST API specifics**

**Creating or updating Content**

When creating RichText content with the REST API, it is possible to
provide data as a string, using the “`xml`” fieldValue key:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<fieldValue>
    <value key="xml">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;section xmlns="http://docbook.org/ns/docbook" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:ezxhtml="http://ez.no/xmlns/ezpublish/docbook/xhtml" xmlns:ezcustom="http://ez.no/xmlns/ezpublish/docbook/custom" version="5.0-variant ezpublish-1.0"&gt;
&lt;title ezxhtml:level="2"&gt;This is a title.&lt;/title&gt;
&lt;/section&gt;
</value>
</fieldValue>
```

</div>
</div>
When the value given over REST API is transformed into a Field
Type’s **`Value`** object, it will be treated as a string. This means
you can use any supported input format for input over REST API.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
For further informations [about the internal implementation of RichText
Field Type, see in the doc/
directory](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/rich_text/ezdocbook.md)

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

