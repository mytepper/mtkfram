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
    
      @if($errors->has()) 
      <p class="alert alert-danger">
      @foreach ($errors->all() as $error)
          {{ $error }}<br/>
      @endforeach
      </p>
      @endif

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
                <span class="panel-title">ข้อมูลเจ้าหนี้</span>
              </div>
              <div class="panel-body">

                <form role="form" method="post" action="{{URL::to('store/creditor/edit')}}" class="form-horizontal" enctype="multipart/form-data">

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ชื่อเจ้าหนี้</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='{{$rs->Cname}}' placeholder="" name="Cname" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">เบอร์โทรศัพท์</label>
                    <div class="col-lg-8">
                      <div class="">
                        <input type="text" value='{{$rs->Ctel}}' placeholder="" name="Ctel" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="inputStandard">ที่อยู่</label>
                    <div class="col-lg-8">
                      <div class="">
                        <textarea class="form-control" name="Caddress">{{$rs->Caddress}}</textarea>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                     <label for="textArea3" class="col-lg-3 control-label"></label>
                     <input type="hidden" name="CID" value='{{$rs->CID}}'>
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