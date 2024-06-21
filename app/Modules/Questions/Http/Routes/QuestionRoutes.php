<?php

use App\Modules\Questions\Http\Controllers\AnswerController;
use App\Modules\Questions\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

// prefix: /api/v1/questions
Route::get('/', [QuestionController::class, 'getAll'])->name('Questions.getAll');
Route::get('/next', [QuestionController::class, 'getNext'])->name('Questions.getNext');
Route::put('/restart', [QuestionController::class, 'restart'])->name('Questions.restart');
Route::post('/', [QuestionController::class, 'create'])->name('Questions.create');
Route::get('/{question}', [QuestionController::class, 'get'])->name('Questions.get');
Route::delete('/{question}', [QuestionController::class, 'delete'])->name('Questions.delete');
Route::patch('/{question}', [QuestionController::class, 'update'])->name('Questions.update');

Route::prefix('/{question}/answers')->group(base_path('app/Modules/Questions/Http/Routes/AnswersRoutes.php'));
