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

<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <div class="panel">
    <div class="panel-heading">
      <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
        <li class="active">
          <a href="#tab2_1" data-toggle="tab">ส่วนจัดการข้อมูลการสั่งซื้อ</a>
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
               
              {{$id = PurchaseBill::max('PBID')}}
              {{$id = $id+1}}
              
              <a class="btn btn-success" href="{{URL::to('store/purchase/add')}}/{{$id}}"><i class="fa fa-plus"></i> เพิ่มข้อมูลการสั่งซื้อ</a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">


                <table class="table table-condensed display datatables" id='' align="left">
                <thead>
                  <tr>
                    <th>รหัส</th>
                    <th>จำนวนรายการ</th>
                    <th>วันที่สร้าง</th>
                    <th width="220"></th>
                  </tr>
                </thead>
                @if($get)
                  @foreach($get as $key => $value)
                  {{$count = Purchase::count($value->PBID)}}
                <tr>
                  <td>PB{{$value->PBID}}</td>
                  <td>{{$count}}</td>
                  <td class="sorting_1">{{Carbon\Carbon::parse($value->PB_create)->format('d/m/Y - h:i:s a')}}</td>
                  <td width="30%"> 
                   @if($value->PB_status==1)
                   <a class="check btn btn-success " href="{{URL::to('store/purchase/pay/')}}/{{$value->PBID}}"><i class="fa fa-check"></i> ชำระเงินแล้ว</a>
                   @else
                   <a class="check btn btn-danger " href="{{URL::to('store/purchase/pay/')}}/{{$value->PBID}}"><i class="fa fa-remove"></i> ยังไม่ได้ชำระเงิน</a>
                   @endif
                   <a class="view btn btn-info " href="{{URL::to('store/purchase/add/')}}/{{$value->PBID}}"><i class="fa fa-cog"></i> Manager</a> 
                   <a class="remove btn btn-danger" onclick="return confirm('COnfirm !!');" href="{{URL::to('store/purchase/delete_bill/')}}/{{$value->PBID}}"><i class="fa fa-remove"></i> Delete</a>
                 </td>
               </tr>
                  @endforeach

                @endif
                <tfoot>
                 <tr>
                    <th>รหัส</th>
                    <th>จำนวนรายการ</th>
                    <th>วันที่สร้าง</th>
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


<!-- END: PAGE MODAL -->
@stop