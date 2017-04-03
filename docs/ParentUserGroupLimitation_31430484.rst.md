<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Repository](Repository_31432023.html)
5.  [List of Limitations](List-of-Limitations_31430459.html)

</div>
**Developer : ParentUserGroupLimitation**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Apr 28, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
A Limitation to specify that only Users with at least one common
*direct* User group with the owner of the parent Location of a Content
item get a certain access right, used by `content/create` permission.

<div class="table-wrap">
  ------------- ----------------------------------------------------------
  Identifier    `ParentGroup`

  Value Class   `eZ\Publish\API\Repository\Values\User\Limitation\ParentUs
                erGroupLimitation`

  Type Class    `eZ\Publish\Core\Limitation\ParentUserGroupLimitationType`

  Criterion     n/a
  used          

  Role          no
  Limitation    
  ------------- ----------------------------------------------------------

</div>
**Possible values**

<div class="table-wrap">
  ------------------------ ------------------------ ------------------------
  Value                    UI value                 Description

  1                        “self”                   Only a User who has at
                                                    least one common
                                                    *direct* user group with
                                                    owner of the parent
                                                    Location gets access
  ------------------------ ------------------------ ------------------------

</div>
 

|

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
