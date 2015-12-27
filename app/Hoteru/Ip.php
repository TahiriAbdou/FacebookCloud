<?php 
namespace Hoteru;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model{

	protected $tables = 'ips';

	protected $fillable = ['ip']; 

}