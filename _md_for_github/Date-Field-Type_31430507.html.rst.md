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
**Developer : Date Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Feb 23, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This Field Type represents a date without time information.

<div class="table-wrap">
<table style="width:76%;">
<colgroup>
<col width="18%" />
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
<td align="left"><code>Date</code></td>
<td align="left"><code>ezdate</code></td>
<td align="left"><code>mixed</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type makes it possible to store and retrieve date information.

**PHP API Field Type **

**Input expectations**

If input value is of type **`string`** or **`integer`**, it will be passed directly to the [PHP's built-in **`\DateTime`** class constructor](http://www.php.net/manual/en/datetime.construct.php), therefore the same input format expectations apply.

It is also possible to directly pass an instance of **`\DateTime`**.

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
<td align="left"><code>&quot;2012-08-28 12:20 Europe/Berlin&quot;</code></td>
</tr>
<tr class="even">
<td align="left"><pre><code>integer</code></pre></td>
<td align="left"><pre><code>1346149200</code></pre></td>
</tr>
<tr class="odd">
<td align="left"><pre><code>\DateTime</code></pre></td>
<td align="left"><pre><code>new \DateTime()</code></pre></td>
</tr>
</tbody>
</table>

</div>
<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Time information is **not stored**.

Before storing, the provided input value will be set to the the beginning of the day in the given or the environment timezone.

</div>
</div>
**Value object**

**Properties**

The Value class of this field type contains the following properties:

<div class="table-wrap">
<table>
<colgroup>
<col width="16%" />
<col width="21%" />
<col width="62%" />
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
<td align="left"><code>$date</code></td>
<td align="left"><code>\DateTime</code></td>
<td align="left">This property will be used for the text content.</td>
</tr>
</tbody>
</table>

</div>
**String representation**

String representation of the date value will generate the date string in the format "l d F Y" as accepted by [PHP's built-in **`date()`** function](http://www.php.net/manual/en/function.date.php).

Example:

> `Wednesday 22 May 2013`

**Constructor**

The constructor for this value object will initialize a new Value object with the value provided. It accepts an instance of [PHP's built-in **`\DateTime`** class](http://www.php.net/manual/en/datetime.construct.php).

**Hash format**

Hash value of this Field Type is an array with two keys:

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
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Key .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Type .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Description .. raw:: html &lt;/div&gt;</th>
<th align="left">.. raw:: html &lt;div class=&quot;tablesor ter-header-inner&quot;&gt; Example .. raw:: html &lt;/div&gt;</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>timestamp</code></td>
<td align="left"><code>integer</code></td>
<td align="left">Time information as a timestamp &lt;ht
tp://en.wikipedia.
org/wiki/Unix_time
&gt;__.</td>
<td align="left"><code>1400856992</code></td>
</tr>
<tr class="even">
<td align="left"><code>rfc850</code></td>
<td align="left"><code>string</code></td>
<td align="left"><p>Time information as a string in RFC 850 date
format &lt;http://too
ls.ietf.org/html/r
fc850&gt;__.</p>
<p>As input, this will have higher precedence over the <strong><code>timestam p</code></strong> value.</p></td>
<td align="left"><code>&quot;Friday, 23-May- 14 14:56:14 GMT+00 00&quot;</code></td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of the hash value in PHP**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$hash = array(
    "timestamp" => 1400856992,
    "rfc850" => "Friday, 23-May-14 14:56:14 GMT+0000"
);
```

</div>
</div>
**Validation**

This Field Type does not perform any special validation of the input value.

**Settings**

The field definition of this Field Type can be configured with one option:

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
<td align="left"><pre><code>defaultType</code></pre></td>
<td align="left"><pre><code>mixed</code></pre></td>
<td align="left"><pre><code>Type::DEFAULT_</code></pre>
EMPTY</td>
<td align="left"><p>One of the <strong><code>DEFAULT_ *</code></strong> constants, used by the administration interface for setting the default field value.</p>
<p>See below for more details.</p></td>
</tr>
</tbody>
</table>

</div>
Following **`defaultType`** default value options are available as constants in the **`eZ\Publish\Core\FieldType\Date\Type`***\* *\*class:

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
<td align="left"><pre><code>DEFAULT_EMPTY</code></pre></td>
<td align="left">Default value will be empty.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>DEFAULT_CURRENT_DATE</code></pre></td>
<td align="left">Default value will use current date.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Date FieldType example settings**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Date\Type;

$settings = array(
    "defaultType" => Type::DEFAULT_EMPTY
);
```

</div>
</div>
**Template rendering**

The template called by [the **ez\_render\_field()** Twig function](ez_render_field_32114041.html) while rendering a Date field has access to the following parameters:

<div class="table-wrap">
<table>
<colgroup>
<col width="8%" />
<col width="8%" />
<col width="6%" />
<col width="76%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Parameter</th>
<th align="left">Type</th>
<th align="left">Default</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>locale</code></td>
<td align="left"><code>string</code></td>
<td align="left"> </td>
<td align="left">Internal parameter set by the system based on current request locale or if not set calculated based on the language of the field.</td>
</tr>
</tbody>
</table>

</div>
Example:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
{{ ez_render_field(content, 'date') }}
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

