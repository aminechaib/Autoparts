<?php 


class Order{
    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns = [
        'id',
        'id_ad',
        'id_client',
        'status',
        'is_deleted',
        'creation_date'
       
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
        $sql = "SELECT
        c.first_name,
        c.last_name,
        c.adresse,
        c.mobile_phone,
        o.id,
        o.status,
        o.is_deleted,
        o.id_ad,
        o.creation_date
    FROM
        client c
    JOIN
        `order` o ON c.id = o.id_client ORDER BY o.creation_date DESC;
    ";
       return self::find_by_sql($sql);
    }
    static public function find_by_status(){
        $sql = "SELECT * FROM order where status=1";
       return self::find_by_sql($sql);
    }



    static public function find_order_by_id_client($id){
        $sql = "SELECT `id`, `id_ad`, `id_client`,`is_deleted`, `status`, `creation_date` FROM `order`
    ";
        $sql .="WHERE is_deleted='no' AND id_client='". self::$database->escape_string($id) ."'";
        
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
        $sql = "SELECT * FROM `order` ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $object_array= self::find_by_sql($sql);
        // var_dump($object_array);exit;
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }

    static public function find_by_id_or($id) {
        $sql = "SELECT * FROM `order` ";
        $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
        $result = self::$database->query($sql);
        $data = array(); // Store the fetched data

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row; // Add each fetched row to the data array
            }
        }

        return $data; // Return the fetched data
    }

    // ... (other methods)

    
    public function create()
    {
        $attributes = $this->sanitized_attributes();//mna9yiin

        $sql = "INSERT INTO `order` (";
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

    public function save(){
        return $this->create();
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
        $sql = "DELETE FROM `order` WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM `order` WHERE name LIKE ";
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

        $sql = "UPDATE `order` SET ";
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
        $sql = "select * from `order`";
        $result = self::$database->query($sql);
        $row = $result->num_rows;
        $result->free();
        return $row;
    }

    /////// end record code////////////////////////////

    public $status;
    public $id;
    public $first_name;
    public $last_name;
    public $adresse;
    public $mobile_phone;
    public $creation_date;
    public $id_ad;
    public $is_deleted;
    public $id_client;
    public $errors = [];
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->creation_date = date('Y-m-d H:m:s');
        $this->id_ad = 1;
        $this->id_client = $_SESSION['client']->id ?? '';
        $this->status = 'PENDING';
        $this->is_deleted = 'no';
    }
    protected function validate(){
        $this->errors = [];
        //nom order
        if(is_blank($this->status)) {
            $this->errors[] = "nom du order ne doit pas être vide.";
        }elseif(!has_length($this->status, array('min' => 1, 'max' => 255))) {
            $this->errors[] = "nom du order doit avoir au moins 4 caractéres! ";  }
          return $this->errors;
    }
    
    

    

};


?>