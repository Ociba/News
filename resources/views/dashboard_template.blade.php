<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

@include('layouts.admin.css')
<body>
  <!-- Sidenav -->
  @include('layouts.admin.sidebar')
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('layouts.admin.topnav')
    <!-- Header -->
    <!-- Header -->
    @include('layouts.admin.breadcrumb')
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
            @yield('content')
        </div>
      </div>
      <!-- Footer -->
      @include('layouts.admin.footer')
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  @include('layouts.admin.javascript')
</body>

</html>