# Null Field Type

This Field Type is used as fallback and for testing purposes.

| Name   | Internal name | Expected input type |
|--------|---------------|---------------------|
| `Null` | `variable`    | `mixed`             |

## Description

As integration with Legacy Stack requires that all Field Types are also also handled on 5.x stack side, Null Field Type is provided as a dummy for legacy Field Types that are not really implemented on 5.x side.

Null Field Type will accept anything provided as a value, but will not store anything to the database, nor will it read any data from the database.

This Field Type does not have its own fixed internal name. Its identifier is instead configured as needed by passing it as an argument to the constructor.

Following example shows how Null Field Type is used to configure dummy implementations for `ezcomcomments` and `ezpaex` legacy datatypes:

**Null Fieldtype example configuration**

```
parameters:
    ezpublish.fieldType.eznull.class: eZ\Publish\Core\FieldType\Null\Type

services:
    ezpublish.fieldType.ezcomcomments:
        class: %ezpublish.fieldType.eznull.class%
        parent: ezpublish.fieldType
        arguments: [ "ezcomcomments" ]
        tags:
            - {name: ezpublish.fieldType, alias: ezcomcomments}
    ezpublish.fieldType.ezpaex:
        class: %ezpublish.fieldType.eznull.class%
        parent: ezpublish.fieldType
        arguments: [ "ezpaex" ]
        tags:
            - {name: ezpublish.fieldType, alias: ezpaex}
```

 


