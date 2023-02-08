<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageRequest extends FormRequest
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
            'name'=>'required|max:15|string',
            'abbr'=>'required|max:3|string',
            'direction'=>'required|in:rtl,ltr',
            'active'=>'required|in:0,1',
        ];
    }
    public function messages()
    {
        return [
            'required'=>' هذا الحقل مطلوب',
            'in'=>'القيم المدخله غير صحيحه',
            'name.string'=>'أسم اللغه يجب أن يكون حروفا',
            'abbr.max'=>'   أختصار اللغه يجب الأ يزيد عن  3 أحرف ',
            'name.max'=>'   أسم اللغه يجب الأ يزيد عن  15 أحرف ',
        ];
    }
}
