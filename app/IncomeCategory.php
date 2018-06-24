<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IncomeCategory
 *
 * @package App
 * @property string $name
*/
class IncomeCategory extends Model
{
    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    
}
