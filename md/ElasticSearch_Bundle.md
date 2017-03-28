# ElasticSearch Bundle

EXPERIMENTAL

ElasticSearch exists only as a technology preview, we welcome people to try it and help make it better. The latest version is only available in "dev-master" version of eZ Platform, and not in any version of eZ Publish Platform 5.x.

Given it is experimental, it is currently not professionally supported

 

## How to use ElasticSearch Search engine

### Step 1: Enabling Bundle

First, activate the Elasticsearch Search Engine Bundle (eZ\\Bundle\\EzPublishElasticsearchSearchEngineBundle\\EzPublishElasticsearchSearchEngineBundle) in your `app/AppKernel.php` class file.

### Step 2: Configuring Bundle

Then configure your search engine in config.yml

Example:

 

**config.yml**

```
ez_search_engine_elasticsearch:
    default_connection: es_connection_name
    connections:
        es_connection_name:
            server: http://localhost:9200
            index_name: ezpublish
            document_type_name:
                content: content
                location: location
```

 

For further information on the ElasticSearch integration in eZ Platform, find the default [configuration](https://github.com/ezsystems/ezpublish-kernel/blob/master/eZ/Publish/Core/Search/Elasticsearch/Content/Resources/elasticsearch.yml) and [mappings](https://github.com/ezsystems/ezpublish-kernel/tree/master/eZ/Publish/Core/Search/Elasticsearch/Content/Resources/mappings) for Content and Location type documents *(Note: Content/Location modeling will most likely be simplified in the future, like in the Solr search engine bundle)*.

 

### Step 3: Configuring repository

The following is an example of configuring the ElasticSearch Search Engine, where the connection name is same as in example above, and engine is set to be  `elasticsearch`:

 

 

**ezplatform.yml**

```
ezpublish:
    repositories:
        main:
            storage:
                engine: legacy
                connection: default
            search:
                engine: elasticsearch
                connection: es_connection_name
```

 

### Step 4: Run CLI indexing command

Last step is to execute initial indexation of data:

```
php app/console ezplatform:elasticsearch_create_index
```

 

 

#### In this topic:

-   [How to use ElasticSearch Search engine](#ElasticSearchBundle-HowtouseElasticSearchSearchengine)
    -   [Step 1: Enabling Bundle](#ElasticSearchBundle-Step1:EnablingBundle)
    -   [Step 2: Configuring Bundle](#ElasticSearchBundle-Step2:ConfiguringBundle)
    -   [Step 3: Configuring repository](#ElasticSearchBundle-Step3:Configuringrepository)
    -   [Step 4: Run CLI indexing command](#ElasticSearchBundle-Step4:RunCLIindexingcommand)


