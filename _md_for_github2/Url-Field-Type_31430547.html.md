1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and Fields](31430275.html)</span>
7.  <span>[Field Types reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : Url Field Type </span>
=========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Jan 04, 2017

This Field Type represents a hyperlink. It is formed by the combination of a link and the respective text.

| Name  | Internal name | Expected input |
|-------|---------------|----------------|
| `Url` | `ezurl`       | `string`       |

Description
-----------

This Field Type makes possible to store and retrieve a url. It is formed by the combination of a link and the respective text.

PHP API Field Type
------------------

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
<td align="left"><pre><code>&quot;http://www.ez.no&quot;, &quot;eZ Systems&quot;</code></pre></td>
</tr>
</tbody>
</table>

### Value object

##### Properties

The Value class of this field type contains the following properties:

| Property | Type     | Description                                                                                                         |
|----------|----------|---------------------------------------------------------------------------------------------------------------------|
| `$link`  | `string` | This property will be used to store the link provided to the value of this Field Type.                              |
| `$text`  | `string` | This property will be used to store the text to represent the stored link provided to the value of this Field Type. |

**Value object content example**

``` brush:
$url->link = "http://www.ez.no";
$url->text = "eZ Systems";
```

##### Constructor

<span>The `Url`</span>`\Value`<span> constructor will initialize a new Value object with the value provided. It expects two comma-separated strings, corresponding to the link and text.</span>

**Constructor example**

``` brush:
// Instantiates an Url Value object
$UrlValue = new Url\Value( "http://www.ez.no", "eZ Systems" );
```

### Validation

This Field Type does not perform validation.

### Settings

This Field Type does not have settings.

 

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


