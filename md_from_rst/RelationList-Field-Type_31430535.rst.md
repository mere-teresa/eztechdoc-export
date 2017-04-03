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
**Developer : RelationList Field Type**

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
This Field Type represents one or multiple relations to content.

<div class="table-wrap">
  Name                  Internal name                 Expected input
  --------------------- ----------------------------- -------------------
  `RelationList`        `ezobjectrelationlist`        `mixed`

</div>
**Description**

This Field Type makes possible to store and retrieve values of relation
to content.

**PHP API Field Type **

**Input expectations**

<div class="table-wrap">
+--------------------------+--------------------------+--------------------------+
| .. raw:: html &lt;div    | .. raw:: html &lt;div    | .. raw:: html &lt;div    |
| class=“tablesorter-he    | class=“tablesorter-he    | class=“tablesorter-he    |
| ader-inner”&gt; Type ..  | ader-inner”&gt;          | ader-inner”&gt; Example  |
| raw:: html &lt;/div&gt;  | Description .. raw::     | .. raw:: html            |
|                          | html &lt;/div&gt;        | &lt;/div&gt;             |
+==========================+==========================+==========================+
| `int|string`             | Id of the related        | `42`                     |
|                          | Content item             |                          |
+--------------------------+--------------------------+--------------------------+
| `array`                  | An array of related      | `array( 24, 42 )`        |
|                          | Content IDs              |                          |
+--------------------------+--------------------------+--------------------------+
|     eZ\Publish\API\Repos | ContentInfo instance of  |                          |
|                          | the related Content      |                          |
| itoryValuesContentCon    |                          |                          |
| tentInfo                 |                          |                          |
+--------------------------+--------------------------+--------------------------+
| `eZ\Publish\Core\FieldT  | RelationList Field Type  | See Value Object         |
| ype\RelationList\Value`  | Value Object             | documentation section    |
|                          |                          | below.                   |
+--------------------------+--------------------------+--------------------------+

</div>
**Value Object**

**Properties**

`eZ\Publish\Core\FieldType\RelationList\Value` contains following
properties.

<div class="table-wrap">
  ---------------------------------------------------------------------------
  Property           Type               Description        Example
  ------------------ ------------------ ------------------ ------------------
  `destinationConte  `array`            An array of        \`array( 24, 42 )
  ntIds`                                related Content    \`
                                        ids                
  ---------------------------------------------------------------------------

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$relationList->destinationContentId = array( 
    $contentInfo1->id,
    $contentInfo2->id,
    170
);
```

</div>
</div>
**Constructor**

The `RelationList``\Value` constructor will initialize a new Value
object with the value provided. It expects a mixed array as value.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
// Instantiates a RelationList Value object
$relationListValue = new RelationList\Value(
    array(
        $contentInfo1->id,
        $contentInfo2->id,
        170     
    )
);
```

</div>
</div>
**Validation**

This Field Type validates if the `selectionMethod` specified is 0
(`self::SELECTION_BROWSE)` or 1 (`self::SELECTION_DROPDOWN)`. A
validation error is thrown if the value does not match.

Also validates if the `selectionDefaultLocation` specified is `null`,
`string` or `integer`. If the type validation fails a validation error
is thrown.

And validates if the value specified in `selectionContentTypes` is an
array. If not, a validation error in given.

**Settings**

The field definition of this Field Type can be configured with following
options:

<div class="table-wrap">
+--------------------+--------------------+--------------------+--------------------+
| Name               | Type               | Default value      | Description        |
+====================+====================+====================+====================+
| \`selectionMethod  | `mixed`            |     SELECTION_BROW | Method of          |
| \`                 |                    |                    | selection in the   |
|                    |                    | SE                 | administration     |
|                    |                    |                    | interface          |
+--------------------+--------------------+--------------------+--------------------+
| `selectionDefault  | `string|integer`   | `null`             | Id of the default  |
| Location`          |                    |                    | Location for the   |
|                    |                    |                    | selection when     |
|                    |                    |                    | using              |
|                    |                    |                    | administration     |
|                    |                    |                    | interface          |
+--------------------+--------------------+--------------------+--------------------+
| `selectionContent  | `array`            | `array()`          | An array of        |
| Types`             |                    |                    | ContentType ids    |
|                    |                    |                    | that are allowed   |
|                    |                    |                    | for related        |
|                    |                    |                    | Content            |
+--------------------+--------------------+--------------------+--------------------+

</div>
Following selection methods are available:

<div class="table-wrap">
  ------------------------------------------------------------------------
  Name         Description
  ------------ -----------------------------------------------------------
  SELECTION\_B Selection will use browse mode
  ROWSE        

  SELECTION\_D Selection control will use dropdown control containing the
  ROPDOWN      Content list in the default Location for selection
  ------------------------------------------------------------------------

</div>
<div
class="confluence-information-macro confluence-information-macro-information">
<div class="confluence-information-macro-body">
NOTE: Dropdown not implemented in Platform UI yet, only browse is used
currently.

</div>
</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of using settings in PHP**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
use eZ\Publish\Core\FieldType\RelationList\Type;

$settings = array(
    "selectionMethod" => Type::SELECTION_BROWSE,
    "selectionDefaultLocation" => null,
    "selectionContentTypes" => array()
 );
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

