<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class ShapeExceptionTest extends TestCase
{
    /**
     * Test Shape creation when width < 0
     */
    public function testLessThenZeroShapeWidth() : Void {
        $this->expectException(InvalidArgumentException::class);
        $shape = new Shape(-2,3);
    }

    /**
     * Test Shape creation when length < 0
     */
    public function testLessThenZeroShapeLength() : Void {
        $this->expectException(InvalidArgumentException::class);
        $shape = new Shape(2,-3);
    }

    /**
     * Test Rectangle creation when width < 0
     */
    public function testLessThenZeroRectWidth() : Void {
        $this->expectException(InvalidArgumentException::class);
        $rectangle = new Rectangle(-2,3);
    }

    /**
     * Test Rectangle creation when length < 0
     */
    public function testLessThenZeroRectLength() : Void {
        $this->expectException(InvalidArgumentException::class);
        $rectangle = new Rectangle(2,-3);
    }

    /**
     * Test Circle creation when radius < 0
     */
    public function testLessThenZeroCircleRadius() : Void {
        $this->expectException(InvalidArgumentException::class);
        $circle = new Circle(-3);
    }
}