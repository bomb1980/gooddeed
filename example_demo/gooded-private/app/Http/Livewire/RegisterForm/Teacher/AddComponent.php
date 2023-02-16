<?php

namespace App\Http\Livewire\RegisterForm\Teacher;

use App\Models\OoapTblEmployee;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AddComponent extends Component
{
    public $email;
    public $password1;
    public $password2;

    public $title_th;
    public $fname_th;
    public $lname_th;
    public $sex;
    public $birthday;
    public $age;
    public $std_school_id;
    public $teacher_position;
    public $phone;

    public $checkpassword;
    public $check_readed;

    public function setAge($bithdayDate)
    {
        // dd($bithdayDate);
        $date = new DateTime($bithdayDate);
        $now = new DateTime();
        $interval = $now->diff($date);
        $this->age = $interval->y;
    }

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
                'email' => 'required|unique:ooap_tbl_employees,emp_citizen_id|email:rfc,dns',
                'password1' => 'required',
                'password2' => 'required',
                'checkpassword' => 'required',
                'title_th' => 'required',
                'fname_th' => 'required',
                'lname_th' => 'required',
                'sex' => 'required',
                'birthday' => 'required',
                'age' => 'required',
                'teacher_position' => 'required',
                'phone' => 'required',
                'check_readed' => 'required',
            ],
            [
                'std_school_id.required' => 'กรุณาเลือก โรงเรียน',
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
                'birthday.required' => 'กรุณาระบุ วัน/เดือน/ปี ค.ศ เกิด',
                'teacher_position.required' => 'กรุณาระบุ ตำแหน่งครู',
                'phone.required' => 'กรุณากรอก เบอร์โทร',
            ]
        );

        // dd($this);
        $OoapTblEmployee = OoapTblEmployee::create([
            'emp_citizen_id' => $this->email, //req random
            // 'email' => $this->email,
            'password' => Hash::make($this->password2),

            'title_th' => $this->title_th,
            'fname_th' => $this->fname_th,
            'lname_th' => $this->lname_th,
            'sex' => $this->sex,
            'birthday' => $this->birthday,
            'std_school_id' => $this->std_school_id,
            'teacher_position' => $this->teacher_position,
            'phone' => $this->phone,
            'emp_type' => 3, //1: student , 2: parent, 3 teacher, 4 admin
            // 'remember_token' => csrf_token(),
            // 'created_by' => auth()->user()->emp_citizen_id,
            'created_at' => now(),
        ]);

        // dd($OoapTblEmployee);

        return redirect('/loginForm/teacher')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }

    public function render()
    {
        return view('livewire.register-form.teacher.add-component');
    }
}
