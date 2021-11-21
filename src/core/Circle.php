<?php
class Circle extends Shape {
    public const TYPE = 3;
    
    /**
     * Circle radius
     */
    protected int $radius;
    
    /**
     * Constructor
     */
    public function __construct(int $radius = 0){
        $this->radius = $radius;
        parent::__construct();
    }
    
    /**
     * Get area
     * @return area of the shape
     */
    public function getArea() {
        $result = pow($this->radius,2) * M_PI;
        return round($result, 2);
    }

    /**
     * Get object full information
     * @return array with object properties
     */
    public function toArray() {
        return array(['name'=> $this->name 
                    , 'radius'=> $this->radius
                    , 'id' => $this->getId()]);
    }

}
