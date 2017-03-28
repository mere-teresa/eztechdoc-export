# MapLocation Field Type

This Field Type represents a geographical location.

| Name          | Internal name    | Expected input |
|---------------|------------------|----------------|
| `MapLocation` | `ezgmaplocation` | `mixed`        |

## Description

This Field Type makes possible to store and retrieve a geographical location.

As input it expects two float values, latitude, longitude, and a string value in third place, corresponding to the name or address of the location.

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
<td align="left"><code>array</code></td>
<td align="left"><pre><code>array( &#39;latitude&#39; =&gt; 59.928732, &#39;longitude&#39; =&gt; 10.777888, &#39;address&#39; =&gt; &quot;eZ Systems Norge&quot; )</code></pre></td>
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
<th align="left">Property</th>
<th align="left">Type</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>$latitude </code></td>
<td align="left"><code>float</code></td>
<td align="left">This property will store the latitude value of the map location reference.</td>
</tr>
<tr class="even">
<td align="left"><pre><code>$longitude</code></pre></td>
<td align="left"><code>float</code></td>
<td align="left">This property will store the longitude value of the map location reference.</td>
</tr>
<tr class="odd">
<td align="left"><code>$address</code></td>
<td align="left"><code>string</code></td>
<td align="left">This property will store the address of map location.</td>
</tr>
</tbody>
</table>

##### Constructor

The MapLocation**`\Value`** constructor will initialize a new Value object with the values provided. Two floats and a string are expected.

**Constructor example**

```
// Instantiates a MapLocation Value object
$MapLocationValue = new MapLocation\Value(
                        array(
                            'latitude' => 59.928732,
                            'longitude' => 10.777888,
                            'address' => "eZ Systems Norge"
                        )
                    );
```

## Template rendering

The template called by [the **ez\_render\_field()** Twig function](ez_render_field) while rendering a Map Location field accepts the following the parameters:

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Parameter</th>
<th align="left">Type</th>
<th align="left">Default</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>mapType</code></td>
<td align="left"><code>string</code></td>
<td align="left"><code>&quot;ROADMAP&quot;</code></td>
<td align="left"><a href="https://developers.google.com/maps/documentation/javascript/maptypes#BasicMapTypes">One of the GMap type of map</a></td>
</tr>
<tr class="even">
<td align="left"><code>showMap</code></td>
<td align="left"><code>boolean</code></td>
<td align="left"><code>true</code></td>
<td align="left">Whether to show a Google Map</td>
</tr>
<tr class="odd">
<td align="left"><code>showInfo</code></td>
<td align="left"><code>booolean</code></td>
<td align="left"><code>true</code></td>
<td align="left">Whether to show a latitude, longitude and the address outside of the map</td>
</tr>
<tr class="even">
<td align="left"><code>zoom</code></td>
<td align="left"><code>integer</code></td>
<td align="left"><code>13</code></td>
<td align="left">The initial zoom level on the map</td>
</tr>
<tr class="odd">
<td align="left"><code>draggable</code></td>
<td align="left"><code>boolean</code></td>
<td align="left"><code>true</code></td>
<td align="left"><p>Whether to enable draggable map</p></td>
</tr>
<tr class="even">
<td align="left"><code>width</code></td>
<td align="left"><code>string|false</code></td>
<td align="left"><code>&quot;500px&quot;</code></td>
<td align="left"><p>The width of the rendered map with its unit (for example &quot;500px&quot; or &quot;50em&quot;), set to false to not set any width style inline.</p></td>
</tr>
<tr class="odd">
<td align="left"><code>height</code></td>
<td align="left"><code>string|false</code></td>
<td align="left"><code>&quot;200px&quot;</code></td>
<td align="left"><p>The height of the rendered map with its unit (for example &quot;200px&quot; or &quot;20em&quot;), set to false to not set any height style inline.</p></td>
</tr>
<tr class="even">
<td align="left">scrollWheel</td>
<td align="left">boolean</td>
<td align="left">true</td>
<td align="left">COMING IN EZP-26068 Allows you to disable scroll wheel starting to zoom when mouse comes over the map as user scrolls down a page.</td>
</tr>
</tbody>
</table>

Example:

```
{{ ez_render_field(content, 'location', {'parameters': {'width': '100%', 'height': '330px', 'showMap': true, 'showInfo': false}}) }}
```

### Configuration

THIS FEATURE IS COMING IN EZP-26068 

| Config                 | Site Access/Group aware | Description                                                                                                                                                                                                                                           |
|------------------------|-------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| api\_keys.google\_maps | yes                     | Google maps requires use of a API key for severing maps to web pages, this setting allows you to specify your personal [Google Maps API key](https://developers.google.com/maps/documentation/javascript/get-api-key) used during template rendering. |

Example use:

**ezplatform.yml**

```
ezpublish:
    system:
        site_group:
            api_keys: { google_maps: "MY_KEY" }
```

 


