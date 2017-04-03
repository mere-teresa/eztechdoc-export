<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Cookbook](Cookbook_31429528.html)

</div>
**Developer : Paginating API search results**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on May 17, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Description**

When listing content (e.g. blog posts), pagination is a very common use
case and is usually painful to implement by hand.

For this purpose eZ Platform recommends the use of [Pagerfanta
library](https://github.com/whiteoctober/Pagerfanta) and [proposes
adapters for
it](https://github.com/ezsystems/ezpublish-kernel/tree/master/eZ/Publish/Core/Pagination/Pagerfanta).

**Solution**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<?php
namespace Acme\TestBundle\Controller;

use eZ\Publish\Core\Pagination\Pagerfanta\ContentSearchAdapter;
use Pagerfanta\Pagerfanta;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\ContentTypeIdentifier;
use eZ\Publish\API\Repository\Values\Content\Query;

class DefaultController extends Controller
{
    public function myContentListAction( $locationId, $viewType, $layout = false, array $params = array() )
    {
        // First build the search query.
        // Let's search for folders, sorted by publication date.
        $query = new Query();
        $query->criterion = new ContentTypeIdentifier( 'folder' );
        $query->sortClauses = array( new SortClause\DatePublished() );
 
        // Initialize the pager.
        // We pass the ContentSearchAdapter to it.
        // ContentSearchAdapter is built with your search query and the SearchService.
        $pager = new Pagerfanta( 
            new ContentSearchAdapter( $query, $this->getRepository()->getSearchService() ) 
        );
        // Let's list 2 folders per page, even if it doesn't really make sense ;-)
        $pager->setMaxPerPage( 2 );
        // Defaults to page 1 or get "page" query parameter
        $pager->setCurrentPage( $this->getRequest()->get( 'page', 1 ) );

        return $this->render(
            'AcmeTestBundle::my_template.html.twig',
            array(
                'totalFolderCount' => $pager->getNbResults(),
                'pagerFolder' => $pager,
                'location' => $this->getRepository()->getLocationService()->loadLocation( $locationId ),
            ) + $params
        );
    }
}
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**my\_template.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% block content %}
    <h1>Listing folder content objects: {{ totalFolderCount }} objects found.</h1>

    <div>
        <ul>
        {# Loop over the page results #}
        {% for folder in pagerFolder %}
            <li>{{ ez_content_name( folder ) }}</li>
        {% endfor %}
        </ul>
    </div>
 
    {# Only display pagerfanta navigator if needed. #}
    {% if pagerFolder.haveToPaginate() %}
    <div class="pagerfanta">
        {{ pagerfanta( pagerFolder, 'twitter_bootstrap_translated', {'routeName': location} ) }}
    </div>
    {% endif %}

{% endblock %}
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
For more information and examples, have a look at [PagerFanta
documentation](https://github.com/whiteoctober/Pagerfanta/blob/master/README.md).

</div>
</div>
**Adapters**

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Adapter class name                   | Description                          |
+======================================+======================================+
|     eZ\Publish\Core\Pagination\Pager | Makes the search against passed      |
|                                      | Query and returns                    |
| fantaContentSearchAdapter            | Content &lt;https://github.com/ezsys |
|                                      | te                                   |
|                                      | ms/ezpublish-kernel/blob/master/eZ/P |
|                                      | ublish/API/Repository/Values/Content |
|                                      | /Content.php&gt;\_\_ objects.        |
+--------------------------------------+--------------------------------------+
|     eZ\Publish\Core\Pagination\Pager | Same as ContentSearchAdapter but     |
|                                      | returns instead                      |
| fantaContentSearchHitAdapter         | SearchHit &lt;https://github.com/ezs |
|                                      | ys                                   |
|                                      | tems/ezpublish-kernel/blob/master/eZ |
|                                      | /Publish/API/Repository/Values/Conte |
|                                      | nt/Search/SearchHit.php&gt;\_\_      |
|                                      | objects.                             |
+--------------------------------------+--------------------------------------+
|     eZ\Publish\Core\Pagination\Pager | Makes a Location search against      |
|                                      | passed Query and returns Location    |
| fantaLocationSearchAdapter           | objects.                             |
+--------------------------------------+--------------------------------------+
|     eZ\Publish\Core\Pagination\Pager | Same as LocationSearchAdapter but    |
|                                      | returns instead                      |
| fantaLocationSearchHitAdapter        | SearchHit &lt;https://github.com/ezs |
|                                      | ys                                   |
|                                      | tems/ezpublish-kernel/blob/master/eZ |
|                                      | /Publish/API/Repository/Values/Conte |
|                                      | nt/Search/SearchHit.php&gt;\_\_      |
|                                      | objects.                             |
+--------------------------------------+--------------------------------------+

</div>
 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376004319">
-   [Description](#PaginatingAPIsearchresults-Description)
-   [Solution](#PaginatingAPIsearchresults-Solution)
    -   [Adapters](#PaginatingAPIsearchresults-Adapters)

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

