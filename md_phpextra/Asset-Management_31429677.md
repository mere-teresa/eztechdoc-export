1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>

<span id="title-text"> Developer : Asset Management </span> {#title-heading .pagetitle}
===========================================================

Created by <span class="author"> Dominika Kurek</span>, last modified on
Nov 14, 2016

eZ Platform supports multiple binary file handling mechanisms by means
of an `IOHandler` interface. This feature is used by the <span
class="confluence-link">
[BinaryFile](BinaryField-Field-Type_31430501.html) </span>, [<span
class="confluence-link">Media</span>](Media-Field-Type_31430525.html)and
[<span
class="confluence-link">Image</span>](Image-Field-Type_31430513.html)Field
Types.

Native IO handler  {#AssetManagement-NativeIOhandler}
==================

The IO API is organized around two types of handlers:

-   `eZ\Publish\IO\IOMetadataHandler`: Stores & reads metadata
    (validity, size, etc.)
-   `eZ\Publish\IO\IOBinarydataHandler`: Stores & reads binarydata
    (actual contents)

The IOService uses both.

Configuration {#AssetManagement-Configuration}
-------------

IO handling can now be configured using semantic configuration.
Assigning the IO handlers to ezplatform itself is configurable per
siteaccess. This is the default configuration:

~~~~ brush:
ezpublish:
    system:
        default:
            io:
                metadata_handler: default
                binarydata_handler: default
~~~~

Metadata and binarydata handlers are configured in the `ez_io`
extension. This is what the configuration looks like for the default
handlers. It declares a metadata handler and a binarydata handler, both
labelled ‘default’. Both handlers are of type ‘flysystem’, and use the
same flysystem adapter, labelled ‘default’ as well.

~~~~ brush:
ez_io:
    metadata_handlers:
        default:
            flysystem:
                adapter: default
    binarydata_handlers:
        default:
            flysystem:
                adapter: default
~~~~

The ‘default’ flysystem adapter’s directory is based on your site
settings, and will automatically be set to
`%ezpublish_legacy.root_dir%/$var_dir$/$storage_dir$` (example:
`/path/to/ezpublish_legacy/var/ezdemo_site/storage`).

### Configure the permissions of generated files {#AssetManagement-Configurethepermissionsofgeneratedfiles}

<span class="status-macro aui-lozenge aui-lozenge-current">V1.5</span>

~~~~ brush:
ezpublish:
    system:
        default:
            io:
                permissions: 
                    files: 0750 #default is 0644
                    directories: 0640 #default is 0755
~~~~

Both `files` and `directories` rules are optional.

Default values are 0644 for files and 0755 for directories.

[](https://github.com/ezsystems/ezpublish-kernel/blob/native_io_spec/doc/specifications/io/native_io_handlers.md#the-native-flysystem-handler){.external-link}The native Flysystem handler {#AssetManagement-ThenativeFlysystemhandler}
------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

[league/flysystem](https://github.com/ezsystems/ezpublish-kernel/blob/native_io_spec/doc/specifications/io/flysystem.thephpleague.com){.external-link}
(along with
[FlysystemBundle](https://github.com/1up-lab/OneupFlysystemBundle/){.external-link})
is an abstract file handling library.

It is used as the default way to read & write content binary files in eZ
Platform. It can use the `local` filesystem *(our default configuration
and the one we officially support)*, but is also able to read/write to
`sftp`, `zip` or cloud filesystems *(`azure`, `rackspace`, `S3`)*.

### Handler options {#AssetManagement-Handleroptions}

#### Adapter {#AssetManagement-Adapter}

The adapter is the ‘driver’ used by flysystem to read/write files.
Adapters can be declared using `oneup_flysystem` as follows:

~~~~ brush:
oneup_flysystem:
    adapters:
        default:
            local:
                directory: "/path/to/directory"
~~~~

 

The way to configure other adapters can be found on the [bundle’s online
documentation](https://github.com/1up-lab/OneupFlysystemBundle/blob/master/Resources/doc/index.md#step3-configure-your-filesystems){.external-link}.
Note that we do not use the Filesystem configuration described in this
documentation, only the adapters.

The DFS Cluster handler {#AssetManagement-TheDFSClusterhandler}
-----------------------

For clustering use we provide a custom metadata handler that stores
metadata about your assets in the database. This is done as it is faster
then accessing the remote NFS or S3 instance in order to read metadata.
For further reading on setting this up,
see [Clustering](Clustering_31430387.html).

 

#### In this topic: {#AssetManagement-Inthistopic:}

-   [Native IO handler ](#AssetManagement-NativeIOhandler)
    -   [Configuration](#AssetManagement-Configuration)
        -   [Configure the permissions of generated
            files](#AssetManagement-Configurethepermissionsofgeneratedfiles)
    -   [The native Flysystem
        handler](#AssetManagement-ThenativeFlysystemhandler)
        -   [Handler options](#AssetManagement-Handleroptions)
    -   [The DFS Cluster handler](#AssetManagement-TheDFSClusterhandler)

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


