1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and Fields](31430275.html)</span>
7.  <span>[Field Types reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : Date Field Type </span>
==========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Feb 23, 2017

This Field Type represents a date without time information.

| Name   | Internal name | Expected input type |
|--------|---------------|---------------------|
| `Date` | `ezdate`      | `mixed`             |

Description
-----------

This Field Type makes it possible to store and retrieve date information.

#### PHP API Field Type 

### Input expectations

If input value is of type **`string`** or **`integer`**, it will be passed directly to the <a href="http://www.php.net/manual/en/datetime.construct.php" class="external-link">PHP's built-in <strong><code>\DateTime</code></strong> class constructor</a>, therefore the same input format expectations apply.

It is also possible to directly pass an instance of **`\DateTime`**.

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

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Time information is **not stored**.

Before storing, the provided input value will be set to the the beginning of the day in the given or the environment timezone.

### Value object

##### Properties

The Value class of this field type contains the following properties:

| Property | Type        | Description                                      |
|----------|-------------|--------------------------------------------------|
| `$date`  | `\DateTime` | This property will be used for the text content. |

##### String representation

String representation of the date value will generate the date string in the format "l d F Y" as accepted by <a href="http://www.php.net/manual/en/function.date.php" class="external-link">PHP's built-in <strong><code>date()</code></strong> function</a>.

Example:

> `Wednesday 22 May 2013`

##### Constructor

The constructor for this value object will initialize a new Value object with the value provided. It accepts an instance of <a href="http://www.php.net/manual/en/datetime.construct.php" class="external-link">PHP's built-in <strong><code>\DateTime</code></strong> class</a>.

### Hash format

Hash value of this Field Type is an array with two keys:

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div class="tablesorter-header-inner">
Key
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Type
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Description
</div></th>
<th align="left"><div class="tablesorter-header-inner">
Example
</div></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>timestamp</code></p></td>
<td align="left"><code>integer</code></td>
<td align="left">Time information as a <a href="http://en.wikipedia.org/wiki/Unix_time" class="external-link">timestamp</a>.</td>
<td align="left"><p><code>1400856992</code></p></td>
</tr>
<tr class="even">
<td align="left"><p><code>rfc850</code></p></td>
<td align="left"><code>string</code></td>
<td align="left"><p>Time information as a string in <a href="http://tools.ietf.org/html/rfc850" class="external-link">RFC 850 date format</a>.</p>
<p>As input, this will have higher precedence over the <strong><code>timestamp</code></strong> value.</p></td>
<td align="left"><code>&quot;Friday, 23-May-14 14:56:14 GMT+0000&quot;</code></td>
</tr>
</tbody>
</table>

**Example of the hash value in PHP**

``` brush:
$hash = array(
    "timestamp" => 1400856992,
    "rfc850" => "Friday, 23-May-14 14:56:14 GMT+0000"
);
```

### Validation

This Field Type does not perform any special validation of the input value.

### Settings

The field definition of this Field Type can be configured with one option:

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
<td align="left"><pre><code>Type::DEFAULT_EMPTY</code></pre></td>
<td align="left"><p>One of the <strong><code>DEFAULT_*</code></strong> constants, used by the administration interface for setting the default field value.</p>
<p>See below for more details.</p></td>
</tr>
</tbody>
</table>

<span style="color: rgb(0,0,0);">Following **`defaultType`** default value options are available as constants in the </span>**`eZ\Publish\Core\FieldType\Date\Type`**<span style="color: rgb(0,0,0);">** **class:</span>

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

**Date FieldType example settings**

``` brush:
use eZ\Publish\Core\FieldType\Date\Type;

$settings = array(
    "defaultType" => Type::DEFAULT_EMPTY
);
```

Template rendering
------------------

The template called by [the **ez\_render\_field()** Twig function](ez_render_field_32114041.html) while rendering a Date field has access to the following parameters:

| Parameter | Type     | Default | Description                                                                                                                       |
|-----------|----------|---------|-----------------------------------------------------------------------------------------------------------------------------------|
| `locale`  | `string` |         | Internal parameter set by the system based on current request locale or if not set calculated based on the language of the field. |

Example:

``` brush:
{{ ez_render_field(content, 'date') }}
```

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


