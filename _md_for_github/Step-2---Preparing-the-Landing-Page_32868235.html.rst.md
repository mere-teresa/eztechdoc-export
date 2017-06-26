<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [eZ Enterprise Beginner Tutorial - It's a Dog's World](32868209.html)

</div>
**Developer : Step 2 - Preparing the Landing Page**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Jan 27, 2017

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
You can find all files used and modified in this step on [GitHub](https://github.com/ezsystems/ezstudio-beginner-tutorial/tree/step2).

</div>
</div>
In this step you'll prepare and configure your front page, together with its layout and templates.

**Create Landing Page layout**

If at this point you view the website from the front end, you will see that the home page looks quite unfinished. (You can, however, still use the menu and look around the existing content in the website.)

<img src="attachments/32868235/32868233.png" alt="It&#39;s a Dog&#39;s World - Starting point" class="confluence-embedded-image image-center" width="600" />

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
At any point in the tutorial if you don't see the results of your last actions when viewing the page, try clearing the cache and regenerating assets:

`php app``/console` `cache:``clear`

`php app/console assets:install`

</div>
</div>
Log in to the app's back end. Through the Platform UI, go to the Home Content item, which is the first page that is shown to the visitor. There you can check what Content Type it belongs to: it is a Landing Page.

<img src="attachments/32868235/32868232.png" alt="Home Content item is a Landing Page" class="confluence-embedded-image confluence-thumbnail image-center" width="300" />

The page contains only one simple Tag Block and is displayed without any template. Now, switch to the Studio UI by going to the Page mode and click Edit. You can see here that the Home Landing Page has only one zone wit the block.

<img src="attachments/32868235/32868231.png" alt="Empty Landing Page with default layout" class="confluence-embedded-image image-center" width="500" />

This will not do for our plans, because as you can see in the proposed screenshot, we need a layout with two zones: a main column and a narrower sidebar. As only one default one-zone layout is provided for starters with eZ Enterprise, we will need to create a new layout.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
It is not possible to change the layout of a Landing Page once it has been published. This means that after preparing our new layout we will have to create a completely new Landing Page, replace the current Home with it and scrap the old one.

</div>
</div>
Preparing a new layout requires three things:

-   **entry in configuration**
-   **thumbnail** 
-   **template** 

Let's first create a new file that will house our layout configuration (and the configs for any other layouts you may want to create in future):

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/config/layouts.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
ez_systems_landing_page_field_type:
    layouts:
        sidebar:
            identifier: sidebar
            name: Right sidebar
            description: Main section with sidebar on the right
            thumbnail: assets/images/layouts/sidebar.png
            template: layouts/sidebar.html.twig
            zones:
                first:
                    name: First zone
                second:
                    name: Second zone
```

</div>
</div>
Creating the file is not enough, you also need to tell the app to read and use it. Add the following line to the `config.yml` file located in `app/config`, at the end of the `imports` block:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**in app/config/config.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
- { resource: layouts.yml }
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
You could alternatively place the whole `layouts` configuration block directly inside `ezplatform.yml`. However, for clarity we'll keep the configs in separate files in this tutorial.

</div>
</div>
Let's take a look at the most important things that this configuration defines (for a detailed description of creating a Landing Page layout, see [Creating Landing Page layouts (Enterprise)](31430259.html)):

`sidebar` is the key of the layout, but it is the `name` that is displayed in the interface when the user is selecting a layout. The `thumbnail` links to an image file with an icon of the layout. It will also be shown when creating a new Landing Page, as a visual hint next to the name. Use the [supplied thumbnail file](https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step2/web/assets/images/layouts/sidebar.png) and place it in the `web/assets/images/layouts/` folder.

The `template` points to the twig file where in the next step we will create the template for this layout. This is the most important part of the configuration, as the templates are what distinguishes all layouts from one another.

**Create Landing Page templates**

Our configuration points to `sidebar.html.twig` as the template for the layout. Let's create it and fill it in. Go to `app/Resources/views`. You can already see here some templates that define the looks of the existing parts of the website. Create a `layouts` folder and the following file inside it:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/Resources/views/layouts/sidebar.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
<div data-studio-zones-container>
    <main class="landing-page__zone landing-page__zone--{{ zones[0].id }} landing-page__zone--left col-xs-8" data-studio-zone="{{ zones[0].id }}">
        {% if zones[0].blocks %}
            {% for block in zones[0].blocks %}
                <div class="landing-page__block block_{{ block.type }}">
                    {{ render_esi(controller('ez_block:renderBlockAction', {
                        'contentId': contentInfo.id,
                        'blockId': block.id,
                        'versionNo': versionInfo.versionNo
                    })) }}
                </div>
            {% endfor %}
        {% endif %}
    </main>
    <aside class="landing-page__zone landing-page__zone--{{ zones[1].id }} landing-page__zone--left col-xs-4" data-studio-zone="{{ zones[1].id }}">
        {% if zones[1].blocks %}
            {% for block in zones[1].blocks %}
                <div class="landing-page__block block_{{ block.type }}">
                    {{ render_esi(controller('ez_block:renderBlockAction', {
                        'contentId': contentInfo.id,
                        'blockId': block.id,
                        'versionNo': versionInfo.versionNo
                    })) }}
                </div>
            {% endfor %}
        {% endif %}
    </aside>
</div>
```

</div>
</div>
The template above creates two columns and defines their widths. Each column is at the same time a zone, and each zone renders the blocks that it contains.

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
In more complex setups with multiple different layouts you might want to consider separating the rendering of zones into a separate `zone.html.twig` template to avoid repeating the same code in every layout.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Layout templates can be configured and adapted in any way you like, like all other templates in eZ Platform. However, for a layout to work together with a Landing Page, the zone **must have** the  `data-studio-zone` attribute (line 2 and 15), and the zone container **requires** the `data-studio-zones-container` attribute (line 1) to allow dropping Content into zones.

</div>
</div>
With these three elements: configuration, thumbnail and template, your new layout is ready to use.

<img src="attachments/32868235/32868230.png" alt="Empty page with new layout" class="confluence-embedded-image image-center" height="250" />

**Create a Landing Page**

Now you can create your Landing Page with the new layout to see the effects of your work. Do it as a child of the Home Content item (that is, go to Home in the Page mode, click Create and select a Landing Page) – we will momentarily replace Home with this new Landing Page. Choose the new layout called "Right sidebar" and call the new page "Front Page". The empty zones as you have defined them will be visible in the editor.

<img src="attachments/32868235/32868229.png" alt="Select layout window" class="confluence-embedded-image confluence-thumbnail image-center" width="300" />

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If the new layout is not available when creating a new Landing Page, you may need to clear the cache (using `php app``/console` `cache:``clear`) and/or reload the app.

</div>
</div>
Once you Publish, you will notice that the new, empty Landing Page unfortunately hasn't changed and still looks awful. This is because the looks of a Landing Page are actually defined in two separate templates files, and we have only prepared one of those. Our `sidebar.html.twig` file defines that way in which zones are organized and governs the displaying of zone contents. But one more general template file is needed that will be used for every Landing Page, regardless of its layout. Because we haven't created it yet, the page is instead displayed using default settings.

Let's correct this by creating a `landing_page.html.twig` template. In our case, the file will be rather short:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/Resources/views/full/landing\_page.html.twig**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
{% extends 'pagelayout.html.twig' %}

{% block content %}
    <div class="col-md-12">
        {{ ez_render_field(content, 'page') }}
    </div>
{% endblock %}
```

</div>
</div>
As you can see, this file, placed in the `views/full` folder, simply renders the page content. If there is any additional content or formatting you would like to apply to every Landing Page, it should be placed in this template.

Now you need to tell the app to use this template whenever it tries to render a Landing Page. Edit the `views.yml` file in `app/config` and add the following code:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**in app/config/views.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
landing_page:
    template: "full/landing_page.html.twig"
    match:
        Identifier\ContentType: "landing_page"
```

</div>
</div>
You can place this block anywhere before or after other view configuration blocks, but remember that the indentations must match and the block must be placed under the `full` key.

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
The `views.yml` file already contains a handful of view config blocks, and the `views/full` folder has templates that correspond to them. They are used to render the existing content we have in our website -articles, dog breed information and tips. In a clean installation these configurations and the folder would not exist and you would have to build all view templates from scratch.

</div>
</div>
After adding this template you can check your new Landing Page. The part between menu and footer should be empty, which is the desired result – it should be empty, because we have not added any actual content to it.

<img src="attachments/32868235/32868228.png" alt="Empty Landing Page" class="confluence-embedded-image image-center" height="250" />

Until we swap the Front Page with the current Home, you can access the new page by adding `/Front-Page` to the URI address.

**Replacing the front page**

<div
class="confluence-information-macro confluence-information-macro-warning">
<div class="confluence-information-macro-body">
This part only works from v1.7.0 onward. If you are using an earlier version, skip this last section and as a workaround in the next steps access your new Front Page directly by its URI, for example: `tutorial.lh/Front-Page`.

</div>
</div>
Now for the last part in this step: let's replace the current Home with your new Front Page.

To swap the two Content items, go to Home in Platform UI (if you are in the Studio UI, switch by clicking Content at the top). Open the Locations tab, click Select Content Item under Content Location Swap and select the newly created Front Page. The two pages should now be swapped, with the new Landing Page becoming the first item in the Content tree. It will now be the first page that visitors to your website see. We will momentarily start filling it up with content.

You can now delete the previous Home page, as you don't need it anymore. Navigate to it in the Content mode and click Send to Trash in the menu on the right.

 

------------------------------------------------------------------------

 

<div class="sectionColumnWrapper">
<div class="sectionMacro">
<div class="sectionMacroRow">
<div class="columnMacro"
style="width:50%;min-width:50%;max-width:50%;">
 ⬅ Previous: [Step 1 - Getting your starter website](Step-1---Getting-your-starter-website_32868226.html)

</div>
<div class="columnMacro">
Next: [Step 3 - Using existing blocks](Step-3---Using-existing-blocks_32868245.html) ➡

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
<img src="images/icons/bullet_blue.gif" alt="image6" width="8" height="8" /> [iadw\_select\_layout.png](attachments/32868235/32868229.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image7" width="8" height="8" /> [iadw\_home\_is\_an\_lp.png](attachments/32868235/32868232.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image8" width="8" height="8" /> [sidebar.png](attachments/32868235/32868234.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image9" width="8" height="8" /> [iadw\_starting\_point.png](attachments/32868235/32868529.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image10" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32868530.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image11" width="8" height="8" /> [iadw\_new\_layout.png](attachments/32868235/32868531.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image12" width="8" height="8" /> [iadw\_empty\_page.png](attachments/32868235/32868532.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image13" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32868694.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image14" width="8" height="8" /> [iadw\_empty\_page.png](attachments/32868235/32869504.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image15" width="8" height="8" /> [iadw\_new\_layout.png](attachments/32868235/32869506.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image16" width="8" height="8" /> [iadw\_starting\_point.png](attachments/32868235/32869507.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image17" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32869505.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image18" width="8" height="8" /> [iadw\_empty\_page.png](attachments/32868235/32868228.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image19" width="8" height="8" /> [iadw\_new\_layout.png](attachments/32868235/32868230.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image20" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32868231.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image21" width="8" height="8" /> [iadw\_starting\_point.png](attachments/32868235/32868233.png) (image/png)

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

