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
**Developer : Relation Field Type**

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
This Field Type represents a relation to a Content item.

<div class="table-wrap">
  Name              Internal name             Expected input
  ----------------- ------------------------- -------------------
  `Relation`        `ezobjectrelation`        `mixed`

</div>
**Description**

This Field Type makes it possible to store and retrieve the value of
relation to a Content item.

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
+--------------------------------------+--------------------------------------+
| Type                                 | Example                              |
+======================================+======================================+
| `string`                             |     "150"                            |
+--------------------------------------+--------------------------------------+
| `integer`                            |  150                                 |
+--------------------------------------+--------------------------------------+

</div>
**Value object**

**Properties**

The Value class of this Field Type contains the following properties:

<div class="table-wrap">
  -------------------------------------------------------------------------
  Property      Type        Description
  ------------- ----------- -----------------------------------------------
  `$destination `string|int This property will be used to store the value
  ContentId`    |null`      provided, which will represent the related
                            content.
  -------------------------------------------------------------------------

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$relation->destinationContentId = $contentInfo->id;
```

</div>
</div>
**Constructor**

The `Relation``\Value` constructor will initialize a new Value object
with the value provided. It expects a mixed value.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
// Instantiates a Relation Value object
$relationValue = new Relation\Value( $contentInfo->id );
```

</div>
</div>
**Validation**

This Field Type validates whether the provided relation exists, but
before it does that it will check that the value is either string or
int.

**Settings**

The field definition of this Field Type can be configured with two
options:

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Name               | Type               | Default value      | Description        |
+====================+====================+====================+====================+
| \`selectionMethod  | `int`              | `self::SELECTION_  | This setting       |
| \`                 |                    | BROWSE`            | defines the        |
|                    |                    |                    | selection method.  |
|                    |                    |                    | It expects an      |
|                    |                    |                    | integer (0/1). 0   |
|                    |                    |                    | stands for         |
|                    |                    |                    | `self::SELECTION_  |
|                    |                    |                    | BROWSE`,           |
|                    |                    |                    | 1 stands for       |
|                    |                    |                    | `self::SELECTION_  |
|                    |                    |                    | DROPDOWN`.         |
|                    |                    |                    |                    |
|                    |                    |                    |                    |
|                    |                    |                    |                    |
|                    |                    |                    | <div               |
|                    |                    |                    | class="confluen    |
|                    |                    |                    | ce-information-mac |
|                    |                    |                    | ro confluence-info |
|                    |                    |                    | rmation-macro-info |
|                    |                    |                    | rmation"&gt;       |
|                    |                    |                    |                    |
|                    |                    |                    | <div               |
|                    |                    |                    | class="confluen    |
|                    |                    |                    | ce-information-mac |
|                    |                    |                    | ro-body"&gt;       |
|                    |                    |                    |                    |
|                    |                    |                    | NOTE: Dropdown not |
|                    |                    |                    | implemented in     |
|                    |                    |                    | Platform UI yet,   |
|                    |                    |                    | only browse is     |
|                    |                    |                    | used currently.    |
|                    |                    |                    |                    |
|                    |                    |                    | </div>             |
|                    |                    |                    | </div>             |
+--------------------+--------------------+--------------------+--------------------+
| `selectionRoot`    | `string`           | `null`             | This setting       |
|                    |                    |                    | defines the        |
|                    |                    |                    | selection root.    |
+--------------------+--------------------+--------------------+--------------------+

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Relation FieldType example settings**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
use eZ\Publish\Core\FieldType\Relation\Type;

$settings = array(
    "selectionMethod" => 1,
    "selectionRoot" => null
);
```

</div>
</div>
Note: These settings are meant for future use in user interface when
allowing users to select relations.

 

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

