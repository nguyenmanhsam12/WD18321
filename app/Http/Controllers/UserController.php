<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class UserController extends Controller
{
    public function showUser(){
        // Lấy danh sách toàn bộ user
        // $Listusers = DB::table('users')->get();

        // Lấy thông tin user có id = 4 
        // $result = DB::table('users')->where('id','=','4');
        // $result = DB::table('users')->find('4');

        // Lấy thuộc tính 'name' của user có id = 16
        // $result = DB::table('users')->where('id',16)->value('name');

        
        // 4. Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
        // $IdphongBan = DB::table('phongban')
        // ->where('ten_donvi','like','%Ban Giám Hiệu%')
        // ->value('id');
        // $result = DB::table('users')->where('phongban_id',$IdphongBan)->pluck('id');

        // 5. Tìm user có độ tuổi lớn nhất trong công ty 
        // $result = DB::table('users')
        // ->where('tuoi',DB::table('users')->max('tuoi'))
        // ->get();

        //  6. Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table('users')
        // ->where('tuoi',DB::table('users')->min('tuoi'))
        // ->get();

        // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
        // $IdphongBan = DB::table('phongban')
        // ->where('ten_donvi','like','%Ban Giám Hiệu%')
        // ->value('id');
        // $result = DB::table('users')->where('phongban_id',$IdphongBan)->count('id');

        // 8. Lấy danh sách tuổi các user không

        // $result = DB::table('users')->distinct()->pluck('tuoi');
        
        //  9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')->where('name','like','%Khải')
        // ->orWhere('name','like','%Thanh')
        // ->get();
        // dd($result);

        // 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $IdphongBan = DB::table('phongban')
        // ->where('ten_donvi','like','%Ban Đào Tạo%')
        // ->value('id');
        // $result = DB::table('users')->where('phongban_id',$IdphongBan)
        // ->select('id','name','email')
        // ->get();

        // dd($result);
        
        //     11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')->where('tuoi','>=','30')
        // ->select('id','name','tuoi','email')
        // ->orderBy('tuoi','asc')
        // ->get();   
        // dd($result);

        // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')
        // ->select('id','name','tuoi','email')
        // ->orderBy('tuoi','desc')
        // ->offset(5)
        // ->limit(10)
        // ->get();
        // dd($result);

        //     13. Thêm một user mới vào công ty
        // $data = [
            
        //         'name'=>'Nguyễn Mạnh Sâm',
        //         'tuoi'=>'20',
        //         'phongban_id'=>1,
        //         'email'=>'samnmph44600',
        //         'songaynghi'=> 0,
        //         'created_at'=> Carbon::now(),
        //         'updated_at'=> Carbon::now(),
        // ];


        // $result = DB::table('users')->insert($data);


        //  14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        //  $IdphongBan = DB::table('phongban')
        // ->where('ten_donvi','like','%Ban Giám Hiệu%')
        // ->value('id');
        // $result = DB::table('users')
        // ->where('phongban_id',$IdphongBan)
        // ->select('id','name','email')
        // ->get();

        // foreach($result as $value){
        //     DB::table('users')->where('id',$value->id)
        //     ->update([
        //         'name'=>$value->name.'PĐT'
        //     ]);
        // }

        //    15. Xóa user nghỉ quá 15 ngày
        // DB::table('users')->where('songaynghi','>','15')->delete();


        // return view('list-user',compact('Listusers'));



    }

    // public function getUser($id,$name =''){
    //     echo $id;
    //     echo $name;
    
    // }

    // public function updateUser(Request $request){
    //     echo $request->id;  
    // }

    public function listUsers(){
        $Listusers = DB::table('users')
        ->join('phongban','phongban.id','=','users.phongban_id')
        ->select('users.id','users.name','users.email','users.phongban_id','phongban.ten_donvi')
        ->get();
        return view('users.listUsers',compact('Listusers'));
    }

    public function addUser(){
        $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users.add',compact('phongban'));
    }
    
    public function addPostUser(Request $request){

        $validation = $request->validate([
            'nameUser'=>'required|string',
            'emailUser'=>'required',
            'tuoiUser'=>'required',
        ],[
            'nameUser.required'=>'Tên không được để trống',
            'emailUser.required'=>'Email không được để trống',
            'tuoiUser.required'=>'Tuổi không được để trống',
        ]);

      

        $data = [
            'name'=>$validation['nameUser'],
            'email'=>$validation['emailUser'],
            'phongban_id'=>$request->phongbanUser,
            'tuoi'=>$validation['tuoiUser'],
        ];

        DB::table('users')->insert($data);
        return redirect(route('users.listUsers'));
    }

    public function deleteUser($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect(route('users.listUsers'));
    }

    public function editUser($id){

        $user = DB::table('users')->find($id);
        $phongban = DB::table('phongban')
        ->select('id','ten_donvi')
        ->get();

        return view('users.edit',compact('user','phongban'));
    }

    public function updateUser($id , Request $request){

        

        $validation = $request->validate([
            'nameUser'=>'required|string',
            'emailUser'=>'required',
            'tuoiUser'=>'required',
        ],[
            'nameUser.required'=>'Tên không được để trống',
            'emailUser.required'=>'Email không được để trống',
            'tuoiUser.required'=>'Tuổi không được để trống',
        ]);

      

        $data = [
            'name'=>$validation['nameUser'],
            'email'=>$validation['emailUser'],
            'phongban_id'=>$request->phongbanUser,
            'tuoi'=>$validation['tuoiUser'],
        ];

        DB::table('users')->where('id',$id)->update($data);
        return redirect(route('users.listUsers'));

    }

    
}
