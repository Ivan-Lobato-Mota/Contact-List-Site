<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_data';


    protected $primaryKey = 'us_id';
    public $incrementing = false;
    protected $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'us_name',
        'us_email',
        'us_password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'us_password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
    /**
     * Disable default timestamp handling.
     *
     * @var bool
     */
    public $timestamps = false;

        /**
     * Set the created at timestamp.
     *
     * @var string
     */
    const CREATED_AT = 'us_creationdate';

    /**
     * Set the updated at timestamp.
     *
     * @var string
     */
    const UPDATED_AT = 'us_lastupdate';


    public function getAuthPassword()
    {
        return $this->us_password;
    }

     /**
     * Automatically set the creation and update timestamps.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{self::CREATED_AT} = $model->{self::CREATED_AT} ?? Carbon::now();
            $model->{self::UPDATED_AT} = $model->{self::UPDATED_AT} ?? Carbon::now();
        });

        static::updating(function ($model) {
            $model->{self::UPDATED_AT} = Carbon::now();
        });
    }
}
