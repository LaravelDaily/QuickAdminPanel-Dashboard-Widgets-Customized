<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ExpenseCategory
 *
 * @package App
 * @property string $name
*/
class ExpenseCategory extends Model
{
    protected $fillable = ['name'];
    protected $hidden = [];
    
    
    
}
