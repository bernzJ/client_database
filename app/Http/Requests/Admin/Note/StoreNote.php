<?php

namespace App\Http\Requests\Admin\Note;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreNote extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.note.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'customer' => ['required'],
            'company_culture' => ['nullable', 'string'],
            'strategic_goals' => ['nullable', 'string'],
            'compliance' => ['nullable', 'string'],

        ];
    }

    public function getCustomerId()
    {
        if ($this->has('customer')) {
            return $this->get('customer')['id'];
        }
        return null;
    }
    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
