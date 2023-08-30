<?php 


class Moteur{


    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns =[
        'id',
        'name',
        'creation_date',
        'enrgie',
        'puissance',
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
        $sql = "SELECT * FROM moteur ORDER by id DESC";
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
        $sql = "SELECT * FROM moteur ";
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

        $sql = "INSERT INTO moteur(";
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
    static public function check_name_puiss_energie($name,$puissance,$enrgie)
    {
        $sql = "select*from moteur where name='".$name."'  and puissance ='".$puissance."' and enrgie = '".$enrgie."'";
        $object_array = self::find_by_sql($sql);
        if(!empty($object_array)){
            return $object_array;
        }else{
            return false;
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
        $sql = "DELETE FROM moteur WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM moteur WHERE name LIKE ";
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

        $sql = "UPDATE moteur SET ";
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
        $sql = "select*from moteur";
        $result = self::$database->query($sql);
        $row = $result->num_rows;
        $result->free();

        return $row;
    }

    static function find_Motors_by_model_id($id)
    {
        $sql = "SELECT m.*
        FROM moteur m
        JOIN voiture v ON v.id_moteur = m.id
        JOIN model mo ON mo.id = v.id_model ";
        $sql .="WHERE mo.id='". self::$database->escape_string($id) ."'";
        $motors= self::find_by_sql($sql);
        //var_dump(array_shift($motors));exit;
        if(!empty($motors)){
            //var_dump($motors);
            return $motors;
        }else{
            return false;
        }
    }
    
    // static public function rows_pro()
    // {
    //     $sql = "select*from moteur where type=0";
    //     $result = self::$database->query($sql);
    //     $row = $result->num_rows;
    //     $result->free();

    //     return $row;
    // }

    // static public function rows_part()
    // {
    //     $sql = "select*from moteur where type=1";
    //     $result = self::$database->query($sql);
    //     $row = $result->num_rows;
    //     $result->free();

    //     return $row;
    // }

    

    /////// end record code////////////////////////////

    public $id; 
    public $name;
    public $enrgie;
    public $puissance;
    public $creation_date;
    public $id_ad;
    
    
    
    public $errors = [];
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->enrgie = $args['enrgie'] ?? '';
        $this->puissance = $args['puissance'] ?? '';
        $this->creation_date = date('Y-m-d H:m:s');;
        $this->id_ad = $args['id_ad'] ?? '';

    }
    protected function validate(){
        $this->errors = [];
        //nom moteur
        if(is_blank($this->name)) {
            $this->errors[] = "nom du moteur ne doit pas être vide.";
        }elseif(!has_length($this->name, array('min' => 3, 'max' => 255))) {
            $this->errors[] = "nom du moteur doit avoir au moins  caractéres! ";  }
    //energie
    if(is_blank($this->enrgie)) {
        $this->errors[] = "chisie energie de moteur.";
    }
    //puissance
    if(is_blank($this->puissance)) {
        $this->errors[] = "puissance de moteur ne doit pas etre vide.";
    }
    //check all
    if ($this->check_name_puiss_energie($this->name,$this->puissance,$this->enrgie )) {
        $this->errors[] = "Moteur existe déjà.";
    }

    return $this->errors;
  } 
};


?>