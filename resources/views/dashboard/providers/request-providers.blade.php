@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Providers Requests</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Providers Requests</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Requests</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($providers as $provider)
                    <tr>
                        <td>{{$provider->first_name}}</td>
                        <td>{{$provider->last_name}}</td>
                        <td>{{$provider->email}}</td>
                        <td>{{$provider->phone}}</td>
                        <td>{{$provider->address}}</td>
                        <td>
                            <a href="/admin/deleteUser/{{$provider->id}}"><i class="fa fa-trash text-danger"></i> </a>
                            <a title="more details" style="margin-left:5px;" href="/admin/providerDetails/{{$provider->id}}"><i class="fa fa-solid fa-eye"></i> </a>
                            <a type="button" class="btn btn-block btn-info btn-sm" href="#" data-toggle="modal" data-target="#provider-{{$provider->id}}" style="display: inline;width:50%;margin-left:5px" href="/admin/providerAccept/{{$provider->id}}">Accept </a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $providers->links() !!}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  {{-- accept provider  --}}
    @foreach($providers as $provider)
    <div class="modal fade" id="provider-{{$provider->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Business</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="forms-sample"  method="POST" enctype="multipart/form-data" action="/admin/providerAccept">
            @csrf
                <div class="modal-body">
                    @foreach($provider['mains'] as $license)
                    <div class="form-group">
                      <div class="form-check">
                          <input class="form-check-input" name="license[]" value="{{$license->id}}" type="checkbox">
                          <label class="form-check-label">{{$license->translate('en')->name}}</label>
                      </div>
                    </div>
                    @endforeach
                          <input class="form-check-input" name="id" value="{{$provider->id}}" type="hidden">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    @endforeach
@include('dashboard.layout.footer')
