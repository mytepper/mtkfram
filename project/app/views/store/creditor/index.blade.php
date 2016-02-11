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
        <a href="{{URL::to('store/creditor')}}">เจ้าหนี้</a>
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

<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <div class="panel">
    <div class="panel-heading">
      <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
        <li class="active">
          <a href="#tab2_1" data-toggle="tab">ส่วนจัดการข้อมูลเจ้าหนี้</a>
        </li>        
        
      </ul>
    </div>
    <div class="panel-body">
      <div class="tab-content pn br-n">
        <div id="tab2_1" class="tab-pane active">
          <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
              <a class="btn btn-success" href="{{URL::to('store/creditor/add')}}"><i class="fa fa-plus"></i> เพิ่มข้อมูลเจ้าหนี้</a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-condensed datatables" align="left">
                <thead>
                  <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>ที่อยู่</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $data = Creditor::orderBy("CID","DESC")->get();
                  if($data){
                  foreach ($data as $key => $value){
                  ?>
                  <tr>
                    <td><?php echo $value->Ccode;?><?php echo $value->CID;?></td>
                    <td><?php echo $value->Cname;?></td>
                    <td><?php echo $value->Ctel;?></td>
                    <td><?php echo $value->Caddress;?></td>
                    <td class="text-right">
                      <a class="btn btn-info" href="<?php echo URL::to('store/creditor/edit');?>/<?php echo $value->CID;?>"><i class="fa fa-pencil"></i> Edit</a>
                      <a class="btn btn-danger" onclick="return confirm('Confirm');" href="<?php echo URL::to('store/creditor/delete');?>/<?php echo $value->CID;?>"><i class="fa fa-remove"></i> Delete</a>
                    </td>
                  </tr>
                  <?php  }}?>
                  
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

</section>
<!-- End: Content -->
<!-- START: PAGE MODAL -->


<!-- END: PAGE MODAL -->
@stop