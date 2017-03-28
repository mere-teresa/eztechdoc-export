# RelationList Field Type

This Field Type represents one or multiple relations to content.

| Name           | Internal name          | Expected input |
|----------------|------------------------|----------------|
| `RelationList` | `ezobjectrelationlist` | `mixed`        |

## Description

This Field Type makes possible to store and retrieve values of relation to content.

## PHP API Field Type 

### Input expectations

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div>
Type
</div></th>
<th align="left"><div>
Description
</div></th>
<th align="left"><div>
Example
</div></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>int|string</code></td>
<td align="left">Id of the related Content item</td>
<td align="left"><code>42</code></td>
</tr>
<tr class="even">
<td align="left"><code>array</code></td>
<td align="left">An array of related Content IDs</td>
<td align="left"><code>array( 24, 42 )</code></td>
</tr>
<tr class="odd">
<td align="left"><pre><code>eZ\Publish\API\Repository\Values\Content\ContentInfo</code></pre></td>
<td align="left"><p>ContentInfo instance of the related Content</p></td>
<td align="left"> </td>
</tr>
<tr class="even">
<td align="left"><code>eZ\Publish\Core\FieldType\RelationList\Value</code></td>
<td align="left">RelationList Field Type Value Object</td>
<td align="left">See Value Object documentation section below.</td>
</tr>
</tbody>
</table>

### Value Object

##### Properties

`eZ\Publish\Core\FieldType\RelationList\Value` contains following properties.

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Property</th>
<th align="left">Type</th>
<th align="left">Description</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><p><code>destinationContentIds</code></p></td>
<td align="left"><code>array</code></td>
<td align="left">An array of related Content ids</td>
<td align="left"><code>array( 24, 42 )</code></td>
</tr>
</tbody>
</table>

**Value object content example**

```
$relationList->destinationContentId = array( 
    $contentInfo1->id,
    $contentInfo2->id,
    170
);
```

##### Constructor

The `RelationList``\Value` constructor will initialize a new Value object with the value provided. It expects a mixed array as value.

**Constructor example**

```
// Instantiates a RelationList Value object
$relationListValue = new RelationList\Value(
    array(
        $contentInfo1->id,
        $contentInfo2->id,
        170     
    )
);
```

### Validation

This Field Type validates if the `selectionMethod` specified is 0 (`self::SELECTION_BROWSE)` or 1 (`self::SELECTION_DROPDOWN)`. A validation error is thrown if the value does not match.

Also validates if the `selectionDefaultLocation` specified is null, string or integer. If the type validation fails a validation error is thrown.

And validates if the value specified in `selectionContentTypes` is an array. If not, a validation error in given.

### Settings

The field definition of this Field Type can be configured with following options:

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
<td align="left"><p><code>selectionMethod</code></p></td>
<td align="left"><code>mixed</code></td>
<td align="left"><pre><code>SELECTION_BROWSE</code></pre></td>
<td align="left">Method of selection in the administration interface</td>
</tr>
<tr class="even">
<td align="left"><p><code>selectionDefaultLocation</code></p></td>
<td align="left"><code>string|integer</code></td>
<td align="left"><code>null</code></td>
<td align="left">Id of the default Location for the selection when using administration interface</td>
</tr>
<tr class="odd">
<td align="left"><p><code>selectionContentTypes</code></p></td>
<td align="left"><code>array</code></td>
<td align="left"><code>array()</code></td>
<td align="left">An array of ContentType ids that are allowed for related Content</td>
</tr>
</tbody>
</table>

Following selection methods are available:

| Name                | Description                                                                                                   |
|---------------------|---------------------------------------------------------------------------------------------------------------|
| SELECTION\_BROWSE   | Selection will use browse mode                                                                                |
| SELECTION\_DROPDOWN | Selection control will use dropdown control containing the Content list in the default Location for selection |

NOTE: Dropdown not implemented in Platform UI yet, only browse is used currently.

**Example of using settings in PHP**

```
use eZ\Publish\Core\FieldType\RelationList\Type;

$settings = array(
    "selectionMethod" => Type::SELECTION_BROWSE,
    "selectionDefaultLocation" => null,
    "selectionContentTypes" => array()
 );
```

 


