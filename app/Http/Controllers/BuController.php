<?php

namespace App\Http\Controllers;

use App\Bu;
use Illuminate\Http\Request;
use Illuminate\pagination\paginator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Datatables;


class BuController extends Controller
{

    public function index(Request $request)
    {
      $id = $request->id !== null ? '?user_id='.$request->id : null;
      return view('admin.bu.index' , compact('id'));
    }

    public function create()
    {
      return view('admin.bu.add');
    }

    public function store(Requests\BuRequest $buRequest , Bu $bu)
    {

      if($buRequest->file('image')){

        $fileName = uploadImage($buRequest->file('image'));
        if(!$fileName){
          return Redirect::back()->withFlashMessage(' من فضلك اختر صوره بمقياس 362*500 ');
        }
         $image = $fileName;
      }else{
        $image = '';
      }

      $user = Auth::user();
      $data = [
         'bu_name' => $buRequest->bu_name,
         'bu_price' => $buRequest->bu_price,
         'bu_rent' => $buRequest->bu_rent,
         'bu_square' => $buRequest->bu_square,
         'bu_type' => $buRequest->bu_type,
         'bu_small_dis' => $buRequest->bu_small_dis,
         'bu_meta' => $buRequest->bu_meta,
         'bu_langtuide' => $buRequest->bu_langtuide,
         'bu_latitude' => $buRequest->bu_latitude,
         'bu_large_dis' => $buRequest->bu_large_dis,
         'bu_status' => $buRequest->bu_status,
         'user_id' => $user->id,
         'rooms' => $buRequest->rooms,
         'bu_place' => $buRequest->bu_place,
         'image' => $image,
      ];
      $bu->create($data);
      return redirect('/adminpanel/bu')->withFlashMessage('تم اضافة العقار بنجاح');
    }

    public function edit($id){
      $bu = Bu::find($id);
      return view('admin.bu.edit' , compact('bu'));
    }

    public function update($id , Requests\BuRequest $request){
      $buUpdate = Bu::find($id);
      $buUpdate->fill(array_except($request->all() , ['image']))->save();
      if($request->file('image')){
        $fileName = uploadImage($request->file('image'));
        if(!$fileName){
          return Redirect::back()->withFlashMessage(' من فضلك اختر صوره بمقياس 362*500 ');
        }
        $buUpdate->fill(['image' => $fileName])->save();
      }
      return Redirect::back()->withFlashMessage(' تم التعديل على العقار بنجاح ');
    }

    public function destroy($id){
      Bu::find($id)->delete();
      return Redirect::back()->withFlashMessage(' تم مسح العقارات بنجاح ');
    }

    public function anyData(Request $request , Bu $bu)
    {

      if($request->user_id == null){
        $bus = $bu->all();
      }else{
        $bus = $bu->where('user_id' , $request->user_id)->get();
      }

      return Datatables::of($bus)
      ->editColumn('bu_name' , function($model){
         return '<a href="'.url('/adminpanel/bu/' . $model->id . '/edit').'">'.$model->bu_name.'</a>';
         })

      ->editColumn('bu_type', function($model){
         $type = bu_type();
         return  '<span class="badge badge-info">' . $type[$model->bu_type] . '</span>' ;
      })

      ->editColumn('bu_status', function($model){
         return $model->bu_status == 0 ? '<span class="badge badge-info">' . 'غير مفعل' . '</span' : '<span  class="badge badge-warning">' . 'مفعل' . '</span>';
      })

      ->editColumn('control', function($model){
         $all = '<a href="'.url('/adminpanel/bu/' . $model->id . '/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
         $all .= '<a href="'.url('/adminpanel/bu/' . $model->id . '/delete').'" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a> ';
         return $all;
        })
        ->make(true);
    }

  public function showAllEnable(Bu $bu){
    $buAll = $bu->where('bu_status' , 1)->orderBy('id' , 'desc')->paginate(15);
    return view('website.bu.all' , compact('buAll'));
  }

  public function ForRent(Bu $bu){
    $buAll = $bu->where('bu_status' , 1)->where('bu_rent' , 1)->orderBy('id' , 'desc')->paginate(15);
    return view('website.bu.all' , compact('buAll'));
  }

  public function ForBuy(Bu $bu){
    $buAll = $bu->where('bu_status' , 1)->where('bu_rent' , 0)->orderBy('id' , 'desc')->paginate(15);
    return view('website.bu.all' , compact('buAll'));
  }

  public function showByType($type , Bu $bu){
    if(in_array($type , ['0' , '1' , '2'])){
      $buAll = $bu->where('bu_status' , 1)->where('bu_type' , $type)->orderBy('id' , 'desc')->paginate(15);
      return view('website.bu.all' , compact('buAll'));
    }else {
      return Redirect::back();
    }
  }

  public function search(Request $request , Bu $bu){

    $requestAll = array_except($request->toArray() , ['submit' , '_token' , 'page']);
    $query = DB::table('bu')->select('*');
    $array = [];
    $count = count($requestAll);
    $i = 0;
    foreach($requestAll as $key => $req){
      $i++;
      if($req != ''){
        if($key == 'bu_price_from' && $request->bu_price_to == ''){
          $query->where('bu_price', '>=' , $req);
        }elseif($key == 'bu_price_to' && $request->bu_price_from == ''){
          $query->where('bu_price', '<=' , $req);
        }else{
          if($key != 'bu_price_to' && $key != 'bu_price_from'){
            $query->where($key , $req);
          }
        }
        $array[$key] = $req;
      }elseif($count == $i && $request->bu_price_to != '' && $request->bu_price_from){
        $query->whereBetween('bu_price', [$request->bu_price_from , $request->bu_price_to]);
        $array[$key] = $req;
      }
  }
  $buAll = $query->paginate(15);
  return view('website.bu.all' , compact('buAll' , 'array'));

 }

public function ShowSingle($id , Bu $bu){
    $buInfo = $bu->findOrFail($id);
    if($buInfo->bu_status == 0){
      $messageTitle = "   هذا العقار ينتظر موافقة الادارة ";
      $messageBody = "  العقار
        $buInfo->bu_name
        موجود لدينا ولكن فى انتظار موافقة الاداره عليه يتم نشر العقار فى مدة اقصاها 24 ساعة";
      return view('website.bu.noper' , compact('buInfo' , 'messageTitle' , 'messageBody'));
    }
    $same_rent = $bu->where('bu_rent' , $buInfo->bu_rent)->orderBy(DB::raw('RAND()'))->take(3)->get();
    $same_type = $bu->where('bu_type' , $buInfo->bu_type)->orderBy(DB::raw('RAND()'))->take(3)->get();
    return view('website.bu.buInfo' , compact('buInfo' , 'same_rent' , 'same_type'));
}

public function getAjaxInfo(Request $request , Bu $bu){
    return $bu->find($request->id)->toJson();
}

public function userAddView(){
  return view('website.userbu.useradd');
}

public function userStore(Requests\BuRequest $buRequest , Bu $bu){
  if($buRequest->file('image')){

    $fileName = uploadImage($buRequest->file('image'));
    if(!$fileName){
      return Redirect::back()->withFlashMessage(' من فضلك اختر صوره بمقياس 362*500 ');
    }
     $image = $fileName;
  }else{
    $image = '';
  }

  $user = Auth::user() ? Auth::user()->id : 0;
  $data = [
     'bu_name' => $buRequest->bu_name,
     'bu_price' => $buRequest->bu_price,
     'bu_rent' => $buRequest->bu_rent,
     'bu_square' => $buRequest->bu_square,
     'bu_type' => $buRequest->bu_type,
     'bu_small_dis' => strip_tags(str_limit($buRequest->bu_large_dis , 160)),
     'bu_meta' => $buRequest->bu_meta,
     'bu_langtuide' => $buRequest->bu_langtuide,
     'bu_latitude' => $buRequest->bu_latitude,
     'bu_large_dis' => $buRequest->bu_large_dis,
     'user_id' => $user,
     'rooms' => $buRequest->rooms,
     'bu_place' => $buRequest->bu_place,
     'image' => $image,
  ];
  $bu->create($data);
  return view('website.userbu.done');

}

public function showUserBullding(Bu $bu){
  $user = Auth::user();
  $bu = $bu->where('user_id' , $user->id)->where('bu_status' , 1)->paginate(10);
  return view('website.userbu.showuserbu' , compact('bu' , 'user'));
}

public function bulldingShowwaiting(Bu $bu){
  $user = Auth::user();
  $bu = $bu->where('user_id' , $user->id)->where('bu_status' , 0)->paginate(10);
  return view('website.userbu.showuserbu' , compact('bu' , 'user'));
}

public function userEditBullding($id , Bu $bu){
  $user = Auth::user();
  $buInfo = $bu->find($id);
  if($user->id != $buInfo->user_id){

    $messageTitle = "   هذا العقار لم تقم باضافته";
    $messageBody = "  العقار
      $buInfo->name
      لم تقم باضافتة تمت الاضافه بواسطة عضوية اخرى
      ";

      return view('website.bu.noper' , compact('buInfo' , 'messageTitle' , 'messageBody'));
  }elseif($buInfo->bu_status == 1){
    $messageTitle = "   هذا العقار تم تفعيلة";
    $messageBody = "  العقار
      $buInfo->name
      تم تفعيلة ولا يمكن التعديل علية حاليا
      ";

      return view('website.bu.noper' , compact('buInfo' , 'messageTitle' , 'messageBody'));
  }
  $bu = $buInfo;
  return view('website.userbu.edituserbu' , compact('bu' , 'user'));
}

public function userUpdateBullding(Requests\BuRequest $request , Bu $bu){
  $buUpdate = $bu->find($request->bu_id);

  $buUpdate->fill(array_except($request->all() , ['image']))->save();

  if($request->file('image')){
    $fileName = uploadImage($request->file('image'));
    if(!$fileName){
      return Redirect::back()->withFlashMessage(' من فضلك اختر صوره بمقياس 362*500 ');
    }
    $buUpdate->fill(['image' => $fileName])->save();
  }

  return Redirect::back()->withFlashMessage(' تم التعديل على العقار بنجاح ');
}

public function changeStatus($id , $status , Bu $bu){
  $buUpdate = $bu->find($id);
  $buUpdate->fill(['bu_status' => $status])->save();
  return Redirect::back()->withFlashMessage(' تم التعديل على العقار بنجاح ');
}


}
