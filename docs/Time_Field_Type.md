# Time Field Type

This Field Type represents time information.

| Name   | Internal name | Expected input type |
|--------|---------------|---------------------|
| `Time` | `eztime`      | `mixed`             |

## Description

This Field Type makes possible to store and retrieve time information.

Date information is **not stored**.

What is stored is the number of seconds, calculated from the beginning of the day in the given or the environment timezone.

## PHP API Field Type

### Input expectations

If input value is of type **`string`** or **`integer`**, it will be passed directly to the [PHP's built-in **`\DateTime`** class](http://www.php.net/manual/en/datetime.construct.php) constructor, therefore the same input format expectations apply.

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

### Value object

##### Properties

The Value class of this field type contains the following properties:

| Property | Type           | Description                                                                       |
|----------|----------------|-----------------------------------------------------------------------------------|
| `$time`  | `integer|null` | Holds the time information as a number of seconds since the beginning of the day. |

##### Constructor

The constructor for this value object will initialize a new Value object with the value provided. It accepts an integer representing the number of seconds since the beginning of the day.

##### String representation

String representation of the date value will generate the date string in the format "H:i:s" as accepted by [PHP's built-in **`date()`** function](http://www.php.net/manual/en/function.date.php).

Example:

> `"12:14:56"`

### Hash format

Value in hash format is an integer representing a number of seconds since the beginning of the day.

Example:

> `36000`

### Validation

This Field Type does not perform validation of the input value.

### Settings

The field definition of this Field Type can be configured with several options:

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

```
use eZ\Publish\Core\FieldType\Time\Type;

$settings = array(
    "defaultType" => DateAndTime::DEFAULT_EMPTY
);
```

## Template rendering

The template called by [the **ez\_render\_field()** Twig function](Content_Rendering) while rendering a Date field has access to the following parameters:

| Parameter | Type     | Default | Description                                                                                                                       |
|-----------|----------|---------|-----------------------------------------------------------------------------------------------------------------------------------|
| `locale`  | `string` |         | Internal parameter set by the system based on current request locale or if not set calculated based on the language of the field. |

Example:

```
{{ ez_render_field(content, 'time') }}
```

 


