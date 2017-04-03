<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [Building a Bicycle Route Tracker in eZ
    Platform](Building-a-Bicycle-Route-Tracker-in-eZ-Platform_31431606.html)
5.  [Part 1: Setting up eZ Platform](31431610.html)

</div>
**Developer : Step 2 - Create your content model**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Sarah Haïm-Lubczanski, last modified by Dominika Kurek on Mar
15, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div class="toc-macro rbtoc1490375982367">
-   1 [Content Model
    Overview](#Step2-Createyourcontentmodel-ContentModelOverview)
-   2 [Create your Content
    Types](#Step2-Createyourcontentmodel-CreateyourContentTypes)
    -   2.1 [Create the Ride Content
        Type](#Step2-Createyourcontentmodel-CreatetheRideContentType)
-   3 [Populate your Content
    tree](#Step2-Createyourcontentmodel-PopulateyourContenttree)
-   4 [Ready for Step 3](#Step2-Createyourcontentmodel-ReadyforStep3)

</div>
<div class="panel"
style="border-bottom: 1px solid white;border-width: 0px;">
<div class="panelContent">
How your content is structured is a very important part of an eZ
Platform project. Think of it as the database design of your
application. We recommend that you read the [Under the hood, concepts
and
organization](https://doc.ez.no/display/USER/2.+Under+the+hood%2C+concepts+and+organization)
documentation page, but you can also read the paragraph below for a
short, straight-to-the-point introduction.

</div>
</div>
**Content Model Overview**

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

**Create your Content Types**

The site will use two Content Types: **Ride** and **Point of interest**

*\**\* *This is an overview of the content model we will implement an
N-N relationship model:*

Go to the admin interface (“&lt;yourdomain&gt;/ez”), and authenticate
with the default username: `admin` and the default password :
`publish`. 

Click on **Admin Panel** in the Navigation hub, and choose **Content
types** in the sub menu:

![image0](attachments/31431844/32869326.png){.confluence-embedded-image
.confluence-content-image-border .image-center width="869px"
height="125px"}

You will see a list of **Content Type Groups**. They are used to group
content types in a logical way.

Click on **Content** and then click on **Create a content type**. 

![image1](attachments/31431844/32869552.png){.confluence-embedded-image}

We will create the Ride Content Type first:

**Create the Ride Content Type**

A bike ride, with a description and some extra info, like who took this
ride for the first time, or points of interest it goes through.

Fill the form with this basic info: 

**Name**: Ride\
**Identifier**: ride\
**Content name pattern**: &lt;name&gt; 

Then create all fields with the following information: 

<div class="table-wrap">
  ----------------------------------------------------------------------------
  Name     Identifi Field   Requi Search Transla Others
           er       Type    red   able   table   
  -------- -------- ------- ----- ------ ------- -----------------------------
  Name     name     Text    yes   yes    yes      
                    line                         

  Photo    photo    Image   no    no     no       

  Descript descript Rich    yes   yes    yes      
  ion      ion      text                         

  Difficul level    Selecti yes   yes    no      Add a couple of Levels, such
  ty                on                           as “beginner, intermediate,
  level                                          advanced”

  Starting starting Map     yes   yes    no       
  point    \_point  locatio                      
                    n                            

  Ending   ending\_ Map     yes   yes    no       
  point    point    locatio                      
                    n                            

  Length   length   Integer yes   yes    no       

  Author   author   Authors no    yes    yes      
  ----------------------------------------------------------------------------

</div>
**Populate your Content tree**

Go back to the Content tree and create a Folder named *All Rides* using
the **Create** button in the Action bar on the right of the screen.

![image2](attachments/31431844/32869323.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center height="250px"}

In the folder, create a couple of Rides, using the Create button, being
on the Content “All Rides” so the new Content will be created as a child
directly. Don’t worry, if you created the Content elsewhere, you can
move it later.

![image3](attachments/31431844/32869324.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center height="400px"}

**Ready for Step 3**

![image4](attachments/31431844/32869331.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center height="400px"}

You have now : 2 Rides (or more) in a Folder and are ready to customize
the Homepage of your Go Bike website !

------------------------------------------------------------------------

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:50%;min-width:50%;max-width:50%;">
 ⬅ Previous: [Step 1 - Setting up eZ Platform](31431610.html)

</div>
<div class="columnMacro">
 Next: [Step 3 - Customizing the general
layout](Step-3---Customizing-the-general-layout_31428488.html) ➡

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
![image5](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Capture d’écran 2015-10-14 à
14.36.04.png](attachments/31431844/31431838.png) (image/png)
![image6](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Capture d’écran 2015-10-14 à
02.40.38.png](attachments/31431844/31431839.png) (image/png)
![image7](images/icons/bullet_blue.gif){width="8px" height="8px"}
[screengrab-2015-06-17\_14.17.44.png](attachments/31431844/31431840.png)
(image/png) ![image8](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[screengrab-2015-06-17\_14.12.12.png](attachments/31431844/31431841.png)
(image/png) ![image9](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[screengrab-2015-06-17\_14.11.52.png](attachments/31431844/31431842.png)
(image/png) ![image10](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[screengrab-2015-06-17\_09.46.30.png](attachments/31431844/31431843.png)
(image/png) ![image11](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[eZ\_Platform\_-\_eZ\_Platform\_UI\_-\_2016-12-13\_18.30.24.png](attachments/31431844/32869322.png)
(image/png) ![image12](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[Editing\_New\_Folder\_-\_eZ\_Platform\_UI\_-\_2016-12-13\_18.32.23.png](attachments/31431844/32869323.png)
(image/png) ![image13](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[all-rides\_eZ\_Platform\_-\_eZ\_Platform\_UI\_-\_2016-12-13\_18.32.53.png](attachments/31431844/32869324.png)
(image/png) ![image14](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[Administration\_dashboard-menu-bar\_eZ\_Platform\_UI.png](attachments/31431844/32869326.png)
(image/png) ![image15](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[all-rides\_liste-admin.png](attachments/31431844/32869331.png)
(image/png) ![image16](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[Button-create-content-type.png](attachments/31431844/32869552.png)
(image/png)

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

