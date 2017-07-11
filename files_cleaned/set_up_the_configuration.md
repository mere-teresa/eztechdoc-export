1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Tutorials](Tutorials_31429522.html)</span>
4.  <span>[Extending PlatformUI with new
    navigation](Extending-PlatformUI-with-new-navigation_31430235.html)</span>

<span id="title-text"> Developer : Set up the configuration </span> {#title-heading .pagetitle}
===================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
May 06, 2016

PlatformUI Configuration files {#Setuptheconfiguration-PlatformUIConfigurationfiles}
------------------------------

### JavaScript modules in `yui.yml` {#Setuptheconfiguration-JavaScriptmodulesinyui.yml}

Each component of the PlatformUI application is written as a [YUI
module](http://yuilibrary.com/yui/docs/yui/create.html){.external-link}.
The YUI module system comes with a dependency system which is used in
the PlatformUI application. For instance, the PlatformUI application has
a module called `ez-templatebasedview` which provides a base view class
to ease the usage of a template. This module is a dependency of most of
the views in the application and has itself some dependencies, like for
instance the view module from YUI. Those dependencies are expressed in
the `yui.yml` configuration and this configuration is meant to be
extended / overridden in other bundles. For instance:

**Excerpt of yui.yml**

~~~~ brush:
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
~~~~

<span class="inline-comment-marker"
data-ref="736650a3-b2b6-46ac-9bf9-f9904ede18f5">This configuration
defines two modules – `ez-templatebasedview` and
`ez-loginformview`:</span>

-   `ez-templatebasedview` requires the modules `ez-texthelper`,
    `ez-view`, `handlebars` and `template`. The source code of this
    module is in
    `%ez_platformui.public_dir%/js/views/ez-templatebasedview.js` on the
    disk;
-   `ez-loginformview` requires the modules `ez-templatebasedview`,
    `node-style` and `loginformview-ez-template`. The source code of
    this module is in
    `%ez_platformui.public_dir%/js/views/ez-loginformview.js` on
    the disk.

 

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Note that the order of module definitions is not important,
`ez-loginformview` can be defined before the `ez-templatebaseview`
module even if the latter is a dependency of the former.

Most of the PlatformUI application views use a Handlebars template to
generate the HTML markup. In the application the templates are also
handled as YUI modules but those modules are special because they are
dynamically generated from the regular template files on the disk. For
this to work, the YUI module corresponding to a template must have the
`type` flag set to `template`. To complete the example above, the
template module `loginforview-ez-template` should be defined in the
following way:

~~~~ brush:
loginformview-ez-template:
    type: 'template'
    path: %ez_platformui.public_dir%/templates/loginform.hbt
~~~~

### CSS files in `css.yml` {#Setuptheconfiguration-CSSfilesincss.yml}

The CSS files used by the application are also listed in `css.yml`, but
in the case of CSS files, it’s much simpler as this file just lists the
CSS files to load, example:

**Excerpt of css.yml**

~~~~ brush:
system:
    default:
        css:
            files:
                - '@eZPlatformUIBundle/Resources/public/css/views/field.css'
                - '@eZPlatformUIBundle/Resources/public/css/views/fields/view/relation.css'
~~~~

Injecting the extension custom configuration files {#Setuptheconfiguration-Injectingtheextensioncustomconfigurationfiles}
--------------------------------------------------

To be able to extend the PlatformUI application configuration, the
extension bundle has to set up its own configuration handling. For this,
you only have to tweak the extension class generated in the bundle [in
the first step](Create-the-extension-Bundle_31430237.html) to load the
extension bundle’s `yui.yml` and `css.yml` and to process their
respective content with PlatformUI’s configuration. The default empty
`yui.yml` and `css.yml` also have to be created so that eZ Platform is
still usable.

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
If you want to get more details on this operation, you can read the
[Exposing SiteAccess-aware configuration for your
bundle](Exposing-SiteAccess-aware-configuration-for-your-bundle_31429794.html)
recipe.

After this, you just have to make sure the bundle has a
`Resources/public` directory to install the assets with the following
command:

~~~~ brush:
$ app/console assets:install --symlink
~~~~

Results and next step:

<span
class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
The resulting code can be seen in [the 2\_configuration tag on
GitHub](https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/tree/2_configuration){.external-link}
(the interesting part is the [<span class="pl-s1"><span
class="pl-en">EzSystemsExtendingPlatformUIConferenceExtension</span></span>](https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/blob/2_configuration/DependencyInjection/EzSystemsExtendingPlatformUIConferenceExtension.php){.external-link}
class), this step result can also be viewed as [a diff between tags
`1_bundle` and
`2_configuration`](https://github.com/ezsystems/ExtendingPlatformUIConferenceBundle/compare/1_bundle...2_configuration){.external-link}.

After these two first steps, PlatformUI should remain perfectly usable
and unchanged. The next step is then [to tweak the PlatformUI
Application routing to start implementing the new
feature](Alter-the-JavaScript-Application-routing_31430241.html).

**Tutorial path**

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


