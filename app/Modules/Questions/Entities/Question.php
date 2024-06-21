<?php

namespace App\Modules\Questions\Entities;

use App\Modules\Questions\Tests\Factories\QuestionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @author Juliano Bressan <bressan.rs@gmail.com>
 * @property Answer[] $answers
 * @property int $id
 * @property string $query
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'query',
    ];

    /**
     * Gets the answers for this question.
     * @return HasMany
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
