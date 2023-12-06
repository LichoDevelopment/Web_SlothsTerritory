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
        info('rules');
        // print reques
        info($this->request->all());
        return [
            // 'redirect' => 'required|url',
            'amount' => 'required|numeric',
            // 'currency' => 'required|in:USD',
            'billToFirstName' => 'required|string|max:255',
            'billToLastName' => 'required|string|max:255',
            'billToAddress' => 'required|string|max:255',
            'billToAddress2' => 'nullable|string|max:255',
            'billToCity' => 'required|string|max:255',
            'billToState' => 'required|string|max:4',
            'billToZipPostCode' => 'required|string|max:255',
            'billToCountry' => 'required|alpha|max:2',
            'billToTelephone' => 'required|string|max:255',
            'billToEmail' => 'required|email|max:255',
            // 'orderNumber' => 'required|string|max:255',
            // 'capture' => 'required|in:0,1',
            // 'subscription' => 'required|in:0,1',
            // 'platform' => 'required|string|max:255',
            'adults' => 'required|integer',
            'children' => 'required|integer',
            'schedule_id' => 'required|integer|exists:horarios,id',
            'date' => 'required|date_format:Y-m-d',
            'tour_id' => 'required|integer|exists:tours,id'
        ];
    }
}
