<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequestAdmin;
use Illuminate\Support\Facades\Redirect;
use Datatables;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdatePassword;

class UsersController extends Controller
{
    public function index()
    {
      return view('admin.user.index');
    }

    public function create()
    {
      return view('admin.user.add');
    }

    public function store(AddUserRequestAdmin $request , User $user)
    {
      $user->create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
      ]);
        return redirect('/adminpanel/users')->withFlashMessage('تمت اضافة العضو بنجاح');
    }
    public function edit($id , User $user , Bu $bu)
    {
      $user = $user->find($id);
      $buwaiting = $bu->where('user_id' , $id)->where('bu_status' , 0)->paginate(10);
      $buenable = $bu->where('user_id' , $id)->where('bu_status' , 1)->paginate(10);
      return view('admin.user.edit' , compact('user' , 'buwaiting' , 'buenable'));
    }
    public function update($id , User $user , Request $request)
    {
      $userUpdated = $user->find($id);
      $userUpdated->fill($request->all())->save();
      return Redirect::back()->withFlashMessage('تم التعديل بنجاح');
    }
    public function updatePassword(Request $request , User $user)
    {
      $userupdate = $user->find($request->user_id);
      $password = bcrypt($request->password);
      $userupdate->fill(['password' => $password])->save();
      return Redirect::back()->withFlashMessage('تم تغير كلمة المرور بنجاح');
    }

    public function destroy($id , User $user)
    {
      if($id != 1){
        $user->find($id)->delete();
        Bu::where('user_id' , $id)->delete();
        return redirect('/adminpanel/users')->withFlashMessage('تم الحذف بنجاح');
      }
      return redirect('/adminpanel/users')->withFlashMessage('لا يمكن حذف العضوية رقم 1');
    }

    public function anyData(User $user)
    {

      $users = $user->all();
      return Datatables::of($users)
      ->editColumn('name' , function($model){
         return '<a href="'.url('/adminpanel/users/' . $model->id . '/edit').'">'.$model->name.'</a>';
         })
      ->editColumn('admin', function($model){
         return $model->admin == 0 ? '<span class="badge badge-info">' . 'عضو' . '</span' : '<span  class="badge badge-warning">' . 'مدير' . '</span>';
      })

      ->editColumn('mybu', function($model){
        return '<a href="'.url('/adminpanel/bu/' . $model->id).'"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>';
      })

      ->editColumn('control', function($model){
         $all = '<a href="'.url('/adminpanel/users/' . $model->id . '/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
         if($model->id != 1){
         $all .= '<a href="'.url('/adminpanel/users/' . $model->id . '/delete').'" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a> ';
         }
         return $all;
        })
        ->make(true);
    }

    public function userEditInfo(){
       $user = Auth::user();
       return view('website.profile.edit' , compact('user'));
  }
    public function userUpdateProfile(UserUpdateRequest $request , User $users){
       $user = Auth::user();
       if($request->email != $user->email){
           $checkmail = $users->where('email' , $request->email)->count();
           if($checkmail == 0){
               $user->fill($request->all())->save();
           }else{
              return Redirect::back()->withFlashMessage(' هذا اليميل موجود لدينا مسبقا ');
           }
         }else{
           $user->fill(['name' => $request->name])->save();
       }
       return Redirect::back()->withFlashMessage(' تم التعديل على المعلومات بنجاح ');
    }

    public function changePassword(UserUpdatePassword $request , User $users){
      $user = Auth::user();

      if(Hash::check($request->password , $user->password)){
          $hash = Hash::make($request->newpassword);
          $user->fill(['password' => $hash])->save();
          return Redirect::back()->withFlashMessage(' تم تغير الباسوورد بنجاح ');
      }else{
          return Redirect::back()->withFlashMessage(' برجاء التاكد من كلمة المرور ');
      }

    }

}
