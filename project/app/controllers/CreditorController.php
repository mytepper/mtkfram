<?php
class CreditorController extends BaseController{

    public function add(){
                    $db = Creditor::insert([
                        'Cname' => Input::get('Cname'),
                        'Ctel' => Input::get('Ctel'),
                        'Caddress' => Input::get('Caddress')
                    ]);
                   if($db){
                        return Redirect::to('store/creditor/add')->with('success', '
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลแล้ว
                </div>
                ');
                        }else{
                        return Redirect::to('store/creditor/add')->with('success', '
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลไม่ได้
                </div>
                ');
                        }



            }

    public function edit(){
                     $id = Input::get('CID');
                     $db = Creditor::where('CID', $id)
                    ->update(array(
                        'Cname' => Input::get('Cname'),
                        'Ctel' => Input::get('Ctel'),
                        'Caddress' => Input::get('Caddress')
                    ));

                   if($db){
                            return Redirect::to('store/creditor/edit/'.$id)->with('success', '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลแล้ว
                    </div>
                    ');
                        }else{
                            return Redirect::to('store/creditor/edit/'.$id)->with('success', '
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