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
**Developer : TextBlock Field Type**

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
This Field Type represents a block of unformatted text.

<div class="table-wrap">
<table style="width:83%;">
<colgroup>
<col width="25%" />
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
<td align="left"><code>TextBlock</code></td>
<td align="left"><code>eztext</code></td>
<td align="left"><code>string</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

The Field Type handles a block of multiple lines of unformatted text. It is capable of handling up to 16,777,216 characters.

**PHP API Field Type**

**Input expectations**

<div class="table-wrap">
<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-header-inner&quot;&gt; Type .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-header-inner&quot;&gt; Example .. raw:: html &lt;/div&gt;</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>string</code></td>
<td align="left"><pre><code>&quot;This is a block of unformatted</code></pre>
text&quot;</td>
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
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-he ader-inner&quot;&gt; Property .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-he ader-inner&quot;&gt; Type .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesorter-he ader-inner&quot;&gt; Description .. raw:: html &lt;/div&gt;</th>
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

A TextBlock's string representation is the the $text property's value, as a string.

**Constructor**

The constructor for this value object will initialize a new Value object with the value provided. It accepts a string as argument and will import it to the `$text` attribute.

**Validation**

This Field Type does not perform any special validation of the input value.

**Settings**

Settings contain only one option:

<div class="table-wrap">
<table>
<colgroup>
<col width="13%" />
<col width="12%" />
<col width="14%" />
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
<td align="left"><code>textRows</code></td>
<td align="left"><code>integer</code></td>
<td align="left"><code>10</code></td>
<td align="left">Number of rows for the editing control in the administration interface.</td>
</tr>
</tbody>
</table>

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
