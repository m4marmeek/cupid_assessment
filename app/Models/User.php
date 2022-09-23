<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Preference;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'date_of_birth' => 'datetime:Y-m-d',
        'manglik' => 'boolean',
    ];

    public function isDetailsUpdated() {
        $updated = true;

        if($this->date_of_birth == null || $this->gender == null || $this->annual_income == null || $this->occupation == null || $this->family_type = null || $this->manglik == null) {
            $updated = false;
        }
        return $updated;
    }

    public function isAdmin() {
        return $this->email == 'admin@example.com' ? true : false;
    }

    public function fullName() {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function preference() {
        return $this->hasOne(Preference::class);
    }
}
