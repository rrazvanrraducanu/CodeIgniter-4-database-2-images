<?php

namespace App\Models;
use CodeIgniter\Model;

class FlowerModel extends Model {
 
    protected $table= 'images';
    protected $primaryKey ='id';
    protected $allowedFields=['id','title','image'];
    
}