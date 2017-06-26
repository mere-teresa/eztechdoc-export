1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[eZ Enterprise Beginner Tutorial - It's a Dog's World](32868209.html)</span>

<span id="title-text"> Developer : Step 1 - Getting your starter website </span>
================================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Dec 19, 2016

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
You can find all files used and modified in this step on <a href="https://github.com/ezsystems/ezstudio-beginner-tutorial/tree/step1" class="external-link">GitHub</a>.

To start working on the scenario of this tutorial, you need to have <span class="inline-comment-marker" data-ref="9fb7eaa5-1e46-4d41-b7e5-c765900caceb">a minimal working website making use of fundamental eZ Platform functionalities. </span>You need to build it by hand from the ground up, starting with a clean eZ Enterprise installation. Just remember <span class="inline-comment-marker" data-ref="f34a3d82-231b-4bc2-aa42-d00dcfc1c1b1">that if you decide to change anything from the way it is shown here, you will need to double-check all code that will be provided here and make sure it fits your website.</span>

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Remember to start working with a **clean** eZ Enterprise installation, **not** Studio Demo.

To be able to follow all steps of the tutorial, make sure you are installing eZ Enterprise v1.7.0 or later.

Setting up the website
----------------------

To set up your starter website by hand, you need to follow these steps:

### 1. Get a clean eZ Enterprise installation

See [Step 1: Installation](31429538.html) <span class="inline-comment-marker" data-ref="84fab364-2e92-4464-87dc-1a88a2e59b61">for a guide to installing eZ Enterprise.</span>

### 2. Create Content Types

<span class="inline-comment-marker" data-ref="9574f738-8d87-4d5b-9e05-35944c1262bc">Log in to the back end – add `/ez` to your installation's address (e.g. `tutorial.lh/ez`) and log in using `admin` as the login and `publish` as the password. In the Admin Panel go to Content Types and create two Content Types (under the Content category) with the following settings:</span>

#### Dog Breed

**Name:** Dog Breed

**Identifier:** dog\_breed

**Content name pattern:** &lt;name&gt;

**Fields:**

| Field Type | Name              | Identifier         | Required | Searchable | Translatable |
|------------|-------------------|--------------------|----------|------------|--------------|
| TextLine   | Name              | name               | Y        | Y          | Y            |
| TextLine   | Short Description | short\_description | Y        | Y          | Y            |
| Image      | Photo             | photo              | Y        |            |              |
| RichText   | Full Description  | description        | Y        | Y          | Y            |

#### Tip

**Name:** Tip

**Identifier:** tip

**Content name pattern:** &lt;title&gt;

**Fields:**

| Field Type | Name  | Identifier | Required | Searchable | Translatable |
|------------|-------|------------|----------|------------|--------------|
| TextLine   | Title | title      | Y        | Y          | Y            |
| TextBlock  | Body  | body       |          |            | Y            |

#### Modify existing Article Content Type

<span class="inline-comment-marker" data-ref="34114f48-f396-4710-b05c-850bdad591ee">You also need to make one modification of the preexisting Article Content Type.</span> Edit this type, remove the Image field that is of the Content Relation type, and create a new Field in its place:

| Name  | Identifier | Field Type | Required | Searchable | Translatable |
|-------|------------|------------|----------|------------|--------------|
| Image | image      | Image      |          |            | Y            |

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/32868226/32868215.png" alt="New image Field in the Article Content Type" class="confluence-embedded-image image-center" height="250" /></span>

Now inserting photos into articles will be easier. <span class="inline-comment-marker" data-ref="c8924678-4e2b-403d-a40a-a0c7ec86553a">Reaching the final result of the tutorial without this change</span> would require you to spend more time creating content, which we want to avoid in this case.

### 3. Add template, configuration and style files

Place the `pagelayout.html.twig`  and <a href="https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/app/Resources/views/pagelayout_menu.html.twig" class="external-link"><code>pagelayout_menu.html.twig</code></a> files in your `app/Resources/views` folder. Cre<span class="inline-comment-marker" data-ref="3ec6aa0a-9ecf-4003-b13a-a277bc66a908">ate a</span> new folder, called `full`, under `views`. Place further template files in it:

-   `article.html.twig`
-   `dog_breed.html.twig`
-   `folder.html.twig`
-   <a href="https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/app/Resources/views/full/tip.html.twig" class="external-link"><code>tip.html.twig</code></a>.

Place <span class="inline-comment-marker" data-ref="cb27a827-5b52-4373-8f66-c97ad6b68c32">two configuration files</span> in your `app/config` folder:

-   `views.yml`
-   `image_variations.yml`.

Modify the `config.yml` file that is located in this folder and add the <span class="inline-comment-marker" data-ref="e0ee870f-bb93-4d5d-9f31-f36d9367269c">following lines at the end of the imports block</span>:

**in app/config/config.yml**

``` brush:
    - { resource: views.yml }
    - { resource: image_variations.yml }
```

Create an `assets/css` subfolder in the `web` folder and add this stylesheet file to it: <a href="https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/web/assets/css/style.css" class="external-link"><code>style.css</code></a>.

Create an `images` folder under `web/assets` and add the <a href="https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step1/web/assets/images/header.jpg" class="external-link"><code>header.jpg</code></a> file to it.

In the `src/AppBundle` folder create a `QueryType` subfolder and add `LocationChildrenQueryType.php` to it. This file allows your folders to display all content that they contain (read up on it <span class="confluence-link"><span class="confluence-link"><span class="confluence-link"><span class="confluence-link"><span class="confluence-link">[in the documentation](Content-Rendering_31429679.html#ContentRendering-Querycontroller)</span></span></span></span></span>).

Finally, add the following files in `src/`, to create dynamic links in the top menu:

-   `Controller/MenuController.php`

-   `DependencyInjection/AppExtension.php `
-   `QueryType/MenuQueryType.php `
-   `Resources/config/services.yml`

All the files we've placed in `src/`are not the scope of this tutorial and we won't go here into detail on how they work.

This is what the structure of the new and modified files should look like (excluding preexisting files):

<span class="confluence-embedded-file-wrapper image-center-wrapper"><img src="attachments/32868226/32868213.png" alt="File structure" class="confluence-embedded-image image-center" /></span>

### 4. Create content

Now return to the app and create some content for your website.

First, make three Folders under the Home Content item. <span class="inline-comment-marker" data-ref="3c9c771d-63a1-447a-937d-abe6fe98707b">Call them All Articles</span>, Dog Breed Catalog and All Tips.

Next, <span class="inline-comment-marker" data-ref="e7dabb62-b50a-410d-8987-e9ac716db7ab">create a few Content items of proper Content Types</span> in each of these folders:

-   6 Articles (at least, to best see the effects of Schedule blocks that we will deal with in step 3.)
-   3 Dog Breeds
-   3 Tips

 When you need an image, preferably use one from our [image pack](attachments/32868226/32868216.zip), as this will let you compare the effect of your work to screenshots in the tutorial text.

At this point you are ready to proceed with the next step.

 

------------------------------------------------------------------------

 

 <span class="char" title="Leftwards Black Arrow">⬅</span> Previous: [eZ Enterprise Beginner Tutorial - It's a Dog's World](32868209.html)

Next: [Step 2 - Preparing the Landing Page](Step-2---Preparing-the-Landing-Page_32868235.html) <span class="confluence-link" title="Black Rightwards Arrow">➡</span>

**Tutorial path**

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [views.yml](attachments/32868226/32868212.yml) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [LocationChildrenQueryType.php](attachments/32868226/32868214.php) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_image\_in\_article\_ct.png](attachments/32868226/32868215.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Photos.zip](attachments/32868226/32868216.zip) (application/zip)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [header.jpg](attachments/32868226/32868218.jpg) (image/jpeg)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [bootstrap.min.css](attachments/32868226/32868219.css) (text/css)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [style.css](attachments/32868226/32868220.css) (text/css)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [image\_variations.yml](attachments/32868226/32868221.yml) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [services.yml](attachments/32868226/32868484.yml) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [article.html.twig](attachments/32868226/32868487.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [dog\_breed.html.twig](attachments/32868226/32868488.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [folder.html.twig](attachments/32868226/32868489.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [pagelayout.html.twig](attachments/32868226/32868490.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [tip.html.twig](attachments/32868226/32868491.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_file\_structure.png](attachments/32868226/32868504.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [MenuController.php](attachments/32868226/32868481.php) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [AppExtension.php](attachments/32868226/32868482.php) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [MenuQueryType.php](attachments/32868226/32868483.php) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [services.yml](attachments/32868226/32868217.yml) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [pagelayout\_menu.html.twig](attachments/32868226/32868485.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [folder.html.twig](attachments/32868226/32868211.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [article.html.twig](attachments/32868226/32868222.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [dog\_breed.html.twig](attachments/32868226/32868223.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [pagelayout.html.twig](attachments/32868226/32868224.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [tip.html.twig](attachments/32868226/32868225.twig) (application/octet-stream)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_file\_structure.png](attachments/32868226/32868213.png) (image/png)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


