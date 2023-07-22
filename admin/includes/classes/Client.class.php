<?php 


class Client{


    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns =[
        'id',
        'first_name',
        'last_name',
        'mobile_phone',
        'hashed_password',
        'email',
        'adresse',
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
        $sql = "SELECT * FROM client ORDER by id DESC";
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
        $sql = "SELECT * FROM client ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }

    static public function find_pro(){
        $sql = "SELECT * FROM client ";
        $sql .="WHERE type=0";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return $object_array;
        }else{
            return false;
        }
    }

    static public function find_particulier(){
        $sql = "SELECT * FROM client ";
        $sql .="WHERE type=1";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return $object_array;
        }else{
            return false;
        }
    }
    
    public function create(){
        $attributes = $this->sanitized_attributes();//mna9yiin

        $sql = "INSERT INTO client(";
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
        $this->set_hashed_password();
        
        


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
        $sql = "DELETE FROM client WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM client WHERE first_name LIKE ";
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

        $sql = "UPDATE client SET ";
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
        $sql = "select*from client";
        $result = self::$database->query($sql);
        $row = $result->num_rows;
        $result->free();

        return $row;
    }
    
    // static public function rows_pro()
    // {
    //     $sql = "select*from client where type=0";
    //     $result = self::$database->query($sql);
    //     $row = $result->num_rows;
    //     $result->free();

    //     return $row;
    // }

    // static public function rows_part()
    // {
    //     $sql = "select*from client where type=1";
    //     $result = self::$database->query($sql);
    //     $row = $result->num_rows;
    //     $result->free();

    //     return $row;
    // }

    static public function check_email($email)
    {
        $sql = "select*from client where email='".$email."'";
        $object_array = self::find_by_sql($sql);
        if(!empty($object_array)){
            return $object_array;
        }else{
            return false;
        }
    }

    static public function find_by_phone($phone){
        $sql = "SELECT * FROM client ";
        $sql .="WHERE mobile_phone='". self::$database->escape_string($phone) ."'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }


    /////// end record code////////////////////////////

    public $id; 
    public $first_name;
    public $last_name; 
    public $mobile_phone;
    public $hashed_password;
    public $password;
    public $email; 
    public $adresse; 
    public $creation_date;
    public $id_ad;
    
    public $errors = [];
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->mobile_phone = $args['mobile_phone'] ?? '';
        $this->hashed_password = $args['hashed_password'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->adresse = $args['adresse'] ?? '';
        $this->creation_date = $args['creation_date'] ?? 1;
        $this->id_ad = $args['id_ad'] ?? '';

    }

    
    public function set_hashed_password(){
        $this->hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function verify_password($password){
        return password_verify($password, $this->hashed_password);
    }

    public function hash_password(){
       
        $validation = $this->validate();
       if(empty($validation)){
        $this->set_hashed_password();
        
        return $this->create();
       }else{
         return $validation;
       }
     
    }

    public function save(){
        $validation = $this->validate();
        if(empty($validation)){
            $this->set_hashed_password();
            
            return $this->create();
        }else{
            return $validation;
        }
     
    }

    protected function validate(){
        $this->errors = [];
        //nom client
        if(is_blank($this->first_name)) {
            $this->errors[] = "nom du client ne doit pas être vide.";
        }elseif(!has_length($this->first_name, array('min' => 4, 'max' => 255))) {
            $this->errors[] = "nom du client doit avoir au moins 4 caractéres! ";
        }elseif(ctype_alpha(str_replace([' ', '', '-'],'', $this->first_name)) === false){
            $this->errors[] = "nom du client doit avoir seulement des caractère alphabetique! ";
        }
        //prenom client
        if(is_blank($this->last_name)) {
            $this->errors[] = "prenom du client ne doit pas être vide.";
        }elseif(!has_length($this->last_name, array('min' => 4, 'max' => 255))) {
            $this->errors[] = "prenom du client doit avoir au moins 4 caractéres! ";
        }elseif(ctype_alpha(str_replace([' ', '', '-'],'', $this->last_name)) === false){
            $this->errors[] = "prenom du client doit avoir seulement des caractère alphabetique! ";
        }
        //adresse client
        if(is_blank($this->adresse)) {
            $this->errors[] = "adresse du client ne doit pas être vide.";
        }
        //email client
        if(is_blank($this->email)) {
            $this->errors[] = "email du client ne doit pas être vide.";
        }elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->errors[] = "email du client non valide.";
        }elseif($this->check_email($this->email)){
            $this->errors[] = "email exist deja.";
        }
        //numero
        if(is_blank($this->mobile_phone)) {
            $this->errors[] = "numero telephone du client ne doit pas être vide.";
        }elseif(!has_length($this->mobile_phone, array('min' => 10, 'max' => 13))){
            $this->errors[] = "numero telephone du client  doit avoir au moin 10 nombre! .";   
        }elseif (preg_match('/[a-z]/', $this->mobile_phone)) {
            $this->errors[] = "numero telephone du client doit avoir seulement des caractère numerique ";
        }
        if(is_blank($this->password)) {
        $this->errors[] = "le mot de passe ne doit pas être vide!";
        } elseif (!has_length($this->password, array('min' => 8))) {
        $this->errors[] = "le mot de passe doit contenir au moins 8 caractéres ou plus!";
        } 
    
        // if(is_blank($this->confirm_password)) {
        // $this->errors[] = "la confirmation du mot de passe ne doit pas être vide!";
        // } elseif ($this->password !== $this->confirm_password) {
        // $this->errors[] = "le mot de passe et ne correspond pas avec le champ de confirmation !";
        // }
    
          return $this->errors;
    }
    
    

    

};


?>