<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Cookbook](Cookbook_31429528.html)

</div>
**Developer : Importing settings from a bundle**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on May 17, 2016

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
The following recipe is valid for any type of settings supported by
Symfony framework.

</div>
</div>
**Description**

Usually, you develop your website using one or several custom bundles as
this is a best practice. However, dealing with core bundle semantic
configuration can be a bit tedious if you maintain it in the main
`app/config/ezplatform.yml` configuration file.

**Solution**

This recipe will show you how to import configuration from a bundle the
manual way and the implicit way.

**The manual way**

This is the simplest way of doing and it has the advantage of being
explicit. The idea is to use the `imports` statement in your main
`ezplatform.yml`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**app/config/ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
imports:
    # Let's import our template selection rules that reside in our custom bundle.
    # MyCustomBundle is the actual bundle name
    - {resource: "@AcmeTestBundle/Resources/config/templates_rules.yml"}
 
ezpublish:
    # ...
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**templates\_rules.yml, placed under Resources/config folder in
AcmeTestBundle**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
# Here I need to reproduce the right configuration tree.
# It will be merged with the main one
ezpublish:
    system:
        my_siteaccess:
            ezpage:
                layouts:
                    2ZonesLayout1:
                        name: "2 zones (layout 1)"
                        template: "AcmeTestBundle:zone:2zoneslayout1.html.twig"

            content_view:
                full:
                    article_test:
                        template: "AcmeTestBundle:full:article_test.html.twig"
                        match:
                            Id\Location: [144,149]
                    another_test:
                        template: "::another_test.html.twig"
                        match:
                            Id\Content: 142

            block_view:
                campaign:
                    template: "AcmeTestBundle:block:campaign.html.twig"
                    match:
                        Type: "Campaign"
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
During the merge process, if the imported configuration files contain
entries that are already defined in the main configuration file, **they
will override them**.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
Tip

<div class="confluence-information-macro-body">
If you want to import configuration for development use only, you can do
so in your `ezpublish_dev.yml` 

</div>
</div>
**The implicit way**

The following example will show you **how to implicitly load settings to
configure eZ Platform kernel**. Note that this is also valid for any
bundle!

We assume here that you’re aware of [service container
extensions](http://symfony.com/doc/current/book/service_container.html#importing-configuration-via-container-extensions).

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Acme/TestBundle/DependencyInjection/AcmeTestExtension**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
<?php

namespace Acme\TestBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Yaml\Yaml;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AcmeTestExtension extends Extension implements PrependExtensionInterface
{
    // ...

    /**
     * Allow an extension to prepend the extension configurations.
     * Here we will load our template selection rules.

     *
     * @param ContainerBuilder $container
     */
    public function prepend( ContainerBuilder $container )
    {
        // Loading our YAML file containing our template rules
        $configFile = __DIR__ . '/../Resources/config/template_rules.yml';
        $config = Yaml::parse( file_get_contents( $configFile ) );
        // We explicitly prepend loaded configuration for "ezpublish" namespace.
        // So it will be placed under the "ezpublish" configuration key, like in ezpublish.yml.
        $container->prependExtensionConfig( 'ezpublish', $config );
        $container->addResource( new FileResource( $configFile ) );
    }
}
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**AcmeTestBundle/Resources/config/template\_rules.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
# We explicitly prepend config for "ezpublish" namespace in service container extension, 
# so no need to repeat it here
system:
    ezdemo_frontend_group:
        ezpage:
            layouts:
                2ZonesLayout1:
                    name: "2 zones (layout 1)"
                    template: "AcmeTestBundle:zone:2zoneslayout1.html.twig"

        content_view:
            full:
                article_test:
                    template: "AcmeTestBundle:full:article_test.html.twig"
                    match:
                        Id\Location: 144
                another_test:
                    template: "::another_test.html.twig"
                    match:
                        Id\Content: 142

        block_view:
            campaign:
                template: "AcmeTestBundle:block:campaign.html.twig"
                match:
                    Type: "Campaign"
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
Regarding performance

<div class="confluence-information-macro-body">
Service container extensions are called only when the container is being
compiled, so there is nothing to worry about regarding performance.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
Configuration loaded this way will be overridden by the main
`ezplatform.yml` file.

</div>
</div>
 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376003713">
-   [Description](#Importingsettingsfromabundle-Description)
-   [Solution](#Importingsettingsfromabundle-Solution)
    -   [The manual way](#Importingsettingsfromabundle-Themanualway)
    -   [The implicit way](#Importingsettingsfromabundle-Theimplicitway)

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="footer" role="contentinfo">
<div class="section footer-body">
Document generated by Confluence on Mar 24, 2017 17:20

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

