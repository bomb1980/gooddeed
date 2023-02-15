<?php

namespace Database\Seeders;

use App\Models\OoapTblEmployee;
use Illuminate\Database\Seeder;
class EmployeeSeeder extends Seeder
{

    public function run()
    {
        OoapTblEmployee::truncate();

        OoapTblEmployee::insert([
            ["emp_citizen_id" => "DSDD@GOGO.COM", "new_noti" => NULL, "division_id" => "84", "division_name" => "สำนักงานแรงงานจังหวัดพิจิตร", "province_id" => "23", "role_id" => "2", "from_type" => NULL, "title_th" => "นางสาว", "fname_th" => "เยี่ยมวิมล", "lname_th" => "พาอินทร์", "posit_id" => "4", "posit_name_th" => "นักวิชาการแรงงาน", "positlevel_id" => NULL, "level_no" => NULL, "positlevel_name" => NULL, "direc_id" => NULL, "direc_name" => NULL, "department_id" => "25", "dept_name_th" => "กลุ่มงานยุทธศาสตร์และข้อมูลสารสนเทศ", "personal_type_id" => NULL, "personal_type_name" => NULL, "orgname_id" => NULL, "orgname_type" => NULL, "prefix_id" => NULL, "prefix_name_th" => NULL, "dep_div_id" => NULL, "start_work" => NULL, "birthday" => NULL, "address" => NULL, "phone" => NULL, "email" => NULL, "remark" => NULL, "myooapsys" => NULL, "status" => "1"],

        ]);
    }
}
