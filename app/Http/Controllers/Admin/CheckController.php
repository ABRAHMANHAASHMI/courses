<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function get_all_user_check(){
        $data['users'] = User::select()->where('plan_id',2)->get()->toArray();
        return view('admin/check/all_user_check',$data);
    }
    public function premium(){
        $data['users'] = User::select()->where('plan_id',1)->get()->toArray();
        return view('admin/check/premium',$data);
    }

    public function check(Request $request){
//        dd($request->all());
        $mails=$request->ids;

        foreach ($mails as $mail){
         // dd($mail);
            DB::table('users')
                ->where('id', $mail)
                ->limit(1)
                ->update(['plan_id'=> 2]);
//            DB::table('users')
//                ->updateOrInsert(
//                    ['plan_id' => '$mail']
//                );
        }
        return redirect()->back();
    }
//    search
//    public function search($name, Request $request)
//    {
//        //dd($request->find);
//        $name = $request->input('find');
//        if(!empty($name)){
//            $find = DB::table('users')
//                ->select('name', 'email')
//                ->where('name', 'LIKE', '%' . $name . '%')
//                ->orwhere('email', 'LIKE', '%' . $name . '%')
//                ->get();
//            dd($find);
//        }
//        return view('admin.check.premium', compact('find', 'name'));
//    }
//    public function takefind(Request $request)
//    {
//        $names = $request->input('find');
//        return view('admin.check.premium', compact('name'));
//    }
//searchEnd
    public function ax_check_coupon(Request $request){
        $user_arr = $request->users;
        foreach ($user_arr as $single){

            $data['users'][] = User::select()->where('id',$single)->first()->toArray();
        }
        return view('admin/check/check_coupon_answer',$data);
    }
    public function ax_delete_user(Request $request){

        $user_arr = $request->users;
       var_dump($user_arr);
        foreach ($user_arr as $single){
            User::select()->where('id',$single)->delete();
        }
    }
    public function ax_save_check_coupon(Request $request){
        $check = $request->check_coupon;
        $name  = $request->name;
        $email = $request->email;
        $shcool_year = $request->shcool_year;
        foreach ($check as $index => $value){
            if(empty($value)){
                continue;
            }
            User::where('id',$index)
                ->update([
                    'payment_charge' => $value,
                    'name'           => $name[$index],
                    'email'          => $email[$index],
                    'shcool_year'    => $shcool_year[$index],
                ]);
        }
        return json_encode(true);
    }
    public function add_user(){
        return view('admin/user/add_user');
    }
    public function ax_save_user(Request $request){
        $name        = $request->name;
        $email       = $request->email;
        $pass        = $request->password;
        $shcool_year = $request->shcool_year;
        $data['errors'] = [];
        $user = User::select()->where('email',$email)->first();
        if(!empty($user)){
            $data['errors'][] = 'Email already exist';
            return json_encode($data);
        }
         User::create([
            'name'        => $name,
            'email'       => $email,
            'shcool_year' => $shcool_year,
            'password'    => bcrypt($pass),
        ]);
         return json_encode(true);
    }
}