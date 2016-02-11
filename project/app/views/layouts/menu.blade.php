@section("menu")
  <!-- Start: Sidebar -->
  <aside id="sidebar_left" class="nano nano-light affix">
    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">
      <!-- Start: Sidebar Menu -->
      <ul class="nav sidebar-menu">
        
        <li class="sidebar-label pt15">Manage</li>
        
        <li>
          <a href="{{URL::to('store/creditor')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">เจ้าหนี้</span>
          </a>
        </li>

         <li>
          <a href="{{URL::to('store/catalog')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">ประเภทสินค้า</span>
          </a>
        </li>

         <li>
          <a href="{{URL::to('store/product')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">สินค้า</span>
          </a>
        </li>

          <li>
          <a href="{{URL::to('store/purchase')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">จัดซื้อ</span>
          </a>
        </li>

         <li>
          <a href="{{URL::to('store/customer')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">ลูกค้า</span>
          </a>
        </li>


        <li>
          <a href="{{URL::to('store/bill')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">ออกบิลเงินสด</span>
          </a>
        </li>

        <li>
          <a href="{{URL::to('store/ship')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">ออกบิลส่งของ</span>
          </a>
        </li>

        <li>
          <a href="{{URL::to('store/receive')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">ออกบิลรับคืนสินค้า</span>
          </a>
        </li>

        <li>
          <a href="{{URL::to('store/income')}}">
            <span class="glyphicons glyphicons-file"></span>
            <span class="sidebar-title">รายรับรายจ่าย</span>
          </a>
        </li>
        
      </ul>
      <!-- End: Sidebar Menu -->
      <!-- Start: Sidebar Collapse Button -->
      <div class="sidebar-toggle-mini">
        <a href="#">
          <span class="fa fa-sign-out"></span>
        </a>
      </div>
      <!-- End: Sidebar Collapse Button -->
    </div>
    <!-- End: Sidebar Left Content -->
  </aside>
  <!-- End: Sidebar Left -->
  @show