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
**Developer : Rating Field Type**

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
This Field Type is used to provide rating functionality.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Rating Field Type does not provide the APIs for actual rating, this part is provided by Legacy Stack extension that can be found at <https://github.com/ezsystems/ezstarrating>.

</div>
</div>
<div class="table-wrap">
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
<td align="left"><code>Rating</code></td>
<td align="left"><code>ezsrrating</code></td>
<td align="left"><code>boolean</code></td>
</tr>
</tbody>
</table>

</div>
**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
<table style="width:100%;">
<colgroup>
<col width="20%" />
<col width="62%" />
<col width="16%" />
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
<td align="left"><code>boolean</code></td>
<td align="left">Denotes if the rating is enabled or disabled</td>
<td align="left"><code>true</code></td>
</tr>
</tbody>
</table>

</div>
**Value Object**

**Properties**

**`eZ\Publish\Core\FieldType\Rating\Value`** offers the following properties.

<div class="table-wrap">
<table>
<colgroup>
<col width="19%" />
<col width="16%" />
<col width="50%" />
<col width="13%" />
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
<td align="left"><code>isDisabled</code></td>
<td align="left"><code>boolean</code></td>
<td align="left">Denotes if the rating is enabled or disabled</td>
<td align="left"><code>true</code></td>
</tr>
</tbody>
</table>

</div>
**Hash format**

Hash matches the Value Object, having only one property:

-   `isDisabled`

**Settings**

The Field Type does not support settings.

**Validation**

The Field Type does not support validation.

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
