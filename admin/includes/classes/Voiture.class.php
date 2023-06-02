<?php

class Voiture{
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
        $sql = "SELECT p.name AS nom_piece, p.reference, m.name AS nom_moteur, model.name AS model_name, mark.name AS mark_name FROM piece p JOIN compatible c ON p.id = c.id_piece JOIN moteur m ON c.id_moteur = m.id JOIN voiture v ON m.id = v.id_moteur JOIN model ON v.id_model = model.id JOIN mark ON model.id_mark = mark.id";
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
        $sql = "SELECT * FROM voiture ";
        $sql .="WHERE id='". self::$database->escape_string($id) ."'";
        $object_array= self::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }


    static public function model_name($id)
    {
        
        $sql = "SELECT * FROM model ";
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
    


    /////// end record code////////////////////////////
    
    public $id;

    public $id_model;
    public $id_moteur;
    public $creation_date;
    public $id_ad;
    public $errors = [];
    
    public function __construct($args=[])
    {

        $this->id_moteur = $args['id_moteur'] ?? '';
        $this->id_model = $args['id_model'] ?? '';
        $this->creation_date = $args['creation_date'] ?? '';
        $this->id_ad = 1;
    }

    protected function validate(){
        $this->errors = [];
        //nom compatible

        if(is_blank($this->id_moteur)) {
            $this->errors[] = "moteur du compatible ne doit pas être vide.";
        }
        if(is_blank($this->id_model)) {
            $this->errors[] = "piece du compatible ne doit pas être vide.";
        }
          return $this->errors;
    }
};


?>
