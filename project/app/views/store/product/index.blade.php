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

<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
  <div class="panel">
    <div class="panel-heading">
      <ul class="nav panel-tabs-border panel-tabs panel-tabs-left">
        <li class="active">
          <a href="#tab2_1" data-toggle="tab">ส่วนจัดการข้อมูลสินค้า</a>
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
              <a class="btn btn-success" href="{{URL::to('store/product/add')}}"><i class="fa fa-plus"></i> เพิ่มข้อมูลสินค้า</a>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">

                <table class="table table-condensed display" id='product-data' align="left">
                <thead>
                  <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>ประเภท</th>
                    <th>ขนาด</th>
                    <th>ราคาซื้อสด / บาท</th>
                    <th>ราคาซื้อเชื่อ / บาท</th>
                    <th>ราคาขายสด / บาท</th>
                    <th>ราคาขายเชื่อ / บาท</th>
                    <th></th>
                  </tr>
                </thead>


                 

                <tfoot>
                 <tr>
                    <th>รหัส</th>
                    <th>ชื่อ</th>
                    <th>ประเภท</th>
                    <th>ขนาด</th>
                    <th>ราคาซื้อสด / บาท</th>
                    <th>ราคาซื้อเชื่อ / บาท</th>
                    <th>ราคาขายสด / บาท</th>
                    <th>ราคาขายเชื่อ / บาท</th>
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