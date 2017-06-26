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
**Developer : ez\_content\_name**

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

`ez_content_name()` is a Twig helper which allows displaying a Content item's name in the current language.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
If the current language cannot be found as a translation for content, the name in the main language is always returned. This behavior is identical when forcing a language.

</div>
</div>
**Prototype and Arguments**

`ez_content_name( eZ\Publish\API\Repository\Values\Content\Content content[, string forcedLanguage] )ez_content_name(contentInfo[, string forcedLanguage] ) `

<div class="table-wrap">
<table>
<colgroup>
<col width="9%" />
<col width="48%" />
<col width="42%" />
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
<td align="left"><code>eZ\Publish\API\Repository\Values\Content\Content</code><strong>or</strong><code>eZ\Publish\API\Repository\Values\Content\ContentInfo </code></td>
<td align="left">Content or ContentInfo object the displayable field belongs to.</td>
</tr>
<tr class="even">
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
<h2>Content name in current language: {{ ez_content_name( content ) }}</h2>
<h2>Content name in current language, from ContentInfo: {{ ez_content_name( content.contentInfo ) }}</h2>
<h2>Content name in french (forced): {{ ez_content_name( content, "fre-FR" ) }}</h2>
```

</div>
</div>
**Equivalent PHP code**

**Getting the translated name for a Content item**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
// Assuming we're in a controller action
$translationHelper = $this->get( 'ezpublish.translation_helper' );
 
// From Content
$translatedContentName = $translationHelper->getTranslatedContentName( $content );
// From ContentInfo
$translatedContentName = $translationHelper->getTranslatedContentNameByContentInfo( $contentInfo );
```

</div>
</div>
**Forcing a specific language**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
// Assuming we're in a controller action
$translatedContentName = $this->get( 'ezpublish.translation_helper' )->getTranslatedName( $content, 'fre-FR' );
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
