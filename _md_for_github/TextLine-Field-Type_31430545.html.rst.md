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
**Developer : TextLine Field Type**

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
This Field Type represents a simple string.

<div class="table-wrap">
<table style="width:82%;">
<colgroup>
<col width="23%" />
<col width="25%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Internal name</th>
<th align="left">Expected input type</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>TextLine</code></td>
<td align="left"><code>ezstring</code></td>
<td align="left"><code>string</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type makes possible to store and retrieve a single line of unformatted text. It is capable of handling up to 255 number of characters.

**PHP API Field Type**

**Value object**

**Properties**

The Value class of this Field Type contains the following properties:

<div class="table-wrap">
<table>
<colgroup>
<col width="17%" />
<col width="18%" />
<col width="64%" />
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
<td align="left"><code>$text</code></td>
<td align="left"><code>string</code></td>
<td align="left">This property will be used for the text content.</td>
</tr>
</tbody>
</table>

</div>
**String representation**

A TextLine's string representation is the the $text property's value, as a string.

**Constructor**

The constructor for this value object will initialize a new Value object with the value provided. It accepts a string as argument and will import it to the `text` attribute.

**Validation**

The input passed into this filed type is subject of validation by the `StringLengthValidator` validator. The length of the string provided must be between the minimum length defined in `minStringLength` and the maximum defined in `maxStringLength`. The default value for both properties is 0, which means that the validation is disabled by default.
To set the validation properties the `validateValidatorConfiguration()` method needs to be inspected, which will receive an array with `minStringLength` and `maxStringLength` like in the following representation:

<div class="preformatted panel" style="border-width: 1px;">
<div class="preformattedContent panelContent">
    Array
    (
        [minStringLength] => 1
        [maxStringLength] => 60
    )

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

