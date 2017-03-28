# TextBlock Field Type

This Field Type represents a block of unformatted text.

| Name        | Internal name | Expected input type |
|-------------|---------------|---------------------|
| `TextBlock` | `eztext`      | `string`            |

## Description

The Field Type handles a block of multiple lines of unformatted text. It is capable of handling up to 16,777,216 characters.

## PHP API Field Type

### Input expectations

<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div>
Type
</div></th>
<th align="left"><div>
Example
</div></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>string</code></td>
<td align="left"><pre><code>&quot;This is a block of unformatted text&quot;</code></pre></td>
</tr>
</tbody>
</table>

### Value object

##### Properties

The Value class of this Field Type contains the following properties:

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div>
Property
</div></th>
<th align="left"><div>
Type
</div></th>
<th align="left"><div>
Description
</div></th>
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

##### String representation

A TextBlock's string representation is the the $text property's value, as a string.

##### Constructor

The constructor for this value object will initialize a new Value object with the value provided. It accepts a string as argument and will import it to the `$text` attribute.

### Validation

This Field Type does not perform any special validation of the input value.

### Settings

Settings contain only one option:

| Name       | Type      | Default value | Description                                                             |
|------------|-----------|---------------|-------------------------------------------------------------------------|
| `textRows` | `integer` | `10`          | Number of rows for the editing control in the administration interface. |

 


