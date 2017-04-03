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
**Developer : Selection Field Type**

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
This Field Type represents a single selection or multiple choices from a
list of options.

<div class="table-wrap">
  Name               Internal name        Expected input type
  ------------------ -------------------- ------------------------
  `Selection`        `ezselection`        `mixed`

</div>
**Description**

The Selection Field Type stores single selections or multiple choices
from a list of options, by populating a hash with the list of selected
values.

**PHP API Field Type**

**Input expectations**

<div class="table-wrap">
  Type           Example
  -------------- ----------------------
  `array`        `array( 1, 2 )`

</div>
**Value object**

**Properties**

The Value class of this Field Type contains the following properties:

<div class="table-wrap">
  -------------------------------------------------------------------------
  Property Type   Description
  -------- ------ ---------------------------------------------------------
  `$select `int[] This property will be used for the list of selections,
  ion`     `      which will be a list of integer values, or one single
                  integer value.
  -------------------------------------------------------------------------

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Value object content examples**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
// Single selection
$value->selection = 1; 

// Multiple selection
$value->selection = array( 1, 4, 5 ); 
```

</div>
</div>
**Constructor**

The `Selection\Value` constructor accepts an array of selected element
identifiers.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Constructor example**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
// Instanciates a selection value with items #1 and #2 selected
$selectionValue = new Selection\Value( array( 1, 2 ) );
```

</div>
</div>
**String representation**

String representation of this Field Type is its list of selections as a
string, concatenated with a comma.

Example:

> `"1,2,24,42"`

**Hash format**

Hash format of this Field Type is the same as Value object’s
**`selection`** property.

<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Example of value in hash format**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
$hash = array( 1, 2 );
```

</div>
</div>
**Validation**

This Field Type validates the input, verifying if all selected options
exist in the field definition and checks if multiple selections are
allowed in the Field definition.\
If any of these validations fail, a `ValidationError`  is thrown,
specifying the error message, and for the case of the option validation
a list with the invalid options is also presented.

**Settings**

------------------------------------------------------------------------

<div class="table-wrap">
  -------------------------------------------------------------------------
  Name        Type      Default    Description
                        value      
  ----------- --------- ---------- ----------------------------------------
  `isMultiple `boolean` `false`    Used to allow or deny multiple selection
  `                                from the option list.

  `options`   `hash`    `array()`  Stores the list of options defined in
                                   the field definition.
  -------------------------------------------------------------------------

</div>
<div class="code panel pdl" style="border-width: 1px;">
<div class="codeHeader panelHeader pdl"
style="border-bottom-width: 1px;">
**Selection Field Type example settings**

</div>
<div class="codeContent panelContent pdl">
``` {.sourceCode .brush:}
use eZ\Publish\Core\FieldType\Selection\Type;

$settings = array(
    "isMultiple" => true,
    "options" => array(1 => 'One', 2 => 'Two', 3 => 'Three')
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

