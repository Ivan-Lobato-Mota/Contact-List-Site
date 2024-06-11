<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $table = 'contact_data';

    public $fillable = [
    'con_id',
    'con_userid',
    'con_nome',
    'con_doc',
    'con_tel',
    'con_cel',
    'con_endrua',
    'con_endnum',
    'con_endcon',
    'con_endbai',
    'con_endcid',
    'con_enduf',
    'con_endpais',
    'con_endcep',
    'con_poslat',
    'con_poslon'];
}