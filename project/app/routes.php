<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function(){
    return View::make('login');
});

Route::get('/login', function(){
    return View::make('login');
});

#active menu
HTML::macro('clever_link', function($route) 
{
    if(Request::is($route . '/*') OR Request::is($route))
    {
        $active = "menu-open";
    }
    
    else 
    {
        $active = '';
    }
     
    return $active;
});
##
##login

Route::post('/login', array('uses' => 'SiteController@authLogin'));
Route::get('/logout', array('uses' => 'SiteController@authLogout'));

##

##reminer
Route::controller('password', 'RemindersController');
##

##### @Dashboard
Route::group(array('before' => 'store'), function() {

  Route::get("store/dashboard", function(){
     return View::make("store/dashboard/index");
  });


  //creditor
  Route::get("store/creditor", function(){
     return View::make("store/creditor/index");
  });

  Route::get("store/creditor/add", function(){
     return View::make("store/creditor/add");
  });

  Route::get("store/creditor/edit/{id}", function($id){
     return View::make("store/creditor/edit")->with('rs', Creditor::where("CID",'=',$id)->first());
  });

  Route::post('store/creditor/add', array('uses' => 'CreditorController@add'));
  Route::post('store/creditor/edit', array('uses' => 'CreditorController@edit'));

  Route::get("store/creditor/delete/{id}",function($id){

    $db  = Creditor::where('CID', '=', $id)->delete();
     if($db){
        return Redirect::to('store/creditor')->with('success', '
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/creditor')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });


  //catalog
  Route::get("store/catalog", function(){
     return View::make("store/catalog/index");
  });

  Route::get("store/catalog/add", function(){
     return View::make("store/catalog/add");
  });

  Route::get("store/catalog/edit/{id}", function($id){
     return View::make("store/catalog/edit")->with('rs', ProductType::where("TID",'=',$id)->first());
  });

  Route::post('store/catalog/add', array('uses' => 'CatalogController@add'));
  Route::post('store/catalog/edit', array('uses' => 'CatalogController@edit'));

  Route::get("store/catalog/delete/{id}",function($id){

    $db  = ProductType::where('TID', '=', $id)->delete();
     if($db){
        return Redirect::to('store/catalog')->with('success', '
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/catalog')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });


  //product
  Route::get("store/product", function(){
     return View::make("store/product/index");
  });

  Route::get("store/product/add", function(){
     return View::make("store/product/add");
  });

  Route::get("store/product/edit/{id}", function($id){
     return View::make("store/product/edit")->with('rs', Product::where("PID",'=',$id)->first());
  });

  Route::post('store/product/add', array('uses' => 'ProductController@add'));
  Route::post('store/product/edit', array('uses' => 'ProductController@edit'));

  Route::get("store/product/delete/{id}",function($id){

    $db  = Product::where('PID', '=', $id)->delete();
     if($db){
        return Redirect::to('store/product')->with('success', '
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/product')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });

  Route::get('store/product/get',function(){
       $data = Product::leftJoin('tb_product_type', 'tb_product.TID', '=', 'tb_product_type.TID')
                  ->orderBy('tb_product.PID','DESC')
                  ->get();
        return (json_encode($data));
        //return; //$data;
  });




  //purchase
  Route::get("store/purchase", function(){
    $get = PurchaseBill::orderBy('PBID','desc')->get();
    return View::make("store/purchase/index")->with('get',$get);
  });

  Route::get("store/purchase/add/{id}", function($id){
     return View::make("store/purchase/add")->with('id',$id);
  });

  Route::get("store/purchase/edit/{id}", function($id){
     return View::make("store/purchase/edit")->with('rs', Purchase::where("UID",'=',$id)->first());
  });

  Route::get('store/purchase/pay/{id}', array('uses'=>'PurchaseController@pay'));

  Route::post('store/purchase/add', array('uses' => 'PurchaseController@add'));
  Route::post('store/purchase/edit', array('uses' => 'PurchaseController@edit'));

  Route::get("store/purchase/delete/{id}/{bid}",function($id,$bid){

    $db  = Purchase::where('UID', '=', $id)->delete();
     if($db){
        return Redirect::to('store/purchase/add/'.$bid)->with('success', '
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/purchase/add/'.$bid)->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });

    Route::get("store/purchase/delete_bill/{id}",function($id){

    $db  = PurchaseBill::where('PBID', '=', $id)->delete();
    $db2  = Purchase::where('PBID', '=', $id)->delete();
     if($db){
        return Redirect::to('store/purchase')->with('success', '
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/purchase')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });

  Route::get('store/purchase/get/{id}',function($id){
       $data = Purchase::leftJoin('tb_creditor', 'tb_purchase.CID', '=', 'tb_creditor.CID')
                  ->leftJoin('tb_product', 'tb_purchase.PID', '=', 'tb_product.PID')
                  ->leftJoin('tb_product_type', 'tb_product.TID', '=', 'tb_product_type.TID')
                  ->where('tb_purchase.PBID','=',$id)
                  ->orderBy('tb_purchase.UID','DESC')
                  ->get();
        return (json_encode($data));
        //return; //$data;
  });


    Route::get('store/purchase/get_bill',function(){
       $data = PurchaseBill::orderBy('PBID','DESC')
                  ->get();
        return (json_encode($data));
        //return; //$data;
  });








  //customer
  Route::get("store/customer", function(){
     return View::make("store/customer/index");
  });

  Route::get("store/customer/add", function(){
     return View::make("store/customer/add");
  });

  Route::get("store/customer/edit/{id}", function($id){
     return View::make("store/customer/edit")->with('rs', Customer::where("CUID",'=',$id)->first());
  });

  Route::post('store/customer/add', array('uses' => 'CustomerController@add'));
  Route::post('store/customer/edit', array('uses' => 'CustomerController@edit'));

  Route::get("store/customer/delete/{id}",function($id){

    $db  = Customer::where('CUID', '=', $id)->delete();
     if($db){
        return Redirect::to('store/customer')->with('success', '
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/customer')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });

  Route::get('store/customer/get',function(){
       $data = Customer::orderBy('CUID','DESC')
                  ->get();
        return (json_encode($data));
        //return; //$data;
  });


  //-------------------------------------------------------------------------------------------///




  //bill
  Route::get("store/bill", function(){
     return View::make("store/bill/index");
  });

  Route::post('store/bill/add_list',array('uses'=>'BillController@addlist'));
  Route::post('store/bill/add',array('uses'=>'BillController@add'));

  Route::get("store/bill/add", function(){
     return View::make("store/bill/add");
  });

  Route::get("store/bill/edit/{id}", function($id){
     return View::make("store/bill/edit")->with('rs', Bill::where("id",'=',$id)->first());
  });

  Route::get("store/bill/pdf/{id}",array('uses'=>"BillController@pdf"));

  Route::post('store/bill/add', array('uses' => 'BillController@add'));
  Route::post('store/bill/edit', array('uses' => 'BillController@edit'));

  Route::get("store/bill/delete/{id}",function($id){

    $db  = Bill::where('id', '=', $id)->delete();
    if($db){
      $db2  = BillList::where('bill_id', '=', $id)->delete();
    }
    if($db){
        return Redirect::to('store/bill')->with('success','
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/bill')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });




  //ship
  Route::get("store/ship", function(){
     return View::make("store/ship/index");
  });

  Route::post('store/ship/add_list',array('uses'=>'ShipController@addlist'));
  Route::post('store/ship/add',array('uses'=>'ShipController@add'));

  Route::get("store/ship/add", function(){
     return View::make("store/ship/add");
  });

  Route::get("store/ship/edit/{id}", function($id){
     return View::make("store/ship/edit")->with('rs', Ship::where("id",'=',$id)->first());
  });

  Route::get("store/ship/pdf/{id}",array('uses'=>"ShipController@pdf"));

  Route::post('store/ship/add', array('uses' => 'ShipController@add'));
  Route::post('store/ship/edit', array('uses' => 'ShipController@edit'));

  Route::get("store/ship/delete/{id}",function($id){

    $db  = Ship::where('id', '=', $id)->delete();
    if($db){
      $db2  = ShipList::where('bill_id', '=', $id)->delete();
    }
    if($db){
        return Redirect::to('store/ship')->with('success','
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/ship')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });



  //receive
  Route::get("store/receive", function(){
     return View::make("store/receive/index");
  });

  Route::post('store/receive/add_list',array('uses'=>'ReceiveController@addlist'));
  Route::post('store/receive/add',array('uses'=>'ReceiveController@add'));

  Route::get("store/receive/add", function(){
     return View::make("store/receive/add");
  });

  Route::get("store/receive/edit/{id}", function($id){
     return View::make("store/receive/edit")->with('rs', Receive::where("id",'=',$id)->first());
  });

  Route::get("store/receive/pdf/{id}",array('uses'=>"ReceiveController@pdf"));

  Route::post('store/receive/add', array('uses' => 'ReceiveController@add'));
  Route::post('store/receive/edit', array('uses' => 'ReceiveController@edit'));

  Route::get("store/receive/delete/{id}",function($id){

    $db  = Receive::where('id', '=', $id)->delete();
    if($db){
      $db2  = ReceiveList::where('bill_id', '=', $id)->delete();
    }
    if($db){
        return Redirect::to('store/receive')->with('success','
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/receive')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });






  //income
  Route::get("store/income", function(){
     return View::make("store/income/index");
  });

  Route::get("store/income/add", function(){
     return View::make("store/income/add");
  });

  Route::get("store/income/edit/{id}", function($id){
     return View::make("store/income/edit")->with('rs', Income::where("id",'=',$id)->first());
  });

  Route::post('store/income/add', array('uses' => 'IncomeController@add'));
  Route::post('store/income/edit', array('uses' => 'IncomeController@edit'));

  Route::get("store/income/delete/{id}",function($id){

    $db  = Income::where('id', '=', $id)->delete();
     if($db){
        return Redirect::to('store/income')->with('success', '
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <i class="fa fa-warning pr10"></i>
          ลบข้อมูลแล้ว
        </div>
        ');
           }else{
                    return Redirect::to('store/income')->with('success', '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <i class="fa fa-warning pr10"></i>
              ลบข้อมูลไม่สำเร็จ
            </div>
            ');
                 }

  });


});

?>
