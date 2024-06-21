<?php

namespace App\Modules\Users\Entities;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Modules\Products\Entities\Product;
use App\Modules\Questions\Entities\Answer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property Answer[] $answers
 * @property Product[] $recommendedProducts
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'login',
        'password',
    ];

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
        'password' => 'hashed',
    ];

    /**
     * Returns the recommended products for this user.
     * @return BelongsToMany
     */
    public function recommendedProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Returns the answers of this user.
     * @return BelongsToMany
     */
    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }
}
