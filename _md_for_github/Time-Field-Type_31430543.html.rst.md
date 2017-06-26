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
**Developer : Time Field Type**

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
This Field Type represents time information.

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
<td align="left"><code>Time</code></td>
<td align="left"><code>eztime</code></td>
<td align="left"><code>mixed</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type makes possible to store and retrieve time information.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Date information is **not stored**.

What is stored is the number of seconds, calculated from the beginning of the day in the given or the environment timezone.

</div>
</div>
**PHP API Field Type**

**Input expectations**

If input value is of type **`string`** or **`integer`**, it will be passed directly to the [PHP's built-in **`\DateTime`** class](http://www.php.net/manual/en/datetime.construct.php) constructor, therefore the same input format expectations apply.

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
**Value object**

**Properties**

The Value class of this field type contains the following properties:

<div class="table-wrap">
<table>
<colgroup>
<col width="11%" />
<col width="17%" />
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
<td align="left"><code>$time</code></td>
<td align="left"><code>integer|null</code></td>
<td align="left">Holds the time information as a number of seconds since the beginning of the day.</td>
</tr>
</tbody>
</table>

</div>
**Constructor**

The constructor for this value object will initialize a new Value object with the value provided. It accepts an integer representing the number of seconds since the beginning of the day.

**String representation**

String representation of the date value will generate the date string in the format "H:i:s" as accepted by [PHP's built-in **`date()`** function](http://www.php.net/manual/en/function.date.php).

Example:

> `"12:14:56"`

**Hash format**

Value in hash format is an integer representing a number of seconds since the beginning of the day.

Example:

> `36000`

**Validation**

This Field Type does not perform validation of the input value.

**Settings**

The field definition of this Field Type can be configured with several options:

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
<td align="left"><pre><code>useSeconds</code></pre></td>
<td align="left"><code>boolean</code></td>
<td align="left"><code>false</code></td>
<td align="left">Used to control displaying of seconds in the output.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>defaultType</code></pre></td>
<td align="left"><pre><code>Type::DEFAULT_</code></pre>
<dl>
<dt>EMPTY</dt>
<dd><p>Type::DEFAULT_</p>
</dd>
</dl>
CURRENT_TIME</td>
<td align="left"><pre><code>Type::DEFAULT_</code></pre>
EMPTY</td>
<td align="left">The constant used here defines default input value when using administration interface.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Time Field Type example settings**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\FieldType\Time\Type;

$settings = array(
    "defaultType" => DateAndTime::DEFAULT_EMPTY
);
```

</div>
</div>
**Template rendering**

The template called by [the **ez\_render\_field()** Twig function](Content-Rendering_31429679.html) while rendering a Date field has access to the following parameters:

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
{{ ez_render_field(content, 'time') }}
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

