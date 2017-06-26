<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)

</div>
**Developer : Asset Management**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified on Nov 14, 2016

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
eZ Platform supports multiple binary file handling mechanisms by means of an `IOHandler` interface. This feature is used by the [BinaryFile](BinaryField-Field-Type_31430501.html) , [Media](Media-Field-Type_31430525.html)and [Image](Image-Field-Type_31430513.html)Field Types.

**Native IO handler **

The IO API is organized around two types of handlers:

-   `eZ\Publish\IO\IOMetadataHandler`: Stores & reads metadata (validity, size, etc.)
-   `eZ\Publish\IO\IOBinarydataHandler`: Stores & reads binarydata (actual contents)

The IOService uses both.

**Configuration**

IO handling can now be configured using semantic configuration. Assigning the IO handlers to ezplatform itself is configurable per siteaccess. This is the default configuration:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    system:
        default:
            io:
                metadata_handler: default
                binarydata_handler: default
```

</div>
</div>
Metadata and binarydata handlers are configured in the `ez_io` extension. This is what the configuration looks like for the default handlers. It declares a metadata handler and a binarydata handler, both labelled 'default'. Both handlers are of type 'flysystem', and use the same flysystem adapter, labelled 'default' as well.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
ez_io:
    metadata_handlers:
        default:
            flysystem:
                adapter: default
    binarydata_handlers:
        default:
            flysystem:
                adapter: default
```

</div>
</div>
<div class="action-body flooded">
The 'default' flysystem adapter's directory is based on your site settings, and will automatically be set to `%ezpublish_legacy.root_dir%/$var_dir$/$storage_dir$` (example: `/path/to/ezpublish_legacy/var/ezdemo_site/storage`).

**Configure the permissions of generated files**

<div class="syntaxplugin">
V1.5

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
ezpublish:
    system:
        default:
            io:
                permissions: 
                    files: 0750 #default is 0644
                    directories: 0640 #default is 0755
```

</div>
</div>
Both `files` and `directories` rules are optional.

Default values are 0644 for files and 0755 for directories.

</div>
</div>
**[](https://github.com/ezsystems/ezpublish-kernel/blob/native_io_spec/doc/specifications/io/native_io_handlers.md#the-native-flysystem-handler)The native Flysystem handler**

[league/flysystem](https://github.com/ezsystems/ezpublish-kernel/blob/native_io_spec/doc/specifications/io/flysystem.thephpleague.com) (along with [FlysystemBundle](https://github.com/1up-lab/OneupFlysystemBundle/)) is an abstract file handling library.

It is used as the default way to read & write content binary files in eZ Platform. It can use the `local` filesystem *(our default configuration and the one we officially support)*, but is also able to read/write to `sftp`, `zip` or cloud filesystems *(`azure`, `rackspace`, `S3`)*.

**Handler options**

**Adapter**

The adapter is the 'driver' used by flysystem to read/write files. Adapters can be declared using `oneup_flysystem` as follows:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` sourceCode
oneup_flysystem:
    adapters:
        default:
            local:
                directory: "/path/to/directory"
```

</div>
</div>
 

The way to configure other adapters can be found on the [bundle's online documentation](https://github.com/1up-lab/OneupFlysystemBundle/blob/master/Resources/doc/index.md#step3-configure-your-filesystems). Note that we do not use the Filesystem configuration described in this documentation, only the adapters.

**The DFS Cluster handler**

For clustering use we provide a custom metadata handler that stores metadata about your assets in the database. This is done as it is faster then accessing the remote NFS or S3 instance in order to read metadata. For further reading on setting this up, see [Clustering](Clustering_31430387.html).

 

</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
**In this topic:**

<div class="toc-macro rbtoc1490375995079">
-   [Native IO handler ](#AssetManagement-NativeIOhandler)
    -   [Configuration](#AssetManagement-Configuration)
        -   [Configure the permissions of generated files](#AssetManagement-Configurethepermissionsofgeneratedfiles)
    -   [The native Flysystem handler](#AssetManagement-ThenativeFlysystemhandler)
        -   [Handler options](#AssetManagement-Handleroptions)
    -   [The DFS Cluster handler](#AssetManagement-TheDFSClusterhandler)

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

