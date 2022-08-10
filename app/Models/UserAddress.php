<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'street',
        'city',
        'province',
        'country',
        'postal_code',
    ];

    /**
     * Define Table Relationship, One User_address only belongs to One User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Current Full Address String
     *
     * @return string Full Address String
     */
    public function full_address()
    {
        $full_address = $this->street . ', ' . $this->city . ', ' . $this->province . ', ' . $this->country;
        return $full_address;
    }

    /**
     * Get the Current Postal Code
     *
     * @return string Postal Code String
     */
    public function user_postal_code()
    {
        $postal_code = $this->postal_code;
        return $postal_code;
    }

    /**
     * Get the Current Province
     *
     * @return string Postal Code String
     */
    public function user_province()
    {
        return $this->province;
    }

    /**
     * Get the Current Province
     *
     * @return string Postal Code String
     */
    public function user_country()
    {
        return $this->country;
    }

    /**
     * Return true if this is User default address
     *
     * @return boolean
     */
    public function is_default_address()
    {
        $user_default_address_id = User::find($this->user_id)->default_address_id;
        if ($this->id == $user_default_address_id) {
            return true;
        } else {
            return false;
        }
    }
}
