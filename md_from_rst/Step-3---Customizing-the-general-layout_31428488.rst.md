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
**Developer : Step 3 - Customizing the general layout**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Sarah Haïm-Lubczanski, last modified on Dec 15, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
We will begin by customizing the global layout of our site, in order to
end up with this rendering:

**![image0](attachments/31428488/31428487.png?effects=border-simple,blur-border){.confluence-embedded-image
.image-center width="600px" height="528px"}**

*\**\*

<div class="toc-macro rbtoc1490375982802">
-   1 [Content rendering
    configuration](#Step3-Customizingthegenerallayout-Contentrenderingconfiguration)
-   2 [Creating the
    template](#Step3-Customizingthegenerallayout-Creatingthetemplate)
-   3 [Fixing the
    assets](#Step3-Customizingthegenerallayout-Fixingtheassets)
-   4 [Rendering the
    content](#Step3-Customizingthegenerallayout-Renderingthecontent)
-   5 [Extracting the
    layout](#Step3-Customizingthegenerallayout-Extractingthelayout)

</div>
First, go to the root of your eZ Platform site. You should see the root
folder of the clean install, without any kind of layout. You can go to
`/ez`, edit this Content item and see that this page changes. When `/`
is requested, eZ Platform renders the root content using the
`ez_content:viewContent` controller. We will customize this step by
instructing Platform to use a custom template to render this particular
item.

> eZ Platform organizes content as a tree. Each Content item is
> referenced by a Location, and each Location as a parent. The root
> content Location has the ID `2` by default.

**Content rendering configuration**

To use a custom template when rendering the root content, let’s create a
`content_view` configuration block for `ezpublish`.

We will use the `default` namespace, but we could have used any
siteaccess instead. Edit `app/config/ezplatform.yml`. At the end, add
the following block, right after the language configuration (pay
attention to indentation: `default` should be at the same level as
`site_group`):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

</div>
</div>
This tells Platform to use the `template` when rendering any content
referenced by the Location with the id `2`. There is a whole set of
[view
matchers](Content-Rendering_31429679.html#ContentRendering-Viewproviderconfiguration)
that can be used to customize rendering depending on any criterion.

<div class="panel"
style="border-bottom: 1px solid white;border-width: 0px;">
<div class="panelHeader" style="border-bottom-width: 0px;">
**Clear the cache**

</div>
<div class="panelContent">
Each time you change the YAML files, you could clear the cache. It’s not
mandatory in dev environment.\
To clear the cache:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ php app/console cache:clear
```

</div>
</div>
</div>
</div>
**Creating the template**

1.  [![image1](attachments/31428488/32869364.png){.confluence-embedded-image
    .confluence-thumbnail
    width="200px"}](https://raw.githubusercontent.com/bdunogier/platform-workshop/master/src/Workshop/TutorialBundle/Resources/public/index.html)
2.  Save it in `app/Resources/views` as
    `app/Resources/views/`full/root\_folder.html.twig.
3.  Refresh the site’s root and you should see the site’s structure, but
    without any styles or images. Let’s fix this.
4.  Edit the `root_folder.html.twig` template.

**Fixing the assets**

The first thing to do is to fix the loading of stylesheets, scripts and
design images.

1.  [![image2](attachments/31428488/32869366.png){.confluence-embedded-image
    .confluence-thumbnail
    width="200px"}](https://github.com/ezsystems/ezsc2015-beginner-tutorial/raw/master/assets.zip)
2.  Then unpack its contents to the `web` directory of your project. You
    will end up with `web/assets/`, containing `css`, `js` and `images`
    subfolders.
    ![image3](attachments/31428488/32869378.png?effects=border-simple,shadow-kn){.confluence-embedded-image
    height="250px"}
3.  In the template, in the`<html>` section, replace the `<link>` tags
    linking to bootstrap and custom CSS lines  (lines 15 to 21) with the
    following code:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**root\_folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% stylesheets 'assets/css/*' filter='cssrewrite' %}
    <link rel="stylesheet" href="{{ asset_url }}" />
{% endstylesheets %}
```

</div>
</div>
As explained in the [Symfony assetic
doc](http://symfony.com/doc/current/cookbook/assetic/asset_management.html#including-css-stylesheets),
this will iterate over the files in `web/assets/css` and load them as
stylesheets.\
Refresh the page and you should now see the static design of the site !

At the bottom of the template, you will find `<script>` tags that load
jQuery and Bootstrap javascript (around line 360). Replace them with an
equivalent block for scripts:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**root\_folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% javascripts 'assets/js/*' %}
    <script src="{{ asset_url }}"></script>
{% endjavascripts %}
```

</div>
</div>
Let’s finish this by fixing the design images. Locate the `<img>` tag
with `"images/128_bike_white_avenir.png"`. Change the `src` to
`{{ asset('assets/images/128_bike_white_avenir.png') }}`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**root\_folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<img alt="bike image in background" src="{{ asset('assets/images/128_bike_white_avenir.png') }}">
```

</div>
</div>
Do the same for `"images/logo_just_letters.png"`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**root\_folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<img alt="Go Bike ! logo" src="{{ asset('assets/images/logo_just_letters.png') }}" style="width:100%" />
```

</div>
</div>
<div class="panel"
style="border-bottom: 1px solid white;border-width: 0px;">
<div class="panelHeader" style="border-bottom-width: 0px;">
**Clear the cache**

</div>
<div class="panelContent">
Each time you change the templates, you could clear the cache. It’s not
mandatory in dev environment.\
To clear the cache:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ php app/console cache:clear
```

</div>
</div>
</div>
</div>
 

Refresh the page.\
The design should now be in order, with the logo, fonts and colors as
the first image of this page.

![image4](attachments/31428488/32114317.png){.confluence-embedded-image
.confluence-content-image-border .image-center width="348px"
height="400px"}

**Rendering the content**

At this point, the `root_folder.html.twig` template is static. It
doesn’t render any dynamic data from the repository.

The root is rendered by the `ez_content:viewAction` controller action.
This action assigns the currently viewed content as the `content` Twig
variable. We will use that variable to display some of the fields from
the root content. Replace the central section of the template, around
line 90, with the following block:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**root\_folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

</div>
</div>
The page will now show the values of title and description fields of the
root Platform Content.

![image5](attachments/31428488/32869439.png?effects=border-simple,blur-border){.confluence-embedded-image
.confluence-content-image-border .image-center width="350px"
height="403px"}

*The root Platform Content is displayed.*

**Extracting the layout**

<div class="panel"
style="border-bottom: 1px solid white;border-width: 0px;">
<div class="panelContent">
The general layout of the site, with the navigation, footer, scripts,
etc., is written down in the template we use to render the root. Let’s
extract the part that is common to all the pages so that we can re-use
it.

Twig supports a powerful [template
inheritance](http://twig.sensiolabs.org/doc/templates.html#template-inheritance)
API. Templates may declare named blocks. Any template may extend other
templates, and modify the blocks defined by its parents.

</div>
</div>
Create a new `app/Resources/views/pagelayout.html.twig` template and
copy the contents of the current `root_folder.html.twig` into it.

Change the central section from the previous chapter as follows:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**pagelayout.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

</div>
</div>
This defines a block named “content”. Other templates can add content to
it, so that the result of the execution of the controller is contained
within the site’s general layout.

 

Edit `root_folder.html.twig` and replace the whole content of the file
with the following code:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**root\_folder.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
{% extends "pagelayout.html.twig" %}
{% block content %}
<h3 class="center bottom-plus new-header">{{ ez_content_name(content) }}</h3>
<div class="col-xs-10 text-justified">{{ ez_render_field(content, 'description') }}</div>
{% endblock %}
```

</div>
</div>
This will re-use `pagelayout.html.twig` and replace the `content` block
with the title and description from the root folder. This should not
change the web page.

We could easily create more blocks in the pagelayout so that templates
can modify other parts of the page (footer, head, navigation), and we
will over the course of this tutorial. We can now create more templates
that inherit from `pagelayout.html.twig`, and customize how content is
rendered.

Let’s do it for the Ride Content Type.

 

 

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:50%;min-width:50%;max-width:50%;">
  ⬅ Previous: [Step 2 - Create your content
model](Step-2---Create-your-content-model_31431844.html)

</div>
<div class="columnMacro">
 Next: [Part 2: Working on the Ride](31431613.html) ➡

</div>
</div>
</div>
</div>
| |  

 

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
![image6](images/icons/bullet_blue.gif){width="8px" height="8px"}
[index\_final.png](attachments/31428488/31428487.png) (image/png)
![image7](images/icons/bullet_blue.gif){width="8px" height="8px"}
[Beginners\_Tutorial\_-\_Bike\_Rides\_new\_-\_2016-07-19\_17.54.53.png](attachments/31428488/32114316.png)
(image/png) ![image8](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[Beginners\_Tutorial\_-\_Bike\_Rides\_new\_-homepage.png](attachments/31428488/32114317.png)
(image/png) ![image9](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[button-download-index.png](attachments/31428488/32869364.png)
(image/png) ![image10](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[button-download-assets.png](attachments/31428488/32869366.png)
(image/png) ![image11](images/icons/bullet_blue.gif){width="8px"
height="8px"} [listing-web-dir.png](attachments/31428488/32869378.png)
(image/png) ![image12](images/icons/bullet_blue.gif){width="8px"
height="8px"}
[Beginners\_Tutorial\_homepage-with-images-css.png](attachments/31428488/32869439.png)
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

