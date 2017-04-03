<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)
4.  [Step 1: Installation](31429538.html)
5.  [Starting eZ Platform](Starting-eZ-Platform_31429550.html)

</div>
**Developer : Web Server**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by Rui Silva on Jun 23, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Configuration files**

You can find configuration files in the `doc/` directory of the
software, for the following web server engines:

-   [Apache](https://github.com/ezsystems/ezplatform/tree/master/doc/apache2)
-   [Nginx](https://github.com/ezsystems/ezplatform/tree/master/doc/nginx)

and also configuration files for

-   [Varnish](https://github.com/ezsystems/ezplatform/blob/master/doc/varnish/varnish.md)

**Generate vhost config script**

In addition to that, you have a Bash script for generating a virtual
host configuration based on template, containing variables among the
once define below.\
For help text, execute: `./bin/vhost.sh -h`

**Help**

 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
./bin/vhost.sh [-h|--help]
```

</div>
</div>
 

**Usage**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$> ./bin/vhost.sh --basedir=/var/www/ezplatform \\

  --template-file=doc/apache2/vhost.template \\

  | sudo tee /etc/apache2/sites-enabled/my-site > /dev/null
```

</div>
</div>
Default values will be fetched from the environment variables
`$env_list`, but might be overridden using the arguments listed below.

**Arguments**

<div class="table-wrap">
  -------------------------------------------------------------------------
  Option                               Description
  ------------------------------------ ------------------------------------
  –basedir=&lt;path&gt;                Root path to where the eZ
                                       installation is placed, used for
                                       &lt;path&gt;/web

  –template-file=&lt;file.template&gt; The file to use as template for the
                                       generated output file

  –host-name=localhost                 Primary host name, default
                                       “localhost”

  –host-alias=\*.localhost             Space separated list of host
                                       aliases, default “\*.localhost”

  –ip=\*|127.0.0.1                     IP address web server should accept
                                       traffic on.

  –port=80\]                           Port number web server should listen
                                       to

  –sf-env=prod|dev|..                  Symfony environment used for the
                                       virtual host, default is “prod”

  –sf-debug=0|1                        Set if Symfony debug should be on,
                                       by default on if env is “dev”

  –sf-trusted-proxies=127.0.0.1,….     Comma separated trusted proxies
                                       (e.g. Varnish), that we can get
                                       client IP from

  –sf-http-cache=0|1                   To disable Symfony HTTP cache Proxy
                                       for using a different reverse proxy
                                       By default disabled when env is
                                       “dev”, enabled otherwise.

  –sf-http-cache-class=&lt;class-file. To specify a different class than
  php                                  the default one, to use as the
  &gt;                                 Symfony proxy

  –sf-classloader-file=&lt;class-file. To specify a different class than
  php                                  the default one, to use for PHP auto
  &gt;                                 loading

  –body-size-limit=&lt;int&gt;         Limit in megabytes for max size of
                                       request body, 0 value disables limit

  –request-timeout=&lt;int&gt;         Limit in seconds before timeout of
                                       request, 0 value disables timeout
                                       limit
  -------------------------------------------------------------------------

</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<div class="toc-macro rbtoc1490375980091">
-   [Configuration files](#WebServer-Configurationfiles)
-   [Generate vhost config script](#WebServer-Generatevhostconfigscript)
    -   [Help](#WebServer-Help)
    -   [Usage](#WebServer-Usage)
    -   [Arguments](#WebServer-Arguments)

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
Document generated by Confluence on Mar 24, 2017 17:19

<div id="footer-logo">
[Atlassian](http://www.atlassian.com/)

</div>
</div>
</div>
</div>

