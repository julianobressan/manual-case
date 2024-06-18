<?php

use App\Modules\Questions\Http\Controllers\AnswerController;
use App\Modules\Questions\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

// prefix: /api/v1/questions
Route::get('/', [QuestionController::class, 'getAll'])->name('Questions.getAll');
Route::post('/', [QuestionController::class, 'create'])->name('Questions.create');
Route::get('/{question}', [QuestionController::class, 'get'])->name('Questions.get');
Route::delete('/{question}', [QuestionController::class, 'delete'])->name('Questions.delete');

Route::get('/{question}/answers/{answer}', [AnswerController::class, 'get'])->name('Answers.get');
Route::post('/{question}/answers/', [AnswerController::class, 'create'])->name('Answers.create');
Route::delete('/{question}/answers/{answer}', [AnswerController::class, 'delete'])->name('Answers.delete');
