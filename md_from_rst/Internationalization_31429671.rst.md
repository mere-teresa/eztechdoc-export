<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)

</div>
**Developer : Internationalization**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Mar 21, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Introduction**

eZ Platform offers the ability of creating different language versions
of all content in the repository.

**Using multiple languages**

The system allows for multiple language versions (translations) of a
Content item to be created. Translations are created per version of the
item, so each version of the content can have a different set of
translations.

At minimum, a version always has one translation which by default is the
*initial/main* translation. Further versions can be added, but only for
languages that have previously been  [added to the global translation
list](https://doc.ez.no/display/USER/6.+Creating+content%2C+advanced#id-6.Creatingcontent,advanced-Addingtranslations),
that is a list of all languages available in the system. The maximum
number of languages in the system is 64.

Different translations of the same Content item can be edited
separately. This means that different users can work on translations
into different languages at the same time.

**Translatable and untranslatable Fields**

Language versions actually concern translating values of the Fields of a
Content item. Every Field in its definition in a Content Type can be set
to be Translatable or not.

Translating the Field values is natural in some cases, for example for
the body of an article. However, there are Fields where translating is
impractical, for instance images without text, numbers, e-mail addresses
and so on. Platform still gives the possibility to mark all Fields as
translatable regardless of their Field Type. It is only the user’s
(content manager’s) decision to exclude the translation possibility for
those Fields where it makes no sense.

When a Field is not flagged as Translatable, its value will be copied
from the initial/main translation when a new language version is
created. This copied value cannot be modified. When a Field is
Translatable, its value in a new language version will have to be
entered by the user.

For example, let’s say that you need to store information about marathon
contestants and their results. You build a “contestant” Content Type
using the following Fields: name, photo, age, nationality, time reached.
Allowing the translation of anything else than nationality would be
pointless, since the values stored by the other Fields are the same
regardless of the language used to describe the runner. In other words,
the name, photo, age and time reached would be the same in, for example,
both English and Norwegian.

**Access control**

It is possible to control whether a User or User group is able to
translate content or not. This can be done by adding a Language
limitation to Policies that allow creating or editing content. This
limitation lets you define which Role can work with which languages in
the system. (For more information of the permissions system, see
[Permissions](https://doc.ez.no/display/DEVELOPER/Repository#Repository-Permissions).)

In addition, it is also possible to control access to the global
translation list by using the Content/Translations Policy. This makes it
possible to allow users other than the site administrator to add and
remove translations that can be used.

**How to create different language versions?**

The multilanguage system operates based on a global translation list
that contains all languages available in the installation. Languages can
be added to this list from the Admin Panel in the user interface. **The
new language must then be added to the**
**[SiteAccess](SiteAccess_31429665.html)** **configuration**. Once this
is done, any user with proper permissions can create Content item
versions in these languages in the user interface.

**How to make translations available to the visitor?**

Once more than one language is defined in the global translation list
and there is content in different languages, the question is how can
this be exposed to use by the visitor. There are two ways to do this:

1.  Implement a mechanism called **Language Switcher**. It lets you
    create links that allow switching between different translations of
    a Content item.
2.  If you want to have completely separate versions of the website,
    each with content in its own language, you can use siteaccesses. In
    this case, depending on the uri used to access the website, a
    different site will open, with a language set in
    configuration settings. All Content items will then be displayed in
    this primary language.

**Multilanguage and permissions**

[LanguageLimitation](LanguageLimitation_31430465.html) allows you to
limit users’ editing rights depending on the language of the Content
item. See
[Permissions](https://doc.ez.no/display/DEVELOPER/Repository#Repository-Permissions)
and [List of Limitations](List-of-Limitations_31430459.html) for more
information.

**Configuration**

One of the basic ways of using multiple languages is setting up a
separate siteaccess for each language.

**Explicit *translation siteaccesses***

Configuration is not mandatory, but can help to distinguish which
siteaccesses can be considered *translation siteaccesses*.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish:
    siteaccess:
        default_siteaccess: eng
        list:
            - ezdemo_site
            - eng
            - fre
            - ezdemo_site_admin

        groups:
            ezdemo_frontend_group:
                - ezdemo_site
                - eng
                - fre

    # ...

    system:
        # Specifying which SiteAccesses are used for translation
        ezdemo_frontend_group:
            translation_siteaccesses: [fre, eng]
        eng:
            languages: [eng-GB]
        fre:
            languages: [fre-FR, eng-GB]
        ezdemo_site:
            languages: [eng-GB]
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
**Note**: Top prioritized language is always used for as the siteaccess
language reference (e.g. `fre-FR` for `fre` siteaccess in the example
above).

If several translation siteaccesses share the same language
reference, **the first declared siteaccess always wins**.

</div>
</div>
**More complex translation setup**

There are some cases where your siteaccesses share settings (repository,
content settings, etc.), but you don’t want all of them to share the
same `translation_siteaccesses` setting. This can be for example the
case when you use separate siteaccesses for mobile versions of a
website.

Solution is as easy as defining new groups:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
ezpublish:
    siteaccess:
        default_siteaccess: eng
        list:
            - ezdemo_site
            - eng
            - fre
            - mobile_eng
            - mobile_fre
            - ezdemo_site_admin

        groups:
            # This group can be used for common front settings
            ezdemo_common_group:
                - ezdemo_site
                - eng
                - fre
                - mobile_eng
                - mobile_fre

            ezdemo_frontend_group:
                - ezdemo_site
                - eng
                - fre

            ezdemo_mobile_group
                - mobile_eng
                - mobile_fre

    # ...

    system:
        # Translation SiteAccesses for regular frontend
        ezdemo_frontend_group:
            translation_siteaccesses: [fre, eng]

        # Translation SiteAccesses for mobile frontend
        ezdemo_mobile_group:
            translation_siteaccesses: [mobile_fre, mobile_eng]

        eng:
            languages: [eng-GB]
        fre:
            languages: [fre-FR, eng-GB]
        ezdemo_site:
            languages: [eng-GB]

        mobile_eng:
            languages: [eng-GB]
        mobile_fre:
            languages: [fre-FR, eng-GB]
```

</div>
</div>
**Using implicit *related siteaccesses***

If `translation_siteaccesses` setting is not provided, implicit *related
siteaccesses* will be used instead. Siteaccesses are
considered *related* if they share:

-   The same repository
-   The same root location Id (see [Multisite
    feature](Multisite_31430389.html))

**Fallback languages and missing translations**

When setting up siteaccesses with different language versions, you can
specify a list of preset languages for each siteaccess. When this
siteaccess is used, the system will go through this list. If a Content
item is unavailable in the first (prioritized) language, it will attempt
to use the next language in the list, and so on. Thanks to this you can
have a fallback in case of a lacking translation.

You can also assign a Default content availability flag to Content Types
(available in the Admin Panel). When this flag is assigned, Content
items of this type will be available even when they do not have a
language version in any of the languages configured for the current
siteaccess.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Note that if a language is not provided in the list of prioritized
languages and it is not the Content item’s first language, the URL alias
for this content in this language will not be generated.

This is different than in legacy, where this behavior was covered by a
global control switch `` `ShowUntranslatedObjects ``
&lt;<https://doc.ez.no/eZ-Publish/Technical-manual/4.x/Reference/Configuration-files/site.ini/RegionalSettings/ShowUntranslatedObjects/(language)/eng-GB>&gt;\_\_.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: Usage
   :name: Internationalization-Usage
   :class: confluence-link

.. rubric:: Language Switcher
   :name: Internationalization-LanguageSwitcher

.. rubric:: Description
   :name: Internationalization-Description

A Content item can be translated into several languages. Those languages
are configured in the system and exposed in siteaccesses via a
prioritized list of languages:

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeHeader panelHeader pdl"
   style="border-bottom-width: 1px;"&gt;

\*\*ezplatform.yml\*\*

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    ezpublish
        system:
            eng:
                languages: \[eng-GB\]
            \# In fre siteaccess, fre-FR is always preferred, and fallback to eng-GB if needed.
            fre:
                languages: \[fre-FR, eng-GB\]

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

When visiting a Content item, it may be useful to let the user switch
from one translation to another, more appropriate to them. This is
precisely the goal of the language switcher.

The language switcher relies on the \\ Cross-SiteAccess linking feature
&lt;<https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-Cross-siteacesslinks>&gt;\_\_\\  to
generate links to the Content item’s translation, and
on \\ RouteReference feature
&lt;Internationalization\_31429671.html&gt;\_\_\\ .

.. raw:: html

   &lt;div
   class="confluence-information-macro confluence-information-macro-information"&gt;

Tip

.. raw:: html

   &lt;div class="confluence-information-macro-body"&gt;

If you install the DemoBundle with at least 2 different languages, you
will be able to see the Language Switcher and to test it.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: In a template
   :name: Internationalization-Inatemplate

To generate a language switch link, you need to generate
the \\ RouteReference\\ , with the \\ language\\  parameter. This
can easily be done with \\ ez\_route()\\  Twig function:

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    {\# Given that "location" variable is a valid Location object \#}
    &lt;a href="{{ url( ez\_route( location, {"language": "fre-FR"} ) ) }}"&gt;{{ ez\_content\_name( content ) }}&lt;/a&gt;

    {\# Generating a link to a declared route instead of Location \#}
    &lt;a href="{{ url( ez\_route( 'my\_route', {"language": "fre-FR"} ) ) }}"&gt;My link&lt;/a&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

You can also omit the route, in this case, the current route will be
used (i.e. switch the current page):

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    {\# Using Twig named parameters \#}
    &lt;a href="{{ url( ez\_route( params={"language": "fre-FR"} ) ) }}"&gt;My link&lt;/a&gt;

    {\# Identical to the following, using ordered parameters \#}
    &lt;a href="{{ url( ez\_route( null, {"language": "fre-FR"} ) ) }}"&gt;My link&lt;/a&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. rubric:: Using sub-requests
   :name: Internationalization-Usingsub-requests

When using sub-requests, you lose the context of the master request
(e.g. current route, current location, etc.). This is because
sub-requests can be displayed separately, with ESI or Hinclude.

If you want to render language switch links in a sub-request with a
correct \\ RouteReference, you must pass it as an argument to your
sub-controller from the master request.

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    {\# Render the language switch links in a sub-controller \#}
    {{ render( controller( 'AcmeTestBundle:Default:languages', {'routeRef': ez\_route()} ) ) }}

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    namespace Acme\\TestBundle\\Controller;

    use eZ\\Bundle\\EzPublishCoreBundle\\Controller;
    use eZ\\Publish\\Core\\MVC\\Symfony\\Routing\\RouteReference;

    class DefaultController extends Controller
    {
        public function languagesAction( RouteReference \$routeRef )
        {
            return \$this-&gt;render( 'AcmeTestBundle:Default:languages.html.twig', array( 'routeRef' =&gt; \$routeRef ) );
        }
    }

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;div class="code panel pdl" style="border-width: 1px;"&gt;

.. raw:: html

   &lt;div class="codeContent panelContent pdl"&gt;

.. code:: brush:

    {\# languages.html.twig \#}

    {\# Looping over all available languages to display the links \#}
    {% for lang in ezpublish.availableLanguages %}
        {\# This time, we alter the "siteaccess" parameter directly. \#}
        {\# We get the right siteaccess with the help of ezpublish.translationSiteAccess() helper \#}
        {% do routeRef.set( "siteaccess", ezpublish.translationSiteAccess( lang ) ) %}
        &lt;a href="{{ url( routeRef ) }}"&gt;{{ lang }}&lt;/a&gt;&lt;br /&gt;
    {% endfor %}

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

-  ezpublish.translationSiteAccess( language )\` returns the siteaccess
name for provided language (or `null` if it cannot be found) -
`ezpublish.availableLanguages()` returns the list of available
languages.

**Using PHP**

You can easily generate language switch links from PHP too, with
the `RouteReferenceGenerator` service:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
// Assuming we're in a controller
/** @var \eZ\Publish\Core\MVC\Symfony\Routing\Generator\RouteReferenceGeneratorInterface $routeRefGenerator */
$routeRefGenerator = $this->get( 'ezpublish.route_reference.generator' );
$routeRef = $routeRefGenerator->generate( $location, array( 'language' => 'fre-FR' ) );
$link = $this->generateUrl( $routeRef );
```

</div>
</div>
You can also retrieve all available languages with
the `TranslationHelper`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
/** @var \eZ\Publish\Core\Helper\TranslationHelper $translationHelper */
$translationHelper = $this->get( 'ezpublish.translation_helper' );
$availableLanguages = $translationHelper->getAvailableLanguages();
```

</div>
</div>
**`ez_trans_prop` Twig helper**

`ez_trans_prop()` is a generic, low level Twig helper which corrects the
translated value of a multi valued(translations) property.

See [ez\_trans\_prop](ez_trans_prop_32114049.html) reference for more
information.

 

**Translating UI of eZ Platform**

**Installing new UI translations**

If you want to install a new language in your project, you just have to
install the corresponding package.

For example, if you want to translate your application into French, you
just have to run:

    composer require ezplatform-i18n/ezplatform-i18n-fr_fr

and then clear the cache.

Now you can reload your eZ Platform administration page which will be
translated in French (if your browser is configured to fr\_FR.)

**In-context UI translation**

V1.8

Since eZ Platform 1.7.0, the interface has been fully translatable.
Version 1.8.0 introduces official support for
[Crowdin](http://crowdin.com) as a translation management system. In
addition, it integrates support for in-context translation, a feature
that allows you to translate strings from the interface, *in context*.

To learn how to contribute to a translation using Crowdin, see
[Contributing translations](Contributing-translations_34079215.html).

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375997970">
-   [Introduction](#Internationalization-Introduction)
    -   [Using multiple
        languages](#Internationalization-Usingmultiplelanguages)
    -   [Translatable and untranslatable
        Fields](#Internationalization-TranslatableanduntranslatableFields)
        -   [Access control](#Internationalization-Accesscontrol)
    -   [How to create different language
        versions?](#Internationalization-Howtocreatedifferentlanguageversions?)
    -   [How to make translations available to the
        visitor?](#Internationalization-Howtomaketranslationsavailabletothevisitor?)
    -   [Multilanguage and
        permissions](#Internationalization-Multilanguageandpermissions)
-   [Configuration](#Internationalization-Configuration)
    -   [Explicit translation
        siteaccesses](#Internationalization-Explicittranslationsiteaccesses)
    -   [More complex translation
        setup](#Internationalization-Morecomplextranslationsetup)
    -   [Using implicit related
        siteaccesses](#Internationalization-Usingimplicitrelatedsiteaccesses)
    -   [Fallback languages and missing
        translations](#Internationalization-Fallbacklanguagesandmissingtranslations)
-   [Usage](#Internationalization-Usage)
    -   [Language Switcher](#Internationalization-LanguageSwitcher)
        -   [Description](#Internationalization-Description)
        -   [In a template](#Internationalization-Inatemplate)
        -   [Using
            sub-requests](#Internationalization-Usingsub-requests)
        -   [Using PHP](#Internationalization-UsingPHP)
    -   [ez\_trans\_prop Twig
        helper](#Internationalization-ez_trans_propTwighelper)
    -   [Translating UI of eZ
        Platform](#Internationalization-TranslatingUIofeZPlatform)

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
![image0](images/icons/bullet_blue.gif){width="8px" height="8px"}
[incontext-translation-ezplatform-crowdin.png](attachments/31429671/33554862.png)
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

