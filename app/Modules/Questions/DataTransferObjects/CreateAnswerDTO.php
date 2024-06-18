<?php

namespace App\Modules\Questions\DataTransferObjects;

use App\Modules\Common\Exceptions\ValidationException;
use App\Modules\Common\Traits\ToArray;
use App\Modules\Questions\Entities\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateAnswerDTO
{
    use ToArray;

    public readonly string $statement;

    public readonly int $question_id;

    public readonly ?int $next_question_id;

    /**
     * @throws ValidationException
     */
    public function __construct(Request $request, Question $question)
    {
        $this->question_id = $question->id;
        $payload = $this->getValidated($request);
        $this->statement = $payload['statement'];
        $this->next_question_id = $payload['next_question_id'];
    }

    /**
     * @throws ValidationException
     */
    private function getValidated(Request $request): array
    {
        if (!isset($request['payload'])) {
            throw new ValidationException(['Param "payload" was not found in request body.']);
        }
        $payload = $request['payload'];
        $validator = Validator::make([...$payload, 'question_id' => $this->question_id], [
            'statement' => ['required', 'min:5', 'max:255'],
            'question_id' => ['required', 'integer',' exists:questions,id'],
            'next_question_id' => ['nullable', 'integer',' exists:questions,id'],
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toArray());
        }
        return $payload;
    }
}
