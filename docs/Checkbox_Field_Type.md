# Checkbox Field Type

This field type represents a Checkbox status, checked or unchecked.

| Name       | Internal name | Expected input type |
|------------|---------------|---------------------|
| `Checkbox` | `ezboolean`   | `boolean`           |

## Description

The Checkbox Field Type stores the current status for a checkbox input, checked of unchecked, by storing a boolean value.

## PHP API Field Type 

### Value object

##### Properties

The Value class of this Field Type contains the following properties:

| Property | Type      | Default value | Description                                                                                       |
|----------|-----------|---------------|---------------------------------------------------------------------------------------------------|
| `$bool`  | `boolean` | `false`       | This property will be used for the checkbox status, which will be represented by a boolean value. |

**Value object content examples**

```
use eZ\Publish\Core\FieldType\Checkbox\Type;
 
// Instantiates a checkbox value with a default state (false)
$checkboxValue = new Checkbox\Value();
 
// Checked
$value->bool = true; 
 
// Unchecked
$value->bool = false;
```

##### Constructor

The `Checkbox\Value` constructor accepts a boolean value:

**Constructor example**

```
use eZ\Publish\Core\FieldType\Checkbox\Type;
 
// Instantiates a checkbox value with a checked state
$checkboxValue = new Checkbox\Value( true );
```

##### String representation

As this Field Type is not a string but a bool, it will return "1" (true) or "0" (false) in cases where it is cast to string.

 

 


