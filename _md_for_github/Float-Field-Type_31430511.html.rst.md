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
**Developer : Float Field Type**

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
This Field Type represents a float value.

<div class="table-wrap">
<table style="width:71%;">
<colgroup>
<col width="19%" />
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
<td align="left"><code>Float</code></td>
<td align="left"><code>ezfloat</code></td>
<td align="left"><code>float</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type stores numeric values which will be provided as floats.

**PHP API Field Type **

**Input expectations**

The Field Type expects a number as input. Both decimal and integer numbers are accepted.

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
<td align="left"><code>float</code></td>
<td align="left"><code>194079.572</code></td>
</tr>
<tr class="even">
<td align="left"><code>int</code></td>
<td align="left"><code>144</code></td>
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
<col width="15%" />
<col width="14%" />
<col width="71%" />
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
<td align="left"><code>float</code></td>
<td align="left">This property will be used to store the value provided as a float.</td>
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
use eZ\Publish\Core\FieldType\Float\Type;

// Instantiates a Float Value object
$floatValue = new Type\Value();

$float->value = 284.773
```

</div>
</div>
**Constructor**

The `Float``\Value` constructor will initialize a new Value object with the value provided. It expects a numeric value with or without decimals.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Float\Type;

// Instantiates a Float Value object
$floatValue = new Type\Value( 284.773 );
```

</div>
</div>
**Validation**

This Field Type supports `FloatValueValidator`, defining maximal and minimal float value:

<div class="table-wrap">
<table>
<colgroup>
<col width="16%" />
<col width="10%" />
<col width="13%" />
<col width="59%" />
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
<td align="left"><code>minFloatValue</code></td>
<td align="left"><code>float</code></td>
<td align="left"><code>null</code></td>
<td align="left">This setting defines the minimum value this FieldType will allow as input.</td>
</tr>
<tr class="even">
<td align="left"><code>maxFloatValue</code></td>
<td align="left"><code>float</code></td>
<td align="left"><code>null</code></td>
<td align="left">This setting defines the maximum value this FieldType will allow as input.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Validator configuration example in PHP**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Float\Type;

$contentTypeService = $repository->getContentTypeService();
$floatFieldCreateStruct = $contentTypeService->newFieldDefinitionCreateStruct( "float", "ezfloat" );

// Accept only numbers between 0.1 and 203.99
$floatFieldCreateStruct->validatorConfiguration = array(
    "FileSizeValidator" => array(  
        "minFloatValue" => 0.1,
        "maxFloatValue" => 203.99
    )
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

