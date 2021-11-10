<?php
include __DIR__ . '/../utils/ObjectWatcher.php';
/**
 * Shape clas
 */
class Shape {

    public const TYPE = 1;
   
    /**
    * Name of the shape
    */
    public string $name;

    /**
     * width of the shape
     */
    protected int $width;
    
    /**
     * length of the shape
     */
    protected int $length;

    /**
     * unique id of the shape
     */
    private string $id;

    /**
     * Constructor
     * @param $width
     * @param $length
     */
    public function __construct(int $width = 0, int $length = 0){
        $this->width = $width;
        $this->length = $length;
        $this->name = get_called_class();
        //generate id
        $this->id = spl_object_hash($this);
        //add generated id to the watcher
        ObjectWatcher::add($this);

        
    }     

    /**
     * Getter
     * @return 'object id
     */
    public function getId(){
        
        return $this->id;
    }

    /**
     * Setter
     * @param @id - object id
     */
    public function setId(string $id){
        if(!ObjectWatcher::exists($id)){
            $this->id = $id;
        } else {
            echo "Object with id: $id already exists. </br>";
        }
        
    }
    /**
     * Get area
     * @return area of the shape
     */
    public function getArea() {
        return $this->width * $this->length;
    }

    /**
     * Get object full information
     * @return array with object properties
     */
    public function toArray() {
        return array(['name'=> $this->name 
                    , 'width'=> $this->width
                    , 'length'=> $this->length
                    , 'id' => $this->id]);
    }

}