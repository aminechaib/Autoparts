<?php 

class piece_name {

    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns = [
        'id',
        'name',
        'photo',
        'creation_date',
        'id_admin',
        'id_categorie'       
    ];

    static public function find_by_sql($sql)
    {
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

    static public function categorie_name($id)
    {
        $sql = "SELECT name FROM category ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $category= self::find_by_sql($sql);
        //var_dump(array_shift($category));exit;
        if(!empty($category)){
            return array_shift($category);
        }else{
            return false;
        }
    }

        static public function find_all_names(){
        $sql = "SELECT * FROM piece_name ORDER by id DESC";
       return self::find_by_sql($sql);
    }


    
    static public function find_all()
    {
        $sql = "SELECT c.name AS category_name, pn.name AS piece_name, p.*
        FROM piece_name p
        JOIN piece_name pn ON p.id_name = pn.id
        JOIN category c ON pn.id_categorie = c.id ORDER by id DESC";
       return self::find_by_sql($sql);
    }

    static public function find_by_status()
    {
        $sql = "SELECT * FROM piece_name where status=1";
       return self::find_by_sql($sql);
    }

    static protected function instantiate($record)
    {
        $object = new self;
        foreach ($record as $property => $value) {
            if(property_exists($object, $property)){
                $object->$property = $value;
            }
        }
        return $object;
    } 

    static public function find_by_id($id)
    {
        $sql = "SELECT * FROM piece_name ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }

    public function create()
    {
        $attributes = $this->sanitized_attributes();//mna9yiin
        var_dump($attributes);
        $sql = "INSERT INTO piece_name(";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes) );
        $sql .= "');";

       // echo $sql . "<br>";
            
       $result = self::$database->query($sql);

       if($result){
           $this->id = self::$database->insert_id;
       }else{
        // echo var_dump(self::$database->error_list);
       }
       return $result;
    }

    public function check_validation()
    {
        $validation = $this->validate();
        if(empty($validation)){
                return $this->create();
        }else{
            return $validation;
        }     
    }
        
    public function attributes()
    {
        $attributes = [];
        foreach (self::$db_columns as $column) {
            if($column == 'id'){ continue;};
           $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    protected function sanitized_attributes()
    {
        //hadi la fonction pour éviter SQL injection be fonction wessmha escapestring jaya fe 
        //objet ta3 base de données
        $sanitized = [];
        
        foreach ($this->attributes() as $key => $value) {   
            $sanitized[$key] = self::$database->escape_string($value);
        }
        
        return $sanitized;
    } 

    static public function delete($id)
    {
        $sql = "DELETE FROM piece_name WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string)
    {
        $sql = "SELECT * FROM piece_name WHERE name LIKE ";
        $sql .= "'" . self::$database->escape_string($string) ."%'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return $object_array;
        }else{
            return false;
        }

    }
    
    static public function piece_name($id)
    {
        $sql = "SELECT name FROM piece_name_name ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $piece_name= self::find_by_sql($sql);
        //var_dump(array_shift($piece_name));exit;
        if(!empty($piece_name)){
            return array_shift($piece_name);
        }else{
            return false;
        }
    }

    public function update()
    {
        $attributes = $this->sanitized_attributes();
        $attributes_pairs = [];
        foreach ($attributes as $key => $value) {
            
            $attributes_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE piece_name SET ";
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

    /////// end record code////////////////////////////
    public $id;
    public $name;
    public $photo;
    public $creation_date;
    public $id_admin;
    public $id_categorie;

    public $errors = [];
    
    public function __construct($args = [])
    {
        //var_dump($args);exit;
        $this->creation_date = date('Y-m-d H:m:s');;
        $this->id_admin = 1;
        $this->id_categorie = $args['id_categorie'] ?? '';
        $this->photo = $args['photo'] ?? '';
        $this->name = $args['name'] ?? '';
    }

    protected function validate(){
        $this->errors = [];
        //nom piece
        // if(is_blank($this->id_name)) {
        //     $this->errors[] = "nom du piece ne doit pas être vide.";
        // }elseif(!has_length($this->id_name, array('min' => 4, 'max' => 255))) {
        //     $this->errors[] = "nom du piece doit avoir au moins 4 caractéres! ";  }
          return $this->errors;
    }

};


?>