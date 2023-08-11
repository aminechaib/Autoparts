<?php 
class Model{


    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns =[
        'id',
        'name',
        'creation_date',
        'id_ad',
        'id_mark'
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
        $sql = "SELECT * FROM model ORDER by id DESC";
       return self::find_by_sql($sql);
    }


    static protected function instantiate($record){
        $object = new self;
        foreach ($record as $property => $value) {
            if(property_exists($object, $property)){
                $object->$property = $value;
            }
        }
        return $object;
    }
    // 


    
    static public function find_by_id($id){
        $sql = "SELECT * FROM model ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }
    
    public function create(){
        $attributes = $this->sanitized_attributes();//mna9yiin

        $sql = "INSERT INTO model(";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes) );
        $sql .= "');";

       // echo $sql . "<br>";
            
        $result = self::$database-> query($sql);

        if($result){
            $this->id = self::$database->insert_id;
        }else{
         // echo var_dump(self::$database->error_list);
        }
        return $result;
    }

    public function check_validation(){
        $validation = $this->validate();
       if(empty($validation)){
               
        return $this->create();
       }else{
         return $validation;
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

    static public function delete($id){
        $sql = "DELETE FROM model WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM model WHERE name LIKE ";
        $sql .= "'" . self::$database->escape_string($string) ."%'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return $object_array;
        }else{
            return false;
        }

    }

    public function update(){
        $attributes = $this->sanitized_attributes();
        $attributes_pairs = [];
        foreach ($attributes as $key => $value) {
            
            $attributes_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE model SET ";
        $sql .= join(', ', $attributes_pairs);
        $sql .= " WHERE id='". self::$database->escape_string($this->id)."' ";
        $sql .= "LIMIT 1";
        echo $sql . "<br>";
        $result = self::$database->query($sql);

        if($result){
            $this->id = self::$database->insert_id;
        }else{
         echo var_dump(self::$database->error_list);
        }
        return $result;
        
    }
    public function merge_attributes($args=[]){

        foreach ($args as $key => $value) {
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }
    
    static public function rows_tot()
    {
        $sql = "select * from model";
        $result = self::$database->query($sql);
        $row = $result->num_rows;
        $result->free();

        return $row;
    }

    static public function mark_name($id)
    {
        $sql = "SELECT name FROM mark ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $mark= self::find_by_sql($sql);
        //var_dump(array_shift($mark));exit;
        if(!empty($mark)){
            return array_shift($mark);
        }else{
            return false;
        }
    }

    static function find_Models_by_mark_id($id)
    {
        $sql = "SELECT * FROM model ";
        $sql .="WHERE id_mark='". self::$database->escape_string($id) ."'";
        $models= self::find_by_sql($sql);
        //var_dump(array_shift($models));exit;
        if(!empty($models)){
            //var_dump($models);
            return $models;
        }else{
            return false;
        }
    }
   
    
    
    // static public function rows_pro()
    // {
    //     $sql = "select*from model where type=0";
    //     $result = self::$database->query($sql);
    //     $row = $result->num_rows;
    //     $result->free();

    //     return $row;
    // }

    // static public function rows_part()
    // {
    //     $sql = "select*from model where type=1";
    //     $result = self::$database->query($sql);
    //     $row = $result->num_rows;
    //     $result->free();

    //     return $row;
    // }

    

    /////// end record code////////////////////////////

    public $id; 
    public $name;
    public $creation_date;
    public $id_ad;
    public $id_mark;
   
    
    public $errors = [];
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->creation_date = date('Y-m-d H:m:s');;
        $this->id_ad = 1;
        $this->id_mark = $args['id_mark'] ?? '';

    }
    protected function validate(){
        $this->errors = [];
        //nom model
        if(is_blank($this->name)) {
            $this->errors[] = "nom du model ne doit pas être vide.";
        }elseif(!has_length($this->name, array('min' => 1, 'max' => 255))) {
            $this->errors[] = "nom du model doit avoir au moins 1 caractéres! ";  }
            if(empty($this->id_mark)) {
                $this->errors[] = "choisis une mark";}
          return $this->errors;
    }
    
    

    

};


?>