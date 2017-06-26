1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[eZ Enterprise Beginner Tutorial - It's a Dog's World](32868209.html)</span>

<span id="title-text"> Developer : Step 2 - Preparing the Landing Page </span>
==============================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Jan 27, 2017

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
You can find all files used and modified in this step on <a href="https://github.com/ezsystems/ezstudio-beginner-tutorial/tree/step2" class="external-link">GitHub</a>.

In this step you'll prepare and configure your front page, together with its layout and templates.

### Create Landing Page layout

If at this point you view the website from the front end, you will see that the home page looks quite unfinished. (You can, however, still use the menu and look around the existing content in the website.)

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/32868235/32868233.png" title="It&#39;s a Dog&#39;s World - Starting point" alt="It&#39;s a Dog&#39;s World - Starting point" class="confluence-embedded-image image-center" width="600" /></span>

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
At any point in the tutorial if you don't see the results of your last actions when viewing the page, try clearing the cache and regenerating assets:

`php app``/console` `cache:``clear`

`php app/console assets:install`

<span class="inline-comment-marker" data-ref="902f28eb-6759-46fb-87cf-7161719f7472">Log in to the app's back end</span>. Through the Platform UI, go to the Home Content item, which is the first page that is shown to the visitor. There you can check what Content Type it belongs to: it is a Landing Page.

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/32868235/32868232.png" title="Home Content item is a Landing Page" alt="Home Content item is a Landing Page" class="confluence-embedded-image confluence-thumbnail image-center" width="300" /></span>

The page contains only one simple Tag Block and is displayed without any template. Now, switch to the Studio UI by going to the Page mode and click Edit. <span class="inline-comment-marker" data-ref="ee65d683-62a9-439b-93a4-a52e24268e51">You can see</span> here that the Home Landing Page has only one zone wit the block.

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/32868235/32868231.png" alt="Empty Landing Page with default layout" class="confluence-embedded-image image-center" width="500" /></span>

This will not do for our plans, because as you can see in the proposed screenshot, we need a layout with two zones: a main column and a narrower sidebar. As only one default one-zone layout is provided for starters with eZ Enterprise, we will need to create a new layout.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
<span class="inline-comment-marker" data-ref="eaf6087a-3f99-45c8-b256-bbac92c79dc9">It is not possible to change the layout of a Landing Page once it has been published.</span> This means that after preparing our new layout we will have to create a completely new Landing Page, replace the current Home with it and scrap the old one.

Preparing a new layout requires three things:

-   **e<span class="inline-comment-marker" data-ref="e66ecd54-2cc4-4468-ba53-7d8823f6f8fa">ntry in configuration</span>**
-   **<span class="inline-comment-marker" data-ref="e66ecd54-2cc4-4468-ba53-7d8823f6f8fa">thumbnail</span>**<span class="inline-comment-marker" data-ref="e66ecd54-2cc4-4468-ba53-7d8823f6f8fa"> </span>
-   **<span class="inline-comment-marker" data-ref="e66ecd54-2cc4-4468-ba53-7d8823f6f8fa">template</span>**<span class="inline-comment-marker" data-ref="e66ecd54-2cc4-4468-ba53-7d8823f6f8fa"> </span>

Let's first create a new fil<span class="inline-comment-marker" data-ref="abca21a3-924f-469b-ad83-51ad64406a8d">e that will house our layout configuration (and the configs for any other layouts you may want to create in future)</span>:

**app/config/layouts.yml**

``` brush:
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

Creating the file is not enough, you also need to tell the app to read and use it. Add the following line to the `config.yml` file located in `app/config`, <span class="inline-comment-marker" data-ref="7e52b1d2-4da7-4a56-91f1-87d825332445">at the end of the </span>`imports`<span class="inline-comment-marker" data-ref="7e52b1d2-4da7-4a56-91f1-87d825332445"> block:</span>

**in app/config/config.yml**

``` brush:
  - { resource: layouts.yml }
```

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
You could alternatively place the whole `layouts` configuration block directly inside `ezplatform.yml`. However, for clarity we'll keep the configs in separate files <span class="inline-comment-marker" data-ref="2024c474-af6a-46f6-aa41-4ba0343c72c2">in this tutorial.</span>

Let's take a look at the most important things that this configuration defines (f<span class="inline-comment-marker" data-ref="48191cd6-db0e-4c0d-84c5-c4664259e0e2">or a detailed description of creating a Landing Page layout, see</span> [Creating Landing Page layouts (Enterprise)](31430259.html)):

`sidebar` is the key of the layout, but it is the `name` that is displayed in the interface when the user is selecting a layout. The `thumbnail` links to an image file with an icon of the layout. It will also be shown when creating a new Landing Page, as a visual hint next to the name. Use the <span class="confluence-link"><a href="https://github.com/ezsystems/ezstudio-beginner-tutorial/blob/step2/web/assets/images/layouts/sidebar.png" class="external-link">supplied thumbnail file</a></span> and place it in the `web/assets/images/layouts/` folder.

The `template` points to the twig file where in the next step we will create the template for this layout. This is the most important part of the configuration, as the templates are what distinguishes all layouts from one another.

### Create Landing Page templates

Our configuration points to `sidebar.html.twig` as the template for the layout. Let's create it and fill it in. Go to `app/Resources/views`. You can already see here some templates that define the looks of the existing parts of the website. Create a `layouts` folder and <span class="inline-comment-marker" data-ref="d543cc36-2cd6-4eeb-8981-34082ecd2de1">the following file inside it:</span>

**app/Resources/views/layouts/sidebar.html.twig**

``` brush:
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

The template above creates two columns and defines their widths. Each column is at the same time a zone, and each zone renders the blocks that it contains.

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
In more complex setups with multiple different layouts you might want to consider separating the rendering of zones into a separate `zone.html.twig` template to avoid repeating the same code in every layout.

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Layout templates can be configured and adapted in any way you like, like all other templates in eZ Platform. However, for a layout to work together with a Landing Page, the zone **must have** the  `data-studio-zone` attribute (line 2 and 15), and the zone container **requires** the `data-studio-zones-container` attribute (line 1) to allow dropping Content into zones.

With these three elements: configuration, thumbnail and template, <span class="inline-comment-marker" data-ref="022bee21-ad37-4bdd-a6ec-00de3c43ca39">your new layout is ready to use.</span>

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/32868235/32868230.png" alt="Empty page with new layout" class="confluence-embedded-image image-center" height="250" /></span>

### Create a Landing Page

Now you can create your Landing Page with the new layout to see the effects of your work. Do it as a child of the Home Content item (that is, go to Home in the Page mode, click Create and select a Landing Page) – we will momentarily replace Home with this new Landing Page. <span class="inline-comment-marker" data-ref="b70df600-1419-4c5f-aceb-5d6a24f81210">Choose the new layout called "Right sidebar" and call the new page "Front Page".</span> The empty zones as you have defined them will be visible in the editor.

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/32868235/32868229.png" alt="Select layout window" class="confluence-embedded-image confluence-thumbnail image-center" width="300" /></span>

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
If the new layout is not available when creating a new Landing Page, y<span class="inline-comment-marker" data-ref="d0a51baf-2ea6-48c7-b4d1-9de54d9b3179">ou may need to clear the cache (using `php app``/console` `cache:``clear`) and/or reload the app.</span>

Once you Publish, you will notice that the new, empty Landing Page unfortunately hasn't changed and still looks awful. This is because the looks of a Landing Page are actually defined in two separate templates files, and we have only prepared one of those. Our `sidebar.html.twig` file defines that way in which zones are organized and governs the displaying of zone contents. But one more general template file is needed that will be used for every Landing Page, regardless of its layout. Because we haven't created it yet, the page is instead displayed using default settings.

Let's correct this by creating a `landing_page.html.twig` template. In our case, the file will be rather short:

**app/Resources/views/full/landing\_page.html.twig**

``` brush:
{% extends 'pagelayout.html.twig' %}

{% block content %}
    <div class="col-md-12">
        {{ ez_render_field(content, 'page') }}
    </div>
{% endblock %}
```

As you can see, this file, placed in the `views/full` folder, simply renders the page content. If there is any additional content or formatting you would like to apply to every Landing Page, it should be placed in this template.

Now you need to tell the app to use this template whenever it tries to render a Landing Page. Edit the `views.yml` file in `app/config` and add the following code:

**in app/config/views.yml**

``` brush:
landing_page:
    template: "full/landing_page.html.twig"
    match:
        Identifier\ContentType: "landing_page"
```

You can place this block anywhere before or after other view configuration blocks, but remember that the indentations must match and the block must be placed <span class="inline-comment-marker" data-ref="6668ce11-5f38-4532-8537-9a1b747b9f46">under the </span>`full`<span class="inline-comment-marker" data-ref="6668ce11-5f38-4532-8537-9a1b747b9f46"> key.</span>

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
The `views.yml` file already contains a handful of view config blocks, and the `views/full` folder has templates that correspond to them. They are used to render the existing content we have in our website - articles, dog breed information and tips. In a clean installation these configurations and the folder would not exist and you would have to build all view templates from scratch.

After adding this template you can check your new Landing Page. <span class="inline-comment-marker" data-ref="937acca1-2ffd-4d5c-9c64-5c246142dc07">The part between menu and footer should be empty, which is the desired result – it should be empty</span>, because we have not added any actual content to it.

<span class="confluence-embedded-file-wrapper image-center-wrapper confluence-embedded-manual-size"><img src="attachments/32868235/32868228.png" alt="Empty Landing Page" class="confluence-embedded-image image-center" height="250" /></span>

Until we swap the Front Page with the current Home, you can access the new page by adding `/Front-Page` to the URI address.

### <span class="inline-comment-marker" data-ref="1349a574-fe67-43c4-a433-f7a15e14a49b">Replacing the front page</span>

<span class="aui-icon aui-icon-small aui-iconfont-error confluence-information-macro-icon"></span>
<span class="inline-comment-marker" data-ref="1349a574-fe67-43c4-a433-f7a15e14a49b">This part only works from v1.7.0 onward. If you are using an earlier version, skip this last section and as a workaround in the next steps access your new Front Page directly by its URI, for example: `tutorial.lh/Front-Page`.
</span>

<span class="inline-comment-marker" data-ref="1349a574-fe67-43c4-a433-f7a15e14a49b">Now for the last part in this step: let's replace the current Home with your new Front Page.</span>

<span class="inline-comment-marker" data-ref="1349a574-fe67-43c4-a433-f7a15e14a49b">To swap the two Content items, go to Home in Platform UI (if you are in the Studio UI, switch by clicking Content at the top). Open the Locations tab, click Select Content Item under Content Location Swap and select the newly created Front Page. The two pages should now be swapped, with the new Landing Page becoming the first item in the Content tree. It will now be the first page that visitors to your website see. We will momentarily start filling it up with content.</span>

<span class="inline-comment-marker" data-ref="1349a574-fe67-43c4-a433-f7a15e14a49b">You can now delete the previous Home page, as you don't need it anymore. Navigate to it in the Content mode and click Send to Trash in the menu on the right.
</span>

 

------------------------------------------------------------------------

 

 <span class="char" title="Leftwards Black Arrow">⬅</span> Previous: [Step 1 - Getting your starter website](Step-1---Getting-your-starter-website_32868226.html)

Next: <span class="confluence-link" title="Black Rightwards Arrow">[Step 3 - Using existing blocks](Step-3---Using-existing-blocks_32868245.html) ➡</span>

**Tutorial path**

Attachments:
------------

<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_select\_layout.png](attachments/32868235/32868229.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_home\_is\_an\_lp.png](attachments/32868235/32868232.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [sidebar.png](attachments/32868235/32868234.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_starting\_point.png](attachments/32868235/32868529.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32868530.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_new\_layout.png](attachments/32868235/32868531.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_empty\_page.png](attachments/32868235/32868532.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32868694.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_empty\_page.png](attachments/32868235/32869504.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_new\_layout.png](attachments/32868235/32869506.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_starting\_point.png](attachments/32868235/32869507.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32869505.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_empty\_page.png](attachments/32868235/32868228.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_new\_layout.png](attachments/32868235/32868230.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_empty\_single \_block.png](attachments/32868235/32868231.png) (image/png)
<img src="images/icons/bullet_blue.gif" width="8" height="8" /> [iadw\_starting\_point.png](attachments/32868235/32868233.png) (image/png)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


