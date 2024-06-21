<?php

namespace App\Modules\Questions\Entities;

use App\Modules\Products\Entities\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property Question $question
 * @property Question $nextQuestion
 * @property int $id
 * @property string $statement
 * @property int $order
 * @property Product[] $products
 */
class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'statement',
        'question_id',
        'next_question_id',
        'order'
    ];

    /**
     * Returns the question associated with this Answer.
     * @return BelongsTo
     */
    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Returns the next question should be displayed if this answer is chosen.
     * @return BelongsTo
     */
    public function nextQuestion(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'next_question_id', 'id');
    }

    /**
     * Returns the recommended products for this answer.
     * @return BelongsToMany
     */
    public function productsToInclude(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('exclude')->having('pivot_exclude', '=', false);
    }

    /**
     * Return the products excluded for this answer.
     * @return BelongsToMany
     */
    public function productsToExclude(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('exclude')->having('pivot_exclude', '=', true);
    }
}
