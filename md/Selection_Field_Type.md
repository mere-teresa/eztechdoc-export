# Selection Field Type

This Field Type represents a single selection or multiple choices from a list of options.

| Name        | Internal name | Expected input type |
|-------------|---------------|---------------------|
| `Selection` | `ezselection` | `mixed`             |

## Description

The Selection Field Type stores single selections or multiple choices from a list of options, by populating a hash with the list of selected values.

## PHP API Field Type

### Input expectations

| Type    | Example         |
|---------|-----------------|
| `array` | `array( 1, 2 )` |

### Value object

##### Properties

The Value class of this Field Type contains the following properties:

| Property     | Type    | Description                                                                                                                 |
|--------------|---------|-----------------------------------------------------------------------------------------------------------------------------|
| `$selection` | `int[]` | This property will be used for the list of selections, which will be a list of integer values, or one single integer value. |

**Value object content examples**

```
// Single selection
$value->selection = 1; 
 
// Multiple selection
$value->selection = array( 1, 4, 5 ); 
```

##### Constructor

The `Selection\Value` constructor accepts an array of selected element identifiers.

**Constructor example**

```
// Instanciates a selection value with items #1 and #2 selected
$selectionValue = new Selection\Value( array( 1, 2 ) );
```

##### String representation

String representation of this Field Type is its list of selections as a string, concatenated with a comma.

Example:

> `"1,2,24,42"`

### Hash format

Hash format of this Field Type is the same as Value object's **`selection`** property.

**Example of value in hash format**

```
$hash = array( 1, 2 );
```

### Validation

This Field Type validates the input, verifying if all selected options exist in the field definition and checks if multiple selections are allowed in the Field definition.
If any of these validations fail, a `ValidationError`  is thrown, specifying the error message, and for the case of the option validation a list with the invalid options is also presented.

### Settings

------------------------------------------------------------------------

| Name         | Type      | Default value | Description                                                    |
|--------------|-----------|---------------|----------------------------------------------------------------|
| `isMultiple` | `boolean` | `false`       | Used to allow or deny multiple selection from the option list. |
| `options`    | `hash`    | `array()`     | Stores the list of options defined in the field definition.    |

**Selection Field Type example settings**

```
use eZ\Publish\Core\FieldType\Selection\Type;
 
$settings = array(
    "isMultiple" => true,
    "options" => array(1 => 'One', 2 => 'Two', 3 => 'Three')
);
```

 


