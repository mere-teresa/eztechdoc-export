<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Get Started with eZ Platform](Get-Started-with-eZ-Platform_31429520.html)
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

You can find configuration files in the `doc/` directory of the software, for the following web server engines:

-   [Apache](https://github.com/ezsystems/ezplatform/tree/master/doc/apache2)
-   [Nginx](https://github.com/ezsystems/ezplatform/tree/master/doc/nginx)

and also configuration files for

-   [Varnish](https://github.com/ezsystems/ezplatform/blob/master/doc/varnish/varnish.md)

**Generate vhost config script**

In addition to that, you have a Bash script for generating a virtual host configuration based on template, containing variables among the once define below.
For help text, execute: `./bin/vhost.sh -h`

**Help**

 

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
./bin/vhost.sh [-h|--help]
```

</div>
</div>
 

**Usage**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
$> ./bin/vhost.sh --basedir=/var/www/ezplatform \\

  --template-file=doc/apache2/vhost.template \\

  | sudo tee /etc/apache2/sites-enabled/my-site > /dev/null
```

</div>
</div>
Default values will be fetched from the environment variables `$env_list`, but might be overridden using the arguments listed below.

**Arguments**

<div class="table-wrap">
<table>
<colgroup>
<col width="50%" />
<col width="50%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Option</th>
<th align="left">Description</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">--basedir=&lt;path&gt;</td>
<td align="left">Root path to where the eZ installation is placed, used for &lt;path&gt;/web</td>
</tr>
<tr class="even">
<td align="left">--template-file=&lt;file.template&gt;</td>
<td align="left">The file to use as template for the generated output file</td>
</tr>
<tr class="odd">
<td align="left">--host-name=localhost</td>
<td align="left">Primary host name, default &quot;localhost&quot;</td>
</tr>
<tr class="even">
<td align="left">--host-alias=*.localhost</td>
<td align="left">Space separated list of host aliases, default &quot;*.localhost&quot;</td>
</tr>
<tr class="odd">
<td align="left">--ip=*|127.0.0.1</td>
<td align="left">IP address web server should accept traffic on.</td>
</tr>
<tr class="even">
<td align="left">--port=80]</td>
<td align="left">Port number web server should listen to</td>
</tr>
<tr class="odd">
<td align="left">--sf-env=prod|dev|..</td>
<td align="left">Symfony environment used for the virtual host, default is &quot;prod&quot;</td>
</tr>
<tr class="even">
<td align="left">--sf-debug=0|1</td>
<td align="left">Set if Symfony debug should be on, by default on if env is &quot;dev&quot;</td>
</tr>
<tr class="odd">
<td align="left">--sf-trusted-proxies=127.0.0.1,....</td>
<td align="left">Comma separated trusted proxies (e.g. Varnish), that we can get client IP from</td>
</tr>
<tr class="even">
<td align="left">--sf-http-cache=0|1</td>
<td align="left">To disable Symfony HTTP cache Proxy for using a different reverse proxy By default disabled when env is &quot;dev&quot;, enabled otherwise.</td>
</tr>
<tr class="odd">
<td align="left">--sf-http-cache-class=&lt;class-file.ph p&gt;</td>
<td align="left">To specify a different class than the default one, to use as the Symfony proxy</td>
</tr>
<tr class="even">
<td align="left">--sf-classloader-file=&lt;class-file.ph p&gt;</td>
<td align="left">To specify a different class than the default one, to use for PHP auto loading</td>
</tr>
<tr class="odd">
<td align="left">--body-size-limit=&lt;int&gt;</td>
<td align="left">Limit in megabytes for max size of request body, 0 value disables limit</td>
</tr>
<tr class="even">
<td align="left">--request-timeout=&lt;int&gt;</td>
<td align="left">Limit in seconds before timeout of request, 0 value disables timeout limit</td>
</tr>
</tbody>
</table>

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

