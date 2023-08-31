<?php 

class Piece{


    /////// active record code
    static protected $database;
    
    static function set_database($database){
        self::$database = $database;
    }

    static protected $db_columns =[

        'id',
        'quantity',
        'purchase_price',
        'sale_price',
        'reference',
        'creation_date',
        'id_admin',
        'id_mark',
        'id_name'
       
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

    static public function find_names(){
        $sql = "SELECT name FROM piece_name";
       return self::find_by_sql($sql);
    }

    static public function find_all(){
        $sql = "SELECT c.name AS category_name, photo ,pn.name AS piece_name, p.*
        FROM piece p
        JOIN piece_name pn ON p.id_name = pn.id
        JOIN category c ON pn.id_categorie = c.id ORDER by id DESC";
       return self::find_by_sql($sql);
    }
    static public function find_by_status(){
        $sql = "SELECT * FROM piece where status=1";
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
static public function find_by_id_mod_ref($id)
{
    $sql = "SELECT
    mk.name AS mark_name,
    pn.name AS piece_name,                                      
    p.reference AS piece_reference,
    pn.photo AS photo,
    p.sale_price AS sale_price,
    pn.id AS id_name,
    m.name AS model_name,
    mo.name AS moteur_name,
    mo.puissance AS puissance,
    mo.id AS moteur_id
FROM
    compatible c
JOIN
    piece p ON c.id_piece = p.id
JOIN
    piece_name pn ON p.id_name = pn.id
JOIN
    moteur mo ON c.id_moteur = mo.id
JOIN
    voiture v ON v.id_moteur = mo.id
JOIN
    model m ON v.id_model = m.id
JOIN
    mark mk ON m.id_mark = mk.id
WHERE
    p.id = '{$id}'";
    $object_array= self::find_by_sql($sql);
    if(!empty($object_array)){
        return $object_array;
    }else{
        return false;
    }
}



    
    static public function find_by_id($id){
        $sql = "SELECT c.name AS category_name, photo, pn.name AS piece_name, p.* ";
        $sql .= "FROM piece p ";
        $sql .= "JOIN piece_name pn ON p.id_name = pn.id ";
        $sql .= "JOIN category c ON pn.id_categorie = c.id ";
        $sql .= "WHERE p.id='". self::$database->escape_string($id) ."' ";
        $sql .= "ORDER by p.id DESC";
        $object_array = self::find_by_sql($sql);
        if (!empty($object_array)) {
            return array_shift($object_array);
        } else {
            return false;
        }
    }
    



    // static public function delete_from_cart($id){
    //     if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
    //         $key = array_search($id, $_SESSION['cart']);
    //         if($key !== false){
    //             unset($_SESSION['cart'][$key]);
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    static public function delete_from_cart($id){
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
            $key = array_search($id, $_SESSION['cart']);
            if($key !== false){
                unset($_SESSION['cart'][$key]);
                return $_SESSION['cart']; // Return the updated cart
            }
        }
        return false;
    }
    
    static public function check_name_mark_ref($id_name,$id_mark,$reference)
    {
        $sql = "select*from piece where id_name='".$id_name."'  and id_mark ='".$id_mark."' and reference = '".$reference."'";
        $object_array = self::find_by_sql($sql);
        if(!empty($object_array)){
            return $object_array;
        }else{
            return false;
        }
    }
    


    public function create(){
        $attributes = $this->sanitized_attributes();//mna9yiin

        $sql = "INSERT INTO piece(";
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
        }var_dump($attributes);
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
        $sql = "DELETE FROM piece WHERE id =";
        $sql .= "'" . $id ."';";
        
        $result = self::$database->query($sql);
        if($result){
           return $result;
        }else{
         echo var_dump(self::$database->error_list);
        }

    }

    static public function find_by_name($string){
        $sql = "SELECT * FROM piece WHERE name LIKE ";
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
        $sql = "SELECT name FROM piece_name ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $piece_name= self::find_by_sql($sql);
        //var_dump(array_shift($piece_name));exit;
        if(!empty($piece_name)){
            return array_shift($piece_name);
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

        $sql = "UPDATE piece SET ";
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
        $sql = "select * from piece";
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
    static public function category_name($id)
    {
        $sql = "SELECT name FROM category ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        //var_dump($sql);exit;
        $category= self::find_by_sql($sql);
        //var_export(array_shift($category));exit;
        if(!empty($category)){
            return array_shift($category);
        }else{
            return false;
        }
    }
    /////// end record code////////////////////////////
    public $puissance;
    public $piece_reference;
    public $model_name;
    public $mark_name;
    public $moteur_name;
    public $quantity;
    public $photo;
    public $category_name;
    public $purchase_price;
    public $sale_price;
    public $id_name;
    public $piece_name;
    public $id_categorie;
    public $id; 
    public $name;
    public $reference;
    public $creation_date;
    public $id_admin;
    public $id_mark;
    public $errors = [];
    
    public function __construct($args=[])
    {
        $this->id = $args['id'] ?? '';
        $this->piece_name = $args['piece_name'] ?? '';
        $this->id_name = $args['id_name'] ?? '';
        $this->creation_date = date('Y-m-d H:m:s');;
        $this->id_admin = 1;
        $this->category_name = $args['category_name'] ?? '';
        $this->reference = $args['reference'] ?? '';
        $this->id_mark = $args['id_mark'] ?? '';
        $this->id_categorie = $args['id_categorie'] ?? '';
        $this->purchase_price = $args['purchase_price'] ?? '';
        $this->sale_price = $args['sale_price'] ?? '';
        $this->quantity = $args['quantity'] ?? '';
     
    }
    protected function validate(){
        $this->errors = [];
        //nom piece
        if(is_blank($this->id_name)) {
            $this->errors[] = "choisie nom de piece.";
        }
        //mark
        if(is_blank($this->id_mark)) {
            $this->errors[] = "choisie la marque de piece.";
        }
                //mark
        if(is_blank($this->reference)) {
            $this->errors[] = "choisie la reference de piece.";
        }
        //quantity
        if(is_blank($this->quantity)) {
            $this->errors[] = "quantity ne doit pas etre vide.";
        }
        //purchase price
        if(is_blank($this->purchase_price)) {
            $this->errors[] = "prix d'achat ne doit pas etre vide.";
        }
        //sale_price
        if(is_blank($this->sale_price)) {
            $this->errors[] = "prix d'vent ne doit pas etre vide.";
        }
            //check all
    if ($this->check_name_mark_ref($this->id_name,$this->id_mark,$this->reference )) {
        $this->errors[] = "Piece avec mem nom et reference et marque existe déjà.";
    }


          return $this->errors;
    }
    
    

    

};


?>