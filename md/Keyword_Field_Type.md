# Keyword Field Type

This Field Type represents keywords.

| Name      | Internal name | Expected input    |
|-----------|---------------|-------------------|
| `Keyword` | `ezkeyword`   | `string[]|string` |

## Description

This Field Type stores one or several comma-separated keywords as a string or array of strings.

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
<td align="left"><pre><code>string</code></pre></td>
<td align="left"><code>&quot;documentation&quot;</code></td>
</tr>
<tr class="even">
<td align="left"><code>string</code></td>
<td align="left"><p><code>&quot;php, eZ Publish, html5&quot;</code></p></td>
</tr>
<tr class="odd">
<td align="left"><code>string[]</code></td>
<td align="left"><code>array( &quot;eZ Systems&quot;, &quot;Enterprise&quot;, &quot;User Experience Management&quot; )</code></td>
</tr>
</tbody>
</table>

### Value object

##### Properties

The Value class of this Field Type contains the following properties:

| Property | Type       | Description                            |
|----------|------------|----------------------------------------|
| `$value` | `string[]` | Holds an array of keywords as strings. |

**Value object content example**

```
use eZ\Publish\Core\FieldType\Keyword\Value;
 
// Instantiates a Value object
$keywordValue = new Value();
 
// Sets an array of keywords as a value
$keyword->value = array( "php", "css3", "html5", "eZ Publish" );
```

##### Constructor

The Keyword**`\Value`** constructor will initialize a new Value object with the value provided.

It expects a list of keywords, either comma-separated in a string or as an array of strings.

**Constructor example**

```
use eZ\Publish\Core\FieldType\Keyword\Value;
 
// Instantiates a Value object with an array of keywords
$keywordValue = new Value( array( "php5", "css3", "html5" ) );
 
// Instantiates a Value object with a list of keywords in a string
// This is equivalent to the example above
$keywordValue = new Value( "php5,css3,html5" );
```

 


