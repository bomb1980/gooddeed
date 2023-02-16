<?php

namespace Database\Seeders;

use App\Models\OoapTblEmployee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        OoapTblEmployee::truncate();

        OoapTblEmployee::insert([
            [
                'password' => Hash::make('1234'),
                'emp_citizen_id' => 'DSDD@GOGO.COM',
                'new_noti' => null,
                'division_id' => '84',
                'division_name' => 'สำนักงานแรงงานจังหวัดพิจิตร',
                'province_id' => '23',
                'role_id' => '2',
                'from_type' => null,
                'title_th' => 'นางสาว',
                'fname_th' => 'เยี่ยมวิมล',
                'lname_th' => 'พาอินทร์',
                'posit_id' => '4',
                'posit_name_th' => 'นักวิชาการแรงงาน',
                'positlevel_id' => null,
                'level_no' => null,
                'positlevel_name' => null,
                'direc_id' => null,
                'direc_name' => null,
                'department_id' => '25',
                'dept_name_th' => 'กลุ่มงานยุทธศาสตร์และข้อมูลสารสนเทศ',
                'personal_type_id' => null,
                'personal_type_name' => null,
                'orgname_id' => null,
                'orgname_type' => null,
                'prefix_id' => null,
                'prefix_name_th' => null,
                'dep_div_id' => null,
                'start_work' => null,
                'birthday' => null,
                'address' => null,
                'phone' => null,
                // 'email' => null,
                'remark' => null,
                'myooapsys' => null,
                'status' => '1',
            ],
        ]);
    }
}
