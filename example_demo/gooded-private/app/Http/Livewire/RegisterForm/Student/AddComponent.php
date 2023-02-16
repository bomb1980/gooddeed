<?php

namespace App\Http\Livewire\RegisterForm\Student;

use App\Models\OoapTblEmployee;
use App\Models\TestModel;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddComponent extends Component
{
    public $std_school_id;
    public $std_school_type_id;
    public $std_grade;
    public $std_code;
    public $email;
    public $password1;
    public $password2;
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
                'std_school_type_id' => 'required',
                'std_grade' => 'required',
                'std_code' => 'required',
                'email' => 'required|unique:ooap_tbl_employees,emp_citizen_id|email:rfc,dns',
                'password1' => 'required',
                'password2' => 'required',
                'checkpassword' => 'required',
                'check_readed' => 'required',
            ],
            [
                'std_school_id.required' => 'กรุณาเลือก โรงเรียน',
                'std_school_type_id.required' => 'กรุณาเลือก ระดับชั้นเรียน',
                'std_grade.required' => 'กรุณาเลือก ปี',
                'std_code.required' => 'กรุณากรอก รหัสประจำตัวนักเรียน',
                'email.unique' => 'มีอีเมล์นี้ในระบบแล้ว',
                'email.required' => 'กรุณากรอก อีเมล์',
                'email.email' => 'กรุณาระบุในรูปแบบอีเมล์',
                'password1.required' => 'กรุณากรอก รหัสผ่าน',
                'password2.required' => 'กรุณากรอก ยืนยันรหัสผ่าน',
                'checkpassword.required' => 'หรัสผ่านไม่ตรงกัน',
            ]
        );
        // dd($this);
        $OoapTblEmployee = OoapTblEmployee::create([
            'emp_citizen_id' => $this->email,
            'emp_type' => 1,
            'std_school_id' => $this->std_school_id,
            'std_school_type_id' => $this->std_school_type_id,
            'std_grade' => $this->std_grade,
            'std_code' => $this->std_code,
            'password' => Hash::make($this->password2),
            // 'remember_token' => csrf_token(),
            // 'created_by' => auth()->user()->emp_citizen_id,
            'created_at' => now(),
        ]);

        // dd($OoapTblEmployee);
        return redirect('/loginForm/student')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function mount()
    {
        // dd($this);
    }

    public function render()
    {
        return view('livewire.register-form.student.add-component');
    }
}
