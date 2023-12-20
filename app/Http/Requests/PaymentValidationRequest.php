<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentValidationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => 'required|numeric',
            'billToFirstName' => 'required|string|max:255',
            'billToLastName' => 'required|string|max:255',
            'billToCountry' => 'required|alpha|max:2',
            'billToTelephone' => 'required|string|max:255',
            'billToEmail' => 'required|email|max:255',
            // 'orderNumber' => 'required|string|max:255',
            'adults' => 'required|integer',
            'children' => 'required|integer',
            'schedule_id' => 'required|integer|exists:horarios,id',
            'date' => 'required|date_format:Y-m-d',
            'tour_id' => 'required|integer|exists:tours,id'
        ];
    }
}
