1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[Cookbook](Cookbook_31429528.html)</span>

<span id="title-text"> Developer : Executing long-running console commands </span>
==================================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on Nov 23, 2016

Description
===========

This page describes how to execute long-running console commands, to make sure they don't run out of memory. An example is a custom import command or the indexing command provided by the [Solr Bundle](Solr-Bundle_31430592.html).

Solution
========

Reducing memory usage
---------------------

To avoid quickly running out of memory while executing such commands you should make sure to:

1.  <span class="inline-comment-marker" data-ref="5c1c379e-da6a-435d-ba3e-f3fe7df39d94">Always</span> run in prod environment using: `--env=prod`
    1.  See [Environments](Environments_31429669.html) for further information on Symfony environments.
    2.  *See [Logging and debug configuration](https://doc.ez.no/display/DEVELOPER/Devops#Devops-LoggingandDebugConfiguration) for some of different features enabled in development *environments, which by design uses memory.**

2.  Avoid Stash *(<span class="confluence-link">[Persistence cache](Repository_31432023.html#Repository-Persistencecacheconfiguration)</span>)* using to much memory in prod:

    1.  If your system is running, or you need to use cache, then disable Stash InMemory cache as it does not limit the amount of items in cache and grows exponentially:

        **config\_prod.yml (snippet, not a full example for stash config)**

        ``` brush:
        stash:
            caches:
                default:
                    inMemory: false 
        ```

        Also if you use FileSystem driver, make sure `memKeyLimit` is set to a low number, default should be 200 and can be lowered like this:

        **config\_prod.yml**

        ``` brush:
        stash:
            caches:
                default:
                    FileSystem:
                        memKeyLimit: 100
        ```

    2.  If your setup is offline and cache is cold, there is no risk of stale cache and you can actually completely disable Stash cache. This will improve performance of import scripts:

        **config\_prod.yml (full example)**

        ``` brush:
        stash:
            caches:
                default:
                    drivers: [ BlackHole ]
                    inMemory: false
        ```

3.  For logging using monolog, if you use either the default `               fingers_crossed             `, or `buffer` handler, make sure to specify `               buffer_size             ` <span class="inline-comment-marker" data-ref="b6f4845b-de84-415d-bd48-2744c8886ef8"> to limit how large the buffer grows before it gets flushed</span>:

    **config\_prod.yml (snippet, not a full example for monolog config)**

    ``` brush:
    monolog:
        handlers:
            main:
                type: fingers_crossed
                buffer_size: 200
    ```

4.  Run PHP without memory limits using: `php ` `-d memory_limit=-1 app/console <command>` <span>
    </span>
5.  Disable `xdebug` *(PHP extension to debug/profile php use)* when running the command, this will cause php to use much more memory.

 

Note: Memory will still grow

<span class="aui-icon aui-icon-small aui-iconfont-warning confluence-information-macro-icon"></span>
Even when everything is configured like described above, memory will grow for each iteration of indexing/inserting a content item with at least *1kb* per iteration after the initial first 100 rounds. This is expected behavior; to be able to handle more iterations you will have to do one or several of the following:

-   <span>Change the import/index script in question to [use process forking](#Executinglong-runningconsolecommands-process-forking) to avoid the issue.</span>
-   Upgrade PHP: *newer versions of PHP are typically more memory-efficient.*
-   Run the console command on a machine with more memory (RAM)*.
    *

Process forking with Symfony<span id="Executinglong-runningconsolecommands-process-forking" class="confluence-anchor-link"></span>
----------------------------------------------------------------------------------------------------------------------------------

The recommended way to completely avoid "memory leaks" in PHP in the first place is to use processes, and for console scripts this is typically done using process forking which is quite easy to do with Symfony.

The things you will need to do:

1.  Change your command so it supports taking slice parameters, like for instance a batch size and a child-offset parameter.
    1.  *If defined, child-offset parameter denotes if a process is child, this could have been accomplished with two commands as well.*
    2.  *If not defined, it is master process which will execute the processes until nothing is left to process.*

2.  Change the command so that the master process takes care of forking child processes in slices.
    1.  For execution in-order, <a href="https://github.com/ezsystems/ezpublish-kernel/blob/6.2/eZ/Bundle/PlatformInstallerBundle/src/Command/InstallPlatformCommand.php#L230" class="external-link">you may look to our platform installer code</a>used to fork out solr indexing after installation to avoid cache issues.
    2.  For parallel execution of the slices, <a href="http://symfony.com/doc/current/components/process.html#process-signals" class="external-link">see Symfony doc for further instruction</a>.

 

#### In this topic:

-   [Description](#Executinglong-runningconsolecommands-Description)
-   [Solution](#Executinglong-runningconsolecommands-Solution)
    -   [Reducing memory usage](#Executinglong-runningconsolecommands-Reducingmemoryusage)
    -   [Process forking with Symfony](#Executinglong-runningconsolecommands-ProcessforkingwithSymfonyprocess-forking)

#### Related topics:

<span class="confluence-link">[Environments](Environments_31429669.html)</span>

<a href="http://symfony.com/doc/current/components/process.html" class="external-link">Symfony Process Component [symfony.com]</a>

[How to Contribute](How-to-Contribute_31429587.html)

Document generated by Confluence on Mar 24, 2017 17:20

[Atlassian](http://www.atlassian.com/)


