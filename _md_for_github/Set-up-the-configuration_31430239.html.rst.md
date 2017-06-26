<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Tutorials](Tutorials_31429522.html)
4.  [Extending PlatformUI with new navigation](Extending-PlatformUI-with-new-navigation_31430235.html)

</div>
**Developer : Set up the configuration**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on May 06, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**PlatformUI Configuration files**

**JavaScript modules in `yui.yml`**

Each component of the PlatformUI application is written as a [YUI module](http://yuilibrary.com/yui/docs/yui/create.html). The YUI module system comes with a dependency system which is used in the PlatformUI application. For instance, the PlatformUI application has a module called `ez-templatebasedview` which provides a base view class to ease the usage of a template. This module is a dependency of most of the views in the application and has itself some dependencies, like for instance the view module from YUI. Those dependencies are expressed in the `yui.yml` configuration and this configuration is meant to be extended / overridden in other bundles. For instance:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Excerpt of yui.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
system:
    default:
        yui:
            modules:                
                ez-templatebasedview:
                    requires: ['ez-texthelper', 'ez-view', 'handlebars', 'template']
                    path: %ez_platformui.public_dir%/js/views/ez-templatebasedview.js
                ez-loginformview:
                    requires: ['ez-templatebasedview', 'node-style', 'loginformview-ez-template']
                    path: %ez_platformui.public_dir%/js/views/ez-loginformview.js
```

</div>
</div>
This configuration defines two modules – `ez-templatebasedview` and `ez-loginformview`:

-   `ez-templatebasedview` requires the modules `ez-texthelper`, `ez-view`, `handlebars` and `template`. The source code of this module is in `%ez_platformui.public_dir%/js/views/ez-templatebasedview.js` on the disk;
-   `ez-loginformview` requires the modules `ez-templatebasedview`, `node-style` and `loginformview-ez-template`. The source code of this module is in `%ez_platformui.public_dir%/js/views/ez-loginformview.js` on the disk.

 

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Note that the order of module definitions is not important, `ez-loginformview` can be defined before the `ez-templatebaseview` module even if the latter is a dependency of the former.

</div>
</div>
Most of the PlatformUI application views use a Handlebars template to generate the HTML markup. In the application the templates are also handled as YUI modules but those modules are special because they are dynamically generated from the regular template files on the disk. For this to work, the YUI module corresponding to a template must have the `type` flag set to `template`. To complete the example above, the template module `loginforview-ez-template` should be defined in the following way:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
loginformview-ez-template:
    type: 'template'
    path: %ez_platformui.public_dir%/templates/loginform.hbt
```

</div>
</div>
**CSS files in `css.yml`**

The CSS files used by the application are also listed in `css.yml`, but in the case of CSS files, it's much simpler as this file just lists the CSS files to load, example:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Excerpt of css.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
system:
    default:
        css:
            files:
                - '@eZPlatformUIBundle/Resources/public/css/views/field.css'
                - '@eZPlatformUIBundle/Resources/public/css/views/fields/view/relation.css'
```

</div>
</div>
**Injecting the extension custom configuration files**

To be able to extend the PlatformUI application configuration, the extension bundle has to set up its own configuration handling. For this, you only have to tweak the extension class generated in the bundle [in the first step](Create-the-extension-Bundle_31430237.html) to load the extension bundle's `yui.yml` and `css.yml` and to process their respective content with PlatformUI's configuration. The default empty `yui.yml` and `css.yml` also have to be created so that eZ Platform is still usable.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
If you want to get more details on this operation, you can read the [Exposing SiteAccess-aware configuration for your bundle](Exposing-SiteAccess-aware-configuration-for-your-bundle_31429794.html) recipe.

</div>
</div>
After this, you just have to make sure the bundle has a `Resources/public` directory to install the assets with the following command:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
$ app/console assets:install --symlink
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
Results and next step:

<div class="confluence-information-macro-body">
The resulting code can be seen in [the 2\_configuration tag on GitHub](https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/tree/2_configuration) (the interesting part is the [EzSystemsExtendingPlatformUIConferenceExtension](https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/blob/2_configuration/DependencyInjection/EzSystemsExtendingPlatformUIConferenceExtension.php) class), this step result can also be viewed as a diff between tags
1\_bundle\` and `2_configuration` &lt;<https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/compare/1_bundle>...2\_configuration&gt;\_\_.

After these two first steps, PlatformUI should remain perfectly usable
and unchanged. The next step is then to tweak the PlatformUI Application routing to start implementing the new feature &lt;Alter-the-JavaScript-Application-routing\_31430241.html&gt;\_\_.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="cell aside" data-type="aside"&gt;

.. raw:: html

   &lt;div class="innerCell"&gt;

.. raw:: html

   &lt;div class="panel" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="panelHeader" style="border-bottom-width: 1px;"&gt;

\*\*Tutorial path\*\*

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="panelContent"&gt;

.. raw:: html

   &lt;div class="plugin\_pagetree"&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div id="footer" role="contentinfo"&gt;

.. raw:: html

   &lt;div class="section footer-body"&gt;

Document generated by Confluence on Mar 24, 2017 17:19

.. raw:: html

   &lt;div id="footer-logo"&gt;

Atlassian &lt;<http://www.atlassian.com/>&gt;\`\_\_

</div>
</div>
</div>
</div>

