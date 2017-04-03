<div id="page">
<div id="main" class="aui-page-panel">
<div id="main-header">
<div id="breadcrumb-section">
1.  [Developer](index.html)
2.  [Documentation](Documentation_31429504.html)
3.  [The Complete Guide to eZ
    Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)
4.  [Under the Hood: How eZ Platform Works](31429659.html)
5.  [Content Model: Content is King!](31429709.html)
6.  [Content items, Content Types and Fields](31430275.html)
7.  [Field Types reference](Field-Types-reference_31430495.html)

</div>
**Developer : BinaryField Field Type**

</div>
<div id="content" class="view">
<div class="page-metadata">
Created by Dominika Kurek, last modified by André Rømcke on Jan 04, 2017

</div>
<div id="main-content" class="wiki-content group">
<div class="contentLayout2">
<div class="columnLayout two-right-sidebar"
data-layout="two-right-sidebar">
<div class="cell normal" data-type="normal">
<div class="innerCell">
This Field Type represents and handles a binary file. It also counts the
number of times the file has been downloaded from the `content/download`
module.

<div class="table-wrap">
  Name               Internal name        Expected input     Output
  ------------------ -------------------- ------------------ -------------
  `BinaryFile`       `ezbinaryfile`       `Mixed`            `Mixed`

</div>
**Description**

This Field Type allows the storage and retrieval of a single file. It is
capable of handling virtually any file type and is typically used for
storing legacy document types such as PDF files, Word documents,
spreadsheets, etc. The maximum allowed file size is determined by the
“Max file size” class attribute edit parameter and the
“`upload_max_filesize`” directive in the main PHP configuration file
(“php.ini”).

**PHP API Field Type **

**Value Object**

`eZ\Publish\Core\FieldType\BinaryFile\Value` offers the following
properties.

<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
Note that both `BinaryFile` and Media Value and Type inherit from the
`BinaryBase` abstract Field Type, and share common properties.

</div>
</div>
<div class="table-wrap">
  ---------------------------------------------------------------------------
  Attribute          Type               Description        Example
  ------------------ ------------------ ------------------ ------------------
  `id`               string             Binary file        application/63cd47
                                        identifier. This   2dd7819da7b75e8e2f
                                        ID depends on      ee507c68.pdf
                                        the IO             
                                        Handler &lt;https: 
                                        //d                
                                        oc.ez.no/display/D 
                                        EVELOPER/Clusterin 
                                        g\#Clustering-Bina 
                                        r                  
                                        yfilesclustering&g 
                                        t;                 
                                        \_\_ that is being 
                                        used. With the     
                                        native, default    
                                        handlers           
                                        (FileSystem and    
                                        Legacy), the ID is 
                                        the file path,     
                                        relative to the    
                                        binary file        
                                        storage root dir   
                                        (`var/<vardir>/st  
                                        orage/original`    
                                        by default).       

  `fileName`         string             The human readable 20130116\_whitepap
                                        file name, as      er\_ezpublish5
                                        exposed to the     light.pdf
                                        outside. Used when 
                                        sending the file   
                                        for download in    
                                        order to name the  
                                        file.              

  `fileSize`         int                File size, in      1077923
                                        bytes.             

  `mimeType`         string             The file’s mime    application/pdf
                                        type.              

  `uri`              string             The binary file’s  /content/download/
                                        content/download   210/2707
                                        URI. If the URI    
                                        doesn’t include a  
                                        host or protocol,  
                                        it applies to the  
                                        request domain.    

  `downloadCount`    integer            Number of times    0
                                        the file was       
                                        downloaded         

  `path`             string             **\*deprecated\***  
                                         Renamed           
                                        to `id` starting   
                                        from eZ Publish    
                                        5.2. Can still be  
                                        used, but it is    
                                        recommended not to 
                                        use it anymore as  
                                        it will be         
                                        removed.           
  ---------------------------------------------------------------------------

</div>
**Hash format**

The hash format mostly matches the value object. It has the following
keys:

-   `id`
-   `path` (for backwards compatibility)
-   `fileName`
-   `fileSize`
-   `mimeType`
-   `uri`
-   `downloadCount`

**REST API specifics**

Used in the REST API, a BinaryFile Field will mostly serialize the hash
described above. However there are a couple specifics worth mentioning.

**Reading content: url property**

When reading the contents of a field of this type, an extra key is
added: url. This key gives you the absolute file URL, protocol and host
included.

Example: <http://example.com/var/ezdemo_site/storage/original/application/63cd472dd7819da7b75e8e2fee507c68.pdf>

**Creating content: data property**

When creating BinaryFile content with the REST API, it is possible to
provide data as a base64 encoded string, using the “`data`” fieldValue
key:

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
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

</div>
</div>
</div>
</div>
<div class="cell aside" data-type="aside">
<div class="innerCell">
 

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

