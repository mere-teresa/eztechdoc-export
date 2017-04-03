<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [Get Started with eZ
    Platform](Get-Started-with-eZ-Platform_31429520.html)
4.  [Step 1: Installation](31429538.html)
5.  [Manual Installation
    Guides](Manual-Installation-Guides_31431727.html)
6.  [Installation Guide for Unix-Based
    Systems](Installation-Guide-for-Unix-Based-Systems_31431755.html)

</div>
**Developer : Setup folder rights**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Sarah Haïm-Lubczanski, last modified on Sep 06, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
For security reasons, there is no need for web server to have access to
write to other directories.

**Set the owner and clean directories\* \***

First, change `www-data` to your web server user.

**Clean the cache/ and logs/ directories**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ rm -rf app/cache/* app/logs/* 
```

</div>
</div>
**Use the right option according to your system.**

**A. Using ACL on a *Linux/BSD*system that supports chmod +a**

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Using ACL on a Linux/BSD system that supports chmod +a**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ sudo chmod +a "www-data allow delete,write,append,file_inherit,directory_inherit" \
  app/cache app/logs web
$ sudo chmod +a "`whoami` allow delete,write,append,file_inherit,directory_inherit" \
  app/cache app/logs web
```

</div>
</div>
**B. Using ACL on a *Linux/BSD*system that does not support chmod +a**

Some systems don’t support chmod +a, but do support another utility
called setfacl. You may need to enable ACL support on your partition and
install setfacl before using it (as is the case with Ubuntu), in this
way:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Using ACL on a Linux/BSD system that does not support chmod +a**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ sudo setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx \
  app/cache app/logs web
$ sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx \
  app/cache app/logs web
```

</div>
</div>
**C. Using chown on *Linux/BSD/OS X* systems that don’t support ACL**

Some systems don’t support ACL at all. You will need to set your web
server’s user as the owner of the required directories:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Using chown on Linux/BSD/OS X systems that don’t support ACL**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ sudo chown -R www-data:www-data app/cache app/logs web
$ sudo find {app/{cache,logs},web} -type d | xargs sudo chmod -R 775
$ sudo find {app/{cache,logs},web} -type f | xargs sudo chmod -R 664
```

</div>
</div>
**D. Using chmod on a *Linux/BSD/OS X* system where you can’t change
owner*\**\***

If you can’t use ACL and aren’t allowed to change owner, you can use
chmod, making the files writable by everybody. Note that this method
really isn’t recommended as it allows any user to do anything:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Using chmod on a Linux/BSD/OS X system where you can’t change owner**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ sudo find {app/{cache,logs},web} -type d | xargs sudo chmod -R 777
$ sudo find {app/{cache,logs},web} -type f | xargs sudo chmod -R 666
```

</div>
</div>
When using chmod, note that newly created files (such as cache) owned by
the web server’s user may have different/restrictive permissions. In
this case, it may be required to change the umask so that the cache and
log directories will be group-writable or world-writable (`umask(0002)`
or `umask(0000)` respectively).

It may also possible to add the group ownership inheritance flag so new
files inherit the current group, and use `775`/`664` in the command
lines above instead of world-writable:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**It may also possible to add the group ownership inheritance flag**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$ sudo chmod g+s {app/{cache,logs},web}
```

</div>
</div>
**E. Setup folder rights on Windows**

For your choice of web server you’ll need to make sure web server user
has read access to `<root-dir>`, and write access to the following
directories:

-   app/cache
-   app/logs

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
<div class="toc-macro rbtoc1490375979951">
-   [Set the owner and clean
    directories](#Setupfolderrights-Settheownerandcleandirectories)
    -   [Clean the cache/ and logs/
        directories](#Setupfolderrights-Cleanthecache/andlogs/directories)
-   [Use the right option according to
    your system.](#Setupfolderrights-Usetherightoptionaccordingtoyoursystem.)
    -   [A. Using ACL on a Linux/BSD system that supports chmod
        +a](#Setupfolderrights-A.UsingACLonaLinux/BSDsystemthatsupportschmod+a)
    -   [B. Using ACL on a Linux/BSD system that does not support chmod
        +a](#Setupfolderrights-B.UsingACLonaLinux/BSDsystemthatdoesnotsupportchmod+a)
    -   [C. Using chown on Linux/BSD/OS X systems that don’t support
        ACL](#Setupfolderrights-C.UsingchownonLinux/BSD/OSXsystemsthatdon'tsupportACL)
    -   [D. Using chmod on a Linux/BSD/OS X system where you can’t
        change
        owner](#Setupfolderrights-D.UsingchmodonaLinux/BSD/OSXsystemwhereyoucan'tchangeowner)
    -   [E. Setup folder rights on
        Windows](#Setupfolderrights-E.SetupfolderrightsonWindows)

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

