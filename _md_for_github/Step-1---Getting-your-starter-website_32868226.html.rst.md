<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [eZ Enterprise Beginner Tutorial - It's a Dog's World](32868209.html)

</div>
**Developer : Step 1 - Getting your starter website**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Dec 19, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
You can find all files used and modified in this step on [GitHub](https://github.com/ezsystems/ezstudio-beginner-tutorial/tree/step1).

</div>
</div>
To start working on the scenario of this tutorial, you need to have a minimal working website making use of fundamental eZ Platform functionalities. You need to build it by hand from the ground up, starting with a clean eZ Enterprise installation. Just remember that if you decide to change anything from the way it is shown here, you will need to double-check all code that will be provided here and make sure it fits your website.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Remember to start working with a **clean** eZ Enterprise installation, **not** Studio Demo.

To be able to follow all steps of the tutorial, make sure you are installing eZ Enterprise v1.7.0 or later.

</div>
</div>
**Setting up the website**

To set up your starter website by hand, you need to follow these steps:

**1. Get a clean eZ Enterprise installation**

See [Step 1: Installation](31429538.html) for a guide to installing eZ Enterprise.

**2. Create Content Types**

Log in to the back end – add `/ez` to your installation's address (e.g. `tutorial.lh/ez`) and log in using `admin` as the login and `publish` as the password. In the Admin Panel go to Content Types and create two Content Types (under the Content category) with the following settings:

**Dog Breed**

**Name:** Dog Breed

**Identifier:** dog\_breed

**Content name pattern:** &lt;name&gt;

**Fields:**

<div class="table-wrap">
<table style="width:100%;">
<colgroup>
<col width="14%" />
<col width="20%" />
<col width="21%" />
<col width="12%" />
<col width="14%" />
<col width="16%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Field Type</th>
<th align="left">Name</th>
<th align="left">Identifier</th>
<th align="left">Required</th>
<th align="left">Searchable</th>
<th align="left">Translatable</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">TextLine</td>
<td align="left">Name</td>
<td align="left">name</td>
<td align="left">Y</td>
<td align="left">Y</td>
<td align="left">Y</td>
</tr>
<tr class="even">
<td align="left">TextLine</td>
<td align="left">Short Description</td>
<td align="left">short_description</td>
<td align="left">Y</td>
<td align="left">Y</td>
<td align="left">Y</td>
</tr>
<tr class="odd">
<td align="left">Image</td>
<td align="left">Photo</td>
<td align="left">photo</td>
<td align="left">Y</td>
<td align="left"> </td>
<td align="left"> </td>
</tr>
<tr class="even">
<td align="left">RichText</td>
<td align="left">Full Description</td>
<td align="left">description</td>
<td align="left">Y</td>
<td align="left">Y</td>
<td align="left">Y</td>
</tr>
</tbody>
</table>

</div>
**Tip**

**Name:** Tip

**Identifier:** tip

**Content name pattern:** &lt;title&gt;

**Fields:**

<div class="table-wrap">
<table>
<colgroup>
<col width="17%" />
<col width="11%" />
<col width="17%" />
<col width="15%" />
<col width="17%" />
<col width="20%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Field Type</th>
<th align="left">Name</th>
<th align="left">Identifier</th>
<th align="left">Required</th>
<th align="left">Searchable</th>
<th align="left">Translatable</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">TextLine</td>
<td align="left">Title</td>
<td align="left">title</td>
<td align="left">Y</td>
<td align="left">Y</td>
<td align="left">Y</td>
</tr>
<tr class="even">
<td align="left">TextBlock</td>
<td align="left">Body</td>
<td align="left">body</td>
<td align="left"> </td>
<td align="left"> </td>
<td align="left">Y</td>
</tr>
</tbody>
</table>

</div>
**Modify existing Article Content Type**

You also need to make one modification of the preexisting Article Content Type. Edit this type, remove the Image field that is of the Content Relation type, and create a new Field in its place:

<div class="table-wrap">
<table>
<colgroup>
<col width="11%" />
<col width="17%" />
<col width="17%" />
<col width="15%" />
<col width="17%" />
<col width="20%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Identifier</th>
<th align="left">Field Type</th>
<th align="left">Required</th>
<th align="left">Searchable</th>
<th align="left">Translatable</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">Image</td>
<td align="left">image</td>
<td align="left">Image</td>
<td align="left"> </td>
<td align="left"> </td>
<td align="left">Y</td>
</tr>
</tbody>
</table>

</div>
<img src="attachments/32868226/32868215.png" alt="New image Field in the Article Content Type" class="confluence-embedded-image image-center" height="250" />

Now inserting photos into articles will be easier. Reaching the final result of the tutorial without this change would require you to spend more time creating content, which we want to avoid in this case.

**3. Add template, configuration and style files**

Place the `pagelayout.html.twig`  and `` `pagelayout_menu.html.twig `` &lt;<https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/app/Resources/views/pagelayout_menu.html.twig>&gt;\_\_
files in your app/Resources/views\` folder. Create a new folder, called `full`, under `views`. Place further template files in it:

-   `article.html.twig`
-   `dog_breed.html.twig`
-   `folder.html.twig`
-   `` `tip.html.twig `` &lt;<https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/app/Resources/views/full/tip.html.twig>&gt;\`\_\_.

Place two configuration files in your `app/config` folder:

-   `views.yml`
-   `image_variations.yml`.

Modify the `config.yml` file that is located in this folder and add the following lines at the end of the imports block:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**in app/config/config.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
- { resource: views.yml }
- { resource: image_variations.yml }
```

</div>
</div>
Create an `assets/css` subfolder in the `web` folder and add this stylesheet file to it: `` `style.css `` &lt;<https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/web/assets/css/style.css>&gt;\_\_.

Create an images\` folder under `web/assets` and add the `` `header.jpg `` &lt;<https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/web/assets/images/header.jpg>&gt;\_\_
file to it.

In the src/AppBundle\` folder create a `QueryType` subfolder and add `LocationChildrenQueryType.php` to it. This file allows your folders to display all content that they contain (read up on it [in the documentation](Content-Rendering_31429679.html#ContentRendering-Querycontroller)).

Finally, add the following files in `src/`, to create dynamic links in the top menu:

-   `Controller/MenuController.php`
-   `DependencyInjection/AppExtension.php `
-   `QueryType/MenuQueryType.php `
-   `Resources/config/services.yml`

All the files we've placed in `src/`are not the scope of this tutorial and we won't go here into detail on how they work.

This is what the structure of the new and modified files should look like (excluding preexisting files):

<img src="attachments/32868226/32868213.png" alt="File structure" class="confluence-embedded-image image-center" />

**4. Create content**

Now return to the app and create some content for your website.

First, make three Folders under the Home Content item. Call them All Articles, Dog Breed Catalog and All Tips.

Next, create a few Content items of proper Content Types in each of these folders:

-   6 Articles (at least, to best see the effects of Schedule blocks that we will deal with in step 3.)
-   3 Dog Breeds
-   3 Tips

 When you need an image, preferably use one from our [image pack](attachments/32868226/32868216.zip), as this will let you compare the effect of your work to screenshots in the tutorial text.

At this point you are ready to proceed with the next step.

 

------------------------------------------------------------------------

 

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:50%;min-width:50%;max-width:50%;">
 ⬅ Previous: [eZ Enterprise Beginner Tutorial - It's a Dog's World](32868209.html)

</div>
<div class="columnMacro">
Next: [Step 2 - Preparing the Landing Page](Step-2---Preparing-the-Landing-Page_32868235.html) ➡

</div>
</div>
</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<div class="panel"
style="background-color: #ffffff;border-color: #f58220;border-width: 2px;">
<div class="panelHeader"
style="border-bottom-width: 2px;border-bottom-color: #f58220;background-color: #ffffff;">
**Tutorial path**

</div>
<div class="panelContent" style="background-color: #ffffff;">
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
<img src="images/icons/bullet_blue.gif" alt="image2" width="8" height="8" /> [views.yml](attachments/32868226/32868212.yml) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image3" width="8" height="8" /> [LocationChildrenQueryType.php](attachments/32868226/32868214.php) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image4" width="8" height="8" /> [iadw\_image\_in\_article\_ct.png](attachments/32868226/32868215.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image5" width="8" height="8" /> [Photos.zip](attachments/32868226/32868216.zip) (application/zip) <img src="images/icons/bullet_blue.gif" alt="image6" width="8" height="8" /> [header.jpg](attachments/32868226/32868218.jpg) (image/jpeg) <img src="images/icons/bullet_blue.gif" alt="image7" width="8" height="8" /> [bootstrap.min.css](attachments/32868226/32868219.css) (text/css) <img src="images/icons/bullet_blue.gif" alt="image8" width="8" height="8" /> [style.css](attachments/32868226/32868220.css) (text/css) <img src="images/icons/bullet_blue.gif" alt="image9" width="8" height="8" /> [image\_variations.yml](attachments/32868226/32868221.yml) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image10" width="8" height="8" /> [services.yml](attachments/32868226/32868484.yml) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image11" width="8" height="8" /> [article.html.twig](attachments/32868226/32868487.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image12" width="8" height="8" /> [dog\_breed.html.twig](attachments/32868226/32868488.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image13" width="8" height="8" /> [folder.html.twig](attachments/32868226/32868489.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image14" width="8" height="8" /> [pagelayout.html.twig](attachments/32868226/32868490.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image15" width="8" height="8" /> [tip.html.twig](attachments/32868226/32868491.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image16" width="8" height="8" /> [iadw\_file\_structure.png](attachments/32868226/32868504.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image17" width="8" height="8" /> [MenuController.php](attachments/32868226/32868481.php) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image18" width="8" height="8" /> [AppExtension.php](attachments/32868226/32868482.php) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image19" width="8" height="8" /> [MenuQueryType.php](attachments/32868226/32868483.php) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image20" width="8" height="8" /> [services.yml](attachments/32868226/32868217.yml) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image21" width="8" height="8" /> [pagelayout\_menu.html.twig](attachments/32868226/32868485.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image22" width="8" height="8" /> [folder.html.twig](attachments/32868226/32868211.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image23" width="8" height="8" /> [article.html.twig](attachments/32868226/32868222.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image24" width="8" height="8" /> [dog\_breed.html.twig](attachments/32868226/32868223.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image25" width="8" height="8" /> [pagelayout.html.twig](attachments/32868226/32868224.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image26" width="8" height="8" /> [tip.html.twig](attachments/32868226/32868225.twig) (application/octet-stream) <img src="images/icons/bullet_blue.gif" alt="image27" width="8" height="8" /> [iadw\_file\_structure.png](attachments/32868226/32868213.png) (image/png)

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

