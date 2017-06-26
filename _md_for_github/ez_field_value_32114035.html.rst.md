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
**Developer : ez\_field\_value**

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

`ez_field_value()` is a Twig helper which returns a Content item's field value in the current language.

This can be useful when you don't want to use [ez\_render\_field](#ez_field_value-ez_render_field)  and manage the rendering by yourself.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
If the current language cannot be found as a translation for content, the main language will be used. This behavior is identical when forcing a language using **forcedLanguage.**

</div>
</div>
**Prototype and Arguments**

`ez_field_value( eZ\Publish\API\Repository\Values\Content\Content content, string fieldDefIdentifier[, string forcedLanguage] )`

<div class="table-wrap">
<table>
<colgroup>
<col width="14%" />
<col width="29%" />
<col width="56%" />
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
<td align="left">Content object the field referred to with <strong>fieldDefIdentifier</strong> belongs to.</td>
</tr>
<tr class="even">
<td align="left"><code>fieldDefIdentifier</code></td>
<td align="left"><code>string</code></td>
<td align="left">Identifier of the field we want to get the value from.</td>
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

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
<h2>My title value: {{ ez_field_value( content, "title" ) }}</h2>
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
