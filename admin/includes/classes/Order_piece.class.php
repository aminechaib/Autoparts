<?php 


class Order_piece{
    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns = [
        'id',
        'quantity',
        'sale_price',
        'creation_date',
        'id_order',
        'id_piece'
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
        $sql = "SELECT * FROM order_piece ORDER by id DESC";
       return self::find_by_sql($sql);
    }
    static public function find_by_status(){
        $sql = "SELECT * FROM order_piece where status=1";
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
        $sql = "SELECT * FROM order_piece ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }


    static public function find_by_id_order($id){
        $sql = "SELECT op.quantity, op.sale_price, pn.name, o.status, o.id AS order_id
        FROM order_piece op
        JOIN piece p ON op.id_piece = p.id
        JOIN piece_name pn ON p.id_name = pn.id
        JOIN `order` o ON op.id_order = o.id ";
        $sql .="WHERE id_order='". self::$database->escape_string($id) ."'";
        $result = self::$database->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_object()) {
           return $row;
          }
        }         
    }

    
    public function create()
    {
        $attributes = $this->sanitized_attributes();//mna9yiin
// var_dump($attributes);
        $sql = "INSERT INTO `order_piece` (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes) );
        $sql .= "');";
        // var_dump(self::$database->error_list);
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
        //    var_dump($attributes);
        }
        return $attributes;
    }

    protected function sanitized_attributes(){
        //hadi la fonction pour éviter SQL injection be fonction wessmha escapestring jaya fe 
        //objet ta3 base de données
        $sanitized = [];
        foreach ($this->attributes() as $key => $value) {
            
            $sanitized[$key] = self::$database->escape_string($value);
            //echo"ssssssssssssssailanaz";
            // var_dump($sanitized);
        
          }

        return $sanitized;
    } 

    static public function delete($id){
        $sql = "DELETE FROM order_piece WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         //echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM order_piece WHERE name LIKE ";
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

        $sql = "UPDATE order_piece SET ";
        $sql .= join(', ', $attributes_pairs);
        $sql .= " WHERE id='". self::$database->escape_string($this->id)."' ";
        $sql .= "LIMIT 1";
        echo $sql . "<br>";
        $result = self::$database->query($sql);

        if($result){
            $this->id = self::$database->insert_id;
        }else{
        //  echo var_dump(self::$database->error_list);
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
        $sql = "select * from order_piece";
        $result = self::$database->query($sql);
        $row = $result->num_rows;
        $result->free();

        return $row;
    }

    /////// end record code////////////////////////////
    public $quantity;
    public $id_order;
    public $id;
    public $creation_date;
    public $id_ad;
    public $id_piece;
    public $sale_price;
    public $errors = [];
    
    // public function __construct(int $id_order=null, $args=[])
    // {
    //     // var_dump($args);exit;
    //     $this->id_order = $id_order;
    //     $this->id = $args['id'] ?? '';
    //     $this->creation_date = date('Y-m-d H:m:s');
    //     $this->id_ad = 1;
    //     $this->id_piece = $args['id'];
    //     $this->quantity = $args['quantity'];
    //     $this->sale_price = $args['sale_price'];
        
    // }
    protected function validate(){
        $this->errors = [];
        //nom order_piece
        if(is_blank($this->quantity)) {
            $this->errors[] = "nom du order_piece ne doit pas être vide.";
        }elseif(!has_length($this->quantity, array('min' => 1, 'max' => 255))) {
            $this->errors[] = "nom du order_piece doit avoir au moins 4 caractéres! ";  }
          return $this->errors;
    }
    
    

    

};


?>