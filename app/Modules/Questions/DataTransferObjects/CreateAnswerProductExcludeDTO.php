<?php

namespace App\Modules\Questions\DataTransferObjects;

use App\Modules\Common\Exceptions\ValidationException;
use App\Modules\Common\Traits\ToArray;
use App\Modules\Questions\Entities\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateAnswerProductExcludeDTO
{
    use ToArray;

    public readonly int $product_id;

    /**
     * @throws ValidationException
     */
    public function __construct(Request $request, public readonly Answer $answer)
    {
        $payload = $this->getValidated($request);
        $this->product_id = $payload['product_id'];
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
            'product_id' => ['required', 'integer',' exists:products,id'],
        ]);
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toArray());
        }
        return $payload;
    }
}
