# Web Server

# Configuration files

You can find configuration files in the `doc/` directory of the software, for the following web server engines:

-   [Apache](https://github.com/ezsystems/ezplatform/tree/master/doc/apache2)
-   [Nginx](https://github.com/ezsystems/ezplatform/tree/master/doc/nginx)

and also configuration files for

-   [Varnish](https://github.com/ezsystems/ezplatform/blob/master/doc/varnish/varnish.md)

# Generate vhost config script

In addition to that, you have a Bash script for generating a virtual host configuration based on template, containing variables among the once define below.
For help text, execute: `./bin/vhost.sh -h`

## Help

 

```
./bin/vhost.sh [-h|--help]
```

 

## Usage

```
$> ./bin/vhost.sh --basedir=/var/www/ezplatform \\

  --template-file=doc/apache2/vhost.template \\

  | sudo tee /etc/apache2/sites-enabled/my-site > /dev/null
```

Default values will be fetched from the environment variables `$env_list`, but might be overridden using the arguments listed below.

## Arguments

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
<td align="left"><p>--basedir=&lt;path&gt;</p></td>
<td align="left">Root path to where the eZ installation is placed, used for &lt;path&gt;/web</td>
</tr>
<tr class="even">
<td align="left"><p>--template-file=&lt;file.template&gt;</p></td>
<td align="left"><p>The file to use as template for the generated output file</p></td>
</tr>
<tr class="odd">
<td align="left">--host-name=localhost</td>
<td align="left">Primary host name, default &quot;localhost&quot;</td>
</tr>
<tr class="even">
<td align="left"><p>--host-alias=*.localhost</p></td>
<td align="left">Space separated list of host aliases, default &quot;*.localhost&quot;</td>
</tr>
<tr class="odd">
<td align="left"><p>--ip=*|127.0.0.1</p></td>
<td align="left">IP address web server should accept traffic on.</td>
</tr>
<tr class="even">
<td align="left"><p>--port=80]</p></td>
<td align="left">Port number web server should listen to</td>
</tr>
<tr class="odd">
<td align="left"><p>--sf-env=prod|dev|..</p></td>
<td align="left">Symfony environment used for the virtual host, default is &quot;prod&quot;</td>
</tr>
<tr class="even">
<td align="left"><p>--sf-debug=0|1</p></td>
<td align="left">Set if Symfony debug should be on, by default on if env is &quot;dev&quot;</td>
</tr>
<tr class="odd">
<td align="left"><p>--sf-trusted-proxies=127.0.0.1,....</p></td>
<td align="left">Comma separated trusted proxies (e.g. Varnish), that we can get client IP from</td>
</tr>
<tr class="even">
<td align="left"><p>--sf-http-cache=0|1</p></td>
<td align="left">To disable Symfony HTTP cache Proxy for using a different reverse proxy
<p>By default disabled when env is &quot;dev&quot;, enabled otherwise.</p></td>
</tr>
<tr class="odd">
<td align="left">--sf-http-cache-class=&lt;class-file.php&gt;</td>
<td align="left">To specify a different class than the default one, to use as the Symfony proxy</td>
</tr>
<tr class="even">
<td align="left">--sf-classloader-file=&lt;class-file.php&gt;</td>
<td align="left">To specify a different class than the default one, to use for PHP auto loading</td>
</tr>
<tr class="odd">
<td align="left"><p>--body-size-limit=&lt;int&gt;</p></td>
<td align="left">Limit in megabytes for max size of request body, 0 value disables limit</td>
</tr>
<tr class="even">
<td align="left">--request-timeout=&lt;int&gt;</td>
<td align="left">Limit in seconds before timeout of request, 0 value disables timeout limit</td>
</tr>
</tbody>
</table>

-   [Configuration files](#WebServer-Configurationfiles)
-   [Generate vhost config script](#WebServer-Generatevhostconfigscript)
    -   [Help](#WebServer-Help)
    -   [Usage](#WebServer-Usage)
    -   [Arguments](#WebServer-Arguments)


