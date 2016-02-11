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
        <a href="{{URL::to('store/purchase')}}">การสั่งซื้อ</a>
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
                <span class="panel-title">ข้อมูลการสั่งซื้อ</span>
              </div>
              <div class="panel-body">

                
                <form role="form" method="post" action="{{URL::to('store/purchase/edit')}}" class="form-horizontal" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">เจ้าหนี้</label>
                    <div class="col-lg-8">
                      <div class="">
                        <select class="form-control select2" name="CID" style="min-width:300px;" required>
                         <?php
                          $data = Creditor::orderBy("CID","DESC")->get();
                          if($data){
                          foreach ($data as $key => $value){
                          ?>
                            <option value='<?php echo $value->CID;?>'><?php echo $value->Cname;?></option>

                          <?php }} ?>

                        </select>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">สินค้า</label>
                    <div class="col-lg-8">
                      <div class="">
                        <select class="form-control select2" name="PID" style="min-width:300px;" required>
                         <?php
                          $data = Product::orderBy("PID","DESC")->get();
                          if($data){
                          foreach ($data as $key => $value){
                          ?>
                            <option value='<?php echo $value->PID;?>'><?php echo $value->Pname;?></option>

                          <?php }} ?>

                        </select>
                      </div>
                    </div>
                  </div>


                  
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ราคาซื้อ</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->U_price;?>' placeholder="" name="U_price" class="form-control int" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">จำนวน</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->U_number;?>' placeholder="" name="U_number" class="form-control int" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">หมายเหตุ</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='<?php echo $rs->U_note;?>' placeholder="" name="U_note" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                     <label for="textArea3" class="col-lg-3 control-label"></label>
                     <input type="hidden" name="UID" id="UID" value='{{$rs->UID}}'>
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