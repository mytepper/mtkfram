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
        <a href="{{URL::to('store/catalog')}}">ประเภทสินค้า</a>
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
                <span class="panel-title">ข้อมูลประเภทสินค้า</span>
              </div>
              <div class="panel-body">

                <form role="form" method="post" action="{{URL::to('store/catalog/edit')}}" class="form-horizontal" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ชื่อประเภทสินค้า</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='{{$rs->Tname}}' placeholder="" name="Tname" class="form-control" required>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                     <label for="textArea3" class="col-lg-3 control-label"></label>
                     <input type="hidden" name="TID" value='{{$rs->TID}}'>
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