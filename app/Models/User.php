<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'foto',
    ];

    public function save_image_kapster($file) {
        
    // $realname = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)); realname
        $md5Name = Str::slug(md5_file($file->getRealPath())); // convert to md5 name
        
        $extension = $file->getClientOriginalExtension();
        $new_name =  $md5Name. "-" . time() . "." . $extension;
        $file->move(public_path('assets/img/kapster'), $new_name);
                
        return $new_name;
    }

    public function delete_image_kapster($path,$file) {
        return File::delete($path.$file);
    }

}
