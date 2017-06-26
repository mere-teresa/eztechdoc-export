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
**Developer : RelationList Field Type**

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
This Field Type represents one or multiple relations to content.

<div class="table-wrap">
<table style="width:96%;">
<colgroup>
<col width="29%" />
<col width="40%" />
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
<td align="left"><code>RelationList</code></td>
<td align="left"><code>ezobjectrelationlist</code></td>
<td align="left"><code>mixed</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type makes possible to store and retrieve values of relation to content.

**PHP API Field Type **

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
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-he ader-inner&quot;&gt; Type .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-he ader-inner&quot;&gt; Description .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-he ader-inner&quot;&gt; Example .. raw:: html &lt;/div&gt;</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>int|string</code></td>
<td align="left">Id of the related Content item</td>
<td align="left"><code>42</code></td>
</tr>
<tr class="even">
<td align="left"><code>array</code></td>
<td align="left">An array of related Content IDs</td>
<td align="left"><code>array( 24, 42 )</code></td>
</tr>
<tr class="odd">
<td align="left"><pre><code>eZ\Publish\API\Repos</code></pre>
itoryValuesContentCon tentInfo</td>
<td align="left">ContentInfo instance of the related Content</td>
<td align="left"> </td>
</tr>
<tr class="even">
<td align="left"><code>eZ\Publish\Core\FieldT ype\RelationList\Value</code></td>
<td align="left">RelationList Field Type Value Object</td>
<td align="left">See Value Object documentation section below.</td>
</tr>
</tbody>
</table>

</div>
**Value Object**

**Properties**

`eZ\Publish\Core\FieldType\RelationList\Value` contains following properties.

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
<td align="left"><code>destinationConte ntIds</code></td>
<td align="left"><code>array</code></td>
<td align="left">An array of related Content ids</td>
<td align="left">`array( 24, 42 ) `</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$relationList->destinationContentId = array( 
    $contentInfo1->id,
    $contentInfo2->id,
    170
);
```

</div>
</div>
**Constructor**

The `RelationList``\Value` constructor will initialize a new Value object with the value provided. It expects a mixed array as value.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
// Instantiates a RelationList Value object
$relationListValue = new RelationList\Value(
    array(
        $contentInfo1->id,
        $contentInfo2->id,
        170     
    )
);
```

</div>
</div>
**Validation**

This Field Type validates if the `selectionMethod` specified is 0 (`self::SELECTION_BROWSE)` or 1 (`self::SELECTION_DROPDOWN)`. A validation error is thrown if the value does not match.

Also validates if the `selectionDefaultLocation` specified is `null`, `string` or `integer`. If the type validation fails a validation error is thrown.

And validates if the value specified in `selectionContentTypes` is an array. If not, a validation error in given.

**Settings**

The field definition of this Field Type can be configured with following options:

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
<td align="left">`selectionMethod `</td>
<td align="left"><code>mixed</code></td>
<td align="left"><pre><code>SELECTION_BROW</code></pre>
SE</td>
<td align="left">Method of selection in the administration interface</td>
</tr>
<tr class="even">
<td align="left"><code>selectionDefault Location</code></td>
<td align="left"><code>string|integer</code></td>
<td align="left"><code>null</code></td>
<td align="left">Id of the default Location for the selection when using administration interface</td>
</tr>
<tr class="odd">
<td align="left"><code>selectionContent Types</code></td>
<td align="left"><code>array</code></td>
<td align="left"><code>array()</code></td>
<td align="left">An array of ContentType ids that are allowed for related Content</td>
</tr>
</tbody>
</table>

</div>
Following selection methods are available:

<div class="table-wrap">
<table>
<colgroup>
<col width="17%" />
<col width="82%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">SELECTION_BROWSE</td>
<td align="left">Selection will use browse mode</td>
</tr>
<tr class="even">
<td align="left">SELECTION_DROPDOWN</td>
<td align="left">Selection control will use dropdown control containing the Content list in the default Location for selection</td>
</tr>
</tbody>
</table>

</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
NOTE: Dropdown not implemented in Platform UI yet, only browse is used currently.

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using settings in PHP**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\RelationList\Type;

$settings = array(
    "selectionMethod" => Type::SELECTION_BROWSE,
    "selectionDefaultLocation" => null,
    "selectionContentTypes" => array()
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

