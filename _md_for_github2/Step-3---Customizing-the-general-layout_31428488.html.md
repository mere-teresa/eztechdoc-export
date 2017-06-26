1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[Building a Bicycle Route Tracker in eZ Platform](Building-a-Bicycle-Route-Tracker-in-eZ-Platform_31431606.html)</span>
5.  <span>[Part 1: Setting up eZ Platform](31431610.html)</span>

<span id="title-text"> Developer : Step 3 - Customizing the general layout </span>
==================================================================================

Created by <span class="author"> Sarah Haïm-Lubczanski</span>, last modified on Dec 15, 2016

We will begin by customizing the global layout of our site, in order to end up with this rendering:

**<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/31428488/31428487.png?effects=border-simple,blur-border" class="confluence-embedded-image image-center" width="600" height="528" /></span>
**

**
**

-   <span class="TOCOutline">1</span> [Content rendering configuration](#Step3-Customizingthegenerallayout-Contentrenderingconfiguration)
-   <span class="TOCOutline">2</span> [Creating the template](#Step3-Customizingthegenerallayout-Creatingthetemplate)
-   <span class="TOCOutline">3</span> [Fixing the assets](#Step3-Customizingthegenerallayout-Fixingtheassets)
-   <span class="TOCOutline">4</span> [Rendering the content](#Step3-Customizingthegenerallayout-Renderingthecontent)
-   <span class="TOCOutline">5</span> [Extracting the layout](#Step3-Customizingthegenerallayout-Extractingthelayout)

First, go to the root of your eZ Platform site. You should see the root folder of the clean install, without any kind of layout. You can go to `/ez`, edit this Content item and see that this page changes. When `/` is requested, eZ Platform renders the root content using the `ez_content:viewContent` controller. We will customize this step by instructing Platform to use a custom template to render this particular item.

> eZ Platform organizes content as a tree. Each Content item is referenced by a Location, and each Location as a parent. The root content Location has the ID `2` by default.

Content rendering configuration
-------------------------------

To use a custom template when rendering the root content, let's create a `content_view` configuration block for `ezpublish`.

We will use the `default` namespace, but we could have used any siteaccess instead. Edit `app/config/ezplatform.yml`. At the end, add the following block, right after the language configuration (pay attention to indentation: `default` should be at the same level as `site_group`):

**ezplatform.yml**

``` brush:
    system:
    #existing directives: don't touch them    
        default: #same level as site_group directive
            content_view:
                full:
                    root_folder:
                        template: "full/root_folder.html.twig"
                        match:
                            Id\Location: 2
```

This tells Platform to use the `template` when rendering any content referenced by the Location with the id `2`. There is a whole set of [view matchers](Content-Rendering_31429679.html#ContentRendering-Viewproviderconfiguration) that can be used to customize rendering depending on any criterion.

**Clear the cache**

Each time you change the YAML files, you could clear the cache. It's not mandatory in dev environment.
To clear the cache:

``` brush:
$ php app/console cache:clear
```

Creating the template
---------------------

1.  <a href="https://raw.githubusercontent.com/bdunogier/platform-workshop/master/src/Workshop/TutorialBundle/Resources/public/index.html" class="external-link"><span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31428488/32869364.png" class="confluence-embedded-image confluence-thumbnail" width="200" /></span></a>
2.  Save it in `app/Resources/views` as `           app/Resources/views/`full/root\_folder.html.twig.
3.  Refresh the site's root and you should see the site's structure, but without any styles or images. Let's fix this.
4.  Edit the `root_folder.html.twig` template.

Fixing the assets
-----------------

The first thing to do is to fix the loading of stylesheets, scripts and design images.

1.  <a href="https://github.com/ezsystems/ezsc2015-beginner-tutorial/raw/master/assets.zip" class="external-link"><span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31428488/32869366.png" class="confluence-embedded-image confluence-thumbnail" width="200" /></span></a>
2.  Then unpack its contents to the `web` directory of your project. You will end up with `web/assets/`, containing `css`, `js` and `images` subfolders.
    <span class="confluence-embedded-file-wrapper confluence-embedded-manual-size"><img src="attachments/31428488/32869378.png?effects=border-simple,shadow-kn" class="confluence-embedded-image" height="250" /></span>
3.  In the template, in the` <html>` section, replace the `<link>` tags linking to bootstrap and custom CSS lines  (lines 15 to 21) with the following code:

**root\_folder.html.twig**

``` brush:
{% stylesheets 'assets/css/*' filter='cssrewrite' %}
    <link rel="stylesheet" href="{{ asset_url }}" />
{% endstylesheets %}
```

As explained in the <a href="http://symfony.com/doc/current/cookbook/assetic/asset_management.html#including-css-stylesheets" class="external-link">Symfony assetic doc</a>, this will iterate over the files in `web/assets/css` and load them as stylesheets.
Refresh the page and you should now see the static design of the site !

At the bottom of the template, you will find `<script>` tags that load jQuery and Bootstrap javascript (around line 360). Replace them with an equivalent block for scripts:

**root\_folder.html.twig**

``` brush:
{% javascripts 'assets/js/*' %}
    <script src="{{ asset_url }}"></script>
{% endjavascripts %}
```

Let's finish this by fixing the design images. Locate the `<img>` tag with `"images/128_bike_white_avenir.png"`. Change the `src` to `{{ asset('assets/images/128_bike_white_avenir.png') }}`:

**root\_folder.html.twig**

``` brush:
<img alt="bike image in background" src="{{ asset('assets/images/128_bike_white_avenir.png') }}">
```

Do the same for `"images/logo_just_letters.png"`:

**root\_folder.html.twig**

``` brush:
<img alt="Go Bike ! logo" src="{{ asset('assets/images/logo_just_letters.png') }}" style="width:100%" />
```

**Clear the cache**

Each time you change the templates, you could clear the cache. It's not mandatory in dev environment.
To clear the cache:

``` brush:
$ php app/console cache:clear
```

 

Refresh the page.
The design should now be in order, with the logo, fonts and colors as the first image of this page.

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/31428488/32114317.png" class="confluence-embedded-image confluence-content-image-border image-center" width="348" height="400" /></span>

Rendering the content
---------------------

At this point, the `root_folder.html.twig` template is static. It doesn't render any dynamic data from the repository.

The root is rendered by the `ez_content:viewAction` controller action. This action assigns the currently viewed content as the `content` Twig variable. We will use that variable to display some of the fields from the root content. Replace the central section of the template, around line 90, with the following block:

**root\_folder.html.twig**

``` brush:
<section class="buttons">
    <div class="container">
        <div class="row regular-content-size">
            <div class="col-xs-10 col-xs-offset-1 box-style">
                <h3 class="center bottom-plus new-header">{{ ez_content_name(content) }}</h3>
                <div class="col-xs-10 text-justified">{{ ez_render_field(content, 'description') }}</div>
            </div>
        </div>
    </div>
</section>
```

The page will now show the values of title and description fields of the root Platform Content.

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/31428488/32869439.png?effects=border-simple,blur-border" class="confluence-embedded-image confluence-content-image-border image-center" width="350" height="403" /></span>

*The root Platform Content is displayed.*

Extracting the layout
---------------------

The general layout of the site, with the navigation, footer, scripts, etc., is written down in the template we use to render the root. Let's extract the part that is common to all the pages so that we can re-use it.

Twig supports a powerful <a href="http://twig.sensiolabs.org/doc/templates.html#template-inheritance" class="external-link">template inheritance</a> API. Templates may declare named blocks. Any template may extend other templates, and modify the blocks defined by its parents.

Create a new `app/Resources/views/pagelayout.html.twig` template and copy the contents of the current `root_folder.html.twig` into it.

Change the central section from the previous chapter as follows:

**pagelayout.html.twig**

``` brush:
<section class="buttons">
    <div class="container">
        <div class="row regular-content-size">
            <div class="col-xs-10 col-xs-offset-1 box-style">
                {% block content %}
                {% endblock %}
            </div>
        </div>
    </div>
</section>
```

This defines a block named "content". Other templates can add content to it, so that the result of the execution of the controller is contained within the site's general layout.

 

Edit `root_folder.html.twig` and replace the whole content of the file with the following code:

**root\_folder.html.twig**

``` brush:
{% extends "pagelayout.html.twig" %}
{% block content %}
<h3 class="center bottom-plus new-header">{{ ez_content_name(content) }}</h3>
<div class="col-xs-10 text-justified">{{ ez_render_field(content, 'description') }}</div>
{% endblock %}
```

This will re-use `pagelayout.html.twig` and replace the `content` block with the title and description from the root folder. This should not change the web page.

We could easily create more blocks in the pagelayout so that templates can modify other parts of the page (footer, head, navigation), and we will over the course of this tutorial. We can now create more templates that inherit from `pagelayout.html.twig`, and customize how content is rendered.

Let's do it for the Ride Content Type.

 

 

<span class="char" title="Left Right White Arrow"> </span> <span class="char" title="Leftwards Black Arrow">⬅</span> Previous: [Step 2 - Create your content model](Step-2---Create-your-content-model_31431844.html)

<span class="confluence-link" title="Black Rightwards Arrow"> Next: [Part 2: Working on the Ride](31431613.html) ➡</span><span class="char" title="Black Rightwards Arrow">
</span>

<span class="char" title="Black Rightwards Arrow"> </span>

 

**Tutorial path**

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [index\_final.png](attachments/31428488/31428487.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Beginners\_Tutorial\_-\_Bike\_Rides\_new\_-\_2016-07-19\_17.54.53.png](attachments/31428488/32114316.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Beginners\_Tutorial\_-\_Bike\_Rides\_new\_-homepage.png](attachments/31428488/32114317.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [button-download-index.png](attachments/31428488/32869364.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [button-download-assets.png](attachments/31428488/32869366.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [listing-web-dir.png](attachments/31428488/32869378.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [Beginners\_Tutorial\_homepage-with-images-css.png](attachments/31428488/32869439.png) (image/png)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


