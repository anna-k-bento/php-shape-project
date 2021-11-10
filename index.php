<?php 
   include 'src/core/Shape.php';
   include 'src/core/Rectangle.php';
   include 'src/core/Circle.php';
   
   // objects area
   $shape1 = new Rectangle(10,20);
   echo "The shape of Type: ".$shape1::TYPE. " with area: " .$shape1->getArea()."</BR>";
   var_dump($shape1->toArray());
   echo "</br></br>";
   
   $shape2 = new Circle(5);
   echo "The shape of Type: ".$shape2::TYPE. " with area: " .$shape2->getArea()."</BR>";
   var_dump($shape2->toArray());
   echo "</br></br>";

   $shape3 = new Rectangle(4,5);
   $shape3->name = "NewRectangle";
   $shape3->setId($shape2->getId());
   $shape3->setId("SomeExampleID123");
   var_dump($shape3);


?>
<html>
  <head>
    <title> PHP SHAPE Class </title>
  </head>

  <body>
    <p></p>

  </body>
</html>