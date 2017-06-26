1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[Building a Bicycle Route Tracker in eZ
    Platform](Building-a-Bicycle-Route-Tracker-in-eZ-Platform_31431606.html)</span>
5.  <span>[Part 2: Working on the Ride](31431613.html)</span>

<span id="title-text"> Developer : Step 1 - Display content of a Ride </span> {#title-heading .pagetitle}
=============================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last
modified on Dec 19, 2016

 

 

<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/31431852/31431849.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center height="400"}</span>

Now let’s inject and display all Points of interest within the view.

-   <span class="TOCOutline">1</span> [Creating the Ride
    view](#Step1-DisplaycontentofaRide-CreatingtheRideview)
    -   <span class="TOCOutline">1.1.1</span> [What is in this template
        ?](#Step1-DisplaycontentofaRide-Whatisinthistemplate?)
-   <span class="TOCOutline">1.2</span> [Add a new parameter to your
    override
    rule](#Step1-DisplaycontentofaRide-Addanewparametertoyouroverriderule)
-   <span class="TOCOutline">1.3</span> [Check the Ride full
    view](#Step1-DisplaycontentofaRide-ChecktheRidefullview)
    -   <span class="TOCOutline">1.3.1</span> [Preview in the
        Admin](#Step1-DisplaycontentofaRide-PreviewintheAdmin)
    -   <span class="TOCOutline">1.3.2</span> [Go to the Ride
        page](#Step1-DisplaycontentofaRide-GototheRidepage)

<span class="TOCOutline">2</span> [Points Of
Interest](#Step1-DisplaycontentofaRide-PointsOfInterest)
-   <span class="TOCOutline">2.1</span> [Create the Point Of
    Interest (POI) Content
    Type](#Step1-DisplaycontentofaRide-CreatethePointOfInterest(POI)ContentType)
-   <span class="TOCOutline">2.2</span> [Edit the Ride Content
    Type](#Step1-DisplaycontentofaRide-EdittheRideContentType)

<span class="TOCOutline">3</span> [Ride view
improvements](#Step1-DisplaycontentofaRide-Rideviewimprovements)
-   <span class="TOCOutline">3.1</span> [Display the list of
    POI](#Step1-DisplaycontentofaRide-DisplaythelistofPOI)
-   <span class="TOCOutline">3.2</span> [Create your Point of Interest
    line
    view](#Step1-DisplaycontentofaRide-CreateyourPointofInterestlineview)
-   <span class="TOCOutline">3.3</span> [Integrate the Points of
    Interest in the Ride
    view](#Step1-DisplaycontentofaRide-IntegratethePointsofInterestintheRideview)
    -   <span class="TOCOutline">3.3.1</span> [Create the
        RideController](#Step1-DisplaycontentofaRide-CreatetheRideController)
    -   <span class="TOCOutline">3.3.2</span> [Add the Point Of Interest
        in the Ride full
        view](#Step1-DisplaycontentofaRide-AddthePointOfInterestintheRidefullview)

Creating the Ride view {#Step1-DisplaycontentofaRide-CreatingtheRideview}
======================

Create a Twig template app/Resources/views/full/ride.html.twig and paste
into it the following HTML and Twig tags:

**ride.html.twig**

~~~~ brush:
{% extends "pagelayout.html.twig" %}
{% block content %}
  <section>
    <div class="container">
      <div class="row regular-content-size">
        <div class="col-xs-10 col-xs-offset-1 row-padding">
          <div class="col-xs-12">
            <div class="col-xs-1 text-left">
              <h2>Ride:</h2>
            </div>
            <div class="col-xs-11 text-left">
              <h2 class="extra-padding-left">{{ ez_content_name( content ) }}</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div id="map-container">
      {{ ez_render_field(content, 'starting_point', {'parameters': { 'height': '330px', 'showMap': true, 'showInfo': false }}
      ) }}
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row regular-content-size">
        <div class="col-xs-10 col-xs-offset-1 padding-box">
          <div class="col-xs-2">
            <div class="box-ride">
              <h3 class="special-number">{{ ez_render_field( content, 'length') }} Km</h3>
              <p class="pre-small special-number special-number-margin"><strong>{{ 'Level' }}</strong></p>
            </div>
          </div>
          <div class="col-xs-10">
            <div class="col-xs-5">
              <p>Created by: {{ ez_field_value( content, 'author') }}</p>
              <p>Start: {{ ez_field_value(content, 'starting_point') }}
              </p>
              <p>End: {{ ez_field_value(content, 'ending_point') }}</p>
            </div>
          </div>
        </div>
        <div class="col-xs-10 col-xs-offset-1 padding-box">
          <div class="col-xs-10">
            <div class="col-xs-2 text-right">
              <p>Description:</p>
            </div>
            <div class="col-xs-10 text-justify">
              {{ ez_render_field( content, 'description') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
{% endblock %} 
~~~~

### What is in this template ? {#Step1-DisplaycontentofaRide-Whatisinthistemplate?}

You reuse your pagelayout.html.twig template, to have the menu, footer
and CSS.

The Ride template is in a block and you use the Twig helpers to render
the content of a Ride

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
See the [Twig Functions
Reference](Twig-Functions-Reference_32114025.html) for more information
on Twig helpers

<span
class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Note: the Level Field is static for now and uses the translation
capacity.

The Starting Point and Ending Point Google Maps rendering is not yet
done. You will use the [MapLocation Field
Type](MapLocation-Field-Type_31430523.html) to render this Content Type.

Add a new parameter to your override rule {#Step1-DisplaycontentofaRide-Addanewparametertoyouroverriderule}
-----------------------------------------

We still haven’t set any matching rule for our new Content Type Ride, so
let’s add one that will render a specific template for a Ride Content
Type. 

**ezplatform.yml**

~~~~ brush:
default:
    content_view:
        full:
            full_ride:
                template: "full/ride.html.twig"
                match:
                    Identifier\ContentType: "ride"
~~~~

Check the Ride full view {#Step1-DisplaycontentofaRide-ChecktheRidefullview}
------------------------

### Preview in the Admin {#Step1-DisplaycontentofaRide-PreviewintheAdmin}

You can use the Preview while Editing in the Admin to preview your
content rendered in the full view.

<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/31431852/32114375.png){.confluence-embedded-image
.confluence-content-image-border .image-center width="505"
height="250"}</span>

### Go to the Ride page {#Step1-DisplaycontentofaRide-GototheRidepage}

You can also go the the URL of the content. It is a URL like this one
**http://127.0.0.1:8000/view/content/53/eng-GB/full/true/55** where 53
is the Content ID and 55 is the Location ID of my Ride.  
The infos in the URL are
http://&lt;yourhost&gt;/view/content/&lt;ContentId&gt;/&lt;language&gt;/full/true/&lt;LocationId&gt;

You will find the Content ID and the Location ID of your Ride in the
Admin, under the Details tab.

 
<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/31431852/32114372.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center width="807" height="400"}</span>

Points Of Interest {#Step1-DisplaycontentofaRide-PointsOfInterest}
==================

Go to Admin Panel &gt; Content Types, and under the “Content”  group,
create the Point Of Interest Content Type.

<span
class="confluence-embedded-file-wrapper image-left-wrapper">![](attachments/31431852/32869547.png){.confluence-embedded-image
.image-left}</span>

 

 

Create the Point Of Interest (POI) Content Type {#Step1-DisplaycontentofaRide-CreatethePointOfInterest(POI)ContentType}
-----------------------------------------------

A geographical location rides go through. Each ride may be related to as
many points of interest as needed.

**Name**: Point of interest  
**Identifier**: point\_of\_interest  
**Content name pattern**: &lt;name&gt; 

 

Then create all fields with the following information: 

-   **Name**: identifier **name**; field
    type **textLine **(**Required** / **Searchable** / **Translatable**)
-   **Description**: identifier **description**; field type
    **Rich Text **(**Searchable** / **Translatable**)
-   **Photo**: identifier **photo**; field type **Image **(**Required**)
-   **Photo Legend**: identifier **legend**; field type **Rich
    Text **(**Searchable** / **Translatable**)
-   **Place**: identifier **place**;
    field type **MapLocation **(**Required** / **Searchable**)

 

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
The **content name pattern** defines how the name and URL part of
Content items of this type will be built. It may include static strings,
as well as references to field definitions, using their identifier.

The value of the fields referenced in the pattern will be used to build
the name. Most Field Types are able to render a textual representation
of their value, but be aware that it is not implemented for some of them
([Selection Field Type](Selection-Field-Type_31430539.html), [Relation
Field Type](Relation-Field-Type_31430533.html), [RelationList Field
Type](RelationList-Field-Type_31430535.html)).

Now, validate the Content Type creation form. It will save the Point Of
Interest Content Type.  
Create some Points Of Interest in the Content tree.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Note that you will need pictures (for the Photo, the image Field) to
represent them.

Edit the Ride Content Type {#Step1-DisplaycontentofaRide-EdittheRideContentType}
--------------------------

 Now edit the Ride in order to add a Content Relation Multiple between
the two Content Types.

  
<span
class="confluence-embedded-file-wrapper confluence-embedded-manual-size">![](attachments/31431852/32869544.png?effects=border-simple,blur-border){.confluence-embedded-image
width="547" height="400"}</span>  
*Adding a relation between the Ride and the Points of Interest using the
Content Relation Multiple*

Then link some Points Of Interests to a Ride in the Admin interface.

Ride view improvements {#Step1-DisplaycontentofaRide-Rideviewimprovements}
======================

Display the list of POI {#Step1-DisplaycontentofaRide-DisplaythelistofPOI}
-----------------------

<span style="color: rgb(51,51,51);">By default, there are only 4
variables in a view: `noLayout`, `viewbaseLayout`, `content` and
`location`.</span>

It is possible to inject whatever variable you want in a specific view.

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
You will find more info here: [Custom
controllers](Content-Rendering_31429679.html#ContentRendering-Customcontrollers)
and [View provider
configuration](Content-Rendering_31429679.html#ContentRendering-Viewproviderconfiguration).

Create your Point of Interest line view {#Step1-DisplaycontentofaRide-CreateyourPointofInterestlineview}
---------------------------------------

Now, we need to create the line view for Point of Interest.

Declare a new override rule into your `app/config/ezplatform.yml`:

**ezplatform.yml**

~~~~ brush:
    system:
        default:
            content_view:
                #full views here
                line:
                    line_point_of_interest:
                        template: 'line/point_of_interest.html.twig'
                        match:
                            Identifier\ContentType: ['point_of_interest']
~~~~

Create your template for the line view of a Point of Interest
`app/Resources/views/line/point_of_interest.html.twig`:

**point\_of\_interest.html.twig**

~~~~ brush:
<section>
<div class="col-xs-4 photos-box">
  <a href="#bikeModal{{ content.id }}" class="portfolio-link" data-toggle="modal">
    <div class="caption">
      <div class="caption-content">
        <i class="fa fa-search-plus fa-3x"></i>
      </div>
    </div>
    {{ ez_render_field( content, 'photo', { parameters: { 'alias': 'small'},
    attr: { 'class': 'img-responsive img-rounded', 'alt':'' }}) }}
    {#<img src="images/lyon.png" class="img-responsive img-rounded" alt="">#}
  </a>
</div>

{# MODAL #}
<div class="bike-modal modal fade" id="bikeModal{{ content.id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
          <div class="modal-body text-center">
            <h2>Photo: {{ ez_content_name( content ) }}</h2>
            <hr class="featurette-divider">
            {{ ez_render_field( content, 'photo', { parameters: { 'alias': 'large'},
            attr: { 'class': 'img-responsive img-rounded' }}) }}
            {#<img src="images/lyon.png" class="img-responsive img-centered img-rounded" alt="">#}
            {{ ez_render_field( content, 'description', { attr: { 'class': 'padding-box text-justify' }}) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
~~~~

Integrate the Points of Interest in the Ride view {#Step1-DisplaycontentofaRide-IntegratethePointsofInterestintheRideview}
-------------------------------------------------

### Create the RideController {#Step1-DisplaycontentofaRide-CreatetheRideController}

In the AppBundle directory, create a PHP file :
`/src/AppBundle/Controller/RideController.php`

**/src/AppBundle/Controller/RideController.php**

~~~~ brush:
<?php
namespace AppBundle\Controller;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use eZ\Bundle\EzPublishCoreBundle\Controller;
use eZ\Publish\API\Repository\Values\Content\Query\SortClause;
use eZ\Publish\Core\Repository\Values\Content\Location;
class RideController extends Controller
{
  /**
   * Action used to display a ride
   *  - Adds the list of all related Points of interest to the response.
   *
   * @param Location $location
   * @param $viewType
   * @param bool $layout
   * @param array $params
   * @return mixed
   */
  public function viewRideWithPOIAction(Location $location, $viewType, $layout = false, array $params = array())
  {
    $repository = $this->getRepository();
    $contentService = $repository->getContentService();
    $currentLocation = $location;
    $currentContent = $contentService->loadContentByContentInfo($currentLocation->getContentInfo());
    $pointOfInterestListId = $currentContent->getFieldValue('pois'); //points of interest
    $pointOfInterestList = array();
    foreach ($pointOfInterestListId->destinationContentIds as $pointId)
    {
      $pointOfInterestList[$pointId] = $contentService->loadContent($pointId);
    }
    return $this->get('ez_content')->viewLocation(
      $location->id,
      $viewType,
      $layout,
      array('pointOfInterestList' => $pointOfInterestList) + $params
    );
  }
}
~~~~

Update the `/app/config/ezplatform.yml` file to mention the
RideController

**/app/config/ezplatform.yml**

~~~~ brush:
        default:
            content_view:
                full:
                    full_ride:
                        template: "full/ride.html.twig"
                        controller: "AppBundle:Ride:viewRideWithPOI"
                        match:
                            Identifier\ContentType: "ride"
~~~~

### Add the Point Of Interest in the Ride full view {#Step1-DisplaycontentofaRide-AddthePointOfInterestintheRidefullview}

Add the following lines (at the end of the Ride full view file, before
the closing tag

`{% endblock %}`

**/app/Resources/views/full/ride.html.twig**

~~~~ brush:
<section>
<div class="col-xs-4 photos-box">
  <a href="#bikeModal{{ content.id }}" class="portfolio-link" data-toggle="modal">
    <div class="caption">
      <div class="caption-content">
        <i class="fa fa-search-plus fa-3x"></i>
      </div>
    </div>
    {{ ez_render_field( content, 'photo', { parameters: { 'alias': 'small'},
    attr: { 'class': 'img-responsive img-rounded', 'alt':'' }}) }}
    {#<img src="images/lyon.png" class="img-responsive img-rounded" alt="">#}
  </a>
</div>

{# MODAL #}
<div class="bike-modal modal fade" id="bikeModal{{ content.id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
          <div class="modal-body text-center">
            <h2>Photo: {{ ez_content_name( content ) }}</h2>
            <hr class="featurette-divider">
            {{ ez_render_field( content, 'photo', { parameters: { 'alias': 'large'},
            attr: { 'class': 'img-responsive img-rounded' }}) }}
            {#<img src="images/lyon.png" class="img-responsive img-centered img-rounded" alt="">#}
            {{ ez_render_field( content, 'description', { attr: { 'class': 'padding-box text-justify' }}) }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
~~~~

 

Then check the Ride page again to see the Points of Interest !

Remember:
http://&lt;yourhost&gt;/view/content/&lt;ContentId&gt;/&lt;language&gt;/full/true/&lt;LocationId&gt;

 

<span class="char" title="Leftwards Black Arrow">⬅</span> Previous:
[Working on the Ride introduction page](31431613.html)

Next: [Step 2 - Display the list of Rides on the
homepage](Step-2---Display-the-list-of-Rides-on-the-homepage_32866555.html)
<span class="confluence-link" title="Black Rightwards Arrow">➡</span>

 

 

**Tutorial path**

Attachments: {#attachments .pageSectionTitle}
------------

![](images/icons/bullet_blue.gif){width="8" height="8"}
[Beginners\_Tutorial-Ride-view.png](attachments/31431852/31431849.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Edit\_Ride\_-adding\_poi\_relation.png](attachments/31431852/31431850.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Beginners\_Tutorial\_-\_Bike\_Rides\_-\_2015-07-31\_16.38.00.png](attachments/31431852/31431851.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[details\_tab\_for\_locationid.png](attachments/31431852/32114372.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Admin-preview-full-ride.png](attachments/31431852/32114375.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[adding-pois-to-the-ride-content-type.png](attachments/31431852/32869544.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Button-create-content-type.png](attachments/31431852/32869547.png)
(image/png)  

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


