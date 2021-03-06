1.  <span>[Developer](index.html)</span>
2.  <span>[Documentation](Documentation_31429504.html)</span>
3.  <span>[The Complete Guide to eZ Platform](The-Complete-Guide-to-eZ-Platform_31429526.html)</span>
4.  <span>[Under the Hood: How eZ Platform Works](31429659.html)</span>
5.  <span>[Content Model: Content is King!](31429709.html)</span>
6.  <span>[Content items, Content Types and Fields](31430275.html)</span>
7.  <span>[Field Types reference](Field-Types-reference_31430495.html)</span>

<span id="title-text"> Developer : Checkbox Field Type </span>
==============================================================

Created by <span class="author"> Dominika Kurek</span>, last modified by <span class="editor"> André Rømcke</span> on Jan 04, 2017

This field type represents a Checkbox status, checked or unchecked.

| Name       | Internal name | Expected input type |
|------------|---------------|---------------------|
| `Checkbox` | `ezboolean`   | `boolean`           |

Description
-----------

The Checkbox Field Type stores the current status for a checkbox input, checked of unchecked, by storing a boolean value.

PHP API Field Type 
-------------------

### Value object

##### Properties

The Value class of this Field Type contains the following properties:

| Property | Type      | Default value | Description                                                                                       |
|----------|-----------|---------------|---------------------------------------------------------------------------------------------------|
| `$bool`  | `boolean` | `false`       | This property will be used for the checkbox status, which will be represented by a boolean value. |

**Value object content examples**

``` brush:
use eZ\Publish\Core\FieldType\Checkbox\Type;
 
// Instantiates a checkbox value with a default state (false)
$checkboxValue = new Checkbox\Value();
 
// Checked
$value->bool = true; 
 
// Unchecked
$value->bool = false;
```

##### Constructor

<span>The </span>`Checkbox\Value`<span> constructor accepts a boolean value:</span>

**Constructor example**

``` brush:
use eZ\Publish\Core\FieldType\Checkbox\Type;
 
// Instantiates a checkbox value with a checked state
$checkboxValue = new Checkbox\Value( true );
```

##### String representation

As this Field Type is not a string but a bool, it will return "1" (true) or "0" (false) in cases where it is cast to string.

 

 

Document generated by Confluence on Mar 24, 2017 17:19

[Atlassian](http://www.atlassian.com/)


