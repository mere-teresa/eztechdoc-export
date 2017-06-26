<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Cookbook](Cookbook_31429528.html)

</div>
**Developer : Retrieving root location**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by Sarah Haïm-Lubczanski on May 19, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Description**

Knowledge of the root location is important since it can be a starting point for API queries, or even links to home page, but as eZ Platform can be used [for multisite development](Multisite_31430389.html), the **root location can vary**.

By default, the root location ID is `2`, but as it can be easily be changed by configuration, **the best practice is to retrieve it dynamically**.

**Solution**

**Retrieving root location ID**

Root location ID can be retrieved easily from  [ConfigResolver](https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-Configuration). The parameter name is `content.tree_root.location_id`.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**In a controller**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<?php
namespace Acme\TestBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller;


class DefaultController extends Controller
{
    public function fooAction()
    {
        // ...
 
        $rootLocationId = $this->getConfigResolver()->getParameter( 'content.tree_root.location_id' );
 
        // ...
    }
}
```

</div>
</div>
**Retrieving the root location**

**From a template**

Root location is exposed in the [global Twig helper](https://doc.ez.no/display/DEVELOPER/Design#Design-TwigHelper).

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Making a link to homepage**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<a href="{{ path( ezpublish.rootLocation ) }}" title="Link to homepage">Home page</a>
```

</div>
</div>
**From a controller**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
<?php
namespace Acme\TestBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller;

class DefaultController extends Controller
{
    public function fooAction()
    {
        // ...

        $rootLocation = $this->getRootLocation();

        // ...
    }
}
```

</div>
</div>
 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376004386">
-   [Description](#Retrievingrootlocation-Description)
-   [Solution](#Retrievingrootlocation-Solution)
    -   [Retrieving root location ID](#Retrievingrootlocation-RetrievingrootlocationID)
    -   [Retrieving the root location](#Retrievingrootlocation-Retrievingtherootlocation)
        -   [From a template](#Retrievingrootlocation-Fromatemplate)
        -   [From a controller](#Retrievingrootlocation-Fromacontroller)

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:20

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>
