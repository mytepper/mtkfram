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
        <a href="{{URL::to('store/receive')}}">ใบรับคืนสินค้า</a>
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
          <a href="#tab2_1" data-toggle="tab">ส่วนจัดการข้อมูลใบรับคืนสินค้า</a>
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
              <a class="btn btn-success" href="{{URL::to('store/receive/add')}}"><i class="fa fa-plus"></i> เพิ่มข้อมูลใบรับคืนสินค้า</a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-condensed datatables" align="left">
                <thead>
                  <tr>
                    <th>รหัส</th>
                    <th>วันที่ออกบิล</th>
                    <th>ชื่อลูกค้า</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @if($data = Receive::get())
                  @foreach ($data as $key => $value)
                  <tr>
                    <td>
                      <a href="#modal" class="btn" data-toggle="modal" data-target="#modal-{{$value->id}}"> <i class="fa fa-search"></i> ดูรายการ</a>
                      <a href="{{URL::to('store/receive/pdf')}}/{{$value->id}}" target="_blank" class="btn"> <i class="fa fa-print"></i> พิมพ์</a>
                      CS{{$value->id}}
                    </td>
                    <td>{{Carbon\Carbon::parse($value->created_at)->format('d/m/Y - h:i:s a')}}</td>
                    <td>{{$value->CUname}}</td>
                    <td class="text-right">
                      <a class="btn btn-info" href="{{URL::to('store/receive/edit')}}/{{$value->id}}"><i class="fa fa-pencil"></i> Edit</a>
                      <a class="btn btn-danger" onclick="return confirm('Confirm');" href="{{URL::to('store/receive/delete')}}/{{$value->id}}"><i class="fa fa-remove"></i> Delete</a>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                  
                  
                </tbody>
                <tfoot>
                <th>รหัส</th>
                <th>วันที่ออกบิล</th>
                <th>ชื่อลูกค้า</th>
                <th></th>
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
@if($data = Receive::get())
@foreach ($data as $key => $value)
<div class="modal fade" id="modal-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ใบรับคืนสินค้า CS{{$value->id}}</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 

            <iframe width="100%" height="400" src="{{URL::to('store/receive/pdf')}}/{{$value->id}}"></iframe>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        <a href="{{URL::to('store/receive/pdf')}}/{{$value->id}}" target="_blank" class="btn"> <i class="fa fa-print"></i> พิมพ์</a>
      </div>
  </div>
</div>
</div>
@endforeach
@endif
<!-- END: PAGE MODAL -->
@stop