# ISBN Field Type

This Field Type represents an ISBN string.

| Name   | Internal name | Expected input type |
|--------|---------------|---------------------|
| `ISBN` | `ezisbn`      | `string`            |

## Description

This Field Type makes it possible to store and retrieve an ISBN string in either an ISBN-10 or ISBN-13 format.

## PHP API Field Type 

### Value object

##### Properties

The Value class of this Field Type contains the following properties:

| Property | Type     | Description                                     |
|----------|----------|-------------------------------------------------|
| `$isbn`  | `string` | This property will be used for the ISBN string. |

##### String representation

An ISBN's string representation is the the $isbn property's value, as a string.

##### Constructor

The constructor for this value object will initialize a new Value object with the value provided. It accepts a string as argument and will set it to the `isbn` attribute.

### Validation

The input passed into this Field Type is subject of ISBN validation depending on the Field settings in its FieldDefinition stored in the Content Type. An example of this Field setting is shown below and will control if input is validated as ISBN-13 or ISBN-10:

```
Array
(
    [isISBN13] => true
)
```

 

For more details on the Value object for this Field Type please refer to the [auto-generated documentation](http://apidoc.ez.no/doxygen/trunk/NS/html/classeZ_1_1Publish_1_1Core_1_1FieldType_1_1ISBN_1_1Value.html) *(todo: update link when available, see [here](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/Core/FieldType/ISBN/Value.php)* *for the value object and its doc in the mean time)*.

 

 


