# REST API Countries list

Countries list is a REST service that gives access to an [ISO-3166](http://en.wikipedia.org/wiki/ISO_3166) formatted list of world countries. It is useful when presenting a country options list from any application.

## Get the list of countries

To send a GET request to the REST API Countries list, you have to provide the Content Type header `application/vnd.ez.api.CountriesList+xml`.

**Countries list request**

```
Resource: /api/ezp/v2/services/countries
Method: GET
Content-Type: application/vnd.ez.api.CountriesList+xml
```

See the [General REST usage documentation page](General_REST_usage) for further information.

### Usage example

 

**Countries list request**

```
GET /api/ezp/v2/services/countries 
Host: example.com 
Accept: application/vnd.ez.api.CountriesList+xml
```

 

The HTTP response will it be with a 200 OK Header.

**Countries list response headers**

```
HTTP/1.1 200 
Content-Type: application/vnd.ez.api.CountriesList+xml
```

 

And the body of the Response is XML formatted country list with names and codes according to the ISO-3166 standard. 

ISO-3166

The **country codes** can be represented either as a two-letter code (alpha-2) which is recommended as the general purpose code, a three-letter code (alpha-3) which is more closely related to the country name and a three digit numeric code (numeric-3) which can be useful if you need to avoid using Latin script.

See [the ISO-3166 glossary](http://www.iso.org/iso/home/standards/country_codes/country_codes_glossary.htm) for more information.
 

**Body XML Response**

```
<CountriesList>
  <Country id="AF">
    <name>Afghanistan</name
    <alpha2>AF</alpha2>
    <alpha3>AFG</alpha3>
    <idc>93</idc>
  </Country>
  <Country id="AX">
    <name>Åland</name
    <alpha2>AX</alpha2>
    <alpha3>ALA</alpha3>
    <idc>358</idc>
  </Country>
  ...
</CountriesList>
```

 

 

#### In this topic:

-   [Get the list of countries](#RESTAPICountrieslist-Getthelistofcountries)
    -   [Usage example](#RESTAPICountrieslist-Usageexample)


