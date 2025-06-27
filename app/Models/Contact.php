<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'surname',
        'email',
        'phone',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city',
        'county',
        'post_code',
        'country',
        'company',
        'job_title',
        'notes',
        'is_favorite',
        'is_blocked',
        'is_subscribed',
        'birthdate',
        'source',
        'source_details',
        'profile_picture',
        'social_media_links',
    ];

}
