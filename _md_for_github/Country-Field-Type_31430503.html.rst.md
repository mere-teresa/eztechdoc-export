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
<table style="width:74%;">
<colgroup>
<col width="22%" />
<col width="25%" />
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
<td align="left"><code>Country</code></td>
<td align="left"><code>ezcountry</code></td>
<td align="left"><code>array</code></td>
</tr>
</tbody>
</table>

</div>
**Description**

This Field Type makes possible to store and retrieve data representing countries.

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
<td align="left"><div class="code panel pdl"
style="border-width: 1px;">
<div
class="codeContent panelContent p
<p>dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>array(
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

</div>
Note: When you set an array directly on Content field you don't need to provide all this information, the Field Type will assume it is a hash and in this case will accept a simplified structure described below under [To / From Hash format](#CountryFieldType-ToFromHashFormat).

**Validation**

This Field Type validates if the multiple countries are allowed by the field definition, and if the Alpha2 is valid according to the countries configured in eZ Platform.

**Settings**

The field definition of this Field Type can be configured with one option:

<div class="table-wrap">
<table>
<colgroup>
<col width="13%" />
<col width="11%" />
<col width="12%" />
<col width="63%" />
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
<td align="left"><code>isMultiple</code></td>
<td align="left"><code>boolean</code></td>
<td align="left"><code>false</code></td>
<td align="left">This setting allows (if true) or denies (if false) the selection of multiple countries.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Country FieldType example settings**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$settings = array(
    "isMultiple" => true
);
```

</div>
</div>
**To / From Hash format**

The format used for serialization is simpler than the full format, this is also available when setting value on the content field, by setting the value to an array instead of the Value object. Example of that shown below:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
$content->fields["countries"] = array( "JP", "NO" );
```

</div>
</div>
The format used by the toHash method is the Alpha2 value, however the input is capable of accepting either Name, Alpha2 or Alpha3 value as shown below in the Value object section.

**Value object**

**Properties**

The Value class of this field type contains the following properties:

<div class="table-wrap">
<table>
<colgroup>
<col width="14%" />
<col width="12%" />
<col width="73%" />
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
<td align="left"><code>$countries</code></td>
<td align="left"><code>array[]</code></td>
<td align="left">This property will be used for the country selection provided as input, as its attributes.</td>
</tr>
</tbody>
</table>

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
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

The `Country``\Value` constructor will initialize a new Value object with the value provided. It expects an array as input.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
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

