1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and Fields](31430275.html)</span>
7.  <span>[Field Types reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : BinaryField Field Type </span>
=================================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Jan 04, 2017

This Field Type represents and handles a binary file. It also counts the number of times the file has been downloaded from the `content/download` module.

| Name         | Internal name  | Expected input | Output  |
|--------------|----------------|----------------|---------|
| `BinaryFile` | `ezbinaryfile` | `Mixed`        | `Mixed` |

Description
-----------

This Field Type allows the storage and retrieval of a single file. It is capable of handling virtually any file type and is typically used for storing legacy document types such as PDF files, Word documents, spreadsheets, etc. The maximum allowed file size is determined by the "Max file size" class attribute edit parameter and the "`upload_max_filesize`" directive in the main PHP configuration file ("php.ini").

PHP API Field Type 
-------------------

### Value Object

`eZ\Publish\Core\FieldType\BinaryFile\Value` offers the following properties.

<span class="aui-icon aui-icon-small aui-iconfont-info confluence-information-macro-icon"></span>
Note that both `BinaryFile` and Media Value and Type inherit from the `BinaryBase` abstract Field Type, and share common properties.

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left">Attribute</th>
<th align="left">Type</th>
<th align="left">Description</th>
<th align="left">Example</th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left"><code>id</code></td>
<td align="left">string</td>
<td align="left"><span>Binary file identifier. This ID depends on the </span><a href="https://doc.ez.no/display/DEVELOPER/Clustering#Clustering-Binaryfilesclustering">IO Handler</a><span> that is being used. With the native, default handlers (FileSystem and Legacy), the ID is the file path, relative to the binary file storage root dir (<code>var/&lt;vardir&gt;/storage/original</code> by default).</span></td>
<td align="left">application/63cd472dd7819da7b75e8e2fee507c68.pdf</td>
</tr>
<tr class="even">
<td align="left"><code>fileName</code></td>
<td align="left">string</td>
<td align="left">The human readable file name, as exposed to the outside. Used when sending the file for download in order to name the file.</td>
<td align="left">20130116_whitepaper_ezpublish5 light.pdf</td>
</tr>
<tr class="odd">
<td align="left"><code>fileSize</code></td>
<td align="left">int</td>
<td align="left">File size, in bytes.</td>
<td align="left">1077923</td>
</tr>
<tr class="even">
<td align="left"><code>mimeType</code></td>
<td align="left">string</td>
<td align="left">The file's mime type.</td>
<td align="left">application/pdf</td>
</tr>
<tr class="odd">
<td align="left"><code>uri</code></td>
<td align="left">string</td>
<td align="left"><p>The binary file's content/download URI. If the URI doesn't include a host or protocol, it applies to the request domain.</p></td>
<td align="left">/content/download/210/2707</td>
</tr>
<tr class="even">
<td align="left"><code>downloadCount</code></td>
<td align="left">integer</td>
<td align="left">Number of times the file was downloaded</td>
<td align="left">0</td>
</tr>
<tr class="odd">
<td align="left"><code>path</code></td>
<td align="left">string</td>
<td align="left"><p><strong>*deprecated*<br />
</strong> Renamed to <code>id</code> starting from eZ Publish 5.2. Can still be used, but it is recommended not to use it anymore as it will be removed.</p></td>
<td align="left"> </td>
</tr>
</tbody>
</table>

### Hash format

The hash format mostly matches the value object. It has the following keys:

-   `id`
-   `path` (for backwards compatibility)
-   `fileName`
-   `fileSize`
-   `mimeType`
-   `uri`
-   `downloadCount`

REST API specifics
------------------

Used in the REST API, a BinaryFile Field will mostly serialize the hash described above. However there are a couple specifics worth mentioning.

### Reading content: url property

When reading the contents of a field of this type, an extra key is added: url. This key gives you the absolute file URL, protocol and host included.

Example: <a href="http://example.com/var/ezdemo_site/storage/original/application/63cd472dd7819da7b75e8e2fee507c68.pdf" class="uri" class="external-link">http://example.com/var/ezdemo_site/storage/original/application/63cd472dd7819da7b75e8e2fee507c68.pdf</a>

### Creating content: data property

When creating BinaryFile content with the REST API, it is possible to provide data as a base64 encoded string, using the "`data`" fieldValue key:

``` brush:
<field>
    <fieldDefinitionIdentifier>file</fieldDefinitionIdentifier>
    <languageCode>eng-GB</languageCode>
    <fieldValue>
        <value key="fileName">My file.pdf</value>
        <value key="fileSize">17589</value>
        <value key="data"><![CDATA[/9j/4AAQSkZJRgABAQEAZABkAAD/2wBDAAIBAQIBAQICAgICAgICAwUDAwMDAwYEBAMFBwYHBwcG
...
...]]></value>
    </fieldValue>
</field>
```

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


