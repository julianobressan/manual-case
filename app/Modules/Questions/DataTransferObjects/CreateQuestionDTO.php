<?php

namespace App\Modules\Questions\DataTransferObjects;

use App\Modules\Common\Exceptions\ValidationException;
use App\Modules\Common\Traits\ToArray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateQuestionDTO
{
    use ToArray;

    public readonly string $query;

    public readonly string $numbering;

    public readonly array $answers;

    /**
     * @throws ValidationException
     */
    public function __construct(Request $request)
    {
        $payload = $this->getValidated($request);
        $this->query = $payload['query'];
        $this->numbering = $payload['numbering'];
        $this->answers = $payload['answers'];
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
        $validator = Validator::make($payload, [
            'query' => 'required|max:255',
            'numbering' => 'required|unique:questions',
            'answers.*.statement' => 'required|min:1|max:255',
            'answers.*.order' => 'required|integer',
            'answers.*.next_question_id' => ['nullable', 'integer',' exists:questions,id']
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toArray());
        }
        return $payload;
    }
}
