Instructions
========================

1) Download composer to install the deps
----------------------------------
Inside the project root folder run the following command:

    curl -s http://getcomposer.org/installer | php

2) Install the deps
----------------------------------

    php composer.phar update

3) Build the database
----------------------------------

    php app/console doctrine:database:create

4) Update the schemas
----------------------------------

    php app/console doctrine:schema:update --force

5) Run the application
----------------------------------

Inside the root folder, run the following command:

    php app/console server:run

This will create a PHP Server for development purposes, you can check the website entering on your favorite browser the following address:

    http://localhost:8000

(If you're behind a proxy, make secure you have the localhost added to the exception list)
