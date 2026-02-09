<?php 

namespace App\Models;
use App\Core\Model;

class User extends Model{

      protected static string $table = 'users';

      protected ?int $id = null ;
      protected string $username ;
      protected string $email;
      protected ?int $age = null;
      protected string $created_at ;

      public function __get($property)
      {
          try {
              if (property_exists($this, $property)) {
                  return $this->$property;
              }
      
              throw new \Exception(sprintf(
                  "Property %s does not exist on %s",
                  $property,
                  static::class
              ));
          } catch (\Exception $e) {
              die("Getter Error: " . $e->getMessage());
          }
      }


      public function __set($property, $value)
      {
          try {
              if (!property_exists($this, $property)) {
                  throw new \Exception(sprintf(
                      "Property %s does not exist on %s",
                      $property,
                      static::class
                  ));
              }
      
                $this->$property = $value;
          } catch (\Exception $e) {
              die("Setter Error: " . $e->getMessage());
          }
      }
}