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
        <a href="{{URL::to('store/customer')}}">ลูกค้า</a>
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
          <a href="#tab2_1" data-toggle="tab">ส่วนจัดการข้อมูลลูกค้า</a>
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
              <a class="btn btn-success" href="{{URL::to('store/customer/add')}}"><i class="fa fa-plus"></i> เพิ่มข้อมูลลูกค้า</a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">

                <table class="table table-condensed display" id='customer-data' align="left">
                <thead>
                  <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>เบอร์โทร</th>
                    <th>ที่อยู่</th>
                    <th>แผนที่บ้าน</th>
                    <th>หมายเหตุ</th>
                    <th>วันที่บันทึก</th>
                    <th></th>
                  </tr>
                </thead>


                 

                <tfoot>
                 <tr>
                   <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>เบอร์โทร</th>
                    <th>ที่อยู่</th>
                    <th>แผนที่บ้าน</th>
                    <th>หมายเหตุ</th>
                    <th>วันที่บันทึก</th>
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