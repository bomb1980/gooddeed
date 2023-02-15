<?php

namespace App\Http\Livewire\ForgetPassword;

use App\Models\OoapTblEmployee;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ForgetComponent extends Component
{
    public $process = 1; //0 = mail, 2 = otp, 3 = new password
    public $email = "q@2.d";
    public $otp = '123456';
    public $otp_mail;
    public $otp_check;
    public $password1;
    public $password2;
    public $check_password;

    public function sendMail()
    {
        // dd($this);

        // ..code
        $this->validate(
            [
                'email' => 'required|exists:ooap_tbl_employees,email|email',
            ],
            [
                'email.required' => 'กรุณาระบุอีเมล์',
                'email.exists' => 'ไม่มีอีเมล์นี้ในระบบ',
                'email.email' => 'กรุณาระบุในรูปแบบอีเมล์',
            ]
        );

        $this->otp_mail = "123456";

        $this->process = 2;
    }

    public function compareOTP()
    {
        // ..code
        if($this->otp == $this->otp_mail){
            $this->otp_check = true;
        }else{
            $this->otp_check = null;
        }

        $this->validate(
            [
                'otp' => 'required',
                'otp_check' => 'required',
            ],
            [
                'otp.required' => 'กรุณาระบุ OTP',
                'otp_check.required' => 'OTP ไม่ถูกต้อง',
            ]
        );

        $this->process = 3;

    }

    public function resetPassword()
    {
        // dd($this);

        // ..code
        $this->password1 == $this->password2
            ? ($this->check_password = 'pass')
            : ($this->check_password = '');

        $this->validate(
            [
                'password1' => 'required',
                'password2' => 'required',
                'check_password' => 'required',
            ],
            [
                'password1.required' => 'กรุณากรอก รหัสผ่าน',
                'password2.required' => 'กรุณากรอก ยืนยันรหัสผ่าน',
                'check_password.required' => 'หรัสผ่านไม่ตรงกัน',
            ]
        );

        $OoapTblEmployee = OoapTblEmployee::where('email', '=', $this->email)->update([
            'password' => Hash::make($this->password2),
            'updated_at' => now(),
        ]);

        $get = OoapTblEmployee::where('email', '=', $this->email)->first()->emp_type;

        $redirect_to = [1 => 'student', 2 => 'parent', 3 => 'teacher', 4 => 'admin'];

        return redirect("/loginForm/$redirect_to[$get]")->with(
            'success',
            'บันทึกข้อมูลเรียบร้อยแล้ว'
        );
    }

    public function render()
    {
        return view('livewire.forget-password.forget-component');
    }
}
