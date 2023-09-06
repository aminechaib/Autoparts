<?php 


class Msg_sent{
    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns = [

        'id',
        'msg_cl',
        'msg_ad',
        'id_msg',
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
        o.id_admin,
        o.creation_date
    FROM
        client c
    JOIN
        `msg` o ON c.id = o.id_client msg BY o.creation_date DESC;
    ";
       return self::find_by_sql($sql);
    }
    static public function find_by_status(){
        $sql = "SELECT * FROM msg where status=1";
       return self::find_by_sql($sql);
    }



    static public function find_msg_by_id_client($id){
        $sql = "SELECT `id`, `id_admin`, `id_client`,`is_deleted`, `status`, `creation_date` FROM `msg`
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
        $sql = "SELECT * FROM `msg` ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $object_array= self::find_by_sql($sql);
        // var_dump($object_array);exit;
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }

    static public function find_by_id_cl($id) {
        $sql = "SELECT
        ms.id AS msgsent_id,
        ms.msg_cl,
        ms.msg_ad,
        ms.status,
        ms.is_deleted,
        ms.creation_date AS msgsent_creation_date,
        c.id AS client_id,
        c.first_name AS client_first_name,
        c.last_name AS client_last_name,
        c.mobile_phone AS client_mobile_phone,
        m.id AS msg_id,
        m.id_admin AS msg_admin_id
    FROM
        msgsent ms
    JOIN
        msg m ON ms.id_msg = m.id
    JOIN
        client c ON m.id_client = c.id
    ";
        $sql .= "WHERE c.id='" . self::$database->escape_string($id) . "'";
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

        $sql = "INSERT INTO `msgsent` (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes) );
        $sql .= "');";
     
       echo $sql . "<br>";
    
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
        $sql = "DELETE FROM `msg` WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM `msg` WHERE name LIKE ";
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

        $sql = "UPDATE `msg` SET ";
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
        $sql = "select * from `msg`";
        $result = self::$database->query($sql);
        $row = $result->num_rows;
        $result->free();
        return $row;
    }

    /////// end record code////////////////////////////

    public $id;
    public $msg_cl;
    public $msg_ad;
    public $id_msg;
    public $status;
    public $is_deleted;
    public $creation_date;
    public $errors = [];
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->id_msg =  $args['id_msg'] ?? '';
        $this->msg_cl =  $args['msg_cl'] ?? '';
        $this->msg_ad =  $args['msg_ad'] ?? '';
        $this->status =  'read';
        $this->is_deleted = 'no';
        $this->creation_date = date('Y-m-d H:m:s');
        
  
    }
    protected function validate(){
        $this->errors = [];
        // //nom msg
        // if(is_blank($this->status)) {
        //     $this->errors[] = "nom du msg ne doit pas être vide.";
        // }elseif(!has_length($this->status, array('min' => 1, 'max' => 255))) {
        //     $this->errors[] = "nom du msg doit avoir au moins 4 caractéres! ";  }
          return $this->errors;
    }
    
    

    

};


?>