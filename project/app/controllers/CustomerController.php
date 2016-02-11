<?php
class CustomerController extends BaseController{

    public function add(){
                    $db = Customer::insert([
                        'CUname' => Input::get('CUname'),
                        'CUtel' => Input::get('CUtel'),
                        'CUaddress' => Input::get('CUaddress'),
                        'CUmap' => Input::get('CUmap'),
                        'CUnote' => Input::get('CUnote'),
                    ]);
                   if($db){
                        return Redirect::to('store/customer/add')->with('success', '
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลแล้ว
                </div>
                ');
                        }else{
                        return Redirect::to('store/customer/add')->with('success', '
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลไม่ได้
                </div>
                ');
                        }

            }

    public function edit(){
                     $id = Input::get('CUID');
                     $db = Customer::where('CUID', $id)
                    ->update(array(
                        'CUname' => Input::get('CUname'),
                        'CUtel' => Input::get('CUtel'),
                        'CUaddress' => Input::get('CUaddress'),
                        'CUmap' => Input::get('CUmap'),
                        'CUnote' => Input::get('CUnote'),
                    ));

                   if($db){
                            return Redirect::to('store/customer/edit/'.$id)->with('success', '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลแล้ว
                    </div>
                    ');
                        }else{
                            return Redirect::to('store/customer/edit/'.$id)->with('success', '
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลไม่ได้
                    </div>
                    ');
                            }

                    }


}
?>