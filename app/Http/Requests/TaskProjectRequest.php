<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TaskProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(Request $request): array
    {
        if($request -> get('assign') == "Assign")
        {
            return [
                'task_id' => ['required'],
                'tag_id' => ['required'],
            ];
        }
        else if($request -> get('create') == "Create")
        {
            return [
                'name' => ['required','string'],
                'description' => ['required','string'],
                'project_id' => ['required'],
            ];
        }

    }
}
