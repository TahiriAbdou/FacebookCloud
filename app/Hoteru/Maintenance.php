<?php 
namespace Hoteru;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model{

	protected $table = 'maintenance_logs';

	protected $fillable = ['body']; 

}