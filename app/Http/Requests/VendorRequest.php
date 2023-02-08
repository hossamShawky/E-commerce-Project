<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name'=>'required|string|min:5|max:100',
            'email'=>'required|email|unique:vendors,email,'.$this->id,
            'mobile'=>'required|string|max:100|unique:vendors,mobile,'.$this->id,
            'address'=>'required|string|min:15|max:450',
            'logo'=>'required_without:id|mimes:jpg,jpeg,png',
            'category_id'=>'required|exists:main_categories,id',
            'password'=>'required_without:id',
            ];
    }
    public function messages()
    {
        return [
            'required'=>' هذا الحقل مطلوب',
            'string'=>' هذا الحقل يجب ان يكون حروفا او حروفا وارقاما',
            'name.min'=>'أسم المتجر يجب الأ يقل عن   5 أحرف ',
            'address.min'=>'عنوان المتجر يجب الأ يقل عن  15 أحرف ',
            'name.max'=>'أسم المتجر يجب الأ يزيد عن   100  حرف ',
            'address.max'=>'عنوان المتجر يجب الأ يزيد عن  450  حرف ',
            'mobile.max'=>'هاتف المتجر يجب الأ يزيد عن  450  حرف ',
            'category_id.exists'=>'هذا القسم  غير موجود  ',
            'logo.mimes'=>'يجب ان يكون امتداد الصوره [jpg,jpeg,png] ',
            'logo.required_without'=>'الصورة مطلوبه اثناء انشاء المتجر',
            'mobile.unique'=>'هذا الهاتف  مستخدم من قبل ',
            'email.unique'=>'هذا البريد الاكتروني   مستخدم من قبل ',
            'email.email'=>'صيغه البريد الاكتروني  غير صحيحه ',
            'password.min'=>'الرقم السري لايجب ان يقل عن 6 احرف  و  ارقام',
        ];
    }
}
