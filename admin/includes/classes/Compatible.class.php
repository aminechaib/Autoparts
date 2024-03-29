<?php 


class Compatible{


    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns =[
        'id',
        'id_model',
        'id_moteur',
        'creation_date',
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
        $sql = "SELECT * FROM compatible ORDER by id_model DESC";
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
    
    static public function find_by_id($id){
        $sql = "SELECT * FROM compatible ";
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

        $sql = "INSERT INTO compatible(";
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
        $sql = "DELETE FROM compatible WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM compatible WHERE name LIKE ";
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
        $sql = "UPDATE compatible SET ";
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
        $sql = "select * from compatible";
        $result = self::$database->query($sql);
        $row = $result->num_rows;
        $result->free();

        return $row;
    }

    static public function moteur_name($id)
    {
        
        $sql = "SELECT * FROM moteur ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        //var_dump($sql);exit;
        $moteur= self::find_by_sql($sql);
        //var_export(array_shift($moteur));exit;
        if(!empty($moteur)){
            return array_shift($moteur);
        }else{
            return false;
        }
    }

    static public function model_name($id)
    {
        $sql = "SELECT * FROM model ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        //var_dump($sql);exit;
        $model= self::find_by_sql($sql);
        //var_dump(array_shift($model));exit;
        if(!empty($model)){
            return array_shift($model);
        }else{
            return false;
        }
    }

    /////// end record code////////////////////////////
    
    public $id;
    public $name;
    public $id_model;
    public $id_moteur;
    public $creation_date;
    public $id_ad;
    public $errors = [];
    
    public function __construct($args=[])
    {
        $this->id_model = $args['id_model'] ?? '';
        $this->id_moteur = $args['id_moteur'] ?? '';
        $this->creation_date = $args['creation_date'] ?? '';
        $this->id_ad = 1;
    }

    protected function validate(){
        $this->errors = [];
        //nom compatible
        if(is_blank($this->id_model)) {
            $this->errors[] = "model du compatible ne doit pas être vide.";
        }
        if(is_blank($this->id_moteur)) {
            $this->errors[] = "moteur du compatible ne doit pas être vide.";
        }
          return $this->errors;
    }
};


?>