<?php 

 namespace App\Core;
 use PDO;
 use App\Core\Database;

 abstract class Model
 {
    protected static string $table;
    protected static string $primaryKey = 'id';

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    protected static function db() : PDO 
    {
        return Database::getInstance();
    }

    public static function jibKolchi() : array 
    {
            try {
                $query = sprintf("SELECT * FROM %s " , static::$table);
                $sm = static::db()->prepare($query);
                $sm->execute();

                $data = $sm->fetchAll();

                $arrayObj =[];

                foreach($data as $hafna){
                       $obj = new static();
                       foreach ($hafna as $sarot => $lbab){
                             $obj -> $sarot = $lbab ;
                       }
                       $arrayObj[]=$obj;
                }

                return $arrayObj ;

            } catch (\PDOException $e) {
                die("DB Query Error (jibKolchi): " . $e->getMessage());
         }
    }

    public static function jibWa7d($primary) : ?self //4adi ndibagi b static
    {
          try{
            $query = "SELECT * FROM " . static::$table . " WHERE " . static::$primaryKey . " = :primary LIMIT 1";
            $sm = static::db()->prepare($query);
            $sm->execute(['primary' => $primary]);

            $data=$sm->fetch();
            $obj = new static();
            foreach($data as $sarot => $lbab){
                 $obj -> $sarot = $lbab ;
            }

            return $obj;

          }catch(\PDOException $e){
                  die("DB Query Error (jibWa7d): " . $e->getMessage());
          }
        
    }

    public function dakhal() : bool
    {
        try{
            $primaryKey = static::$primaryKey;
            $properties = get_object_vars($this);

            $columns=array_keys($properties);
            $columns=array_filter($columns , fn($col)=>$col !== $primaryKey);

        // INSERT--------------------------------------

            if(empty($this->$primaryKey)){

                $cols=implode(', ',$columns);
                $placeholders = implode(', ',array_map(fn($col)=>":$col",$columns));
               
                $query = sprintf(
                     "INSERT INTO %s (%s) VALUES (%s)",
                     static::$table,
                     $cols,
                     $placeholders
                 );
               
                $sm = static::db()->prepare( $query);
                foreach ($columns as $col) {
                      $sm->bindValue(":$col", $this->$col);
                }

                $success = $sm->execute();

                if ($success) {
                    $this->$primaryKey = static::db()->lastInsertId();
                }
                
                return $success;
                
            }

        //UPDATE ------------------------------------

             $setPart = implode(', ', array_map(
                 fn($col) => "$col = :$col",
                 $columns
             ));
    
             $query = sprintf(
                 "UPDATE %s SET %s WHERE %s = :%s",
                 static::$table,
                 $setPart,
                 $primaryKey,
                 $primaryKey
             );
    
             $sm = static::db()->prepare($query);
    
             foreach ($columns as $col) {
                 $sm->bindValue(":$col", $this->$col);
             }
    
             $sm->bindValue(":$primaryKey", $this->$primaryKey);
    
             return $sm->execute();

        } catch (\PDOException $e) {
           die("Database Error (dakhal): " . $e->getMessage());
        }
       
    }
    
    public function msa7(): bool
    {
        try {
            $primaryKey = static::$primaryKey;
    
            if (empty($this->$primaryKey)) {
                throw new \Exception('Cannot delete a model without primary key.');
            }
    
            $sm = static::db()->prepare(
                "DELETE FROM " . static::$table . " WHERE " . static::$primaryKey . " = :id"
            );
    
            return $sm->execute([
                'id' => $this->$primaryKey
            ]);
    
        } catch (\PDOException $e) {
            die("Database Error (msa7): " . $e->getMessage());
        } catch (\Exception $e) {
            die("Delete Error: " . $e->getMessage());
        }
    }


 }