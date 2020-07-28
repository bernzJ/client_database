<?php

namespace App\Http\Requests\Admin\Stakeholder;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreStakeholder extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.stakeholder.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'role' => ['nullable', 'string'],
            'name' => ['required', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'phone' => ['nullable', 'string'],
            'contact_method_id' => ['required', 'integer'],
            'timezone' => ['required'],
            'customer' => ['required'],

        ];
    }

    public function getCustomerId()
    {
        if ($this->has('customer')) {
            return $this->get('customer')['id'];
        }
        return null;
    }

    public function getTimezoneId()
    {
        if ($this->has('timezone')) {
            return $this->get('timezone')['id'];
        }
        return null;
    }

    public function getContactMethodId()
    {
        if ($this->has('contact_method')) {
            return $this->get('contact_method')['id'];
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
