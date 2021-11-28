# php-shape-project
Sample OOP PHP project
=======================

Sample project created using object inheritance.

Project structure
---------------

Source files are placed in \src folder.
.src\core - folder contains three classes 
Shape.php
|-> Rectangle.php
|-> Circle.php

The Shape class is a parent for Rectangle and Circle classes.
The Shape class is not abstract, so it is possible to create an instance of this type. 

.src\enum
Enumeration classes.

.src\utils
ObjectWatcher.php - class to control generated id's and other properties, make sure no id duplication occurs.
It handles strategy for ID creation. It is possible to redefine the currently used strategy by setting:
ObjectWatcher::changeStrategy(string $type)
where $type should correspond to one of the defined StrategyConstants.
Currently:
ShapeConstants::UNIQUE - generate id using uniqid()
ShapeConstants::SPL - generate id using spl_object_hash()
To add a new strategy:
	- a new class implementing src\utils\strategy IStrategy should be created with pretended algorithm
- new ShapeConstants should be defined
- new case should be added in ObjectWatcher::changeStrategy method

.src\css
Css files

.\tests
Unit tests for PHP
ShapeTest.php - test of area creation method for Shape, Rectangle, and Circle classes
ShapeExceptionTest.php - test of exceptions when a negative value was used for object creation

Tests
---------------

Clone repository and then run Composer:-

```
composer install
```

Run the unit tests using:-

```
./vendor/bin/phpunit tests
```