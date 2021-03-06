1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and
    Fields](31430275.html)</span>
7.  <span>[Field Types
    reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : Country Field Type </span> {#title-heading .pagetitle}
=============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> André Rømcke</span> on Jan 04, 2017

This Field Type represents one or multiple countries.

| Name      | Internal name | Expected input |
|-----------|---------------|----------------|
| `Country` | `ezcountry`   | `array`        |

Description {#CountryFieldType-Description}
-----------

This Field Type makes possible to store and retrieve data representing
countries.

PHP API Field Type  {#CountryFieldType-PHPAPIFieldType}
-------------------

### Input expectations {#CountryFieldType-Inputexpectations}

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
<td align="left"><div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
<pre class="brush: php; gutter: true; theme: Eclipse" style="font-size:12px;"><code>array(
    &quot;JP&quot; =&gt; array(
        &quot;Name&quot; =&gt; &quot;Japan&quot;,
        &quot;Alpha2&quot; =&gt; &quot;JP&quot;,
        &quot;Alpha3&quot; =&gt; &quot;JPN&quot;,
        &quot;IDC&quot; =&gt; 81
    )
);</code></pre>
</div>
</div></td>
</tr>
</tbody>
</table>

<span class="nx">Note: When you set an array directly on Content field
you don’t need to provide all this information, the Field Type will
assume it is a hash and in this case will accept a simplified structure
described below under [To / From Hash
format](#CountryFieldType-ToFromHashFormat).</span>

### Validation {#CountryFieldType-Validation}

This Field Type validates if the multiple countries are allowed by the
field definition, and if the Alpha2 is valid according to the countries
configured in eZ Platform.

### Settings {#CountryFieldType-Settings}

The field definition of this Field Type can be configured with one
option:

| Name         | Type      | Default value | Description                                                                             |
|--------------|-----------|---------------|-----------------------------------------------------------------------------------------|
| `isMultiple` | `boolean` | `false`       | This setting allows (if true) or denies (if false) the selection of multiple countries. |

**Country FieldType example settings**

~~~~ brush:
$settings = array(
    "isMultiple" => true
);
~~~~

### <span id="CountryFieldType-ToFromHashFormat" class="confluence-anchor-link"></span>To / From Hash format {#CountryFieldType-ToFromHashFormatTo/FromHashformat}

The format used for serialization is simpler than the full format, this
is also available when setting value on the content field, by setting
the value to an array instead of the Value object. Example of that shown
below:

**Value object content example**

~~~~ brush:
$content->fields["countries"] = array( "JP", "NO" );
~~~~

The format used by the toHash method is the Alpha2 value, however the
input is capable of accepting either Name, Alpha2 or Alpha3 value as
shown below in the Value object section.

### Value object {#CountryFieldType-Valueobject}

##### Properties {#CountryFieldType-Properties}

The Value class of this field type contains the following properties:

| Property     | Type      | Description                                                                                |
|--------------|-----------|--------------------------------------------------------------------------------------------|
| `$countries` | `array[]` | This property will be used for the country selection provided as input, as its attributes. |

**Value object content example**

~~~~ brush:
$value->countries = array(
    "JP" => array(
        "Name" => "Japan",
        "Alpha2" => "JP",
        "Alpha3" => "JPN",
        "IDC" => 81
    )
)
~~~~

##### Constructor {#CountryFieldType-Constructor}

<span>The `Country`</span>`\Value`<span> constructor will initialize a
new Value object with the value provided. It expects an array as
input.</span>

**Constructor example**

~~~~ brush:
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
~~~~

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


