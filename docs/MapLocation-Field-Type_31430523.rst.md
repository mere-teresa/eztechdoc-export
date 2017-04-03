<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
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
  Name                 Internal name           Expected input
  -------------------- ----------------------- -------------------
  `MapLocation`        `ezgmaplocation`        `mixed`

</div>
**Description**

This Field Type makes possible to store and retrieve a geographical
location.

As input it expects two float values, latitude, longitude, and a string
value in third place, corresponding to the name or address of the
location.

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Type                                 | Example                              |
+======================================+======================================+
| `array`                              |     array( 'latitude' => 59.928732,  |
|                                      |                                      |
|                                      | ‘longitude’ =&gt; 10.777888,         |
|                                      | ‘address’ =&gt; “eZ Systems Norge” ) |
+--------------------------------------+--------------------------------------+

</div>
**Value object**

**Properties**

The Value class of this Field Type contains the following properties:

<div class="table-wrap">
+--------------------------+--------------------------+--------------------------+
| Property                 | Type                     | Description              |
+==========================+==========================+==========================+
| `$latitude `             | `float`                  | This property will store |
|                          |                          | the latitude value of    |
|                          |                          | the map location         |
|                          |                          | reference.               |
+--------------------------+--------------------------+--------------------------+
|     $longitude           | `float`                  | This property will store |
|                          |                          | the longitude value of   |
|                          |                          | the map location         |
|                          |                          | reference.               |
+--------------------------+--------------------------+--------------------------+
| `$address`               | `string`                 | This property will store |
|                          |                          | the address of map       |
|                          |                          | location.                |
+--------------------------+--------------------------+--------------------------+

</div>
**Constructor**

The **`MapLocation``\Value`** constructor will initialize a new Value
object with the values provided. Two floats and a string are expected.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

The template called by [the **ez\_render\_field()** Twig
function](ez_render_field_32114041.html) while rendering a Map Location
field accepts the following the parameters:

<div class="table-wrap">
  ---------------------------------------------------------------------------
  Parameter          Type               Default            Description
  ------------------ ------------------ ------------------ ------------------
  `mapType`          `string`           `"ROADMAP"`        One of the GMap
                                                           type of
                                                           map &lt;https://de
                                                           vel
                                                           opers.google.com/m
                                                           aps/documentation/
                                                           javascript/maptype
                                                           s\#BasicMapTypes&g
                                                           t;\_
                                                           \_

  `showMap`          `boolean`          `true`             Whether to show a
                                                           Google Map

  `showInfo`         `booolean`         `true`             Whether to show a
                                                           latitude,
                                                           longitude and the
                                                           address outside of
                                                           the map

  `zoom`             `integer`          `13`               The initial zoom
                                                           level on the map

  `draggable`        `boolean`          `true`             Whether to enable
                                                           draggable map

  `width`            `string|false`     `"500px"`          The width of the
                                                           rendered map with
                                                           its unit (for
                                                           example “500px” or
                                                           “50em”), set to
                                                           false to not set
                                                           any width style
                                                           inline.

  `height`           `string|false`     `"200px"`          The height of the
                                                           rendered map with
                                                           its unit (for
                                                           example “200px” or
                                                           “20em”), set to
                                                           false to not set
                                                           any height style
                                                           inline.

  scrollWheel        boolean            true               COMING IN
                                                           EZP-26068 Allows
                                                           you to disable
                                                           scroll wheel
                                                           starting to zoom
                                                           when mouse comes
                                                           over the map as
                                                           user scrolls down
                                                           a page.
  ---------------------------------------------------------------------------

</div>
Example:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{{ ez_render_field(content, 'location', {'parameters': {'width': '100%', 'height': '330px', 'showMap': true, 'showInfo': false}}) }}
```

</div>
</div>
**Configuration**

THIS FEATURE IS COMING IN EZP-26068 

<div class="table-wrap">
  -------------------------------------------------------------------------
  Config Site   Description
         Access 
         /Group 
         aware  
  ------ ------ -----------------------------------------------------------
  api\_k yes    Google maps requires use of a API key for severing maps to
  eys.go        web pages, this setting allows you to specify your personal
  ogle\_        [Google Maps API
  maps          key](https://developers.google.com/maps/documentation/javas
                cript/get-api-key)
                used during template rendering.
  -------------------------------------------------------------------------

</div>
Example use:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

