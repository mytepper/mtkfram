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

<!-- Begin: Content -->
<section id="content" class="animated fadeIn">
   <div class="row">
        <div class="col-md-12">
         <div class="panel">
              <div class="panel-heading">
                <span class="panel-title">ข้อมูลลูกค้า</span>
              </div>
              <div class="panel-body">

                <form role="form" method="post" action="{{URL::to('store/customer/add')}}" class="form-horizontal" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ชื่อลูกค้า</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" placeholder="" name="CUname" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">เบอร์โทรศัพท์</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" placeholder="" name="CUtel" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ที่อยู่</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" placeholder="" name="CUaddress" class="form-control" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">แผนที่บ้าน ( Google maps )</label>
                    <div class="col-lg-8">
                      <div class="">
                        <textarea name="CUmap" class="form-control"></textarea>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">หมายเหตุ</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" placeholder="" name="CUnote" class="form-control" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                     <label for="textArea3" class="col-lg-3 control-label"></label>
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