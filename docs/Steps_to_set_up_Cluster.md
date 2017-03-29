# Steps to set up Cluster

To set up Cluster you'll need to:

1.  [Set up DFS Cluster](Clustering_31430387.html#Clustering-DFSIOHandler) which moves binary files to NFS
2.  [Configure Persistence Cache](Repository_31432023.html#Repository-Persistencecacheconfiguration) to use Memcached or experimentally Redis
3.  [Set up Varnish](HTTP-Cache_31430152.html#HTTPCache-UsingVarnish), disable Symfony HTTP Cache and set up cache invalidation to purge Varnish cache
4.  Configure sessions to use a cluster safe sessions handling

It is also highly recommended to set up [Solr Bundle](Solr_Bundle) to be able to get better search, better query performance, be able to scale it, and offload database.

 
