<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)

</div>
**Developer : SiteAccess**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Feb 23, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Introduction**

eZ Platform allows you to maintain multiple sites in one installation using a feature called **siteaccesses**.

In short, a siteaccess is a set of configuration settings that is used when the site is reached through a specific address.

When the user accesses the site, the system analyzes the uri and compares it to rules specified in the configuration. If it finds a set of fitting rules, this siteaccess is used.

**What does a siteaccess do?**

A siteaccess overrides the default configuration. This means that if the siteaccess does not specify some aspect of the configuration, the default values will be used. The default configuration is also used when no siteaccess can be matched to a situation. 

A siteaccess can decide many things about the website, for example the database, language or var directory that are used.

**How is a siteaccess selected?**

A siteaccess is selected using one or more matchers – rules based on the uri or its parts. Example matching criteria are elements of the uri, host name (or its parts), port number, etc.

For detailed information on how siteaccess matchers work, see [Siteaccess Matching](https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-SiteaccessMatching).

**What can you use siteaccesses for?**

Typical uses of a siteaccess are:

-   different language versions of the same site identified by a uri part; one siteaccess for one language
-   two different versions of a website: one siteaccess with a public interface for visitors and one with a restricted interface for administrators

 

Both the rules for siteaccess matching and its effects are located in the main **app/config/ezplatform.yml** configuration file.

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
If you need to change between siteaccesses in Page mode, do not use any functions in the page itself (for example, a language switcher). This may cause unexpected errors. Instead, switch between siteaccesses using the siteaccess bar above the page.

</div>
</div>
**Use case: multilanguage sites**

A site has content in two languages: English and Norwegian. It has one URI per language: http://example.com/eng and <http://example.com/nor>. Uri parts of each language (eng, nor) are mapped to a *siteaccess*, commonly named like the uri part: `eng`, `nor`. Using semantic configuration, each of these siteaccesses can be assigned a prioritized list of languages it should display:

-   The English site would display content in English and ignore Norwegian content;
-   The Norwegian site would display content in Norwegian but also in English *if it does not exist in Norwegian*.

Such configuration would look like this:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    siteaccess:
        # There are two siteaccess
        list: [eng, nor]
 
        # eng is the default one if no prefix is specified
        default_siteaccess: eng

        # the first URI of the element is used to find a siteaccess with a similar name
        match:
            URIElement: 1


ezpublish:
    # root node for configuration per siteaccess 
    system:
        # Configuration for the 'eng' siteaccess
        eng:
            languages: [eng-GB]
        nor:
            languages: [nor-NO, eng-GB]
```

</div>
</div>
**The default scope**

When no particular context is required, it is fine to use the \`default\` scope instead of specifying a siteaccess.

**Configuration**

**Basics**

<div
class="confluence-information-macro confluence-information-macro-information">
Important

<div class="confluence-information-macro-body">
Configuration is tightly related to the service container.
To fully understand the following content, you need to be familiar with [Symfony's service container](Service-Container_31432100.html) and [its configuration](http://symfony.com/doc/current/book/service_container.html#service-parameters).

</div>
</div>
Basic configuration handling in eZ Platform is similar to what is commonly possible with Symfony. Regarding this, you can define key/value pairs in [your configuration files](http://symfony.com/doc/current/book/service_container.html#importing-other-container-configuration-resources), under the main **parameters** key (like in **[parameters.yml](https://github.com/ezsystems/ezpublish5/blob/master/app/config/parameters.yml.dist)**).

Internally and by convention, keys follow a **dot syntax** where the different segments follow your configuration hierarchy. Keys are usually prefixed by a *namespace* corresponding to your application. Values can be anything, **including arrays and deep hashes**.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
eZ Platform core configuration is prefixed by **ezsettings** namespace, while *internal* configuration (not to be used directly) is prefixed by **ezpublish** namespace.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
For configuration that is meant to be exposed to an end-user (or end-developer), it's usually a good idea to also [implement semantic configuration](http://symfony.com/doc/current/components/config/definition.html).

Note that it is also possible to [implement SiteAccess aware semantic configuration](Exposing-SiteAccess-aware-configuration-for-your-bundle_31429794.html).

</div>
</div>
**Example**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Configuration**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
parameters:
    myapp.parameter.name: someValue
    myapp.boolean.param: true
    myapp.some.hash:
        foo: bar
        an_array: [apple, banana, pear]
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Usage from a controller**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
// Inside a controller
$myParameter = $this->container->getParameter( 'myapp.parameter.name' );
```

</div>
</div>
**Dynamic configuration with the ConfigResolver**

In eZ Platform it is fairly common to have different settings depending on the current siteaccess (e.g. languages, [view provider](Content-Rendering_31429679.html#ContentRendering-Viewproviderconfiguration) configuration).

**Scope**

**Dynamic configuration **can be resolved depending on a *scope*.

Available scopes are (in order of precedence) :

1.  *global*
2.  SiteAccess
3.  SiteAccess group
4.  *default*

It gives the opportunity to define settings for a given siteaccess, for instance, like in the [legacy INI override system](http://doc.ez.no/eZ-Publish/Technical-manual/4.x/Concepts-and-basics/Configuration).

This mechanism is not limited to eZ Platform internal settings (aka \***ezsettings\* namespace**) and is applicable for specific needs (bundle-related, project-related, etc.).

<div
class="confluence-information-macro confluence-information-macro-warning">
<div class="confluence-information-macro-body">
Always prefer semantic configuration especially for internal eZ settings.
Manually editing internal eZ settings is possible, but at your own risk, as unexpected behavior can occur.

</div>
</div>
**ConfigResolver Usage**

Dynamic configuration is handled by a **config resolver**. It consists in a service object mainly exposing `hasParameter()` and `getParameter()` methods. The idea is to check the different *scopes* available for a given *namespace* to find the appropriate parameter.

In order to work with the config resolver, your dynamic settings must comply internally with the following name format: `<namespace>.<scope>.parameter.name`.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
The following configuration is **an example of internal usage** inside the code of eZ Platform.

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Namespace + scope example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
parameters:
    # Some internal configuration
    ezsettings.default.content.default_ttl: 60
    ezsettings.ezdemo_site.content.default_ttl: 3600
 
    # Here "myapp" is the namespace, followed by the siteaccess name as the parameter scope
    # Parameter "foo" will have a different value in ezdemo_site and ezdemo_site_admin
    myapp.ezdemo_site.foo: bar
    myapp.ezdemo_site_admin.foo: another value
    # Defining a default value, for other siteaccesses
    myapp.default.foo: Default value
 
    # Defining a global setting, used for all siteaccesses
    #myapp.global.some.setting: This is a global value
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
// Inside a controller, assuming siteaccess being "ezdemo_site"
/** @var $configResolver \eZ\Publish\Core\MVC\ConfigResolverInterface **/
$configResolver = $this->getConfigResolver();
 
// ezsettings is the default namespace, so no need to specify it
// The following will resolve ezsettings.<siteaccessName>.content.default_ttl
// In the case of ezdemo_site, will return 3600.
// Otherwise it will return the value for ezsettings.default.content.default_ttl (60)
$locationViewSetting = $configResolver->getParameter( 'content.default_ttl' );
 
$fooSetting = $configResolver->getParameter( 'foo', 'myapp' );
// $fooSetting's value will be 'bar'
 
// Force scope
$fooSettingAdmin = $configResolver->getParameter( 'foo', 'myapp', 'ezdemo_site_admin' );
// $fooSetting's value will be 'another value'
 
// Note that the same applies for hasParameter()
```

</div>
</div>
Both `getParameter()` and `hasParameter()` can take 3 different arguments:

1.  `$paramName` (i.e. the name of the parameter you need)
2.  `$namespace` (i.e. your application namespace, *myapp* in the previous example. If null, the default namespace will be used, which is **ezsettings** by default)
3.  `$scope` (i.e. a siteaccess name. If null, the current siteaccess will be used)

**Inject the ConfigResolver in your services**

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
Instead of injecting the whole ConfigResolver service, you may directly [inject your SiteAccess-aware settings (aka dynamic settings) into your own services](https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-DynamicSettingsInjection).

</div>
</div>
 

You can use the **ConfigResolver** in your own services whenever needed. To do this, just inject the `ezpublish.config.resolver service`:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
parameters:
    my_service.class: My\Cool\Service
 
services:
    my_service:
        class: %my_service.class%
        arguments: [@ezpublish.config.resolver]
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
<?php
namespace My\Cool;
 
use eZ\Publish\Core\MVC\ConfigResolverInterface;
 
class Service
{
    /**
     * @var \eZ\Publish\Core\MVC\ConfigResolverInterface
     */
    private $configResolver;
 
    public function __construct( ConfigResolverInterface $configResolver )
    {
        $this->configResolver = $configResolver;
        $myParam = $this->configResolver->getParameter( 'foo', 'myapp' );
    }
 
    // ...
}
```

</div>
</div>
**Custom locale configuration**

If you need to use a custom locale they can also be configurable in `ezplatform.yml`, adding them to the *conversion map*:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    # Locale conversion map between eZ Publish format (i.e. fre-FR) to POSIX (i.e. fr_FR). 
    # The key is the eZ Publish locale. Check locale.yml in EzPublishCoreBundle to see natively supported locales.
    locale_conversion:
        eng-DE: en_DE
```

</div>
</div>
A locale *conversion map* example can be found in the core\` bundle, on `locale.yml` &lt;<https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Bundle/EzPublishCoreBundle/Resources/config/locale.yml>&gt;\_\_.

.. rubric:: Siteaccess Matching
   :name: SiteAccess-SiteaccessMatching

Siteaccess matching is done through
\*\*eZ\\\\Publish\\\\MVC\\\\SiteAccess\\\\Matcher\*\* objects. You can configure
this matching and even develop custom matchers.

To be usable, every siteaccess must be provided a matcher.

You can configure siteaccess matching in your main
\*\*app/config/ezplatform.yml\*\*:

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

    ezpublish:
        siteaccess:
            default\_siteaccess: ezdemo\_site
            list:
                - ezdemo\_site
                - eng
                - fre
                - fr\_eng
                - ezdemo\_site\_admin
            groups:
                ezdemo\_site\_group:
                    - ezdemo\_site
                    - eng
                    - fre
                    - fr\_eng
                    - ezdemo\_site\_admin
            match:
                Map\\URI:
                    ezdemo\_site: ezdemo\_site
                    fre: fre
                    ezdemo\_site\_admin: ezdemo\_site\_admin

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

You need to set several parameters:

-  \*\*ezpublish.siteaccess.default\\\_siteaccess\*\*
-  \*\*ezpublish.siteaccess.list\*\*
-  \*(optional)\* \*\*ezpublish.siteaccess.groups\*\*
-  \*\*ezpublish.siteaccess.match\*\*

\*\*ezpublish.siteaccess.default\\\_siteaccess\*\* is the default siteaccess
that will be used if matching was not successful. This ensures that a
siteaccess is always defined.

\*\*ezpublish.siteaccess.list\*\* is the list of all available siteaccesses
in your website.

\*(optional)\* \*\*ezpublish.siteaccess.groups\*\* defines which groups
siteaccesses belong to. This is useful when you want to mutualize
settings between several siteaccesses and avoid config duplication.
Siteaccess groups are treated the same as regular siteaccesses as far as
configuration is concerned.

.. raw:: html

   &lt;div
   class="confluence-information-macro confluence-information-macro-tip"&gt;

.. raw:: html

   &lt;div class="confluence-information-macro-body"&gt;

A siteaccess can be part of several groups.

A siteaccess configuration has always precedence on the group
configuration.

.. raw:: html

   &lt;/div&gt;

.. raw:: html

   &lt;/div&gt;

\*\*ezpublish.siteaccess.match\*\* holds the matching configuration. It
consists in a hash where the key is the name of the matcher class. If
the matcher class doesn't start with a \*\*\\\\\*\* , it will be considered
relative to eZ\\Publish\\MVC\\SiteAccess\\Matcher\` (e.g. `Map\Host` will refer to  `eZ\Publish\MVC\SiteAccess\Matcher\Map\Host`)

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
Every **custom matcher** can be specified with a **fully qualified class name** (e.g. `\My\SiteAccess\Matcher`) or by a **service identifier prefixed by @** (e.g. `@my_matcher_service`).

-   In the case of a fully qualified class name, the matching configuration will be passed in the constructor.
-   In the case of a service, it must implement `eZ\Bundle\EzPublishCoreBundle\SiteAccess\Matcher`. The matching configuration will be passed to `setMatchingConfiguration()`.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Make sure to type the matcher in correct case. If it is in wrong case like "Uri" instead of "URI," it will happily work on systems like Mac OS X because of case insensitive file system, but will fail when you deploy it to a Linux server. This is a known artifact of [PSR-0 autoloading](http://www.php-fig.org/psr/psr-0/) of PHP classes.

</div>
</div>
**Available matchers**

<div class="table-wrap">
<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Name</th>
<th align="left">Description</th>
<th align="left">Configuration</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>URIElement</code></td>
<td align="left">Maps a URI element to a siteaccess. This is the default matcher used when choosing URI matching in setup wizard. </td>
<td align="left"><p>The element number you want to match (starting from 1).</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>UR</p>
</dd>
</dl>
</dd>
</dl>
<p>IElement: 1</p>
</div>
</div>
<blockquote>
<p><strong>Important:</strong></p>
</blockquote>
<p>When using a value &gt; 1, it will concatenate the elements with _</p></td>
<td align="left"><p><strong>URI:</strong> <code>/ezdemo_site/foo /bar</code></p>
<p>Element number: 1<br />
Matched siteaccess: ezdemo_site</p>
<dl>
<dt>| Element number:</dt>
<dd><p>2</p>
</dd>
<dt>| Matched</dt>
<dd><p>siteaccess: ezdemo_site_fo</p>
</dd>
</dl>
<p>o</p></td>
</tr>
<tr class="even">
<td align="left"><code>URIText</code></td>
<td align="left">Matches URI using <em>pre</em> and/or <em>post</em> sub-strings in the first URI segment</td>
<td align="left"><p>The prefix and/or suffix (none are required)</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>UR</p>
</dd>
</dl>
</dd>
</dl>
<p>IText:</p>
<blockquote>
<p>prefix: foo</p>
<p>suffix: bar</p>
</blockquote>
</div>
</div></td>
<td align="left"><p><strong>URI:</strong> <code>/footestbar/my/c ontent</code></p>
<p>Prefix: foo<br />
Suffix: bar<br />
Matched siteaccess: test </p></td>
</tr>
<tr class="odd">
<td align="left"><code>HostElement</code></td>
<td align="left">Maps an element in the host name to a siteaccess.</td>
<td align="left"><p>The element number you want to match (starting from 1).</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>Ho</p>
</dd>
</dl>
</dd>
</dl>
<p>stElement: 2</p>
</div>
</div></td>
<td align="left"><p><strong>Host name:</strong> `www.example.com `</p>
<p>Element number: 2<br />
Matched siteaccess: example </p></td>
</tr>
<tr class="even">
<td align="left"><code>HostText</code></td>
<td align="left">Matches a siteaccess in the host name, using <em>pre</em> and/or <em>post</em> sub-strings.</td>
<td align="left"><p>The prefix and/or suffix (none are required)</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>Ho</p>
</dd>
</dl>
</dd>
</dl>
<p>stText:</p>
<blockquote>
<p>prefix: www.</p>
<p>suffix: .com</p>
</blockquote>
</div>
</div></td>
<td align="left"><p><strong>Host name</strong>: <code>www.foo.com</code></p>
<p>Prefix: www.<br />
Suffix: .com<br />
Matched siteaccess: foo </p></td>
</tr>
<tr class="odd">
<td align="left"><code>Map\Host</code></td>
<td align="left">Maps a host name to a siteaccess.</td>
<td align="left"><p>A hash map of host/siteaccess</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>Ma</p>
</dd>
</dl>
</dd>
</dl>
<p>pHost:</p>
<blockquote>
<p>www.foo.com: foo</p>
</blockquote>
<p>_front</p>
<blockquote>
<p>adm.foo.com: foo</p>
</blockquote>
<p>_admin</p>
<blockquote>
<p>www.bar-stuff.fr</p>
</blockquote>
<p>: bar_front</p>
<blockquote>
<p>adm.bar-stuff.fr</p>
</blockquote>
<p>: bar_admin</p>
</div>
</div>
<div
class="confluen
<p>ce-information-mac ro confluence-info rmation-macro-warn ing&quot;&gt;</p>
<div
class="confluen
<p>ce-information-mac ro-body&quot;&gt;</p>
<p>In eZ Enterprise, when using the <code>Map\Host</code> matcher, you need to provide the following line in your Twig template (e.g. in the head of the main template file):</p>
<p><code>{{ multidomain_a ccess() }}</code></p>
</div>
</div></td>
<td align="left"><p><strong>Map</strong>:</p>
<dl>
<dt>- www.foo.com &lt;h
ttp://www.foo.com&gt;
__</dt>
<dd><p>=&gt; foo_front</p>
</dd>
<dt>- admin.foo.com
&lt;http://admin.foo.
com&gt;__</dt>
<dd><p>=&gt; foo_admin </p>
</dd>
</dl>
<p><strong>Host name</strong>: www.example.com &lt;
http://www.example
.com&gt;__</p>
<p>Matched siteaccess: foo_front</p></td>
</tr>
<tr class="even">
<td align="left"><code>Map\URI</code></td>
<td align="left">Maps a URI to a siteaccess</td>
<td align="left"><p>A hash map of URI/siteaccess</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>Ma</p>
</dd>
</dl>
</dd>
</dl>
<p>pURI:</p>
<blockquote>
<p>something: ezdem</p>
</blockquote>
<p>o_site</p>
<blockquote>
<p>foobar: ezdemo_s</p>
</blockquote>
<p>ite_admin</p>
</div>
</div>
<div
class="confluen
<p>ce-information-mac ro confluence-info rmation-macro-warn ing&quot;&gt;</p>
<div
class="confluen
<p>ce-information-mac ro-body&quot;&gt;</p>
<p>The name of the <code>Map\URI</code> matcher must be the same as the siteaccess name. This also means that only one URI can be addressed by the same matcher.</p>
</div>
</div></td>
<td align="left"><p><strong>URI:</strong> <code>/something/my/co ntent</code></p>
<p>Map:</p>
<ul>
<li>something =&gt; ezdemo_site</li>
</ul>
<dl>
<dt>- foobar =&gt;</dt>
<dd><p>ezdemo_site_a</p>
</dd>
</dl>
<p>dmin</p>
<p>Matched siteaccess: ezdemo_site</p></td>
</tr>
<tr class="odd">
<td align="left"><code>Map\Port</code></td>
<td align="left">Maps a port to a siteaccess</td>
<td align="left"><p>A has map of Port/siteaccess</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>Ma</p>
</dd>
</dl>
</dd>
</dl>
<p>tchPort:</p>
<blockquote>
<p>80: foo</p>
<p>8080: bar</p>
</blockquote>
</div>
</div></td>
<td align="left"><p><strong>URL:</strong> <code>htt p://ezpublish.dev: 8080/my/content</code></p>
<p>Map:</p>
<ul>
<li>80: foo</li>
<li>8080: bar</li>
</ul>
<p>Matched siteaccess: bar</p></td>
</tr>
<tr class="even">
<td align="left"><code>Regex\Host</code></td>
<td align="left">Matches against a regexp and extracts a portion of it</td>
<td align="left"><p>The regexp to match against<br />
and the captured element to use</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>Re</p>
</dd>
</dl>
</dd>
</dl>
<p>gexHost:</p>
<blockquote>
<p>regex: &quot;^(\w+_s</p>
</blockquote>
<p>a)$&quot;</p>
<blockquote>
<p># Default is 1</p>
<p>itemNumber: 1</p>
</blockquote>
</div>
</div></td>
<td align="left"><p><strong>Host name:</strong> <code>example_sa</code></p>
<p>regex: <code>^(\\w+)_sa$</code><br />
itemNumber: 1</p>
<p>Matched siteaccess: example</p></td>
</tr>
<tr class="odd">
<td align="left"><code>Regex\URI</code></td>
<td align="left">Matches against a regexp and extracts a portion of it</td>
<td align="left"><p>The regexp to match against and the captured element to use</p>
<div
class="code pan
<dl>
<dt>el pdl&quot;</dt>
<dd><p>style=&quot;border-w</p>
</dd>
</dl>
<p>idth: 1px;&quot;&gt;</p>
<div
class="codeCont
<p>ent panelContent p dl&quot;&gt;</p>
<pre class="sourceCode brush:"><code>ezpublish:
    siteaccess</code></pre>
<dl>
<dt>:</dt>
<dd><dl>
<dt>match:</dt>
<dd><p>Re</p>
</dd>
</dl>
</dd>
</dl>
<p>gexURI:</p>
<blockquote>
<p>regex: &quot;^/foo(\</p>
</blockquote>
<p>w+)bar&quot;</p>
<blockquote>
<p># Default is 1</p>
<p>itemNumber: 1</p>
</blockquote>
</div>
</div></td>
<td align="left"><p><strong>URI:</strong> <code>/footestbar/some thing</code></p>
<p>regex: ^/foo(\\w+)bar<br />
itemNumber: 1</p>
<p>Matched siteaccess: test </p></td>
</tr>
</tbody>
</table>

+--------------------+--------------------+--------------------+--------------------+

</div>
**Compound siteaccess matcher**

The Compound siteaccess matcher allows you to combine several matchers together:

-   <http://example.com/en> matches site\_en (match on host=[example.com](http://example.com) *and* URIElement(1)=en)
-   <http://example.com/fr> matches site\_fr (match on host=[example.com](http://example.com) *and* URIElement(1)=fr)
-   <http://admin.example.com> matches site\_admin (match on host=[admin.example.com](http://admin.example.com))

Compound matchers cover the legacy  ***host\_uri*** matching feature.

They are based on logical combinations, or/and, using logical compound matchers:

-   `Compound\LogicalAnd`
-   `Compound\LogicalOr`

Each compound matcher will specify two or more sub-matchers. A rule will match if all the matchers, combined with the logical matcher, are positive. The example above would have used `Map\Host` and `Map\Uri`., combined with a `LogicalAnd`. When both the URI and host match, the siteaccess configured with "match" is used.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**ezplatform.yml**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    siteaccess:
        match:
            Compound\LogicalAnd:
                # Nested matchers, with their configuration.
                # No need to precise their matching values (true will suffice).
                site_en:
                    matchers:
                        Map\URI:
                            en: true
                        Map\Host:
                            example.com: true
                    match: site_en
                site_fr:
                    matchers:
                        Map\URI:
                            fr: true
                        Map\Host:
                            example.com: true
                    match: site_fr
            Map\Host:
                admin.example.com: site_admin
```

</div>
</div>
**Matching by request header**

It is possible to define which siteaccess to use by setting an **X-Siteaccess** header in your request. This can be useful for REST requests.

In such case, **X-Siteaccess** must be the **siteaccess name** (e.g. *ezdemo\_site*).

**Matching by environment variable**

It is also possible to define which siteaccess to use directly via an **EZPUBLISH\_SITEACCESS** environment variable.

This is recommended if you want to get **performance gain** since no matching logic is done in this case.

You can define this environment variable directly from your web server configuration:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Apache VirtualHost example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
# This configuration assumes that mod_env is activated
<VirtualHost *:80>
    DocumentRoot "/path/to/ezpublish5/web/folder"
    ServerName example.com
    ServerAlias www.example.com
    SetEnv EZPUBLISH_SITEACCESS ezdemo_site
</VirtualHost>
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
This can also be done via PHP-FPM configuration file, if you use it. See  [PHP-FPM documentation](http://php.net/manual/en/install.fpm.configuration.php#example-60)  for more information.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
Note about precedence

<div class="confluence-information-macro-body">
 The precedence order for siteaccess matching is the following (the first matched wins):

1.  Request header
2.  Environment variable
3.  Configured matchers

</div>
</div>
**URILexer and semanticPathinfo**

In some cases, after matching a siteaccess, it is neecessary to modify the original request URI. This is for example needed with URI-based matchers since the siteaccess is contained in the original URI and it is not part of the route itself.

The problem is addressed by *analyzing* this URI and by modifying it when needed through the **URILexer** interface.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**URILexer interface**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
/**
 * Interface for SiteAccess matchers that need to alter the URI after matching.
 * This is useful when you have the siteaccess in the URI like "/<siteaccessName>/my/awesome/uri"
 */
interface URILexer
{
    /**
     * Analyses $uri and removes the siteaccess part, if needed.
     *
     * @param string $uri The original URI
     * @return string The modified URI
     */
    public function analyseURI( $uri );
    /**
     * Analyses $linkUri when generating a link to a route, in order to have the siteaccess part back in the URI.
     *
     * @param string $linkUri
     * @return string The modified link URI
     */
    public function analyseLink( $linkUri );
}
```

</div>
</div>
Once modified, the URI is stored in the ***semanticPathinfo*** request attribute, and the original pathinfo is not modified.

**Usage**

**Cross-siteacess links**

When using the *multisite* feature, it is sometimes useful to be able to **generate cross-links** between the different sites.
This allows you to link different resources referenced in the same content repository, but configured independently with different tree roots.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Twig example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
 {# Linking a location #} 
<a href="{{ url( 'ez_urlalias', {'locationId': 42, 'siteaccess': 'some_siteaccess_name'} ) }}">{{ ez_content_name( content ) }}</a>

{# Linking a regular route #} 
<a href="{{ url( "some_route_name", {"siteaccess": "some_siteaccess_name"} ) }}">Hello world!</a>
```

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
See [ez\_urlalias](ez_urlalias_32114047.html) documentation page, for more information about linking to a Location

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**PHP example**

</div>
<div class="codeContent panelContent pdl">
``` sourceCode
namespace Acme\TestBundle\Controller;

use eZ\Bundle\EzPublishCoreBundle\Controller as BaseController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MyController extends BaseController
{
    public function fooAction()
    {
        // ...

        $location = $this->getRepository()->getLocationService()->loadLocation( 123 );
        $locationUrl = $this->generateUrl(
            $location,
            array( 'siteaccess' => 'some_siteaccess_name' ),
            UrlGeneratorInterface::ABSOLUTE_PATH
        );

        $regularRouteUrl = $this->generateUrl(
            'some_route_name',
            array( 'siteaccess' => 'some_siteaccess_name' ),
            UrlGeneratorInterface::ABSOLUTE_PATH
        );

        // ...
    }
}
```

</div>
</div>
<div class="highlight highlight-php">
     

</div>
<div
class="confluence-information-macro confluence-information-macro-note">
Important

<div class="confluence-information-macro-body">
As siteaccess matchers can involve hosts and ports, it is **highly recommended** to generate cross-siteaccess links in an absolute form (e.g. using `url()` Twig helper).

</div>
</div>
**Troubleshooting**

-   The **first matcher succeeding always wins**, so be careful when using *catch-all* matchers like `URIElement`.
-   If passed siteaccess name is not a valid one, an `InvalidArgumentException` will be thrown.
-   If matcher used to match the provided siteaccess doesn't implement `VersatileMatcher`, the link will be generated for the current siteaccess.
-   When using `Compound\LogicalAnd`, all inner matchers **must match**. If at least one matcher doesn't implement `VersatileMatcher`, it will fail.
-   When using `Compound\LogicalOr`, the first inner matcher succeeding will win.

**Under the hood**

To implement this feature, a new `VersatileMatcher` was added to allow siteaccess matchers to be able to *reverse-match*.
All existing matchers implement this new interface, except the Regexp based matchers which have been deprecated.

The siteaccess router has been added a `matchByName()` method to reflect this addition. Abstract URLGenerator and `DefaultRouter` have been updated as well.

<div
class="confluence-information-macro confluence-information-macro-note">
Note

<div class="confluence-information-macro-body">
Siteaccess router public methods have also been extracted to a new interface, `SiteAccessRouterInterface`.

</div>
</div>
<div
class="confluence-information-macro confluence-information-macro-warning">
Landing Page - Known limitation

<div class="confluence-information-macro-body">
In eZ Studio's Landing Page you can encounter a 404 error when clicking a relative link which points to a different siteaccess (if the Content item being previewed does not exist in the previously used siteaccess). This is because detecting siteaccesses when navigating in preview is not functional yet. This is a known limitation that is awaiting resolution.

</div>
</div>
**Dynamic Settings Injection**

Before 5.4, if you wanted to implement a service needing siteaccess-aware settings (e.g. language settings), you needed to inject the whole `ConfigResolver` (`ezpublish.config.resolver`) and get the needed settings from it. This was neither very convenient nor explicit.

The goal of this feature is to allow developers to inject these dynamic settings explicitly from their service definition (yml, xml, annotation, etc.).

**Syntax**

Static container parameters follow the `%<parameter_name>%` syntax in Symfony.

Dynamic parameters have the following: `$<parameter_name>[; <namespace>[; <scope>]]$`, default namespace being `ezsettings`, and default scope being the current siteaccess.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
For more information, see [ConfigResolver documentation](https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-Configuration).

</div>
</div>
**DynamicSettingParser**

This feature also introduces a *DynamicSettingParser* service that can be used for adding support of the dynamic settings syntax.
This service has `ezpublish.config.dynamic_setting.parser` for ID and implements`eZ\Bundle\EzPublishCoreBundle\DependencyInjection\Configuration\SiteAccessAware\DynamicSettingParserInterface`.

**Limitations**

A few limitations still remain:

-   It is not possible to use dynamic settings in your semantic configuration (e.g. `config.yml` or `ezplatform.yml`) as they are meant primarily for parameter injection in services.
-   It is not possible to define an array of options having dynamic settings. They will not be parsed. Workaround is to use separate arguments/setters.
-   Injecting dynamic settings in request listeners is **not recommended**, as it won't be resolved with the correct scope (request listeners are **instantiated before SiteAccess match**). Workaround is to inject the ConfigResolver instead, and resolving the setting in your `onKernelRequest` method (or equivalent).

**Examples**

**Injecting an eZ parameter**

Defining a simple service needing `languages` parameter (i.e. prioritized languages).

<div
class="confluence-information-macro confluence-information-macro-note">
Note

<div class="confluence-information-macro-body">
Internally, `languages` parameter is defined as `ezsettings.<siteaccess_name>.languages`, `ezsettings` being eZ internal *namespace*.

</div>
</div>
****Before 5.4****

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
parameters:
    acme_test.my_service.class: Acme\TestBundle\MyServiceClass

services:
    acme_test.my_service:
        class: %acme_test.my_service.class%
        arguments: [@ezpublish.config.resolver]

namespace Acme\TestBundle;
```

</div>
</div>
*\**\*

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
use eZ\Publish\Core\MVC\ConfigResolverInterface;

class MyServiceClass
{
    /**
 * Prioritized languages
 *
 * @var array
 */
    private $languages;

    public function __construct( ConfigResolverInterface $configResolver )
    {
        $this->languages = $configResolver->getParameter( 'languages' );
    }
}
```

</div>
</div>
**After, with setter injection (preferred)**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
parameters:
    acme_test.my_service.class: Acme\TestBundle\MyServiceClass

services:
    acme_test.my_service:
        class: %acme_test.my_service.class%
        calls:
            - [setLanguages, ["$languages$"]]
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
namespace Acme\TestBundle;

class MyServiceClass
{
    /**
 * Prioritized languages
 *
 * @var array
 */
    private $languages;

    public function setLanguages( array $languages = null )
    {
        $this->languages = $languages;
    }
}
```

</div>
</div>
 

<div class="highlight highlight-php">
 

<div
class="confluence-information-macro confluence-information-macro-warning">
<div class="confluence-information-macro-body">
**Important**: Ensure you always add `null` as a default value, especially if the argument is type-hinted.

</div>
</div>
**After, with constructor injection**

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
parameters:
    acme_test.my_service.class: Acme\TestBundle\MyServiceClass

services:
    acme_test.my_service:
        class: %acme_test.my_service.class%
        arguments: ["$languages$"]
```

</div>
</div>
<div class="highlight highlight-yaml">
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
namespace Acme\TestBundle;

class MyServiceClass
{
    /**
 * Prioritized languages
 *
 * @var array
 */
    private $languages;

    public function __construct( array $languages )
    {
        $this->languages = $languages;
    }
}
```

</div>
</div>
 

</div>
<div class="highlight highlight-php">
 

<div
class="confluence-information-macro confluence-information-macro-tip">
Tip

<div class="confluence-information-macro-body">
Setter injection for dynamic settings should always be preferred, as it makes it possible to update your services that depend on them when ConfigResolver is updating its scope (e.g. when previewing content in a given SiteAccess). **However, only one dynamic setting should be injected by setter** .

**Constructor injection will make your service be reset in that case.**

</div>
</div>
**Injecting 3rd party parameters**

</div>
<div class="highlight highlight-yaml">
 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
parameters:
    acme_test.my_service.class: Acme\TestBundle\MyServiceClass
    # "acme" is our parameter namespace.
    # Null is the default value.
    acme.default.some_parameter: ~
    acme.ezdemo_site.some_parameter: foo
    acme.ezdemo_site_admin.some_parameter: bar
 
services:
    acme_test.my_service:
        class: %acme_test.my_service.class%
        # The following argument will automatically resolve to the right value, depending on the current SiteAccess.
        # We specify "acme" as the namespace we want to use for parameter resolving.
        calls:
            - [setSomeParameter, ["$some_parameter;acme$"]]
```

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
namespace Acme\TestBundle;
class MyServiceClass
{
    private $myParameter;
    public function setSomeParameter( $myParameter = null )
    {
        // Will be "foo" for ezdemo_site, "bar" for ezdemo_site_admin, or null if another SiteAccess.
        $this->myParameter = $myParameter;
    }
}
```

</div>
</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376001376">
-   [Introduction](#SiteAccess-Introduction)
    -   [What does a siteaccess do?](#SiteAccess-Whatdoesasiteaccessdo?)
    -   [How is a siteaccess selected?](#SiteAccess-Howisasiteaccessselected?)
    -   [What can you use siteaccesses for?](#SiteAccess-Whatcanyouusesiteaccessesfor?)
    -   [Use case: multilanguage sites](#SiteAccess-Usecase:multilanguagesites)
    -   [The default scope](#SiteAccess-Thedefaultscope)
-   [Configuration](#SiteAccess-Configuration)
    -   [Basics](#SiteAccess-Basics)
        -   [Example](#SiteAccess-Example)
    -   [Dynamic configuration with the ConfigResolver](#SiteAccess-DynamicconfigurationwiththeConfigResolver)
        -   [Scope](#SiteAccess-Scope)
        -   [ConfigResolver Usage](#SiteAccess-ConfigResolverUsage)
        -   [Inject the ConfigResolver in your services](#SiteAccess-InjecttheConfigResolverinyourservices)
    -   [Custom locale configuration](#SiteAccess-Customlocaleconfiguration)
    -   [Siteaccess Matching](#SiteAccess-SiteaccessMatching)
        -   [Available matchers](#SiteAccess-Availablematchers)
        -   [Compound siteaccess matcher](#SiteAccess-Compoundsiteaccessmatcher)
        -   [Matching by request header](#SiteAccess-Matchingbyrequestheader)
        -   [Matching by environment variable](#SiteAccess-Matchingbyenvironmentvariable)
        -   [URILexer and semanticPathinfo](#SiteAccess-URILexerandsemanticPathinfo)
-   [Usage](#SiteAccess-Usage)
    -   [Cross-siteacess links](#SiteAccess-Cross-siteacesslinks)
        -   [Troubleshooting](#SiteAccess-Troubleshooting)
        -   [Under the hood](#SiteAccess-Underthehood)
    -   [Dynamic Settings Injection](#SiteAccess-DynamicSettingsInjection)
        -   [Syntax](#SiteAccess-Syntax)
        -   [DynamicSettingParser](#SiteAccess-DynamicSettingParser)
        -   [Limitations](#SiteAccess-Limitations)
        -   [Examples](#SiteAccess-Examples)

</div>
**Related topics:**

[Cross-siteaccess links](https://doc.ez.no/display/DEVELOPER/SiteAccess#SiteAccess-Cross-siteacesslinks)

[Setting the Index Page](Multisite_31430389.html#Multisite-SettingTheIndexPage)

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

