<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)

</div>
**Developer : Clustering**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Feb 25, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Introduction**

Clustering in eZ Platform refers to setting up your install with several web servers for handling more load and/or for failover.

**Server setup overview**

This diagram illustrates how clustering of eZ Platform is typically set up, the parts illustrate the different roles needed for a successful cluster setup. The number of web servers, Memcached servers, Solr servers, Varnish servers, Database servers, NFS servers, as well as whether some servers play several of these roles *(typically running Memcached across the web server)* is up to you and your performance needs.

The minimal requirements are the following *(with what is currently supported in italics)*:

-   Shared HTTP cache *(using Varnish)*
-   Shared Persistence cache and Sessions *(using Memcached, or experimentally also Redis)*
-   Shared Database *(using MySQL/MariaDB)*
-   Shared Filesystem *(using NFS, or experimentally also S3)*

For further details on requirements, see [Requirements page](31429536.html) .

While this is not a complete list, further recommendations include:

-   Using [Solr](Solr-Bundle_31430592.html) for better search and better search performance
-   Using a CDN for improved performance and faster ping time worldwide
-   Using Active/Passive Database for failover
-   In general: Make sure to use later versions of PHP and MySQL/MariaDB within [what is supported](31429536.html)   for your eZ Platform version to get more performance out of each server.

<img src="attachments/31430387/31430385.png" alt="image0" class="confluence-embedded-image" width="500" />

**Binary files clustering**

eZ Platform supports multi-server by means of custom IO handlers. They will make sure that files are correctly synchronized among the multiple clients that might use the data.

**Configuration**

<div
class="confluence-information-macro confluence-information-macro-note">
<div class="confluence-information-macro-body">
Memcached must not be bound to the local address if clusters are in use, or user logins will fail. To avoid this, in `/etc/memcached.conf` take a look under `# Specify which IP address to listen on. The default is to listen on all IP addresses`

For development environments, change the address below to `-l 0.0.0.0`

For production environments, follow this more secure instruction from the memcached man:

> -l &lt;addr&gt;
> Listen on &lt;addr&gt;; default to INADDR\_ANY. &lt;addr&gt; may be specified as host:port. If you don't specify a port number, the value you specified with -p or -U is used. You may specify multiple addresses separated by comma or by using -l multiple times. This is an important option to consider as there is no other way to secure the installation. Binding to an internal or firewalled network interface is suggested.

</div>
</div>
**DFS IO Handler**

**What it is meant for**

The DFS IO handler (`legacy_dfs_cluster)` can be used to store binary files on an NFS server. It will use a database to manipulate metadata, making up for the potential inconsistency of network based filesystems.

**[](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/io/legacy_dfs_cluster.md#configuration)Configuration**

You need to configure both metadata and binarydata handlers.

As the binarydata handler, create a new Flysystem local adapter configured to read/write to the NFS mount point on each local server. As metadata handler handler, create a dfs one, configured with a doctrine connection. 

<div
class="confluence-information-macro confluence-information-macro-tip">
<div class="confluence-information-macro-body">
V1.8.0

Note: the default database install will now include the dfs table *in the same database*

</div>
</div>
For production, we strongly recommend creating the DFS table in its own database, using the `vendor/ezsystems/ezpublish-kernel/data/mysql/dfs_schema.sql` file.
In our example, we will use one named `dfs`. 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
# new doctrine connection for the dfs legacy_dfs_cluster metadata handler.
doctrine:
    dbal:
        connections:
            dfs:
                driver: pdo_mysql
                host: 127.0.0.1
                port: 3306
                dbname: ezdfs
                user: root
                password: "rootpassword"
                charset: UTF8

# define the flysystem handler
oneup_flysystem:
    adapters:
        nfs_adapter:
            local:
                directory: "/<path to nfs>/$var_dir$/$storage_dir$"

# define the ez handlers
ez_io:
    binarydata_handlers:
        nfs:
            flysystem:
                adapter: nfs_adapter
    metadata_handlers:
        dfs:
            legacy_dfs_cluster:
                connection: doctrine.dbal.dfs_connection

# set the application handlers
ezpublish:
    system:
        default:
            io:
                metadata_handler: dfs
                binarydata_handler: nfs
```

</div>
</div>
**Customizing the storage directory**

eZ Publish 5.x required the NFS adapter directory to be set to `$var_dir$/$storage_dir$` part for the NFS path. This is no longer required with eZ Platform, but the default prefix used to serve binary files will still match this expectation.

If you decide to change this setting, make sure you also set `io.url_prefix` to a matching value. If you set the NFS adapter's directory to "/path/to/nfs/storage", use this configuration so that the files can be served by Symfony:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    system:
        default:
            io:
                url_prefix: "storage"
```

</div>
</div>
<div class="highlight highlight-yaml">
</div>
<div class="highlight highlight-yaml">
As an alternative, you may serve images from NFS using a dedicated web server. If in the example above, this server listens on [<http://static.example.com>](http://static.example.com/) and uses `/path/to/nfs/storage` as the document root, configure `io.url_prefix` as follows:

</div>
<div class="highlight highlight-yaml">
 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    system:
        default:
            io:
                url_prefix: "http://static.example.com/"
```

</div>
</div>
You can read more about that on [Binary files URL handling](Repository_31432023.html#Repository-BinaryfilesURLhandling).

</div>
**Web server rewrite rules**

The default eZ Platform rewrite rules will let image requests be served directly from disk. With native support, files matching `^/var/([^/]+/)?storage/images(-versioned)?/.*` have to be passed through `/web/app.php`.

In any case, this specific rewrite rule must be placed without the ones that "ignore" image files and just let the web server serve the files.

**[](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/io/legacy_dfs_cluster.md#apache)Apache**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
RewriteRule ^/var/([^/]+/)?storage/images(-versioned)?/.* /app.php [L]
```

</div>
</div>
**[](https://github.com/ezsystems/ezpublish-kernel/blob/master/doc/specifications/io/legacy_dfs_cluster.md#nginx)nginx**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
rewrite "^/var/([^/]+/)?storage/images(-versioned)?/(.*)" "/app.php" break;
```

</div>
</div>
 

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375996023">
-   [Introduction](#Clustering-Introduction)
    -   [Server setup overview](#Clustering-Serversetupoverview)
    -   [Binary files clustering](#Clustering-Binaryfilesclustering)
-   [Configuration](#Clustering-Configuration)
    -   [DFS IO Handler](#Clustering-DFSIOHandler)
        -   [What it is meant for](#Clustering-Whatitismeantfor)
        -   [Configuration](#Clustering-Configuration.1)
        -   [Web server rewrite rules](#Clustering-Webserverrewriterules)

</div>
**Related:**

-   [Overview of steps to set up Cluster](Steps-to-set-up-Cluster_31432321.html)[:](#Clustering-Persistencecacheconfiguration)
    -   [Configure Persistence Cache](Repository_31432023.html#Repository-Persistencecacheconfiguration)
    -   [Set up Varnish](HTTP-Cache_31430152.html#HTTPCache-UsingVarnish)
    -   [Configure sessions](Sessions_31429667.html)
-   [Performance](Performance_33555232.html)

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
<img src="images/icons/bullet_blue.gif" alt="image1" width="8" height="8" /> [Server setup.png](attachments/31430387/31430385.png) (image/png) <img src="images/icons/bullet_blue.gif" alt="image2" width="8" height="8" /> [Server setup 5.x doc.png](attachments/31430387/31430386.png) (image/png)

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

