<?php

namespace App\Http\Livewire\ForgetPassword;

use App\Mail\OtpResetPasswordMail;
use App\Models\OoapTblEmployee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ForgetComponent extends Component
{
    public $process = 1; //0 = mail, 2 = otp, 3 = new password
    public $email;
    public $sendemail_check;
    public $otp;
    public $otp_mail;
    public $otp_check;
    public $password1;
    public $password2;
    public $check_password;
    public $expire_time;
    public $otp_status;

    public function sendTo($otp){
        try {
            Mail::to($this->email)->send(new \App\Mail\OtpResetPasswordMail($otp));
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function sendMail()
    {
        // ..code
        $this->validate(
            [
                'email' =>
                    'required|exists:ooap_tbl_employees,emp_citizen_id|email',
            ],
            [
                'email.required' => 'กรุณาระบุอีเมล์',
                'email.exists' => 'ไม่มีอีเมล์นี้ในระบบ',
                'email.email' => 'กรุณาระบุในรูปแบบอีเมล์',
            ]
        );

        $setotp = rand(000000, 999999);
        if($this->sendTo($setotp)){
            $this->sendemail_check = true;

            $this->otp_mail = $setotp;

            $this->expire_time = now();

            $this->process = 2;

            $this->emit('startTimer');
        }else{
            $this->sendemail_check = '';
            $this->validate(
                [
                    'sendemail_check' => 'required',
                ],
                [
                    'sendemail_check.required' => 'ส่งเมลไม่สำเร็จ',
                ]
            );
        }
    }

    public function compareOTP()
    {
        // ..code
        $time_left = time() - strtotime($this->expire_time);
        // dd($time_left);
        if ($time_left < 300) {
            $this->otp_status = 'pass';
            $this->otp_check = $this->otp == $this->otp_mail ? 'pass' : null;
        } else {
            //เกิน 5 นาทีใช้ไม่ได้
            $this->otp_status = null;
            $this->otp_check = 'notpass';
        }

        $this->validate(
            [
                'otp' => 'required',
                'otp_check' => 'required',
                'otp_status' => 'required',
            ],
            [
                'otp.required' => 'กรุณาระบุ OTP',
                'otp_check.required' => 'OTP ไม่ถูกต้อง',
                'otp_status.required' => 'OTP หมดเวลา',
            ]
        );

        $this->process = 3;
    }

    public function resetPassword()
    {
        // dd($this);

        // ..code
        $this->check_password =
            $this->password1 == $this->password2 ? 'pass' : null;

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

        $OoapTblEmployee = OoapTblEmployee::where(
            'emp_citizen_id',
            '=',
            $this->email
        )->update([
            'password' => Hash::make($this->password2),
            'updated_at' => now(),
        ]);

        $get = OoapTblEmployee::where(
            'emp_citizen_id',
            '=',
            $this->email
        )->first()->emp_type;

        $redirect_to = [
            1 => 'student',
            2 => 'parent',
            3 => 'teacher',
            4 => 'admin',
        ];

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
