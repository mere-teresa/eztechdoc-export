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
**Developer : Relation Field Type**

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
This Field Type represents a relation to a Content item.

<div class="table-wrap">
<table style="width:85%;">
<colgroup>
<col width="23%" />
<col width="34%" />
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
<td align="left"><code>Relation</code></td>
<td align="left"><code>ezobjectrelation</code></td>
<td align="left"><code>mixed</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type makes it possible to store and retrieve the value of relation to a Content item.

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Type</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>string</code></td>
<td align="left"><pre><code>&quot;150&quot;</code></pre></td>
</tr>
<tr class="even">
<td align="left"><code>integer</code></td>
<td align="left"> 150</td>
</tr>
</tbody>
</table>

</div>
**Value object**

**Properties**

The Value class of this Field Type contains the following properties:

<div class="table-wrap">
<table>
<colgroup>
<col width="19%" />
<col width="15%" />
<col width="65%" />
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
<td align="left"><code>$destinationContentId</code></td>
<td align="left"><code>string|int|null</code></td>
<td align="left">This property will be used to store the value provided, which will represent the related content.</td>
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
$relation->destinationContentId = $contentInfo->id;
```

</div>
</div>
**Constructor**

The `Relation``\Value` constructor will initialize a new Value object with the value provided. It expects a mixed value.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
// Instantiates a Relation Value object
$relationValue = new Relation\Value( $contentInfo->id );
```

</div>
</div>
**Validation**

This Field Type validates whether the provided relation exists, but before it does that it will check that the value is either string or int.

**Settings**

The field definition of this Field Type can be configured with two options:

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
<td align="left"><code>int</code></td>
<td align="left"><code>self::SELECTION_ BROWSE</code></td>
<td align="left"><p>This setting defines the selection method. It expects an integer (0/1). 0 stands for <code>self::SELECTION_ BROWSE</code>, 1 stands for <code>self::SELECTION_ DROPDOWN</code>.</p>
<p> </p>
<div
class="confluen
<p>ce-information-mac ro confluence-info rmation-macro-info rmation&quot;&gt;</p>
<div
class="confluen
<p>ce-information-mac ro-body&quot;&gt;</p>
<p>NOTE: Dropdown not implemented in Platform UI yet, only browse is used currently.</p>
</div>
</div></td>
</tr>
<tr class="even">
<td align="left"><code>selectionRoot</code></td>
<td align="left"><code>string</code></td>
<td align="left"><code>null</code></td>
<td align="left">This setting defines the selection root.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Relation FieldType example settings**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Relation\Type;

$settings = array(
    "selectionMethod" => 1,
    "selectionRoot" => null
);
```

</div>
</div>
Note: These settings are meant for future use in user interface when allowing users to select relations.

 

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

