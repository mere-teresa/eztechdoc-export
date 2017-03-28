# Architecture: An Open Source PHP CMS Built On Symfony2 Full Stack

This page describes the new generation eZ CMS architecture introduced as of eZ Platform and eZ Studio in 2015. However, this architecture has already been battle-tested by large multinational companies as part of eZ Publish Platform 5.x series since 2012.

# Overview

TODO: Illustration of layers: Symfony &gt; eZ Platform &gt; eZ Services

## Symfony Full stack

## eZ Platform

# eZ Platform Architecture details

  

![](attachments/31429707/31431654.png){width="600"}

The architecture is layered and uses clearly defined APIs between the layers.

-   The business logic is defined in a new kernel. This business logic is exposed to applications via an API (the Public API). Developers rely on this to develop websites and web applications using Symfony to organize the way they develop the user interface layer.

-   User interfaces are developed using the Twig template engine but directly querying the Public API.

-   Integration of eZ Platform in other applications is done using the  Rest API, which itself relies also on the Public API.

-   Finally, the development of extensions for eZ Platform is done using the Symfony framework when it comes to the structure of the code, and once again relying on the Public API when it comes to accessing content management functions.

At a lower level, the new architecture also totally redefined the way the system stores data. While this is not finalized in version 5.0 (where the new storage system is only shipped with MySQL support), the architecture, when finalized will rely on a storage API that will be used to develop drivers to any kind of storage subsystem.

A motto for this new architecture is to heavily use APIs that will be maintained on the long term to ease upgrades and provide lossless couplings between all parts of the architecture, at the same time improving the migration capabilities of the system.

 

 

#### In this topic:

-   [Overview](#Architecture:AnOpenSourcePHPCMSBuiltOnSymfony2FullStack-Overview)
    -   [Symfony Full stack](#Architecture:AnOpenSourcePHPCMSBuiltOnSymfony2FullStack-SymfonyFullstack)
    -   [eZ Platform](#Architecture:AnOpenSourcePHPCMSBuiltOnSymfony2FullStack-eZPlatform)
-   [eZ Platform Architecture details](#Architecture:AnOpenSourcePHPCMSBuiltOnSymfony2FullStack-eZPlatformArchitecturedetails)

## Attachments:

![](images/icons/bullet_blue.gif){width="8" height="8"} [ez5-architecture 5.4.5.png](attachments/31429707/31431654.png) (image/png)

