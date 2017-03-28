# Integer Field Type

This Field Type represents an integer value.

| Name      | Internal name | Expected input |
|-----------|---------------|----------------|
| `Integer` | `ezinteger`   | `integer`      |

## Description

This Field Type stores numeric values which will be provided as integers.

## PHP API Field Type 

### Input expectations

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
<td align="left"><code>integer</code></td>
<td align="left"><p><code>2397</code></p></td>
</tr>
</tbody>
</table>

### Value object

##### Properties

The Value class of this field type contains the following properties:

| Property | Type  | Description                                                           |
|----------|-------|-----------------------------------------------------------------------|
| `$value` | `int` | This property will be used to store the value provided as an integer. |

**Value object content example**

```
$integer->value = 8
```

##### Constructor

The `Integer``\Value` constructor will initialize a new Value object with the value provided. It expects a numeric, integer value.

**Constructor example**

```
use eZ\Publish\Core\FieldType\Integer;
 
// Instantiates a Integer Value object
$integerValue = new Integer\Value( 8 );
```

### Hash format

Hash value of this Field Type is simply integer value as a string.

Example:

> `"8"`

### String representation

String representation of the Field Type's value will return the integer value as a string.

Example:

> `"8"`

### Validation

This Field Type supports `IntegerValueValidator`, defining maximal and minimal float value:

| Name              | Type  | Default value                    | Description                                                                |
|-------------------|-------|----------------------------------|----------------------------------------------------------------------------|
| `minIntegerValue` | `int` | `0`                              | This setting defines the minimum value this FieldType will allow as input. |
| `maxIntegerValue` | `int` | `false  /` V1.5.2, V1.6.1 `null` | This setting defines the maximum value this FieldType will allow as input. |

**Example of validator configuration in PHP**

```
$validatorConfiguration = array(
    "minIntegerValue" => 1,
    "maxIntegerValue" => 24
);
```

### Settings

This Field Type does not support settings.

 

 


