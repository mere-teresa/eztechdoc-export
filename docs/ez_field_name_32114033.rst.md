<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Content Rendering](Content-Rendering_31429679.html)
5.  [Twig Functions Reference](Twig-Functions-Reference_32114025.html)

</div>
**Developer : ez\_field\_name**

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

`ez_field_name()` is a Twig helper which returns a Content item’s field
FieldDefinition name in the current language.

This can be useful when you don’t want to use a sub-request and custom
controller to be able to display this information.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
If the current language cannot be found as a translation for content,
the main language will be used. This behavior is identical when forcing
a language using **forcedLanguage.**

</div>
</div>
**Prototype and Arguments**

`ez_field_name( Content|ContentInfo content, string fieldDefIdentifier[, string forcedLanguage] )`

<div class="table-wrap">
  -------------------------------------------------------------------------
  Argumen Type                              Description
  t                                         
  name                                      
  ------- --------------------------------- -------------------------------
  `conten `eZ\Publish\API\Repository\Values Content / ContentInfo object
  t`      \Content\Content`or`eZ\Publish\AP the **fieldDefIdentifier** belo
          I\Repository\Values\Content\Conte ngs
          ntInfo `                          to.

  `fieldD `string`                          Identifier of the field we want
  efIdent                                   to get the FieldDefinition name
  ifier`                                    from.

  `forced `string`                          Language we want to force (e.g.
  Languag                                   “`jpn-JP`”), otherwise takes
  e`                                        prioritized languages from
                                            SiteAccess settings.
  -------------------------------------------------------------------------

</div>
**Usage**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<label for="ez-content-article-title">{{ ez_field_name( content, "title" ) }}</label>
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
