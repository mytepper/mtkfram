@extends("layouts.main")
@section("content")

<!-- Start: Topbar -->
<header id="topbar" class="alt">
  <div class="topbar-left">
    <ol class="breadcrumb">
      <li class="crumb-active">
        <a href="{{URL::to('dashboard')}}">Dashboard</a>
      </li>
      <li class="crumb-icon">
        <a href="{{URL::to('store/product')}}">สินค้า</a>
      </li>
    </ol>
  </div>
</header>

<div class="row">
  <div class="col-md-12">
      @if ($alert = Session::get('success'))
          {{ $alert }}
      @endif
  </div>
</div>

<!-- Begin: Content -->
<section id="content" class="animated fadeIn">
   <div class="row">
        <div class="col-md-12">
         <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">ข้อมูลสินค้า</span>
              </div>
              <div class="panel-body">

                <form role="form" method="post" action="{{URL::to('store/product/edit')}}" class="form-horizontal" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ประเภทสินค้า</label>
                    <div class="col-lg-8">
                      <div class="">
                        <select class="form-control select2" name="TID" style="min-width:300px;" required>
                         <?php
                          $data = ProductType::orderBy("TID","DESC")->get();
                          if($data){
                          foreach ($data as $key => $value){
                          ?>
                            <option value='<?php echo $value->TID;?>' <?php if($value->TID==$rs->TID){echo 'selected';} ?>>
                              <?php echo $value->Tname;?>
                            </option>
                          <?php }} ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ชื่อสินค้า</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->Pname;?>' placeholder="" name="Pname" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ขนาด</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value="<?php echo $rs->Psize;?>" placeholder="" name="Psize" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">หน่วยบรรจุ</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->Punit;?>' placeholder="" name="Punit" class="form-control" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ราคาซื้อเชื่อ</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->P_buy_i;?>' placeholder="" name="P_buy_i" class="form-control int" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ราคาซื้อสด</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->P_buy_f;?>' placeholder="" name="P_buy_f" class="form-control int" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ราคาขายเชื่อ</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->P_price_i;?>' placeholder="" name="P_price_i" class="form-control int" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ราคาขายสด</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value="<?php echo $rs->P_buy_f;?>" placeholder="" name="P_price_f" class="form-control int" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                     <label for="textArea3" class="col-lg-3 control-label"></label>
                     <input type="hidden" name="PID" value='<?php echo $rs->PID;?>'>
                    <button type="submit" onclick="return confirm('Confirm');" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Content -->
@stop