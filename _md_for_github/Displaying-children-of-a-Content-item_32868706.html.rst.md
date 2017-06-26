<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Cookbook](Cookbook_31429528.html)

</div>
**Developer : Displaying children of a Content item**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Nov 28, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Description**

One of the basic design tasks you may need to complete when creating your website is configuring one page to display all of its children. Examples are having a blog display blog posts, of a folder that shows all articles it contains.

**Solution**

There are two ways to make a Content item display its children:

1.  [Using a Custom Controller](#DisplayingchildrenofaContentitem-UsingaCustomController)
2.  [Using the Query Controller](#DisplayingchildrenofaContentitem-UsingtheQueryController)

This recipe will show how to use both those methods to display all children of a Content item with the Content Type Folder.

**Using a Custom Controller**

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
There are three different ways of using a Custom Controller that you can learn about in the [Custom Controller page](https://doc.ez.no/display/DEVELOPER/Content+Rendering#ContentRendering-Customcontrollers). In this case we will be applying the first of these, that is using the Custom Controller alongside the built-in ViewController.

</div>
</div>
Configuring for the use of a Custom Controller starts with pointing to it in your standard view configuration (which you can keep in `ezplatform.yml` or a separate file, for example `views.yml`):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
folder:
    controller: app.controller.folder:showAction
    template: "full/folder.html.twig"
    match:
        Identifier\ContentType: "folder"
```

</div>
</div>
Besides the standard view config, under the `controller` key you need to provide here the path to the Controller and the action. They are defined in the following file:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**AppBundle/Controller/FolderController.php**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<?php

namespace AppBundle\Controller;

use eZ\Publish\API\Repository\ContentService;
use eZ\Publish\API\Repository\LocationService;
use eZ\Publish\API\Repository\SearchService;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\Core\MVC\ConfigResolverInterface;
use eZ\Publish\Core\MVC\Symfony\View\ContentView;
use AppBundle\Criteria\Children;

class FolderController {

    /** @var \eZ\Publish\API\Repository\SearchService */
    protected $searchService;

    /** @var \eZ\Publish\Core\MVC\ConfigResolverInterface */
    protected $configResolver;

    /** @var \AppBundle\Criteria\Children */
    protected $childrenCriteria;

    /**
     * @param \eZ\Publish\API\Repository\SearchService $searchService
     * @param \eZ\Publish\Core\MVC\ConfigResolverInterface $configResolver
     * @param \AppBundle\Criteria\Children $childrenCriteria
     */
    public function __construct(
        SearchService $searchService,
        ConfigResolverInterface $configResolver,
        Children $childrenCriteria
    ) {
        $this->searchService = $searchService;
        $this->configResolver = $configResolver;
        $this->childrenCriteria = $childrenCriteria;
    }

    /**
     * Displays blog posts and gallery images on home page.
     *
     * @param \eZ\Publish\Core\MVC\Symfony\View\ContentView $view
     *
     * @return \eZ\Publish\Core\MVC\Symfony\View\ContentView
     */
    public function showAction(ContentView $view)
    {
        $view->addParameters([
            //'content' => $this->contentService->loadContentByContentInfo($view->getLocation()->getContentInfo()),
            'items' => $this->fetchItems($view->getLocation(), 25),
        ]);
        return $view;
    }

    private function fetchItems($location, $limit)
    {
        $languages = $this->configResolver->getParameter('languages');
        $query = new Query();
        //$location = $this->locationService->loadLocation($locationId);

    $query->query = $this->childrenCriteria->generateChildCriterion($location, $languages);
        $query->performCount = false;
        $query->limit = $limit;
        $query->sortClauses = [
            new SortClause\DatePublished(Query::SORT_DESC),
        ];
        $results = $this->searchService->findContent($query);
        $items = [];
        foreach ($results->searchHits as $item) {
            $items[] = $item->valueObject;
        }
        return $items;
    }

}
```

</div>
</div>
As you can see, this Controller makes use of the `generateChildCriterion`, which means you need to provide a file containing this function:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**AppBundle/Criteria/Children.php**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<?php

namespace AppBundle\Criteria;

use eZ\Publish\API\Repository\Values\Content\Location;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;

class Children
{
    /**
     * Generate criterion list to be used to fetch sub-items.
     *
     * @param \eZ\Publish\API\Repository\Values\Content\Location $location location of the root
     * @param string[] $languages array of languages
     *
     * @return \eZ\Publish\API\Repository\Values\Content\Query\Criterion
     */
    public function generateChildCriterion(Location $location, array $languages = [])
    {
        return new Criterion\LogicalAnd([
            new Criterion\Visibility(Criterion\Visibility::VISIBLE),
            new Criterion\ParentLocationId($location->id),
            new Criterion\Subtree($location->pathString),
            new Criterion\LanguageCode($languages),
        ]);
    }
}
```

</div>
</div>
Next, you must register these two services:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**AppBundle/Resources/config/services.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
services:

    app.criteria.children:
        class: AppBundle\Criteria\Children

    app.controller.folder:
        class: AppBundle\Controller\FolderController
        arguments:
            - '@ezpublish.api.service.search'
            - '@ezpublish.config.resolver'
            - '@app.criteria.children'
```

</div>
</div>
Finally, let's use the Controller in a template:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/Resources/views/full/folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<h1>{{ ez_content_name(content) }}</h1>

{% for item in items %}
  <h2>{{ ez_content_name(item) }}</h2>
{% endfor %}
```

</div>
</div>
This template makes use of the `items` specified in the Controller file to list every child of the folder.

**Using the Query Controller**

The Query Controller is a predefined custom content view Controller that runs a Repository Query.

If you need to create a simple query it's easier to use the Query Controller than to build a completely custom one, as you will not have to write custom PHP code. Like with a Custom Controller, however, you will be able to use properties of the viewed Content or Location as parameters.

The main file in this case is a `LocationChildrenQueryType.php` file which generates a Query that retrieves the children of the current Location.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**AppBundle/QueryType/LocationChildrenQueryType.php**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<?php
namespace AppBundle\QueryType;

use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion\ParentLocationId;
use eZ\Publish\Core\QueryType\QueryType;

class LocationChildrenQueryType implements QueryType
{
    public function getQuery(array $parameters = [])
    {
        return new LocationQuery([
            'filter' => new ParentLocationId($parameters['parentLocationId']),
        ]);
    }

    public function getSupportedParameters()
    {
        return ['parentLocationId'];
    }
//
    public static function getName()
    //
        return 'LocationChildren';
    }
}
```

</div>
</div>
Next, in your standard view configuration file include a block that indicates when this Controller will be used. It is similar to regular view config, but contains additional information:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
folder:
    controller: "ez_query:locationQueryAction"
    template: "full/folder.html.twig"
    match:
        Identifier\ContentType: "folder"
    params:
        query:
            query_type: 'LocationChildren'
            parameters:
                parentLocationId: "@=location.id"
            assign_results_to: 'items'
```

</div>
</div>
In this case the `controller` key points to the Query Controller's `locationQuery` action. `assign_results_to` identifies the parameter containing all the retrieved children that will later be used in the templates:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/Resources/views/full/folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<h1>{{ ez_content_name(content) }}</h1>

{% for item in items.searchHits %}
  <h2>{{ ez_content_name(item.valueObject.contentInfo) }}</h2>
{% endfor %}
```

</div>
</div>
This template makes use of the `items` specified in `assign_results_to` to list every child of the folder.

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376002970">
-   [Description](#DisplayingchildrenofaContentitem-Description)
-   [Solution](#DisplayingchildrenofaContentitem-Solution)
    -   [Using a Custom Controller](#DisplayingchildrenofaContentitem-UsingaCustomController)
    -   [Using the Query Controller](#DisplayingchildrenofaContentitem-UsingtheQueryController)

</div>
**Related topics:**

[Custom Controller](https://doc.ez.no/display/DEVELOPER/Content+Rendering#ContentRendering-Customcontrollers)

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

