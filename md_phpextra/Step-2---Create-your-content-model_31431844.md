1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[Building a Bicycle Route Tracker in eZ
    Platform](Building-a-Bicycle-Route-Tracker-in-eZ-Platform_31431606.html)</span>
5.  <span>[Part 1: Setting up eZ Platform](31431610.html)</span>

<span id="title-text"> Developer : Step 2 - Create your content model </span> {#title-heading .pagetitle}
=============================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last
modified by <span class="editor"> Dominika Kurek</span> on Mar 15, 2017

-   <span class="TOCOutline">1</span> [Content Model
    Overview](#Step2-Createyourcontentmodel-ContentModelOverview)
-   <span class="TOCOutline">2</span> [Create your Content
    Types](#Step2-Createyourcontentmodel-CreateyourContentTypes)
    -   <span class="TOCOutline">2.1</span> [Create the Ride Content
        Type](#Step2-Createyourcontentmodel-CreatetheRideContentType)
-   <span class="TOCOutline">3</span> [Populate your Content
    tree](#Step2-Createyourcontentmodel-PopulateyourContenttree)
-   <span class="TOCOutline">4</span> [Ready for Step
    3](#Step2-Createyourcontentmodel-ReadyforStep3)

How your content is structured is a very important part of an eZ
Platform project. Think of it as the database design of your
application. We recommend that you read the [Under the hood, concepts
and
organization](https://doc.ez.no/display/USER/2.+Under+the+hood%2C+concepts+and+organization)
documentation page, but you can also read the paragraph below for a
short, straight-to-the-point introduction.

Content Model Overview {#Step2-Createyourcontentmodel-ContentModelOverview}
----------------------

The eZ Platform content repository is centered around **Content items**,
pieces of content: an article, a product review, a place…

Every Content item is built based on *blueprints*, called **Content
Types**. They are named entities that define what information makes up a
particular type of content: *article*, *product review*, *place*. An
article could include a *title*, a main *image*, an *abstract*, the
*article’s body*, a *publication date*, and a *list of authors*. Those
named entities are called **Field Definitions**, as they define what
Fields a Content item is made of. A Field Definition sets the main
information of a field: name, identifier, and type. Any Content Type can
also be a **container**, meaning that it can act as a “directory”, and
contain other Content items.

The available Types for Field Definitions can be any of the installed
**Field Types**, about 30 in the default distribution. Each is built to
represent a specific type of content field: a text, a block of rich
text, an image, a collection of relations to Content items, etc. You can
find a complete list in the [Field Types
reference](Field-Types-reference_31430495.html) section. Every Field
Type may have its own options, and comes with its own editing and
viewing interfaces.

According to what you want to store, and what you want to do with it,
you will create a set of Content Types and populate the **Content Tree**
with them.

<span style="line-height: 1.5;">Create your Content Types</span> {#Step2-Createyourcontentmodel-CreateyourContentTypes}
----------------------------------------------------------------

<span style="color: rgb(51,51,51);">The site will use two Content
Types: </span>**Ride**<span
style="color: rgb(51,51,51);"> and </span>**Point of interest**

**<span id="diagramly-reader-32868750-9030663360287622879"
class="drawio-viewer"
style="position : relative; display : inline-block; max-width : 100%;">
<span id="diagramly-reader-content-32868750-9030663360287622879"
class="diagramly-content"
style="position : relative; display : inline-block"></span> </span>**
  
*This is an overview of the content model we will implement an N-N
relationship model:*

Go to the admin interface (“&lt;yourdomain&gt;/ez”), and authenticate
with the default username: `admin` and the default password :
`publish`. 

Click on **Admin Panel** in the Navigation hub, and choose **Content
types** in the sub menu:

<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/31431844/32869326.png){.confluence-embedded-image
.confluence-content-image-border .image-center width="869"
height="125"}</span>

You will see a list of **Content Type Groups**. They are used to group
content types in a logical way.

Click on **Content** and then click on **Create a content type**. 

<span
class="confluence-embedded-file-wrapper">![](attachments/31431844/32869552.png){.confluence-embedded-image}</span>

We will create the Ride Content Type first:

#### <span style="color: rgb(0,98,147);">Create the Ride Content Type  
</span> {#Step2-Createyourcontentmodel-CreatetheRideContentType}

A bike ride, with a description and some extra info, like who took this
ride for the first time, or points of interest it goes through.

Fill the form with this basic info: 

**Name**: Ride  
**Identifier**: ride  
<span style="line-height: 1.42857;">**Content name pattern**:
&lt;name&gt; </span>

<span style="line-height: 20.0px;">Then create all fields with the
following information: </span>

| Name             | Identifier      | Field Type   | Required | Searchable | Translatable | Others                                                             |
|------------------|-----------------|--------------|----------|------------|--------------|--------------------------------------------------------------------|
| Name             | name            | Text line    | yes      | yes        | yes          |                                                                    |
| Photo            | photo           | Image        | no       | no         | no           |                                                                    |
| Description      | description     | Rich text    | yes      | yes        | yes          |                                                                    |
| Difficulty level | level           | Selection    | yes      | yes        | no           | Add a couple of Levels, such as “beginner, intermediate, advanced” |
| Starting point   | starting\_point | Map location | yes      | yes        | no           |                                                                    |
| Ending point     | ending\_point   | Map location | yes      | yes        | no           |                                                                    |
| Length           | length          | Integer      | yes      | yes        | no           |                                                                    |
| Author           | author          | Authors      | no       | yes        | yes          |                                                                    |

Populate your Content tree {#Step2-Createyourcontentmodel-PopulateyourContenttree}
--------------------------

Go back to the Content tree and create a Folder named *All Rides* using
the **Create** button in the Action bar on the right of the screen.

<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/31431844/32869323.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center height="250"}</span>

In the folder, create a couple of Rides, using the Create button, being
on the Content “All Rides” so the new Content will be created as a child
directly. Don’t worry, if you created the Content elsewhere, you can
move it later.

<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/31431844/32869324.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center height="400"}</span>

Ready for Step 3 {#Step2-Createyourcontentmodel-ReadyforStep3}
----------------

<span
class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size">![](attachments/31431844/32869331.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center height="400"}</span>

You have now : 2 Rides (or more) in a Folder and are ready to customize
the Homepage of your Go Bike website !

------------------------------------------------------------------------

 <span class="char" title="Leftwards Black Arrow">⬅</span> Previous:
[Step 1 - Setting up eZ Platform](31431610.html)

 Next: [Step 3 - Customizing the general
layout](Step-3---Customizing-the-general-layout_31428488.html) <span
class="confluence-link" title="Black Rightwards Arrow">➡</span>

 

 

**Tutorial path**

Attachments: {#attachments .pageSectionTitle}
------------

![](images/icons/bullet_blue.gif){width="8" height="8"} [Capture d’écran
2015-10-14 à 14.36.04.png](attachments/31431844/31431838.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"} [Capture d’écran
2015-10-14 à 02.40.38.png](attachments/31431844/31431839.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[screengrab-2015-06-17\_14.17.44.png](attachments/31431844/31431840.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[screengrab-2015-06-17\_14.12.12.png](attachments/31431844/31431841.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[screengrab-2015-06-17\_14.11.52.png](attachments/31431844/31431842.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[screengrab-2015-06-17\_09.46.30.png](attachments/31431844/31431843.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[eZ\_Platform\_-\_eZ\_Platform\_UI\_-\_2016-12-13\_18.30.24.png](attachments/31431844/32869322.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Editing\_New\_Folder\_-\_eZ\_Platform\_UI\_-\_2016-12-13\_18.32.23.png](attachments/31431844/32869323.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[all-rides\_eZ\_Platform\_-\_eZ\_Platform\_UI\_-\_2016-12-13\_18.32.53.png](attachments/31431844/32869324.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Administration\_dashboard-menu-bar\_eZ\_Platform\_UI.png](attachments/31431844/32869326.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[all-rides\_liste-admin.png](attachments/31431844/32869331.png)
(image/png)  
![](images/icons/bullet_blue.gif){width="8" height="8"}
[Button-create-content-type.png](attachments/31431844/32869552.png)
(image/png)  

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


