@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub To Main Businesses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub To Main Businesses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <form   method="POST" enctype="multipart/form-data" action="/admin/save_sub_to_main">
          @csrf
              <div class="card-body">            
                  <div class="row">
                  {{-- name --}}
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                        <label>machines</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" name="subs[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                              @foreach($subs as $sub)
                                <option value="{{$sub->id}}"  @foreach($main['subs'] as $sub_m)  @if($sub_m->id == $sub->id) selected @endif @endforeach>{{$sub->name}}</option>
                               
                              @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="row mb-12">
                          <div class="col-md-12">
                              <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$main->id}}" name="id"  required/>
                          </div>
                        </div>
                        <!-- /.form-group -->  
                    </div>
                  </div>
                  <!-- /.row -->
              </div>
              <div class="modal-footer justify-content-between">
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
          </form>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>name</th>
                      <th>created</th>
                      <th>updated</th>
                      <th>option</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($main['subs'] as $sub)
                    <tr>
                      <td>{{$sub->name}}</td>
                      <td>{{$sub->created_at}}</td>
                      <td>{{$sub->updated_at}}</td>
                      <td><a href="" >
                        <a href="/admin/delete_main_sub/{{$main->id}}/{{$sub->id}}"><i class="fa fa-trash text-danger"></i> </a>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
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

@include('dashboard.layout.footer')
