@include('admin.layout.header')

<body class="">
  <div class="wrapper">
    @include('admin.layout.sidebar')>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      @include('admin.layout.nav')
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <!-- <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                    {{-- @yield('content') --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
      @include('admin.layout.footer')
    </div>
  </div>
  @yield('script')
  @include('admin.layout.script')
</body>

</html>