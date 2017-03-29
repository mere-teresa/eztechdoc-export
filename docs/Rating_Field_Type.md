# Rating Field Type

This Field Type is used to provide rating functionality.

Rating Field Type does not provide the APIs for actual rating, this part is provided by Legacy Stack extension that can be found at <https://github.com/ezsystems/ezstarrating>.

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
<td align="left"><p><code>ezsrrating</code></p></td>
<td align="left"><code>boolean</code></td>
</tr>
</tbody>
</table>

## PHP API Field Type 

### Input expectations

| Type      | Description                                  | Example |
|-----------|----------------------------------------------|---------|
| `boolean` | Denotes if the rating is enabled or disabled | `true`  |

### Value Object

##### Properties

**`eZ\Publish\Core\FieldType\Rating\Value`** offers the following properties.

| Property     | Type      | Description                                  | Example |
|--------------|-----------|----------------------------------------------|---------|
| `isDisabled` | `boolean` | Denotes if the rating is enabled or disabled | `true`  |

### Hash format

Hash matches the Value Object, having only one property:

-   `isDisabled`

### Settings

The Field Type does not support settings.

### Validation

The Field Type does not support validation.

 


