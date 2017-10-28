<?php


 function getSetting ($settingname = 'sitename'){
   return \App\SiteSetting::select('value')->where('namesetting' , $settingname)->get();
 }

function checkIfImageIsexist($imageName , $pathImage = '/public/website/bu_images/' , $url = '/website/bu_images/'){
  if($imageName != ''){
    $path = base_path().$pathImage.$imageName;
    if(file_exists($path)){
      return Request::root().$url.$imageName;
    }
  }else{
        return getSetting('no_image');
    }
}
function uploadImage($request , $path = '/public/website/bu_images/' , $width = '500' , $height = '362'){
  $dim = getimagesize($request);
  if($dim[0] > $width || $dim[1] > $height){
    return false;
  }

  $fileName = $request->getClientOriginalName();
  $request->move(
  base_path().$path , $fileName
);
return $fileName;
}

function setActive($array , $class = "active"){
  if(!empty($array)){
    $seg_array = [];
    foreach($array as $key => $url){
      if(Request::segment($key+1) == $url){
        $seg_array[] = $url;
      }
    }
    if(count($seg_array) == count(Request::segments())){
      if(isset($seg_array[0])){
            return $class;
      }
    }
  }
}

function buforusercount($user_id , $status){
  return \App\Bu::where('bu_status' , $status)->where('user_id' , $user_id)->count();
}

function countAllBuAppendToStatus($status){
  return \App\Bu::where('bu_status' , $status)->count();
}

function bu_type(){
  $array = [
    'شقه',
    'فيلا',
    'شالية',
  ];
  return $array;
}

function bu_rent(){
  $array = [
'تمليك',
'ايجار'
  ];
  return $array;
}

function status(){
  $array = [
'غير مفعل',
'مفعل'
  ];
  return $array;
}

function roomnumber(){
  $array = [];
  for($i = 2;$i <= 40;$i++){
    $array[$i] = $i;
  }
  return $array;
}

function searchnameFiled(){
  return[
    'bu_price' => ' سعر العقار ',
    'bu_place' => ' منطقة العقار ',
    'rooms' => ' عدد الغرف ',
    'bu_type' => ' نوع العقار ',
    'bu_rent' => ' نوع العملية ',
    'bu_square' => ' المساحة ',
    'bu_price_to' => ' السعر الى ',
    'bu_price_from' => ' السعر من ',
  ];
}

function contact(){
  return [
    '1' => 'اعجاب',
    '2' => 'مشكلة',
    '3' => 'اقتراح',
    '4' => 'استفسار',
  ];
}

function unreadMessage(){
  return \App\ContactUs::where('view' , 0)->get();
}

function countunreadMessage(){
  return \App\ContactUs::where('view' , 0)->count();
}

function bu_place(){
return [
"1"=>"الاسكندريه",
"2"=>"القاهرة",
"3"=>"الاسماعيليه",
"4"=>"شرم الشيخ",
"5"=>"الغردقه",
];
}
