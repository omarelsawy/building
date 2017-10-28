<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Datatables;

class ContactController extends Controller
{

    public function index(){
      return view('admin.contact.index');
    }

    public function store(Requests\ContactRequest $request , ContactUs $contactus){
      $contactus->create($request->all());
      return Redirect::back()->withFlashMessage('تم ارسال رسالتك الينا بنجاح');
    }

    public function edit($id , ContactUs $contactus){
      $contact = $contactus->find($id);
      $contact->fill(['view' => 1])->save();
      return view('admin.contact.edit' , compact('contact'));
    }

    public function update($id , ContactUs $contactus , Requests\ContactRequest $request){
      $contactupdate = $contactus->find($id);
      $contactupdate->fill($request->all())->save();
      return Redirect::back()->withFlashMessage('تم التعديل على الرسالة بنجاح');
    }

    public function destroy($id , ContactUs $contactus){
      $contactus->find($id)->delete();
      return Redirect::back()->withFlashMessage('تم الحذف');
    }

    public function anyData(ContactUs $contactus)
    {

      $contact = $contactus->all();
      return Datatables::of($contact)
      ->editColumn('contact_name' , function($model){
         return '<a href="'.url('/adminpanel/contact/' . $model->id . '/edit').'">'.$model->contact_name.'</a>';
         })

      ->editColumn('contact_type', function($model){
         return '<span  class="badge badge-warning">' . contact()[$model->contact_type] . '</span>';
      })

      ->editColumn('view', function($model){
         return $model->view == 0 ? '<span class="badge badge-info">' . 'رسالة جديده' . '</span' : '<span  class="badge badge-warning">' . 'رسالة قديمة' . '</span>';
      })

      ->editColumn('control', function($model){
         $all = '<a href="'.url('/adminpanel/contact/' . $model->id . '/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a> ';
         $all .= '<a href="'.url('/adminpanel/contact/' . $model->id . '/delete').'" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a> ';
         return $all;
        })
        ->rawColumns(['contact_name','contact_type','view','control'])->make(true);
    }

}
