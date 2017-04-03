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
**Developer : Country Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Jan 04, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This Field Type represents one or multiple countries.

<div class="table-wrap">
  Name             Internal name      Expected input
  ---------------- ------------------ -------------------
  `Country`        `ezcountry`        `array`

</div>
**Description**

This Field Type makes possible to store and retrieve data representing
countries.

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Type                                 | Example                              |
+======================================+======================================+
| `array`                              | <div class="code panel pdl"          |
|                                      | style="border-width: 1px;">          |
|                                      | <div                                 |
|                                      | class="codeContent panelContent p    |
|                                      | dl"&gt;                              |
|                                      |                                      |
|                                      | ``` {.sourceCode .brush:}            |
|                                      | array(                               |
|                                      |     "JP" => array(                   |
|                                      |         "Name" => "Japan",           |
|                                      |         "Alpha2" => "JP",            |
|                                      |         "Alpha3" => "JPN",           |
|                                      |         "IDC" => 81                  |
|                                      |     )                                |
|                                      | );                                   |
|                                      | ```                                  |
|                                      |                                      |
|                                      | </div>                               |
|                                      | </div>                               |
+--------------------------------------+--------------------------------------+

</div>
Note: When you set an array directly on Content field you don’t need to
provide all this information, the Field Type will assume it is a hash
and in this case will accept a simplified structure described below
under [To / From Hash format](#CountryFieldType-ToFromHashFormat).

**Validation**

This Field Type validates if the multiple countries are allowed by the
field definition, and if the Alpha2 is valid according to the countries
configured in eZ Platform.

**Settings**

The field definition of this Field Type can be configured with one
option:

<div class="table-wrap">
  ------------------------------------------------------------------------
  Name      Type    Default  Description
                    value    
  --------- ------- -------- ---------------------------------------------
  `isMultip `boolea `false`  This setting allows (if true) or denies (if
  le`       n`               false) the selection of multiple countries.
  ------------------------------------------------------------------------

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Country FieldType example settings**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$settings = array(
    "isMultiple" => true
);
```

</div>
</div>
**To / From Hash format**

The format used for serialization is simpler than the full format, this
is also available when setting value on the content field, by setting
the value to an array instead of the Value object. Example of that shown
below:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$content->fields["countries"] = array( "JP", "NO" );
```

</div>
</div>
The format used by the toHash method is the Alpha2 value, however the
input is capable of accepting either Name, Alpha2 or Alpha3 value as
shown below in the Value object section.

**Value object**

**Properties**

The Value class of this field type contains the following properties:

<div class="table-wrap">
  ------------------------------------------------------------------------
  Property   Type     Description
  ---------- -------- ----------------------------------------------------
  `$countrie `array[] This property will be used for the country selection
  s`         `        provided as input, as its attributes.
  ------------------------------------------------------------------------

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$value->countries = array(
    "JP" => array(
        "Name" => "Japan",
        "Alpha2" => "JP",
        "Alpha3" => "JPN",
        "IDC" => 81
    )
)
```

</div>
</div>
**Constructor**

The `Country``\Value` constructor will initialize a new Value object
with the value provided. It expects an array as input.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
// Instantiates a Country Value object
$countryValue = new Country\Value(
    array(
        "JP" => array(
            "Name" => "Japan",
            "Alpha2" => "JP",
            "Alpha3" => "JPN",
            "IDC" => 81
        )
    )
);
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

