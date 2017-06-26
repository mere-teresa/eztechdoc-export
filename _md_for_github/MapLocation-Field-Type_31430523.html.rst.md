<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Under the Hood: How eZ Platform Works](31429659.html)
5.  [Content Model: Content is King!](31429709.html)
6.  [Content items, Content Types and Fields](31430275.html)
7.  [Field Types reference](Field-Types-reference_31430495.html)

</div>
**Developer : MapLocation Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Feb 23, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This Field Type represents a geographical location.

<div class="table-wrap">
<table style="width:86%;">
<colgroup>
<col width="27%" />
<col width="31%" />
<col width="26%" />
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
<td align="left"><code>MapLocation</code></td>
<td align="left"><code>ezgmaplocation</code></td>
<td align="left"><code>mixed</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type makes possible to store and retrieve a geographical location.

As input it expects two float values, latitude, longitude, and a string value in third place, corresponding to the name or address of the location.

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
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
<td align="left"><pre><code>array( &#39;latitude&#39; =&gt; 59.928732,</code></pre>
'longitude' =&gt; 10.777888, 'address' =&gt; &quot;eZ Systems Norge&quot; )</td>
</tr>
</tbody>
</table>

</div>
**Value object**

**Properties**

The Value class of this Field Type contains the following properties:

<div class="table-wrap">
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

</div>
**Constructor**

The **`MapLocation``\Value`** constructor will initialize a new Value object with the values provided. Two floats and a string are expected.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
// Instantiates a MapLocation Value object
$MapLocationValue = new MapLocation\Value(
                        array(
                            'latitude' => 59.928732,
                            'longitude' => 10.777888,
                            'address' => "eZ Systems Norge"
                        )
                    );
```

</div>
</div>
**Template rendering**

The template called by [the **ez\_render\_field()** Twig function](ez_render_field_32114041.html) while rendering a Map Location field accepts the following the parameters:

<div class="table-wrap">
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
<td align="left">One of the GMap
type of
map &lt;https://devel
opers.google.com/m
aps/documentation/
javascript/maptype
s#BasicMapTypes&gt;_ _</td>
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
<td align="left">Whether to enable draggable map</td>
</tr>
<tr class="even">
<td align="left"><code>width</code></td>
<td align="left"><code>string|false</code></td>
<td align="left"><code>&quot;500px&quot;</code></td>
<td align="left">The width of the rendered map with its unit (for example &quot;500px&quot; or &quot;50em&quot;), set to false to not set any width style inline.</td>
</tr>
<tr class="odd">
<td align="left"><code>height</code></td>
<td align="left"><code>string|false</code></td>
<td align="left"><code>&quot;200px&quot;</code></td>
<td align="left">The height of the rendered map with its unit (for example &quot;200px&quot; or &quot;20em&quot;), set to false to not set any height style inline.</td>
</tr>
<tr class="even">
<td align="left">scrollWheel</td>
<td align="left">boolean</td>
<td align="left">true</td>
<td align="left">COMING IN EZP-26068 Allows you to disable scroll wheel starting to zoom when mouse comes over the map as user scrolls down a page.</td>
</tr>
</tbody>
</table>

</div>
Example:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
{{ ez_render_field(content, 'location', {'parameters': {'width': '100%', 'height': '330px', 'showMap': true, 'showInfo': false}}) }}
```

</div>
</div>
**Configuration**

THIS FEATURE IS COMING IN EZP-26068 

<div class="table-wrap">
<table>
<colgroup>
<col width="8%" />
<col width="9%" />
<col width="82%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Config</th>
<th align="left">Site Access/Group aware</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">api_keys.google_maps</td>
<td align="left">yes</td>
<td align="left">Google maps requires use of a API key for severing maps to web pages, this setting allows you to specify your personal <a href="https://developers.google.com/maps/documentation/javascript/get-api-key">Google Maps API key</a> used during template rendering.</td>
</tr>
</tbody>
</table>

</div>
Example use:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    system:
        site_group:
            api_keys: { google_maps: "MY_KEY" }
```

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
 

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:19

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

