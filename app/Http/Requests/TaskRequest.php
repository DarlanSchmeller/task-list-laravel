<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'detailed_description' => 'required|string|max:525',
            'assignee' => 'required|string|max:255',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:to do,in progress,completed',
            'type' => 'required|in:software, cooking,home,shopping,exercise,study,meeting,finance,travel,health,gardening,cleaning,entertainment',

            'checklists' => 'nullable|array',
            'checklists.*' => 'nullable|string|max:255',
        ];
    }
}
