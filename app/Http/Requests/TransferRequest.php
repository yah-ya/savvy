<?php

namespace App\Http\Requests;

use App\Rules\ValidateCard;
use Illuminate\Foundation\Http\FormRequest;

class TransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'card' => [new ValidateCard,'required'],
            'destinationCard' => [new ValidateCard,'required'],
            'amount'=>'required|min:1000|max:50000000|numeric'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'card' => convertNumbersToEn($this->input('card')),
            'destinationCard' => convertNumbersToEn($this->input('destinationCard')),
            'amount' => convertNumbersToEn($this->input('amount')),
        ]);
    }

}
