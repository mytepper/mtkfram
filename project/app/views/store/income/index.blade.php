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
        <a href="{{URL::to('store/income')}}">รายรับรายจ่าย</a>
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
          <a href="#tab2_1" data-toggle="tab">ส่วนจัดการข้อมูลรายรับรายจ่าย</a>
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
              <a class="btn btn-success" href="#modal" data-toggle="modal" data-target="#modal">
                <i class="fa fa-plus"></i> เพิ่มข้อมูลรายรับรายจ่าย
              </a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <form action="{{URL::to('store/income')}}">

                <input type="text" class="datepicker" value="<?php if(isset($_GET['date1'])) echo $_GET['date1'];?>" data-date-format="yyyy-mm-dd" name="date1" data-msg="*" required readonly=""> - 
                <input type="text" class="datepicker" value="<?php if(isset($_GET['date2'])) echo $_GET['date2'];?>" data-date-format="yyyy-mm-dd" name="date2" data-msg="*" required readonly="">
                <button type="submit">ค้นหา</button>
                <button type="button" onclick="window.location='{{URL::to('store/income')}}'">เริ่มใหม่</button>
              </form>
              <hr>
              <table class="table table-condensed datatables" align="left">
                <thead>
                  <tr>
                    <th>วันที่</th>
                    <th>ประเภท</th>
                    <th>รายการ</th>
                    <th>จำนวนเงิน</th>
                    <th>รายรับจาก / รายจ่ายให้</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(isset($_GET['date1'])){
                    $data = Income::whereDate('created_at', '>=', $_GET['date1']." 00:00:00")
                                  ->whereDate('created_at', '<=', $_GET['date2']." 00:00:00")->get();
                  }else{
                    $data = Income::get();
                  }
                  ?>
                  


                  @if($data)
                  @foreach ($data as $key => $value)
                  <tr>
                    <td>{{Carbon\Carbon::parse($value->created_at)->format('d/m/Y')}}</td>
                    
                      @if($value->type==1)
                      <td class="bg-success">รายรับ
                      @elseif($value->type==2)
                      <td class="bg-danger">รายจ่าย
                      @endif
                    </td>

                    <td>{{$value->name}}</td>
                    <td>{{@number_format($value->total)}}</td>
                    <td>{{$value->customer}}</td>
                    <td class="text-right">
                      <a class="btn btn-info" data-toggle="modal" data-target="#modal-{{$value->id}}" href="#modal"><i class="fa fa-pencil"></i> Edit</a>
                      <a class="btn btn-danger" onclick="return confirm('Confirm');" href="<?php echo URL::to('store/income/delete');?>/<?php echo $value->id;?>"><i class="fa fa-remove"></i> Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                  
                </tbody>
                 <tfoot>
                  <tr>
                    <th>วันที่</th>
                    <th>ประเภท</th>
                    <th>รายการ</th>
                    <th>จำนวนเงิน</th>
                    <th>รายรับจาก / รายจ่ายให้</th>
                    <th></th>
                  </tr>
                </tfoot>
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
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg">
  <form action="{{URL::to('store/income/add')}}" method="post" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายรับรายจ่าย</h4>
      </div>
      <div class="modal-body">
        <div class="panel">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">ประเภท</label>
                  <div class="col-lg-8">
                    <div class="">
                      <select class="form-control" name="type">
                        <option value="1">รายรับ</option>
                        <option value="2">รายจ่าย</option>
                      </select>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">รายการ</label>
                  <div class="col-lg-8">
                    <div class="">
                      <input type="text" placeholder="" name="name" class="form-control" required>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">จำนวนเงิน</label>
                  <div class="col-lg-8">
                    <div class="">
                      <input type="text" placeholder="" name="total" class="form-control int" required>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">รายรับจาก / รายจ่ายให้</label>
                  <div class="col-lg-8">
                    <div class="">
                      <input type="text" placeholder="" name="customer" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </form>
</div>
</div>
@if($data = Income::get())
@foreach ($data as $key => $value)


<div class="modal fade" id="modal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg">
  <form action="{{URL::to('store/income/edit')}}" method="post" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">รายรับรายจ่าย</h4>
      </div>
      <div class="modal-body">
        <div class="panel">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">ประเภท</label>
                  <div class="col-lg-8">
                    <div class="">
                      <select class="form-control" name="type">
                        <option value="1" <?php if($value->type==1) echo 'selected'; ?>>รายรับ</option>
                        <option value="2" <?php if($value->type==2) echo 'selected'; ?>>รายจ่าย</option>
                      </select>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">รายการ</label>
                  <div class="col-lg-8">
                    <div class="">
                      <input type="text" placeholder="" value="{{$value->name}}" name="name" class="form-control" required>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">จำนวนเงิน</label>
                  <div class="col-lg-8">
                    <div class="">
                      <input type="text" placeholder="" value="{{$value->total}}" name="total" class="form-control int" required>
                    </div>
                  </div>
                </div>
                <br><br>
                <div class="form-group">
                  <label class="col-lg-3 control-label" for="inputStandard">รายรับจาก / รายจ่ายให้</label>
                  <div class="col-lg-8">
                    <div class="">
                      <input type="text" placeholder="" value="{{$value->customer}}" name="customer" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="{{$value->id}}">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <button type="submit" class="btn btn-primary">บันทึก</button>
      </div>
    </div>
  </form>
</div>
</div>



@endforeach
@endif
<!-- END: PAGE MODAL -->
@stop