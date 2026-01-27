<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Géré par le middleware admin
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'category' => ['required', 'in:declaration,rapport,publication,guide,autre'],
            'language' => ['required', 'in:fr,en'],
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
            'order' => ['nullable', 'integer', 'min:0'],
        ];


        // Validation du fichier uniquement lors de la création ou si un nouveau fichier est uploadé
        if ($this->isMethod('post') || $this->hasFile('file')) {
            $rules['file'] = [
                'required',
                'file',
                'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,txt,zip',
                'max:10240', // 10MB max
            ];
        }


        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
            'category.required' => 'La catégorie est obligatoire.',
            'category.in' => 'La catégorie sélectionnée n\'est pas valide.',
            'language.required' => 'La langue est obligatoire.',
            'language.in' => 'La langue sélectionnée n\'est pas valide.',
            'file.required' => 'Le fichier est obligatoire.',
            'file.file' => 'Le fichier uploadé n\'est pas valide.',
            'file.mimes' => 'Le fichier doit être de type: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT ou ZIP.',
            'file.max' => 'Le fichier ne peut pas dépasser 10 MB.',
        ];
    }
}
