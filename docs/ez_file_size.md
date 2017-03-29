# ez\_file\_size

#### Description

`ez_file_size()` is a Twig helper (Twig filter) which is mostly a byte calculator. It will convert a number from byte to the correct suffix (from B to EB). The output pattern will also vary with the current language of the site access (e.g. choosing between coma or point pattern).

It returns a string.

The byte factor is 1000 instead of 1024 to be more familiar for users.

#### Prototype and Arguments

** **integer **number\_of\_bytes**|ez\_file\_size( integer **number\_of\_decimal** )

| Argument name       | Type      | Description                                      |
|---------------------|-----------|--------------------------------------------------|
| number\_of\_bytes   | `integer` | The number in byte we want to convert            |
| `number_of_decimal` | `integer` | The number of decimal we want our output to have |

#### Usage

```
{{ 42698273|ez_file_size( 3 ) }} //Output with french site access : 42,698 MB

{{ 42698273|ez_file_size( 4 ) }} //Output with english site access : 42.6983 MB
```

 


