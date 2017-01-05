# Fairly Unique Url Key - Magento Module

## Overview

Since Magento EE 1.13 the url key attribute of a product must be unique across all store views. This module makes it unique only in the same store view, so that the same product in another store view can have the same url key.

E.g.:

I have many websites and store views:
- de_de
- de_it
- de_en
- uk_de
- uk_it
- uk_en
- it_de
- it_it
- it_en

I have the product "Pink Unicorn" that is salable on all these store views. I want to set for all these store views these url keys:

| Store View | Url key       |
| ---------- | ------------- |
| Default     | pink-unicorn |
| de_de       | rosa-einhorn |
| de_it       | unicorno-rosa |
| de_en       | Use default (pink-unicorn) |
| uk_de       | rosa-einhorn |
| uk_it       | unicorno-rosa |
| uk_en       | Use default (pink-unicorn) |
| it_de       | rosa-einhorn |
| it_it       | unicorno-rosa |
| it_en       | Use default (pink-unicorn) |

To achieve this setup I must manually set the url key to "rosa-einhorn" on `de_de`,`uk_de`,`it_de` and to "unicorno-rosa" on `de_it`,`uk_it`,`it_it`.

Magento >EE 1.13 would block me as soon as I'll be trying to set "rosa-einhorn" on the second store view, saying that "Product with the 'rosa-einhorn' url_key attribute already exists.".

With this module installed, it doesn't happen and you can set all your url keys smoothly.

## Requirements

Magento EE 1.13-1.14

On CE it shouldn't be needed as the uniqueness of the url key value has been introduced in EE 1.13.

## Installation

### Composer

In your `composer.json`, in the section `repositories`, add this repository:

    {
        "type": "vcs",
        "url": "git://github.com/eataly/magento-fairly-unique-url-key.git"
    }

Then open a terminal in the folder containing the `composer.json` and run:

    composer require eataly/fairly-unique-url-key:1.0.0

### Modman

Go in your project root folder and run

    git submodule add git://github.com/eataly/magento-fairly-unique-url-key.git .modman/Eataly_FairlyUniqueUrlKey
    modman deploy Eataly_FairlyUniqueUrlKey

Clean the cache

### Manually

* Download latest version [here](https://github.com/eataly/magento-fairly-unique-url-key/archive/master.zip)
* Unzip in Magento root folder
* Clean the cache
