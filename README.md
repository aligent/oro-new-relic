OroCommerce Geo Detection Bundle
===============================================

Description
-----------
This bundle adds a message queue extension to tag async queue jobs with a transaction id in New Relic. The transaction 
id used is the processor name of the job being processed.

Installation Instructions
-------------------------
1. Install this module via Composer

        composer require aligent/oro-new-relic

1. Clear cache

        php bin/console cache:clear --env=prod


Support
-------
If you have any issues with this bundle, please feel free to open [GitHub issue](https://github.com/aligent/oro-new-relic/issues) with version and steps to reproduce.

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

Developer
---------
Adam Hall <adam.hall@aligent.com.au>

License
-------
[GPL-3.0](https://opensource.org/licenses/GPL-3.0)

Copyright
---------
(C) 2022 Aligent Consulting
