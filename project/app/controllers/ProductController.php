<?php
class ProductController extends BaseController{

    public function add(){
                    $db = Product::insert([
                        'Pname' => Input::get('Pname'),
                        'Psize' => Input::get('Psize'),
                        'Punit' => Input::get('Punit'),
                        'P_buy_f' => Input::get('P_buy_f'),
                        'P_buy_i' => Input::get('P_buy_i'),
                        'P_price_f' => Input::get('P_price_f'),
                        'P_price_i' => Input::get('P_price_i'),
                        'TID' => Input::get('TID'),
                    ]);
                   if($db){
                        return Redirect::to('store/product/add')->with('success', '
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลแล้ว
                </div>
                ');
                        }else{
                        return Redirect::to('store/product/add')->with('success', '
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลไม่ได้
                </div>
                ');
                        }



            }

    public function edit(){
                     $id = Input::get('PID');
                     $db = Product::where('PID', $id)
                    ->update(array(
                        'Pname' => Input::get('Pname'),
                        'Psize' => Input::get('Psize'),
                        'Punit' => Input::get('Punit'),
                        'P_buy_f' => Input::get('P_buy_f'),
                        'P_buy_i' => Input::get('P_buy_i'),
                        'P_price_f' => Input::get('P_price_f'),
                        'P_price_i' => Input::get('P_price_i'),
                        'TID' => Input::get('TID'),
                    ));

                   if($db){
                            return Redirect::to('store/product/edit/'.$id)->with('success', '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลแล้ว
                    </div>
                    ');
                        }else{
                            return Redirect::to('store/product/edit/'.$id)->with('success', '
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