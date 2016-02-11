<?php
class ShipController extends BaseController{

    Public function addlist(){
      //Session::push('ship', Input::all());
      //Session::put('ship', array_add($ship = Session::get('ship'), Input::all()));
      //return json_encode(Session::get('ship'));
      //Session::flush();
      $d = Product::where('PID',Input::get('PID'))->first();
      if($d){
      $id = md5(date('H:i:s'));
      $data = "<tr id=".$id.">";
      $data.= "<td>".$d->Pcode."".$d->PID."<input type='hidden' value='".$d->PID."' name='PID[]'></td>";
      $data.= "<td>".$d->Pname."</td>";
      $data.= "<td>".$d->Psize." / ".$d->Punit."</td>";
      $data.= "<td>".Input::get('price')."<input type='hidden' value='".Input::get('price')."' name='price[]'></td>";
      $data.= "<td><input type='number' class='form-control' value='".Input::get('unit')."' name='unit[]'></td>";
      $data.= "<td>".(Input::get('price')*Input::get('unit'))."</td>";
      $data.= "<td>".Input::get('note')."<input type='hidden' value='".Input::get('note')."' name='note[]'></td>";
      $data.= "<td>";
      $data.= '<a class="btn btn-danger" onClick="';
      $data.= "remove_data('".$id."')";
      $data.= '">';
      $data.='<i class="fa fa-remove"></i></a>';
      $data.= "</td>";
      $data.= "</tr>";
      return $data;
      }else{
      return false;
      }
    }

    public function add(){

                
                    $db = Ship::insert([
                        'id'=>Input::get('id'),
                        'CUID' => Input::get('CUID'),
                        'created_at' => date("Y-m-d H:i:s"),
                    ]);

                    if(count(Input::get('PID'))>0){
                      $PID = Input::get('PID');
                      $dataSet = [];
                      foreach ($PID as $key => $value) {
                          $dataSet[] = [
                              'PID'  => $value,
                              'price'    => Input::get('price')[$key],
                              'unit'    => Input::get('unit')[$key],
                              'note'    => Input::get('note')[$key],
                              'bill_id'       => Input::get('id'),
                          ];
                      }
                    
                      if($db){
                        ShipList::insert($dataSet);
                      }
                    }
                  
                  if($db){
                        return Redirect::to('store/ship')->with('success', '
                            <div class="alert alert-success alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              <i class="fa fa-warning pr10"></i>
                              บันทึกข้อมูลแล้ว
                            </div>
                            ');
                        }else{
                        return Redirect::to('store/ship/add')->with('success', '
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
                     $db = Ship::where('id', $id)
                    ->update(array(
                        'CUID' => Input::get('CUID'),
                    ));
                    
                    if(count(Input::get('PID'))>0){
                      ShipList::where('bill_id',$id)->delete(); //ลบข้อมูลเก่า
                      $PID = Input::get('PID');
                      $dataSet = [];
                      foreach ($PID as $key => $value) {
                          $dataSet[] = [
                              'PID'  => $value,
                              'price'    => Input::get('price')[$key],
                              'unit'    => Input::get('unit')[$key],
                              'note'    => Input::get('note')[$key],
                              'bill_id'       => Input::get('id'),
                          ];
                      }
                      ShipList::insert($dataSet);
                    }



                   if($db){
                            return Redirect::to('store/ship/edit/'.$id)->with('success', '
                    <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลแล้ว
                    </div>
                    ');
                        }else{
                            return Redirect::to('store/ship/edit/'.$id)->with('success', '
                    <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i class="fa fa-warning pr10"></i>
                      บันทึกข้อมูลไม่ได้
                    </div>
                    ');
                            }

                    }


    public function pdf($id){
      $rs = Ship::one($id);
      $html = View::make('store/ship/pdf')->with('rs',$rs)->render();
      $pdf = new mPDF('th', 'A4', '0', ''); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
      $stylesheet = file_get_contents(URL::to('assets/pdf/style.css')); // external css
      $pdf->SetAutoFont();
      $pdf->SetDisplayMode('fullpage');
      $pdf->WriteHTML($stylesheet,1);
      $pdf->WriteHTML($html,2);
      return $pdf->Output();
    } 


}
?>