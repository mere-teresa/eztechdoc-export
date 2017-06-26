1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : Best Practices </span> {#title-heading .pagetitle}
=========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Jun 21, 2016

Structuring an eZ Platform Project {#BestPractices-StructuringaneZPlatformProject .with-breadcrumbs}
==================================

Since release 2015.10, eZ Platform is very close to the [standard
Symfony
distribution](https://github.com/symfony/symfony-standard){.external-link}.
It comes with default settings that will let you get started in a few
minutes.

The AppBundle {#BestPractices-TheAppBundle}
-------------

Most projects can use the provided `AppBundle`, in the `src` folder. It
is enabled by default. The project’s PHP code (controllers, event
listeners, etc.) can be placed there.<span> </span>

<span>Reusable libraries should be packaged so that they can easily be
managed using Composer.</span>

<span>Templates</span> {#BestPractices-Templates}
----------------------

<span>Project templates should go into `app/Resources/views`.</span>

<span>They can then be referenced in code without any prefix, for
example `app/Resources/views/content/full.html.twig` can be referenced
in twig templates or PHP as `content/full.html.twig`.</span>

<span>Assets</span> {#BestPractices-Assets}
-------------------

<span>Project assets should go into the `web` folder, and can be
referenced as relative to the root, for example `web/js/script.js` can
be referenced as `js/script.js` from templates.</span>

<span><span style="color: rgb(44,45,48);">All project assets are
accessible through the `web/assets` path.</span></span>

Configuration {#BestPractices-Configuration}
-------------

Configuration may go into `app/config`. However, services definitions
from `AppBundle` should go into `src/AppBundle/Resources/config`.

Versioning a project {#BestPractices-Versioningaproject}
--------------------

The recommended method is to version the whole ezplatform repository.
Per installation configuration should use `parameters.yml`.

 

eZ Platform Configuration {#BestPractices-eZPlatformConfiguration}
=========================

eZ Platform configuration is delivered using a number of dedicated
configuration files. This config covers everything from selecting the
content repository to siteaccesses to language settings.

Configuration format {#BestPractices-Configurationformat}
--------------------

<span
class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Config files can have different formats. The recommended one is YAML,
which is used by default in the kernel (and in examples throughout the
documentation). However, you can also have configuration in XML or PHP
formats.

 

Basic configuration handling in eZ Platform is similar to the usual
Symfony config. To use it, you define key/value pairs in your
configuration files. Internally and by convention, keys follow a dot
syntax where the different segments follow your configuration hierarchy.
Keys are usually prefixed by a namespace corresponding to your
application. Values can be anything, including arrays and deep hashes.

Configuration files {#BestPractices-Configurationfiles}
-------------------

Main configuration files are located in the `app/config` folder.

If you use the provided `AppBundle`, service definitions from it should
go into `src/AppBundle/Resources/config`.

-   `parameters.yml` contains infrastructure-related configuration. It
    is created based on the default settings defined in
    `parameters.yml.dist`.
-   `config.yml` contains configuration stemming from Symfony and covers
    settings such as search engine or cache configuration.
-   `ezplatform.yml` contains general configuration that is specific for
    eZ Platform, like for example siteaccess settings.
-   `security.yml` is the place for security-related settings.
-   `routing.yml` defines routes that will be used throughout
    the application.

Configuration can be made environment-specific using separate files for
each environment. These files will contain additional settings and point
to the general (not environment-specific) configuration that will be
applied in other cases.

Here you can read more about [how configuration is handled in
Symfony](http://symfony.com/doc/current/best_practices/configuration.html){.external-link}.

Specific configuration {#BestPractices-Specificconfiguration}
----------------------

The configuration of specific aspects of eZ Platform is described in the
respective topics in [The Complete Guide to eZ
Platform](The-Complete-Guide-to-eZ-Platform_31429526.html).

#### Selected configuration topics: {#BestPractices-Selectedconfigurationtopics:}

-   <span class="confluence-link">[View provider  
    ](Content-Rendering_31429679.html#ContentRendering-Viewproviderconfiguration)</span>
-   [Logging and
    debug](Devops_31432029.html#Devops-LoggingandDebugConfiguration)
-   [Content
    repository](Repository_31432023.html#Repository-ContentRepositoryConfiguration)
-   <span
    class="confluence-link">[Authentication](Security_31429685.html#Security-Configuration)</span>
-   [Sessions](Sessions_31429667.html#Sessions-Configuration)
-   [Siteaccess](SiteAccess_31429665.html#SiteAccess-Basics)

#### In this topic: {#BestPractices-Inthistopic:}

-   [Structuring an eZ Platform
    Project](#BestPractices-StructuringaneZPlatformProject)
    -   [The AppBundle](#BestPractices-TheAppBundle)
    -   [Templates](#BestPractices-Templates)
    -   [Assets](#BestPractices-Assets)
    -   [Configuration](#BestPractices-Configuration)
    -   [Versioning a project](#BestPractices-Versioningaproject)
-   [eZ Platform Configuration](#BestPractices-eZPlatformConfiguration)
    -   [Configuration format](#BestPractices-Configurationformat)
    -   [Configuration files](#BestPractices-Configurationfiles)
    -   [Specific configuration](#BestPractices-Specificconfiguration)

#### Related topics: {#BestPractices-Relatedtopics:}

<span class="confluence-link">[Creating a new design using Bundle
Inheritance](Design_31429681.html#Design-CreatinganewdesignusingBundleInheritance)</span>

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


