<?php
class IncomeController extends BaseController{

    public function add(){
                    $db = Income::insert([
                        'type' => Input::get('type'),
                        'name' => Input::get('name'),
                        'total' => Input::get('total'),
                        'customer' => Input::get('customer'),
                        'created_at' => date("Y-m-d H:i:s")
                    ]);
                   if($db){
                        return Redirect::to('store/income')->with('success', '
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลแล้ว
                </div>
                ');
                        }else{
                        return Redirect::to('store/income')->with('success', '
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลไม่ได้
                </div>
                ');
                        }



            }

    public function edit(){
                     $id = Input::get('id');
                     $db = Income::where('id', $id)
                    ->update(array(
                        'type' => Input::get('type'),
                        'name' => Input::get('name'),
                        'total' => Input::get('total'),
                        'customer' => Input::get('customer'),
                        'created_at' => date("Y-m-d H:i:s")
                    ));

                   if($db){
                            return Redirect::to('store/income/')->with('success', '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลแล้ว
                    </div>
                    ');
                        }else{
                            return Redirect::to('store/income/')->with('success', '
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