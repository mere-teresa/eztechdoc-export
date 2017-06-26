1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and
    Fields](31430275.html)</span>
7.  <span>[Field Types
    reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : DateAndTime Field Type </span> {#title-heading .pagetitle}
=================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Feb 23, 2017

This Field Type represents a full date including time information.

| Name          | Internal name | Expected input type |
|---------------|---------------|---------------------|
| `DateAndTime` | `ezdatetime`  | `mixed`             |

Description {#DateAndTimeFieldType-Description}
-----------

This Field Type makes possible to store and retrieve a full date
including time information.

PHP API Field Type  {#DateAndTimeFieldType-PHPAPIFieldType}
-------------------

### Input expectations {#DateAndTimeFieldType-Inputexpectations}

If input value is of type **`string`** or **`integer`**, it will be
passed directly to the [PHP’s built-in **`\DateTime`** class
constructor](http://www.php.net/manual/en/datetime.construct.php){.external-link},
therefore the same input format expectations apply.

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

### Value object {#DateAndTimeFieldType-Valueobject}

##### Properties {#DateAndTimeFieldType-Properties}

The Value class of this field type contains the following properties:

| Property | Type        | Description                                                |
|----------|-------------|------------------------------------------------------------|
| `$value` | `\DateTime` | The date and time value as an instance of **`\DateTime`**. |

##### Constructor {#DateAndTimeFieldType-Constructor}

The constructor for this value object will initialize a new Value object
with the value provided. It accepts an instance of PHP’s
built-in **`\DateTime`** class.

##### String representation {#DateAndTimeFieldType-Stringrepresentation}

String representation of the date value will generate the date string in
the format “D Y-d-m H:i:s” as accepted by [PHP’s
built-in **`date()`** function](http://www.php.net/manual/en/function.date.php){.external-link}.

Example:

> `Wed 2013-22-05 12:19:18`
>
> ``

### Hash format {#DateAndTimeFieldType-Hashformat}

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
<th align="left">Key</th>
<th align="left">Type</th>
<th align="left">Description</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>timestamp</code></p></td>
<td align="left"><code>integer</code></td>
<td align="left">Time information as a <a href="http://en.wikipedia.org/wiki/Unix_time" class="external-link">timestamp</a>.</td>
<td align="left"><p><code>1400856992</code></p></td>
</tr>
<tr class="even">
<td align="left"><p><code>rfc850</code></p></td>
<td align="left"><code>string</code></td>
<td align="left"><p>Time information as a string in <a href="http://tools.ietf.org/html/rfc850" class="external-link">RFC 850 date format</a>.</p>
<p>As input, this will have higher precedence over the <strong><code>timestamp</code></strong> value.</p></td>
<td align="left"><code>&quot;Friday, 23-May-14 14:56:14 GMT+0000&quot;</code></td>
</tr>
</tbody>
</table>

~~~~ brush:
$hash = array(
    "timestamp" => 1400856992,
    "rfc850" => "Friday, 23-May-14 14:56:14 GMT+0000"
);
~~~~

### Validation {#DateAndTimeFieldType-Validation}

This Field Type does not perform any special validation of the input
value.

### Settings {#DateAndTimeFieldType-Settings}

The field definition of this Field Type can be configured with several
options:

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
<td align="left"><code>useSeconds</code></td>
<td align="left"><code>boolean</code></td>
<td align="left"><code>false</code></td>
<td align="left">Used to control displaying of seconds in the output.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>defaultType</code></pre></td>
<td align="left"><pre><code>mixed</code></pre></td>
<td align="left"><pre><code>Type::DEFAULT_EMPTY</code></pre></td>
<td align="left"><p>One of the <strong><code>DEFAULT_*</code></strong> constants, used by the administration interface for setting the default field value.</p>
<p>See below for more details.</p></td>
</tr>
<tr class="odd">
<td align="left"><pre><code>dateInterval</code></pre></td>
<td align="left"><pre><code>null|\DateInterval</code></pre></td>
<td align="left"><pre><code>null</code></pre></td>
<td align="left"><p>This setting complements <strong><code>defaultType</code></strong> setting and can be used only when latter is set to <strong><code>Type::DEFAULT_CURRENT_DATE_ADJUSTED</code></strong>.</p>
<p>In that case the default input value when using administration interface will be adjusted by the given <strong><code>\DateInterval</code></strong>.</p></td>
</tr>
</tbody>
</table>

<span style="color: rgb(0,0,0);">Following **`defaultType`** default
value options are available as constants in
the </span>**`eZ\Publish\Core\FieldType\DateAndTime\Type`**<span
style="color: rgb(0,0,0);">** **class:</span>

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
<tr class="odd">
<td align="left"><pre><code>DEFAULT_CURRENT_DATE_ADJUSTED</code></pre></td>
<td align="left"><span><span>Default value will use current date, adjusted by the interval defined in </span></span><strong><code>dateInterval</code></strong><span style="line-height: 1.4285715;"> setting</span><span style="line-height: 1.4285715;">.</span></td>
</tr>
</tbody>
</table>

**DateAndTime FieldType example settings**

~~~~ brush:
use eZ\Publish\Core\FieldType\DateAndTime\Type;

$settings = array(
    "useSeconds" => false,
    "defaultType" => Type::DEFAULT_EMPTY,
    "dateInterval" => null
);
~~~~

Template rendering {#DateAndTimeFieldType-Templaterendering}
------------------

The template called by [the **ez\_render\_field()** Twig
function](ez_render_field_32114041.html) while rendering a Date field
has access to the following parameters:

| Parameter | Type     | Default | Description                                                                                                                       |
|-----------|----------|---------|-----------------------------------------------------------------------------------------------------------------------------------|
| `locale`  | `string` |         | Internal parameter set by the system based on current request locale or if not set calculated based on the language of the field. |

Example:

~~~~ brush:
{{ ez_render_field(content, 'datetime') }}
~~~~

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


