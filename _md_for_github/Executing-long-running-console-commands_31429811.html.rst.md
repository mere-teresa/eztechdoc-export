<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Cookbook](Cookbook_31429528.html)

</div>
**Developer : Executing long-running console commands**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Nov 23, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
**Description**

This page describes how to execute long-running console commands, to make sure they don't run out of memory. An example is a custom import command or the indexing command provided by the [Solr Bundle](Solr-Bundle_31430592.html).

**Solution**

**Reducing memory usage**

To avoid quickly running out of memory while executing such commands you should make sure to:

1.  Always run in prod environment using: `--env=prod`
    1.  See [Environments](Environments_31429669.html) for further information on Symfony environments.
    2.  *See [Logging and debug configuration](https://doc.ez.no/display/DEVELOPER/Devops#Devops-LoggingandDebugConfiguration) for some of different features enabled in development *environments, which by design uses memory.\*\*

2.  Avoid Stash *([Persistence cache](Repository_31432023.html#Repository-Persistencecacheconfiguration))* using to much memory in prod:
    1.  If your system is running, or you need to use cache, then disable Stash InMemory cache as it does not limit the amount of items in cache and grows exponentially:

        <div class="code panel pdl" style="border-width: 1px;">
        <div class="codeHeader panelHeader pdl"
        style="border-bottom-width: 1px;">
        **config\_prod.yml (snippet, not a full example for stash config)**

        </div>
        <div class="codeContent panelContent pdl">
        ``` sourceCode
        stash:
            caches:
                default:
                    inMemory: false 
        ```

        </div>
        </div>
        Also if you use FileSystem driver, make sure `memKeyLimit` is set to a low number, default should be 200 and can be lowered like this:

        <div class="code panel pdl" style="border-width: 1px;">
        <div class="codeHeader panelHeader pdl"
        style="border-bottom-width: 1px;">
        **config\_prod.yml**

        </div>
        <div class="codeContent panelContent pdl">
        ``` sourceCode
        stash:
            caches:
                default:
                    FileSystem:
                        memKeyLimit: 100
        ```

        </div>
        </div>
    2.  If your setup is offline and cache is cold, there is no risk of stale cache and you can actually completely disable Stash cache. This will improve performance of import scripts:

        <div class="code panel pdl" style="border-width: 1px;">
        <div class="codeHeader panelHeader pdl"
        style="border-bottom-width: 1px;">
        **config\_prod.yml (full example)**

        </div>
        <div class="codeContent panelContent pdl">
        ``` sourceCode
        stash:
            caches:
                default:
                    drivers: [ BlackHole ]
                    inMemory: false
        ```

        </div>
        </div>

3.  For logging using monolog, if you use either the default `fingers_crossed`, or `buffer` handler, make sure to specify `buffer_size` to limit how large the buffer grows before it gets flushed:

    <div class="code panel pdl" style="border-width: 1px;">
    <div class="codeHeader panelHeader pdl"
    style="border-bottom-width: 1px;">
    **config\_prod.yml (snippet, not a full example for monolog config)**

    </div>
    <div class="codeContent panelContent pdl">
    ``` sourceCode
    monolog:
        handlers:
            main:
                type: fingers_crossed
                buffer_size: 200
    ```

    </div>
    </div>
4.  Run PHP without memory limits using: `php ` `-d memory_limit=-1 app/console <command>`
5.  Disable `xdebug` *(PHP extension to debug/profile php use)* when running the command, this will cause php to use much more memory.

 

<div
class="confluence-information-macro confluence-information-macro-note">
Note: Memory will still grow

<div class="confluence-information-macro-body">
Even when everything is configured like described above, memory will grow for each iteration of indexing/inserting a content item with at least *1kb* per iteration after the initial first 100 rounds. This is expected behavior; to be able to handle more iterations you will have to do one or several of the following:

-   Change the import/index script in question to [use process forking](#Executinglong-runningconsolecommands-process-forking) to avoid the issue.
-   Upgrade PHP: *newer versions of PHP are typically more memory-efficient.*
-   Run the console command on a machine with more memory (RAM)*.*

</div>
</div>
**Process forking with Symfony**

The recommended way to completely avoid "memory leaks" in PHP in the first place is to use processes, and for console scripts this is typically done using process forking which is quite easy to do with Symfony.

The things you will need to do:

1.  Change your command so it supports taking slice parameters, like for instance a batch size and a child-offset parameter.
    1.  *If defined, child-offset parameter denotes if a process is child, this could have been accomplished with two commands as well.*
    2.  *If not defined, it is master process which will execute the processes until nothing is left to process.*

2.  Change the command so that the master process takes care of forking child processes in slices.
    1.  For execution in-order, [you may look to our platform installer code](https://github.com/ezsystems/ezpublish-kernel/blob/6.2/eZ/Bundle/PlatformInstallerBundle/src/Command/InstallPlatformCommand.php#L230)used to fork out solr indexing after installation to avoid cache issues.
    2.  For parallel execution of the slices, [see Symfony doc for further instruction](http://symfony.com/doc/current/components/process.html#process-signals).

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490376003424">
-   [Description](#Executinglong-runningconsolecommands-Description)
-   [Solution](#Executinglong-runningconsolecommands-Solution)
    -   [Reducing memory usage](#Executinglong-runningconsolecommands-Reducingmemoryusage)
    -   [Process forking with Symfony](#Executinglong-runningconsolecommands-ProcessforkingwithSymfonyprocess-forking)

</div>
**Related topics:**

[Environments](Environments_31429669.html)

[Symfony Process Component \[symfony.com\]](http://symfony.com/doc/current/components/process.html)

[How to Contribute](How-to-Contribute_31429587.html)

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

