<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ShapeTest extends TestCase
{
    /**
     * Text Circle - getArea
     */
    public function testCircleAreaCaluclation(): void
    {
        $circle = new Circle(2);
        $this->assertSame(
            12.57,
            $circle->getArea()
        );
    }

    /**
     * Text Shape - getArea
     */
    public function testShapeAreaCaluclation(): void
    {
        $shape = new Shape(2,3);
        $this->assertSame(
            6,
            $shape->getArea()
        );
    }

    /**
     * Text Rectangle - getArea
     */
    public function testRectangleAreaCaluclation(): void
    {
        $rect = new Rectangle(2,3);
        $this->assertSame(
            6,
            $rect->getArea()
        );
    }

}