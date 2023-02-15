<?php

namespace App\Http\Controllers\report;

use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\Controller;
use App\Models\OoapMasSubmenu;
use App\Models\TestModel;
use Illuminate\Http\Request;

class Dashboard3Controller extends Controller
{

    public function __construct(Request $request)
    {
        // if (!empty($request->route()->getName()))
        //     $this->OoapMasSubmenu = OoapMasSubmenu::getData($request->route()->getName())->first();

        // $this->middleware('auth');
    }

    public function index()
    {
        // TestModel::create([
        //     'name' => "tet",
        // ]);
        return view('front.index');
    }

    public function clean_me()
    {

        exit;

        Artisan::call('config:clear');
        Artisan::call('migrate:fresh', [

            '--force'     => true,
            '--seed'      => true,

        ]);
    }

    public function forgetPassword(Request $request, $formName = NULL)
    {

        $datas['mail'] = 'DSDD@GOGO.COM';

        // forget_password.blade.php

        return view('login_form.forget_password', $datas);
    }

    public function loginForm(Request $request, $formName = NULL)
    {

        $datas['mail'] = 'DSDD@GOGO.COM';

        $datas['register_link'] = NULL;
        if ($formName) {

            $datas['register_link'] = route('register_byname', ['formName' => $formName]);
        }

        if ($formName == 'student') {

            return view('login_form.student', $datas);
        } else if ($formName == 'parent') {


            return view('login_form.parent', $datas);
        } else if ($formName == 'admin') {


            return view('login_form.admin', $datas);
        } else if ($formName == 'teacher') {


            return view('login_form.teacher', $datas);
        }

        return view('login_form.form1', $datas);
    }

    public function register(Request $request, $formName = NULL)
    {

        // echo url()->previous();


        // exit;


        $datas['mail'] = 'DSDD@GOGO.COM';

        if ($formName == 'student') {

            return view('register_form.student', $datas);
        } else if ($formName == 'parent') {


            return view('register_form.parent', $datas);
        }
        // else if ($formName == 'admin') {


        //     return view('register_form.admin', $datas);
        // }

        return view('register_form.teacher', $datas);


        // return view('register_form.form_register');




    }




    public function home()
    {
        echo 'login now <a class="dropdown-item" href="/logout" >
<i class="icon wb-power" aria-hidden="true"></i> ออกจากระบบ
</a>';
        exit;
        return view('report.dashboard3.index');
    }



    public function report8()
    {
        $this->params['title'] = $this->OoapMasSubmenu->submenu_name;

        return view('report.report8', $this->params);
    }

    public function report9()
    {
        $this->params['title'] = $this->OoapMasSubmenu->submenu_name;

        return view('report.report9', $this->params);
    }

    public function report1()
    {
        $logs['route_name'] = 'report1';
        $logs['submenu_name'] = 'รายงานประมวลผลความพึงพอใจ';
        $logs['log_type'] = 'view';

        createLogTrans($logs);
        $this->params['title'] =  $this->OoapMasSubmenu->submenu_name;

        $this->params['datas'] = NULL;

        return view('report.report1', $this->params);
    }

    public function report7()
    {
        $logs['route_name'] = 'report7';
        $logs['submenu_name'] = 'report';
        $logs['log_type'] = 'view';

        createLogTrans($logs);
        $this->params['title'] = $this->OoapMasSubmenu->submenu_name;

        return view('report.report7', $this->params);
    }


    public function repoer6()
    {
        $logs['route_name'] = 'report6';
        $logs['submenu_name'] = 'report';
        $logs['log_type'] = 'view';

        createLogTrans($logs);
        $this->params['title'] = $this->OoapMasSubmenu->submenu_name;

        return view('report.dashboard6.index', $this->params);
    }

    public function report3()
    {
        $logs['route_name'] = 'report3';
        $logs['submenu_name'] = 'รายงานสรุป';
        $logs['log_type'] = 'view';

        createLogTrans($logs);
        return view('report.dashboard1.index');
    }

    public function report2()
    {
        $logs['route_name'] = 'report2';
        $logs['submenu_name'] = 'รายงานรูปภาพกิจกรรม';
        $logs['log_type'] = 'view';

        createLogTrans($logs);
        $this->params['title'] =  $this->OoapMasSubmenu->submenu_name;

        $this->params['datas'] = NULL;

        return view('report.report2', $this->params);
    }

    public function repoer4()
    {
        $logs['route_name'] = 'report4';
        $logs['submenu_name'] = 'report4';
        $logs['log_type'] = 'view';

        createLogTrans($logs);
        return view('report.dashboard4.index');
    }

    public function repoer5()
    {
        $logs['route_name'] = 'report5';
        $logs['submenu_name'] = 'report5';
        $logs['log_type'] = 'view';

        createLogTrans($logs);
        return view('report.dashboard5.index');
    }
}
