<?php 

class Marque{
  
    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns = [
       'id',
       'name',
       'id_ad'
    ];
    
    static public function find_by_sql($sql){
        $result = self::$database->query($sql);
        if(!$result){
            exit("erreur de requête.");
        };
        // convert result into object
        
        $object_array = [];
        
        
        while($record = $result->fetch_assoc()){
            $object_array [] = self::instantiate($record);
        };
       
       
        $result->free();

        return $object_array;
    }

    static public function find_all(){
        $sql = "SELECT * FROM marque";
       return self::find_by_sql($sql);
    }

    static protected function instantiate($record){
        $object = new self;
        //
        foreach ($record as $property => $value) {
            if(property_exists($object, $property)){
                $object->$property = $value;
            }
        }
        return $object;
    }
    
    static public function find_by_id($id){
        $sql = "SELECT name FROM marque ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $result = self::$database->query($sql);
        $array = $result->fetch_assoc();
        foreach($array as $key => $value)
        {
             return $value;
        }
        //var_dump($array);
    }

   
    public function create(){
        $attributes = $this->sanitized_attributes();//mna9yiin
        //var_dump($attributes);exit;
        $sql = "INSERT INTO marque(";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes) );
        $sql .= "');";

       //echo $sql . "<br>";exit;
           
        $result =   self::$database->query($sql);

        if($result){
            $this->id = self::$database->insert_id;
        }else{
          echo var_dump(self::$database->error_list);
        }
        return $result;
    }

    static public function delete($id){
        $sql = "DELETE FROM marque WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }
        
    public function attributes(){
        $attributes = [];
        foreach (self::$db_columns as $column) {
            if($column == 'id'){ continue;};
           $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    protected function sanitized_attributes(){
        //hadi la fonction pour éviter SQL injection be fonction wessmha escapestring jaya fe 
        //objet ta3 base de données
        $sanitized = [];
        foreach ($this->attributes() as $key => $value) {
            
            $sanitized[$key] = self::$database->escape_string($value);
        }

        return $sanitized;
    } 

    public function merge_attributes($args=[]){

        foreach ($args as $key => $value) {
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    public function check_validation(){
       
        $validation = $this->validate();
       if(empty($validation)){
               
        return $this->create();
       }else{
         return $validation;
       }
     
    }
    

    /////// end record code////////////////////////////

    public $id; 
    public $name;
    public $id_ad;
    public $errors = [];
    public $values = [];

    public function __construct($args=[])
    {
        $this->name = $args['name'] ?? '';
        $this->id_ad = $args['id_ad'] ?? '';
    }

    public function save(){
        //$validation = $this->validate();
        if(empty($validation)){
            $this->set_hashed_password();
            
            return $this->create();
        }else{
            return $validation;
        }
     
    }

    protected function validate(){
        $this->errors = [];
        $this->values = [];

        if(is_blank($this->name)) {
            $this->errors[] = "nom d'utilisateur ne doit pas être vide.";
          } elseif (!has_length($this->name, array('min' => 4, 'max' => 255))) {
            $this->errors[] = "nom d'utilisateur doit avoir au moins 4 caractéres! ";
          }
    }
    

};


?>