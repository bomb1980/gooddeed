<?php

namespace App\Http\Livewire\RegisterForm\Parent;

use App\Models\OoapTblEmployee;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddComponent extends Component
{
    public $std_school_id;
    public $std_code;
    public $email;
    public $password1;
    public $password2;

    public $title_th;
    public $fname_th;
    public $lname_th;
    public $sex;
    public $relationship;
    public $phone;

    public $checkpassword;
    public $check_readed;

    public function submit()
    {
        $this->password1 == $this->password2
            ? ($this->checkpassword = 'pass')
            : ($this->checkpassword = '');

        $this->check_readed == true
            ? ($this->check_readed = true)
            : ($this->check_readed = '');

        $this->validate(
            [
                'std_school_id' => 'required',
                'std_code' => 'required|exists:ooap_tbl_employees,std_code|',
                'email' => 'required|unique:ooap_tbl_employees,emp_citizen_id|email',
                'password1' => 'required',
                'password2' => 'required',
                'check_readed' => 'required',
                'checkpassword' => 'required',
                'title_th' => 'required',
                'fname_th' => 'required',
                'lname_th' => 'required',
                'sex' => 'required',
                'relationship' => 'required',
                'phone' => 'required',
                'check_readed' => 'required',

                // 'std_school_id' => 'required|unique:ooap_mas_acttype,name',
            ],
            [
                'std_school_id.required' => 'กรุณาเลือก โรงเรียน',
                'std_code.required' => 'กรุณากรอก รหัส ID นักเรียนของท่าน',
                'std_code.exists' => 'ไม่มี รหัส ID นักเรียนของท่านในระบบ',
                'email.required' => 'กรุณากรอก อีเมล์',
                'email.unique' => 'มีอีเมล์นี้ในระบบแล้ว',
                'email.email' => 'กรุณาระบุในรูปแบบอีเมล์',
                'password1.required' => 'กรุณากรอก รหัสผ่าน',
                'password2.required' => 'กรุณากรอก ยืนยันรหัสผ่าน',
                'checkpassword.required' => 'รหัสผ่านไม่ตรงกัน',
                'title_th.required' => 'กรุณาระบุ คำนำหน้าชื่อ',
                'fname_th.required' => 'กรุณากรอก ชื่อ',
                'lname_th.required' => 'กรุณากรอก นามสกุล',
                'sex.required' => 'กรุณาระบุ เพศ',
                'relationship.required' => 'กรุณากรอก ความสัมพันธ์',
                'phone.required' => 'กรุณากรอก เบอร์โทร',
                //     'name.required' => 'กรุณากรอก เลือกโรงเรียน',
            ]
        );
        $OoapTblEmployee = OoapTblEmployee::create([
            'emp_citizen_id' => $this->email, //req random
            // 'email' => $this->email,
            'emp_type' => 2, //1: student , 2: parent, 3 teacher

            'std_school_id' => $this->std_school_id,
            'std_code' => $this->std_code,
            'password' => Hash::make($this->password2),

            'title_th' => $this->title_th,
            'fname_th' => $this->fname_th,
            'lname_th' => $this->lname_th,
            'sex' => $this->sex,
            'relationship' => $this->relationship,
            'phone' => $this->phone,
            // 'remember_token' => csrf_token(),
            // 'created_by' => auth()->user()->emp_citizen_id,
            'created_at' => now(),
        ]);
        // dd($OoapTblEmployee);
        return redirect('/loginForm/parent')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function render()
    {
        return view('livewire.register-form.parent.add-component');
    }
}
