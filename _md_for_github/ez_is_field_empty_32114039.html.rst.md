<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Content Rendering](Content-Rendering_31429679.html)
5.  [Twig Functions Reference](Twig-Functions-Reference_32114025.html)

</div>
**Developer : ez\_is\_field\_empty**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Dec 31, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Description**

`ez_is_field_empty()` is a Twig helper which checks if a Content item's field value is considered empty in the current language.

It returns a boolean value (`true` or `false`).

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
If the current language cannot be found as a translation for content, the main language will be used. This behavior is identical when forcing a language.

</div>
</div>
**Prototype and Arguments**

`ez_is_field_empty( eZ\Publish\API\Repository\Values\Content\Content content, eZ\Publish\API\Repository\Values\Content\Field`|string **fieldDefIdentifier**\[, string **forcedLanguage**\] **)**

<div class="table-wrap">
<table>
<colgroup>
<col width="13%" />
<col width="32%" />
<col width="53%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Argument name</th>
<th align="left">Type</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>content</code></td>
<td align="left"><code>eZ\Publish\API\Repository\Values\Content\Content</code></td>
<td align="left">Content object the displayable field belongs to.</td>
</tr>
<tr class="even">
<td align="left"><code>fieldDefIdentifier</code></td>
<td align="left"><code>eZ\Publish\API\Repository\Values\Content\Field or string</code></td>
<td align="left">The field we want to check or its identifier.</td>
</tr>
<tr class="odd">
<td align="left"><code>forcedLanguage</code></td>
<td align="left"><code>string</code></td>
<td align="left">Locale we want the content name translation in (e.g. &quot;fre-FR&quot;). Null by default (takes current locale)</td>
</tr>
</tbody>
</table>

</div>
**Usage**

**Using the Field identifier as parameter**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
{# Display "description" field if not empty #}
{% if not ez_is_field_empty( content, "description" ) %}
    <div class="description">
        {{ ez_render_field( content, "description" ) }}
    </div>
{% endif %}
```

</div>
</div>
**Using the Field as parameter**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
{# Display "description" field if not empty #}
{% if not ez_is_field_empty( content, field ) %}
    <div class="description">
        {{ ez_render_field( content, field.fieldDefIdentifier ) }}
    </div>
{% endif %}
```

</div>
</div>
**Checking if field exists before use**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
{# Display "description" field if it exists and is not empty #}
{% if content.fields.description is defined and not ez_is_field_empty( content, "description" ) %}
    <div class="description">
        {{ ez_render_field( content, "description" ) }}
    </div>
{% endif %}
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

