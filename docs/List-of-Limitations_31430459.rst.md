<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Repository](Repository_31432023.html)

</div>
**Developer : List of Limitations**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by Sarah Haïm-Lubczanski on May
24, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div class="table-wrap">
  -------------------------------------------------------------------------
  Limitation                           Description
  ------------------------------------ ------------------------------------
  BlockingLimitation &lt;BlockingLimit Generic limitation that always tells
  at                                   the permissions system that the user
  ion\_31430461.html&gt;\_\_           has no access, causing it to
                                       continue to the next policy.

  ContentTypeLimitation &lt;ContentTyp Limits content access depending on
  eL                                   its Content Type.
  imitation\_31430463.html&gt;\_\_     

  LanguageLimitation &lt;LanguageLimit Limits content access depending on
  at                                   its Language.
  ion\_31430465.html&gt;\_\_           

  LocationLimitation &lt;LocationLimit Limits content access depending on
  at                                   its Location.
  ion\_31430467.html&gt;\_\_           

  NewObjectStateLimitation &lt;NewObje Limits content ObjectState
  ct                                   assignment access depending on new
  StateLimitation\_31430469.html&gt;\_ state.
  \_                                   

  NewSectionLimitation &lt;NewSectionL Limits content Section assignment
  im                                   access depending on new Section.
  itation\_31430471.html&gt;\_\_       

  ObjectStateLimitation &lt;ObjectStat Limits content access depending on
  eL                                   its ObjectStates.
  imitation\_31430473.html&gt;\_\_     

  OwnerLimitation &lt;OwnerLimitation\ Limits content access depending on
  _31                                  its owner; access is only granted to
  430475.html&gt;\_\_                  the owner of the content.

  ParentContentTypeLimitation &lt;Pare Limits content (create) access
  nt                                   depending on parent location Content
  ContentTypeLimitation\_31430477.html Type; access is only granted if the
  &gt;                                 parent is of this type of content.
  \_\_                                 

  ParentDepthLimitation &lt;ParentDept Limits content (create) access
  hL                                   depending on parent location depth;
  imitation\_31430480.html&gt;\_\_     access is only granted if the parent
                                       is at a given depth of the tree
                                       structure.

  ParentOwnerLimitation &lt;ParentOwne Limits content (create) access
  rL                                   depending on parent location content
  imitation\_31430482.html&gt;\_\_     owner; access is only granted if to
                                       the owner of the Content item’s
                                       parent.

  ParentUserGroupLimitation &lt;Parent Limits content (create) access
  Us                                   depending on parent location content
  erGroupLimitation\_31430484.html&gt; owner’s User group; access is only
  \_\_                                 granted to a User in the same User
                                       group as owner of the Content item’s
                                       parent.

  SectionLimitation &lt;SectionLimitat Limits content access depending on
  io                                   its Section.
  n\_31430486.html&gt;\_\_             

  SiteAccessLimitation &lt;SiteAccessL Limits access to an action depending
  im                                   on siteaccess, typically used for
  itation\_31430488.html&gt;\_\_       user/login.

  SubtreeLimitation &lt;SubtreeLimitat Limits content access depending on
  io                                   its subtree.
  n\_31430490.html&gt;\_\_             

  UserGroupLimitation &lt;UserGroupLim Limits content access depending on
  it                                   its owner’s User group; access is
  ation\_31430492.html&gt;\_\_         only granted to a User in the same
                                       User group as the owner.
  -------------------------------------------------------------------------

</div>
c

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375999221">
</div>
**Related topics:**

[Permissions](https://doc.ez.no/display/DEVELOPER/Repository#Repository-Permissions)

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

