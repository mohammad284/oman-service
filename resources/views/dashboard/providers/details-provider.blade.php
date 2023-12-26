@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Provider Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Provider Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset ($provider->image) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"@if($provider->status == 1) style="color : green;"@elseif($provider->status == 0) style="color : red;" @endif>{{$provider->first_name}} {{$provider->last_name}}</h3>

                <p class="text-muted text-center">{{$provider->email}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Tenders</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item">
                    <b>Offers</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item">
                    <b>Deals</b> <a class="float-right">13,287</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> phone</strong>

                <p class="text-muted">
                  {{$provider->phone}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{$provider->address}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Licenses</strong>

                <p class="text-muted">
                @foreach($provider['mains'] as $license)
                    <span class="tag tag-danger" >{{$license->translate('en')->name}}</span><br>
                @endforeach
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Experience</strong>

                <p class="text-muted">{{$provider->experience}}</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">معرض الاعمال</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">شهاداته</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <!-- /.user-block -->
                      <div class="row mb-3">
                        <!-- /.col -->
                        <div class="col-sm-12">
                          <div class="row">
                          @foreach($provider['gallery'] as $img)
                            <div class="col-sm-6">
                              <img class="img-fluid mb-3" src="{{asset($img->image)}}" alt="Photo">
                            </div>
                            @endforeach
                            <!-- /.col -->
                          </div>
                          <!-- /.row -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Certificate</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($provider['certificates'] as $cre)
                                <tr>
                                    <td>@if($cre->type == 1)CR @else Professional certificate @endif</th>
                                    <td><a type="button" class="btn btn-block btn-info btn-sm" href="/admin/downloadFile/{{$cre->id}}">Download </a></th>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@include('dashboard.layout.footer')