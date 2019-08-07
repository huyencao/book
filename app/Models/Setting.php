<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable =  ['site_name', 'site_logo', 'site_favicon', 'site_address', 'site_phone', 'site_hotline', 'site_company', 'site_email', 'description', 'user_id', 'meta_desciption', 'meta_keyword', 'site_office', 'site_coppyright', 'codemaps', 'google_analytics', 'email_info'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
