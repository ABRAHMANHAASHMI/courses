<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Statistic;
use App\Statistic_count;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Enable_work;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function index()
    {
        return view('admin/login');
    }
    public function dashboard()
    {
        return view('admin/dashboard/main');
    }
    public function dashboard2(Request $request)
    {
        $data2 = DB::table('users')
            ->select(
                DB::raw('plan_id'),
                DB::raw('count(*) as number'))
            ->groupBy('plan_id')
            ->get();
        $array[]=['plan_id','Number'];
        foreach ($data2 as $key => $value){
            $array[++$key]=[$value->plan_id,$value->number];
        }
        $data = DB::table('user_statistic_count')
            ->select(
                DB::raw('date'),
                DB::raw('count(*) as number'))
            ->where('date',$request->date)
            ->groupBy('date')
            ->get();
        $array2[]=['date','Number'];
        foreach ($data as $key => $value){
            $array2[++$key]=[$value->date,$value->number];
        }
        dd($array2);
        return view('admin/dashboard/main')->with('designation',json_encode($array))->with('date',json_encode($array2));
    }
    public function ax_get_statistic(Request $reques)
    {
        $data2 = DB::table('users')
            ->select(
                DB::raw('plan_id'),
                DB::raw('count(*) as number'))
            ->groupBy('plan_id')
            ->get();
        $array[] = ['plan_id', 'Number'];
        foreach ($data2 as $key => $value) {
            $array[++$key] = [$value->plan_id, $value->number];
        }
        $data = DB::table('user_statistic')
            ->select(
                DB::raw('date'),
                DB::raw('count(*) as number'))
            ->groupBy('date')
            ->get();
        $array2[] = ['date', 'Number'];
        foreach ($data as $key => $value) {
            $array2[++$key] = [$value->date, $value->number];
        }
        return view('admin/dashboard/statistic_answer')->with('designation',json_encode($array))->with('date',json_encode($array2));
    }
    public function enable_work(){
        $data['enable_disable'] = Enable_work::select()->first()->toArray();
        return view('admin/dashboard/enable_work',$data);
    }

    public function ax_update_enable(Request $reques){

        $enabling = $reques->enabling;

        return Enable_work::where('id',1)
            ->update(['enabling' => $enabling]);
    }

    public function logout(){
        Cookie::queue(\Cookie::forget('admin_info'));
        return redirect(url('admin-panel'));
    }

}
