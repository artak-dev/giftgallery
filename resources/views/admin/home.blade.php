<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name = "_token"  content = "{{ csrf_token() }}" >
  <meta name = "_url"    content = "{{ url('/') }}">
  <title>Gift Gallery</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 
  <link rel="stylesheet" href="{{ asset('assets/css/admin/all.min.css') }}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{ asset('assets/css/admin/icheck-bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/admin/OverlayScrollbars.min.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/css/admin/adminlte.min.css') }} ">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>


    <ul class="navbar-nav ml-auto">

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="{{ asset('assets/images/logo.jpg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
 
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">

            <div class="media">
              <img src="{{ asset('assets/images/logo.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
  
            <div class="media">
              <img src="{{ asset('assets/images/logo.jpg')}}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>

          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>



  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/images/logo-mini.jpg')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Gift Gallery</span>
    </a>

 
    <div class="sidebar">

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</a>
        </div>
      </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
              <p class="nav-link orders-btn">
                Պատվերներ
              </p>
          </li>
          <li class="nav-item has-treeview">
              <p class="nav-link add-new-product">
                Ավելացնել նոր ապրանք
              </p>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
   
            </ul>
          </li>

        </ul>
      </nav>

    </div>

  </aside>


  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <form id = "create-post" action="{{ route('adminCreatePost')}}" method ="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="product_name">ապրանքի անվանումը</label>
                  <input type="text" name = "product_name" class="form-control" id="product_name">
                </div>
                <div class="form-group col-md-6">
                  <label for="product_description">նկարագրություն</label>
                  <input type="text" class="form-control" id="product_description" name="product_description">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <h1 class="m-0 text-dark">Ավելացնել ապրանք</h1>
                  <label for="product_type">տեսակը</label>
                  <select class="form-control" id="product_type" name="product_type">
                      <option value = "0" disabled="true" selected>Ընտրեք տեսակը</option>
                    @foreach($categorys as $category)
                      <option value = "{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="product_price">արժեքը</label>
                  <input type="text" class="form-control" id="product_price" name ="product_price">
                </div>
              </div>
              <div class="form-group">
                <label for="product_image">գլխավոր նկարը</label>
                <input type="file" class="form-control" id="product_image" name ="product_image">
              </div>
              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="product_image_1">նկար 1</label>
                  <input type="file" class="form-control" id="product_image_1" name="product_image_1">
                </div>
                <div class="form-group col-md-3">
                  <label for="product_image_2">նկար 2</label>
                  <input type="file" class="form-control" id="product_image_2" name="product_image_2">
                </div>
                <div class="form-group col-md-3">
                  <label for="product_image_3">նկար 3</label>
                  <input type="file" class="form-control" id="product_image_3" name="product_image_3">
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Առաջ</button>
            </form>
          </div>
        </div>
        <div class="col-sm-12">
          <h4>Նոր պատվերներ</h4>
            <table id="ordersTable" class="table table-striped table-bordered" style="width:100%" >
            <thead>
                <tr>
                    <th>Պատվերի համար</th>
                    <th>Կարգավիճակ</th>
                    <th>Անվանում</th>
                    <th></th>
                    <th>Քանակ</th>
                    <th>Արժեք</th>
                    <th>պատվիրատու</th>
                    <th>Վճարման տարբերակ</th>
                    <th>Վճարման գումարը</th>
                </tr>
            </thead>
          </table>
          </div>
          <div class="col-sm-12">
            <h4>Պատրաստ են առաքման</h4>
            <table id="readyToShippordersTable" class="table table-striped table-bordered" style="width:100%" >
            <thead>
                <tr>
                    <th>Պատվերի համար</th>
                    <th>Կարգավիճակ</th>
                    <th>Անվանում</th>
                    <th></th>
                    <th>Քանակ</th>
                    <th>Արժեք</th>
                    <th>պատվիրատու</th>
                    <th>Վճարման տարբերակ</th>
                    <th>Վճարման գումարը</th>
                </tr>
            </thead>
          </table>
          </div>
      </div>
    </div>

        </div>
        
      </div>
    </section>
  </div>
  <footer class="main-footer">
  </footer>
</div>
<script src="{{ asset('assets/js/jquery-3.2.1.min.js')}}" ></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/js/admin.js')}}"></script>
</body>
</html>
