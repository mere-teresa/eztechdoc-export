1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Cookbook](Cookbook_31429528.html)</span>

<span id="title-text"> Developer : Importing settings from a bundle </span>
===========================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on May 17, 2016

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
The following recipe is valid for any type of settings supported by Symfony framework.

Description
===========

Usually, you develop your website using one or several custom bundles as this is a best practice. However, dealing with core bundle semantic configuration can be a bit tedious if you maintain it in the main `app/config/ezplatform.yml` configuration file.

Solution
========

This recipe will show you how to import configuration from a bundle the manual way and the implicit way.

The manual way
--------------

This is the simplest way of doing and it has the advantage of being explicit. The idea is to use the `imports` statement in your main `ezplatform.yml`:

**app/config/ezplatform.yml**

``` brush:
imports:
    # Let's import our template selection rules that reside in our custom bundle.
    # MyCustomBundle is the actual bundle name
    - {resource: "@AcmeTestBundle/Resources/config/templates_rules.yml"}
 
ezpublish:
    # ...
```

**templates\_rules.yml, placed under Resources/config folder in AcmeTestBundle**

``` brush:
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

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
During the merge process, if the imported configuration files contain entries that are already defined in the main configuration file, **they will override them**.

Tip

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
If you want to import configuration for development use only, you can do so in your `ezpublish_dev.yml` 

The implicit way
----------------

The following example will show you **how to implicitly load settings to configure eZ Platform kernel**. Note that this is also valid for any bundle!

We assume here that you're aware of <a href="http://symfony.com/doc/current/book/service_container.html#importing-configuration-via-container-extensions" class="external-link">service container extensions</a>.

**Acme/TestBundle/DependencyInjection/AcmeTestExtension**

``` brush:
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

**AcmeTestBundle/Resources/config/template\_rules.yml**

``` brush:
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

Regarding performance

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Service container extensions are called only when the container is being compiled, so there is nothing to worry about regarding performance.

<span class="aui-icon aui-icon-small aui-iconfont-approve confluence-information-macro-icon"></span>
Configuration loaded this way will be overridden by the main `ezplatform.yml` file.

 

 

#### In this topic:

-   [Description](#Importingsettingsfromabundle-Description)
-   [Solution](#Importingsettingsfromabundle-Solution)
    -   [The manual way](#Importingsettingsfromabundle-Themanualway)
    -   [The implicit way](#Importingsettingsfromabundle-Theimplicitway)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


