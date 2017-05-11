1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : Sessions </span> {#title-heading .pagetitle}
===================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by
<span class="editor"> André Rømcke</span> on Nov 11, 2016

Introduction {#Sessions-Introduction}
============

Sessions are handled by the Symfony2 framework, specifically API and
underlying session handlers provided by HTTP Foundation component. This
is further enhanced in eZ Platform with support for siteaccess-aware
<span class="confluence-link">session cookie configuration</span>.

*Use of Memcached (or experimentally using PDO) as session handler is a
requirement in Cluster setup, for details see below. For an overview of
clustering feature see [Clustering](Clustering_31430387.html). *

*  
*

Configuration {#Sessions-Configuration}
=============

Symfony offers the possibility to change many session options at
application level (i.e. in
Symfony [`framework `configuration](http://symfony.com/doc/master/reference/configuration/framework.html){.external-link}),
such as:

-   `cookie_domain`
-   `cookie_path`
-   `cookie_lifetime`
-   `cookie_secure`
-   `cookie_httponly`

However as eZ Platform can be used for setting up several web sites
within on Symfony application, session configuration is also possible to
define per siteaccess and SiteGroup level.

<span style="color: rgb(0,98,147);">Session options per siteaccess</span> {#Sessions-Sessionoptionspersiteaccess}
-------------------------------------------------------------------------

All site-related session configuration can be defined per siteaccess and
SiteGroup:

**ezplatform.yml**

~~~~ brush:
ezpublish:
    system:
        my_siteaccess:
            session:
                # By default Session name is eZSESSID{siteaccess_hash}
                # with setting below you'll get eZSESSID{name},
                # allowing you to share sessions across SiteAccess
                name: my_session_name
                # These are optional. 
                # If not defined they will fallback to Symfony framework configuration, 
                # which itself fallback to default php.ini settings
                cookie_domain: mydomain.com
                cookie_path: /foo
                cookie_lifetime: 86400
                cookie_secure: false
                cookie_httponly: true
~~~~

Session name per siteaccess {#Sessions-Sessionnamepersiteaccess}
---------------------------

In 5.x versions prior to 5.3 / 2014.03 the following siteaccess aware
session setting where available:

**ezplatform.yml**

~~~~ brush:
ezpublish:
    system:
        my_siteaccess:
            # By default Session name is eZSESSID{siteaccess_hash}
            # with setting below you'll get eZSESSID{name},
            # allowing you to share sessions across SiteAccess
            # This setting is deprecated as of 5.3
            session_name: my_session_name
~~~~

 

*  
*

Usage*  
* {#Sessions-Usage}
========

Session handlers {#Sessions-Sessionhandlers}
----------------

In Symfony, a session handler is configured using
`framework.session.handler_id.` Symfony can be configured to
use <span>custom handlers</span>, or just fallback to what is configured
in PHP by setting it to null (`~`).

### Default configuration {#Sessions-Defaultconfiguration}

eZ Platform uses the same default configuration as recent versions of
Symfony standard distribution. This makes sure you can configure
sessions purely in PHP by default, and allows Debian/Ubuntu session file
cleanup cronjob to work as intended.

**Default config.yml session configuration**

~~~~ brush:
framework:
    session:
        # handler_id set to null will use default session handler from php.ini
        handler_id:  ~
~~~~

### Recommendations for production setup {#Sessions-Recommendationsforproductionsetup}

#### Single server setup {#Sessions-Singleserversetup}

For single server, default handler should be preferred.

#### Cluster setup {#Sessions-Clustersetup}

For [Cluster](Clustering_31430387.html) setup we need to configure
Sessions to use a backend that is shared between web servers and
supports locking. Only options out of the box supporting this in Symfony
are the native PHP memcached session save handler provided by the
php-memcached extension, and Symfony session handler for PDO (database).

##### Storing sessions in Memcached using php-memcached {#Sessions-StoringsessionsinMemcachedusingphp-memcached}

For setting up eZ Platform using memcached you’ll need to configure the
session save handler settings in php.ini as documented
[here](http://php.net/manual/en/memcached.sessions.php){.external-link},
optionally tweak [php-memcached session
settings](http://fr2.php.net/manual/en/memcached.configuration.php){.external-link}.

##### Storing sessions in Redis using pecl package redis {#Sessions-StoringsessionsinRedisusingpeclpackageredis}

<span
class="status-macro aui-lozenge aui-lozenge-error aui-lozenge-subtle">EXPERIMENTAL</span>

For setting up eZ Platform using [Redis pecl
package](https://pecl.php.net/package/redis){.external-link} you’ll need
to configure the session save handler settings in php.ini as
documented [here](https://github.com/phpredis/phpredis#php-session-handler){.external-link}.

##### Alternative storing sessions in database using PDO {#Sessions-AlternativestoringsessionsindatabaseusingPDO}

While not currently our recommendation from performance perspective, for
setups where Database is preferred for storing Sessions, you may use
Symfony’s PdoSessionHandler.  
Below is an configuration example for eZ Platform, but please refer
to [documented in Symfony Cookbook
documentation](http://symfony.com/doc/current/cookbook/configuration/pdo_session_storage.html){.external-link}
for full documentation.

~~~~ brush:
framework:
    session:
        # ...
        handler_id: session.handler.pdo

parameters:
    pdo.db_options:
        db_table:    session
        db_id_col:   session_id
        db_data_col: session_value
        db_time_col: session_time

services:
    pdo:
        class: PDO
        arguments:
            dsn:      "mysql:dbname=<mysql_database>"
            user:     <mysql_user>
            password: <mysql_password>

    session.handler.pdo:
        class:     Symfony\Component\HttpFoundation\Session\Storage\Handler\PdoSessionHandler
        arguments: ["@pdo", "%pdo.db_options%"]
~~~~

 

 

#### In this topic: {#Sessions-Inthistopic:}

-   [Introduction](#Sessions-Introduction)
-   [Configuration](#Sessions-Configuration)
    -   [Session options per
        siteaccess](#Sessions-Sessionoptionspersiteaccess)
    -   [Session name per
        siteaccess](#Sessions-Sessionnamepersiteaccess)
-   [Usage](#Sessions-Usage)
    -   [Session handlers](#Sessions-Sessionhandlers)
        -   [Default configuration](#Sessions-Defaultconfiguration)
        -   [Recommendations for production
            setup](#Sessions-Recommendationsforproductionsetup)

#### Related: {#Sessions-Related:}

-   [Overview of steps to set up
    Cluster](Steps-to-set-up-Cluster_31432321.html)[:](#Sessions-Persistencecacheconfiguration)
    -   [Set up DFS IO Handler](Clustering_31430387.html)
    -   [Configure Persistence
        Cache](Repository_31432023.html#Repository-Persistencecacheconfiguration)
    -   [Set up
        Varnish](HTTP-Cache_31430152.html#HTTPCache-UsingVarnish)

#### Further resources: {#Sessions-Furtherresources:}

-   [Cookbook Session
    recipes (symfony.com)](http://symfony.com/doc/current/cookbook/session/index.html){.external-link}
-   [HTTP Foundation Component
    documentation (symfony.com)](http://symfony.com/doc/current/components/http_foundation/index.html){.external-link}
-   Source code of
    [NativeFileSessionHandler (github.com)](https://github.com/symfony/symfony/blob/master/src/Symfony/Component/HttpFoundation/Session/Storage/Handler/NativeFileSessionHandler.php){.external-link}
-   [Cookbook Configuration recipe for setting-up
    PdoSessionHandler (symfony.com)](http://symfony.com/doc/current/cookbook/configuration/pdo_session_storage.html){.external-link},
    aka `session.handler.pdo` service

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


