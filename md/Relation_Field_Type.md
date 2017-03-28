# Relation Field Type

This Field Type represents a relation to a Content item.

| Name       | Internal name      | Expected input |
|------------|--------------------|----------------|
| `Relation` | `ezobjectrelation` | `mixed`        |

## Description

This Field Type makes it possible to store and retrieve the value of relation to a Content item.

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
<td align="left"><code>string</code></td>
<td align="left"><pre><code>&quot;150&quot;</code></pre></td>
</tr>
<tr class="even">
<td align="left"><code>integer</code></td>
<td align="left"> 150</td>
</tr>
</tbody>
</table>

### Value object

##### Properties

The Value class of this Field Type contains the following properties:

| Property                | Type              | Description                                                                                       |
|-------------------------|-------------------|---------------------------------------------------------------------------------------------------|
| `$destinationContentId` | `string|int|null` | This property will be used to store the value provided, which will represent the related content. |

**Value object content example**

```
$relation->destinationContentId = $contentInfo->id;
```

##### Constructor

The `Relation``\Value` constructor will initialize a new Value object with the value provided. It expects a mixed value.

**Constructor example**

```
// Instantiates a Relation Value object
$relationValue = new Relation\Value( $contentInfo->id );
```

### Validation

This Field Type validates whether the provided relation exists, but before it does that it will check that the value is either string or int.

### Settings

The field definition of this Field Type can be configured with two options:

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
<td align="left"><code>selectionMethod</code></td>
<td align="left"><code>int</code></td>
<td align="left"><code>self::SELECTION_BROWSE</code></td>
<td align="left"><p>This setting defines the selection method. It expects an integer (0/1). 0 stands for <code>self::SELECTION_BROWSE</code>, 1 stands for <code>self::SELECTION_DROPDOWN</code>.</p>
<p> </p>
<div>
<div>
<p>NOTE: Dropdown not implemented in Platform UI yet, only browse is used currently.</p>
</div>
</div></td>
</tr>
<tr class="even">
<td align="left"><code>selectionRoot</code></td>
<td align="left"><code>string</code></td>
<td align="left"><code>null</code></td>
<td align="left">This setting defines the selection root.</td>
</tr>
</tbody>
</table>

**Relation FieldType example settings**

```
use eZ\Publish\Core\FieldType\Relation\Type;

$settings = array(
    "selectionMethod" => 1,
    "selectionRoot" => null
);
```

Note: These settings are meant for future use in user interface when allowing users to select relations.

 

 


