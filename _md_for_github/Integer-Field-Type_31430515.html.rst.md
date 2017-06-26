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
**Developer : Integer Field Type**

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
This Field Type represents an integer value.

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
<td align="left"><code>Integer</code></td>
<td align="left"><code>ezinteger</code></td>
<td align="left"><code>integer</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type stores numeric values which will be provided as integers.

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
<td align="left"><code>integer</code></td>
<td align="left"><code>2397</code></td>
</tr>
</tbody>
</table>

</div>
**Value object**

**Properties**

The Value class of this field type contains the following properties:

<div class="table-wrap">
<table>
<colgroup>
<col width="14%" />
<col width="11%" />
<col width="73%" />
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
<td align="left"><code>$value</code></td>
<td align="left"><code>int</code></td>
<td align="left">This property will be used to store the value provided as an integer.</td>
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
$integer->value = 8
```

</div>
</div>
**Constructor**

The `Integer``\Value` constructor will initialize a new Value object with the value provided. It expects a numeric, integer value.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Integer;
 
// Instantiates a Integer Value object
$integerValue = new Integer\Value( 8 );
```

</div>
</div>
**Hash format**

Hash value of this Field Type is simply integer value as a string.

Example:

> `"8"`

**String representation**

String representation of the Field Type's value will return the integer value as a string.

Example:

> `"8"`

**Validation**

This Field Type supports `IntegerValueValidator`, defining maximal and minimal float value:

<div class="table-wrap">
<table>
<colgroup>
<col width="15%" />
<col width="7%" />
<col width="26%" />
<col width="50%" />
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
<td align="left"><code>minIntegerValue</code></td>
<td align="left"><code>int</code></td>
<td align="left"><code>0</code></td>
<td align="left">This setting defines the minimum value this FieldType will allow as input.</td>
</tr>
<tr class="even">
<td align="left"><code>maxIntegerValue</code></td>
<td align="left"><code>int</code></td>
<td align="left"><code>false  /</code> V1.5.2, V1.6.1 <code>null</code></td>
<td align="left">This setting defines the maximum value this FieldType will allow as input.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of validator configuration in PHP**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$validatorConfiguration = array(
    "minIntegerValue" => 1,
    "maxIntegerValue" => 24
);
```

</div>
</div>
**Settings**

This Field Type does not support settings.

 

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

