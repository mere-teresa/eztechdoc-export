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

<span id="title-text"> Developer : Rating Field Type </span> {#title-heading .pagetitle}
============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> André Rømcke</span> on Jan 04, 2017

This Field Type is used to provide rating functionality.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Rating Field Type does not provide the APIs for actual rating, this part
is provided by Legacy Stack extension that can be found at
<https://github.com/ezsystems/ezstarrating>.

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
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
<td align="left"><code>Rating</code></td>
<td align="left"><p><code>ezsrrating</code></p></td>
<td align="left"><code>boolean</code></td>
</tr>
</tbody>
</table>

PHP API Field Type  {#RatingFieldType-PHPAPIFieldType}
-------------------

### Input expectations {#RatingFieldType-Inputexpectations}

| Type      | Description                                  | Example |
|-----------|----------------------------------------------|---------|
| `boolean` | Denotes if the rating is enabled or disabled | `true`  |

### Value Object {#RatingFieldType-ValueObject}

##### Properties {#RatingFieldType-Properties}

**`eZ\Publish\Core\FieldType\Rating\Value`** offers the following
properties.

| Property     | Type      | Description                                               | Example |
|--------------|-----------|-----------------------------------------------------------|---------|
| `isDisabled` | `boolean` | <span>Denotes if the rating is enabled or disabled</span> | `true`  |

### Hash format {#RatingFieldType-Hashformat}

Hash matches the Value Object, having only one property:

-   `isDisabled`

### Settings {#RatingFieldType-Settings}

The Field Type does not support settings.

### Validation {#RatingFieldType-Validation}

The Field Type does not support validation.

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


