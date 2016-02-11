<?php
class PurchaseController extends BaseController{

    public function add(){

                    
                    $BILL = new PurchaseBill;
                    $find = PurchaseBill::where('PBID',Input::get('PBID'))->first();
                    if(!$find){
                      $BILL->PBID = Input::get('PBID');
                      $BILL->PB_status = '2';
                      $BILL->save();
                    }

                    $db = Purchase::insert([
                        'CID' => Input::get('CID'),
                        'PID' => Input::get('PID'),
                        'U_price' => Input::get('U_price'),
                        'U_number' => Input::get('U_number'),
                        'U_note' => Input::get('U_note'),
                        'PBID' => Input::get('PBID'),
                    ]);
                      
                   if($db){
                        return Redirect::to('store/purchase/add'.'/'.Input::get('PBID'))->with('success', '
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลแล้ว
                </div>
                ');
                        }else{
                        return Redirect::to('store/purchase/add'.'/'.Input::get('PBID'))->with('success', '
                <div class="alert alert-danger alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <i class="fa fa-warning pr10"></i>
                  บันทึกข้อมูลไม่ได้
                </div>
                ');
                        }

            }

    public function edit(){
                     $id = Input::get('UID');
                     $db = Purchase::where('UID', $id)
                    ->update(array(
                        'CID' => Input::get('CID'),
                        'PID' => Input::get('PID'),
                        'U_price' => Input::get('U_price'),
                        'U_number' => Input::get('U_number'),
                        'U_note' => Input::get('U_note'),
                    ));

                   if($db){
                            return Redirect::to('store/purchase/edit/'.$id)->with('success', '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลแล้ว
                    </div>
                    ');
                        }else{
                            return Redirect::to('store/purchase/edit/'.$id)->with('success', '
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลไม่ได้
                    </div>
                    ');
                            }

                    }

    public function pay($id){
      $d = PurchaseBill::where('PBID',$id)->first();
      $PB_status = ($d->PB_status == '1' ? '2' : '1');
      PurchaseBill::where('PBID',$id)->update(
          array(
              "PB_status"=> $PB_status,
            )
        );

      return Redirect::to('store/purchase')->with('success', '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      Success
                    </div>
                    ');

    }


}
?>