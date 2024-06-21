<?php

use App\Modules\Questions\Http\Controllers\AnswerController;
use App\Modules\Questions\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

// prefix: /api/v1/questions/{question}/answers

Route::post('/{answer}', [AnswerController::class, 'register'])->name('Answers.register');
Route::patch('/{answer}', [AnswerController::class, 'update'])->name('Answers.update');
Route::post('/', [AnswerController::class, 'create'])->name('Answers.create');
Route::delete('/{answer}', [AnswerController::class, 'delete'])->name('Answers.delete');
Route::post('/{answer}/include', [AnswerController::class, 'addProductToInclude'])->name('Answers.addProductToInclude');
Route::post('/{answer}/exclude', [AnswerController::class, 'addProductToExclude'])->name('Answers.addProductToExclude');
