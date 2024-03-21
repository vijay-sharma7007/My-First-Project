@extends('sidebar')
@section('main-section')
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!--  Main wrapper -->
    <div class="body-wrapper">

      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Buttons</h5>
              <div class="card">
                <div class="card-body p-4">
                  <button type="button" class="btn btn-primary m-1">Primary</button>
                  <button type="button" class="btn btn-secondary m-1">Secondary</button>
                  <button type="button" class="btn btn-success m-1">Success</button>
                  <button type="button" class="btn btn-danger m-1">Danger</button>
                  <button type="button" class="btn btn-warning m-1">Warning</button>
                  <button type="button" class="btn btn-info m-1">Info</button>
                  <button type="button" class="btn btn-light m-1">Light</button>
                  <button type="button" class="btn btn-dark m-1">Dark</button>
                  <button type="button" class="btn btn-link m-1">Link</button>
                </div>
              </div>
              <h5 class="card-title fw-semibold mb-4">Outline buttons</h5>
              <div class="card mb-0">
                <div class="card-body p-4">
                  <button type="button" class="btn btn-outline-primary m-1">Primary</button>
                  <button type="button" class="btn btn-outline-secondary m-1">Secondary</button>
                  <button type="button" class="btn btn-outline-success m-1">Success</button>
                  <button type="button" class="btn btn-outline-danger m-1">Danger</button>
                  <button type="button" class="btn btn-outline-warning m-1">Warning</button>
                  <button type="button" class="btn btn-outline-info m-1">Info</button>
                  <button type="button" class="btn btn-outline-light m-1">Light</button>
                  <button type="button" class="btn btn-outline-dark m-1">Dark</button>
                  <button type="button" class="btn btn-outline-link m-1">Link</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
@endsection