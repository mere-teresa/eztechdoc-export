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

<span id="title-text"> Developer : Time Field Type </span> {#title-heading .pagetitle}
==========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Feb 23, 2017

This Field Type represents time information.

| Name   | Internal name | Expected input type |
|--------|---------------|---------------------|
| `Time` | `eztime`      | `mixed`             |

Description {#TimeFieldType-Description}
-----------

This Field Type makes possible to store and retrieve time information.

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Date information is **not stored**.

What is stored is the number of seconds, calculated from the beginning
of the day in the given or the environment timezone.

PHP API Field Type {#TimeFieldType-PHPAPIFieldType}
------------------

### Input expectations {#TimeFieldType-Inputexpectations}

If input value is of type **`string`** or **`integer`**, it will be
passed directly to the [PHP’s built-in **`\DateTime`**
class](http://www.php.net/manual/en/datetime.construct.php){.external-link}
constructor, therefore the same input format expectations apply.

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

### Value object {#TimeFieldType-Valueobject}

##### Properties {#TimeFieldType-Properties}

The Value class of this field type contains the following properties:

| Property | Type           | Description                                                                       |
|----------|----------------|-----------------------------------------------------------------------------------|
| `$time`  | `integer|null` | Holds the time information as a number of seconds since the beginning of the day. |

##### Constructor {#TimeFieldType-Constructor}

The constructor for this value object will initialize a new Value object
with the value provided. It accepts an integer representing the number
of seconds since the beginning of the day.

##### String representation {#TimeFieldType-Stringrepresentation}

String representation of the date value will generate the date string in
the format “H:i:s” as accepted by [PHP’s
built-in **`date()`** function](http://www.php.net/manual/en/function.date.php){.external-link}.

Example:

> `"12:14:56"`

### Hash format {#TimeFieldType-Hashformat}

Value in hash format is an integer representing<span> a number of
seconds since the beginning of the day.</span>

<span>Example:</span>

> `36000`

### Validation {#TimeFieldType-Validation}

This Field Type does not perform validation of the input value.

### Settings {#TimeFieldType-Settings}

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
<td align="left"><pre><code>useSeconds</code></pre></td>
<td align="left"><code>boolean</code></td>
<td align="left"><code>false</code></td>
<td align="left">Used to control displaying of seconds in the output.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>defaultType</code></pre></td>
<td align="left"><pre><code>Type::DEFAULT_EMPTY
Type::DEFAULT_CURRENT_TIME</code></pre></td>
<td align="left"><pre><code>Type::DEFAULT_EMPTY</code></pre></td>
<td align="left">The constant used here defines default input value when using administration interface.</td>
</tr>
</tbody>
</table>

**Time Field Type example settings**

~~~~ brush:
use eZ\Publish\Core\FieldType\Time\Type;

$settings = array(
    "defaultType" => DateAndTime::DEFAULT_EMPTY
);
~~~~

Template rendering {#TimeFieldType-Templaterendering}
------------------

The template called by [the **ez\_render\_field()** Twig
function](Content-Rendering_31429679.html) while rendering a Date field
has access to the following parameters:

| Parameter | Type     | Default | Description                                                                                                                       |
|-----------|----------|---------|-----------------------------------------------------------------------------------------------------------------------------------|
| `locale`  | `string` |         | Internal parameter set by the system based on current request locale or if not set calculated based on the language of the field. |

Example:

~~~~ brush:
{{ ez_render_field(content, 'time') }}
~~~~

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


