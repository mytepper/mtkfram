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
        <a href="{{URL::to('store/ship')}}">ใบส่งของ</a>
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
                <span class="panel-title">ข้อมูลใบส่งของ</span>
              </div>
              <div class="panel-body">

                <form role="form" method="post" action="{{URL::to('store/ship/add')}}" class="form-horizontal" enctype="multipart/form-data">

                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">รหัสบิล</label>
                    <div class="col-lg-8">
                      <div class="">
                        CS{{$b = Ship::max('id')+1}}
                        <input type="hidden" placeholder="" name="id" class="form-control" value="{{$b}}" required>
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ลูกค้า</label>
                    <div class="col-lg-8">
                      <div class="">
                        <select class='form-control select2' name="CUID" >
                          @if(Customer::get())
                          @foreach(Customer::get() as $key => $value)

                            <option value="{{$value->CUID}}">{{$value->CUname}} ( {{$value->CUtel}} )</option>

                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                  </div>

                  <hr>

                   <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">สินค้า</label>
                    <div class="col-lg-8">
                      <div class="">
                        <select class='form-control select2' id="PID" >
                          @if(Product::get())
                          @foreach(Product::get() as $key => $value)

                            <option value="{{$value->PID}}">{{$value->Tname}} ( {{$value->Pname}} ) ขนาด ( {{$value->Psize}} )</option>

                          @endforeach
                          @endif
                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ราคา</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" placeholder="" id="price" class="form-control int" >
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">จำนวน</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" placeholder="" id="unit" class="form-control int" >
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">หมายเหตุ</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" placeholder="" id="note" class="form-control" >
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                     <label for="textArea3" class="col-lg-3 control-label"></label>
                    <button type="button" class="btn add_data_ship btn-success"><i class="fa fa-plus"></i> เพิ่มรายการ</button>
                  </div>


                  <hr>

                  <table class="table">
                    <thead>
                      <tr>
                          <th>รหัสสินค้า</th>
                          <th>ชื่อสินค้า</th>
                          <th>ขนาดบรรจุ</th>
                          <th>ราคา</th>
                          <th>จำนวน</th>
                          <th>รวมราคา</th>
                          <th>หมายเหตุ</th>
                          <th></th>
                      </tr>
                    </thead>
                    <tbody class="append_data">

                    </tbody>
                  </table>

                  <hr>

                  <div class="form-group">
                     <label for="textArea3" class="col-lg-10 control-label"></label>
                    <button type="submit" onclick="return confirm('Confirm');" class="btn btn-primary">
                      <i class="fa fa-save"></i> บันทึกบิล</button>  
                  </div>

                </form>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Content -->
<script type="text/javascript">
window.onbeforeunload = function(){
  return 'Are you sure you want to leave?';
};
</script>
@stop