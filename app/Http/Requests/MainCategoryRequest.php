<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainCategoryRequest extends FormRequest
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
           'category'=>"required|array|min:1",
           'category.*'=>'required',
           'category.*.name'=>"required|max:15",
           'category.*.abbr'=>"required|",
           'category.*.active'=>"required|",
           'photo'=>"required_without:id|mimes:jpg,jpeg,png"
        ];
    }

    public function messages()
    {
        return [
            'required'=>' هذا الحقل مطلوب',
            'required_without'=>'الصورة  مطلوبه اثناء انشاء القسم',
            'in'=>'القيم المدخله غير صحيحه',
            'name.string'=>'أسم  يجب أن يكون حروفا',
            'name.max'=>'   أسم القسم يجب الأ يزيد عن  15 أحرف ',
            'photo.mimes'=>'  [jpg,jpeg,png] يجب ان يكون امتداد صورة  ',
        ];
    }
}
