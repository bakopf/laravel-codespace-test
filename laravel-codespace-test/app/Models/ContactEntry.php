<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactEntry extends Model
{
    protected $table = 'contact_entries';
    protected $fillable = ['first_name', 'last_name', 'email', 'subject', 'message', 'privacy_policy'];
}
