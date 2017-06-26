<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [Building a Bicycle Route Tracker in eZ Platform](Building-a-Bicycle-Route-Tracker-in-eZ-Platform_31431606.html)
5.  [Part 2: Working on the Ride](31431613.html)

</div>
**Developer : Step 2 - Display the list of Rides on the homepage**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Philippe Vincent-Royol, last modified by Sarah Haïm-Lubczanski on Nov 22, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div class="toc-macro rbtoc1490375983363">
-   1 [Customize your homepage template](#Step2-DisplaythelistofRidesonthehomepage-Customizeyourhomepagetemplate)
-   2 [Create your sub controller to display list of Rides](#Step2-DisplaythelistofRidesonthehomepage-CreateyoursubcontrollertodisplaylistofRides)
-   3 [Create template to display the list of Rides](#Step2-DisplaythelistofRidesonthehomepage-CreatetemplatetodisplaythelistofRides)
-   4 [Use a custom template to display view line of a Ride](#Step2-DisplaythelistofRidesonthehomepage-UseacustomtemplatetodisplayviewlineofaRide)

</div>
<img src="attachments/32866555/32866553.png?effects=drop-shadow" alt="image0" class="confluence-embedded-image image-center" width="488" height="250" />

**Customize your homepage template**

Let's modify the `Resources/views/content/full/root_folder.html.twig` adding a call to a subrequest to display the list of all existing Rides with pagination:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**root\_folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
{% extends "pagelayout.html.twig" %}

{% block content %}
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>

    <h3 class="center bottom-plus new-header">{{ ez_content_name(content) }}</h3>
    <div class="col-xs-10 text-justified">
    {{ render( controller( "AppBundle:Homepage:getAllRides" ) ) }}
    </div>
 {% endblock %}
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
 For the moment, we use a simple `render()` Twig function but when we talk about cache, we will use `render_esi`.

</div>
</div>
**Create your sub controller to display list of Rides**

Create your `/src/AppBundle/Controller/HomepageController.php `with the method `getAllRidesAction`:*\**\*

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**HomepageController.php**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<?php
namespace AppBundle\Controller;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Publish\Core\MVC\Symfony\Controller\Controller;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\Core\Pagination\Pagerfanta\ContentSearchAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
class HomepageController extends Controller
{
  public function getAllRidesAction(Request $request)
  {
    $repository = $this->getRepository();
    $locationService = $repository->getLocationService();
    $contentService = $repository->getContentService();
    $rootLocationId = $this->getConfigResolver()->getParameter('content.tree_root.location_id');
    $rootLocation = $locationService->loadLocation($rootLocationId);
    $currentLocationId = 2;
    $currentLocation = $locationService->loadLocation($currentLocationId);
    $currentContent = $contentService->loadContentByContentInfo($currentLocation->contentInfo);
    $query = new Query();
    $query->query = new Criterion\LogicalAnd(
      array(
        new Criterion\Subtree($rootLocation->pathString),
        new Criterion\Visibility(Criterion\Visibility::VISIBLE),
        new Criterion\ContentTypeIdentifier(array('ride'))
      )
    );
    $query->sortClauses = array(
      new SortClause\DatePublished(Query::SORT_ASC)
    );
    $pager = new Pagerfanta(
      new ContentSearchAdapter($query, $this->getRepository()->getSearchService())
    );
    //FIXME : get $limit value from a custom parameter
    $limit = 10;
    $pager->setMaxPerPage($limit);
    $pager->setCurrentPage($request->get('page', 1));
    return $this->render(
      'list/rides.html.twig',
      array(
        'location' => $currentLocation,
        'content' => $currentContent,
        'pagerRides' => $pager,
      )
    );
  }
}
```

</div>
</div>
**Create template to display the list of Rides**

Create `app/Resources/views/list/rides.html.twig `template. You use a &lt;table&gt; to display the list of rides. The &lt;thead&gt; of the &lt;table&gt; is in this Ride list template and each &lt;tr&gt; (line of the table) is in the line ride template.

So each time you use the line Ride template, you have to remember the choice of using a &lt;tr&gt;.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**rides.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<div class="row regular-content-size">
  <div class="col-xs-10 col-xs-offset-1 box-style">
    <h3 class="center bottom-plus new-header">List of all Rides</h3>
    {# Loop over the page results #}
    {% for ride in pagerRides %}
      {% if loop.first %}
        <table class="table table-hover">
        <thead>
        <tr class="table-header">
          <th> Ride</th>
          <th>From</th>
          <th> To</th>
          <th>Distance</th>
          <th>Level</th>
        </tr>
        </thead>
        <tbody>
      {% endif %}
      {{ render( controller( 'ez_content:viewLocation', { 'locationId': ride.versionInfo.contentInfo.mainLocationId, 'viewType': 'line' } )) }}
      {% if loop.last %}
        </tbody>
        </table>
      {% endif %}
    {% endfor %}
  </div>
</div>
```

</div>
</div>
The next step is to create the override rule to use a dedicated template for the view line of Rides.

To do so, you need to configure your Bundle to inject override configuration.

**Use a custom template to display view line of a Ride**

You add the rule for the line\_ride template to be used in your `app/config/ezplatform.yml`file.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
system:
    site_group:
        content_view:
            line:
                line_ride:
                    template: "line/ride.html.twig"
                    match:
                        Identifier\ContentType: "ride"
```

</div>
</div>
Create your `app/Resources/views/line/ride.html.twig `template.

*Remember, it's only one line of a table, so you will find a &lt;tr&gt; tag with some &lt;td&gt; tags.*

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ride.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<tr>
    <td>
        <strong>
            <a href="{{ path( "ez_urlalias", { 'locationId': content.contentInfo.mainLocationId } ) }}"
               target="_self">
                {{ ez_content_name( content ) }}
            </a>
        </strong>
    </td>
    <td>
        {{ ez_render_field(content, 'starting_point', {'parameters': {'width': '100%', 'height': '100px', 'showMap': true, 'showInfo': true }}
        ) }}
    </td>
    <td>
        {{ ez_render_field(content, 'ending_point', {'parameters': {'width': '100%', 'height': '100px', 'showMap': true, 'showInfo': true }}
        ) }}
    </td>
    <td>
        <p>{{ ez_render_field( content, 'length' ) }} Km</p>
    </td>
    <td>
        <p>{{ ez_render_field( content, 'level' ) }}</p>
    </td>
</tr>
```

</div>
</div>
Go to the homepage of your Tutorial website, and you will see the list of Rides !

 

 

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:50%;min-width:50%;max-width:50%;">
⬅ Previous: [Step 1 - Display content of a Ride](Step-1---Display-content-of-a-Ride_31431852.html)

</div>
<div class="columnMacro">
Next: [Congrats!](https://doc.ez.no/pages/viewpage.action?pageId=31431873) ➡

</div>
</div>
</div>
</div>
 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<div class="panel" style="border-color: #f58220;border-width: 2px;">
<div class="panelHeader"
style="border-bottom-width: 2px;border-bottom-color: #f58220;">
**Tutorial path**

</div>
<div class="panelContent">
<div class="plugin_pagetree">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="pageSection group">
<div class="pageSectionHeader">
**Attachments:**

</div>
<div class="greybox" align="left">
<img src="images/icons/bullet_blue.gif" alt="image1" width="8" height="8" /> [Beginners\_Tutorial-RideList-view.png](attachments/32866555/32866553.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image2" width="8" height="8" /> [part2-step2-end.png](attachments/32866555/32866554.png) (image/png)

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

