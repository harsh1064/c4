<?php
namespace App\Models;
use CodeIgniter\Model;


class User extends Model {

 protected $table = 'user';
 protected $allowedFields = ['fname','lname','email','password','pic'];
//  protected $fields = ['fname','lname','email','password'];


}


?>