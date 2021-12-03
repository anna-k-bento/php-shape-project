# php-shape-project
Sample OOP PHP project
=======================

PHP project with object inheritance.

Structure
----------------

.\src\core
 - Shape.php
 - Rectangle.php - extends Shape.php
 - Circle.php - extends Shape.php

.\src\enum
 - StrategyConstants.php - Enumeration class

.\src\utils
- ObjectWatcher.php - 	controls id generation and ensures there are no duplications. It handles the execution of the selected strategy for id generation. 
- strategy\IStrategy.php - Interface for strategies that implements id generation
- strategy\SplObjectStrategy.php - implements IStrategy.php
- strategy\UniqueIdStrategy.php - implements IStrategy.php

.\css
- main.css - Css files

.\tests
Unit tests for PHP
- ShapeTest.php - tests for area calculation methods
- ShapeExceptionTest.php - tests for exceptions that are thrown when a negative value is used for object creation

.\index.php

Run in Docker
---------------

1. Clone repository https://github.com/anna-k-bento/php-shape-project to selected local folder
2. Make sure you have Docker installed and running
3. Navigate to the selected folder
4. Run
```
docker-compose up
```
5. Open browser and navigate to http://localhost/

PHPUnit tests
---------------

1. Please follow the steps (4) described in "Run in Docker" section.
2. Enter container using command:
```
docker exec -i -t shapesapp-app sh
```
3. To execute all tests run
```
./vendor/bin/phpunit tests
```

Additional feature
----------------
It is possible to redefine the currently used strategy for id generation by setting in index.php:
```
ObjectWatcher::changeStrategy(string $type)
```
where $type should correspond to one of the defined StrategyConstants:
 * ShapeConstants::UNIQUE - generate id using uniqid()
 * ShapeConstants::SPL - generate id using spl_object_hash()
 
In order to add a new strategy:
- create a new class with pretended algorithm and implementing src\utils\strategy\IStrategy.php
- define a new constant in StrategyConstants.php
- add new case in ObjectWatcher::changeStrategy method
