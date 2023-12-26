@include('dashboard.layout.header')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Answers To Question </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Answers To Question </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <form   method="POST" enctype="multipart/form-data" action="/admin/save_answer_to_question">
          @csrf
              <div class="card-body">            
                  <div class="row">
                    {{-- name --}}
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                        <label>Answers</label>
                        <div class="select2-purple">
                            <select class="select2" multiple="multiple" name="answers[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                              @foreach($answers as $answer)
                                <option value="{{$answer->id}}" @foreach($question['answers'] as $answer_m)  @if($answer_m->id == $answer->id) selected @endif @endforeach >{{$answer->translate('en')->answer}}</option>
                              @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="row mb-12">
                          <div class="col-md-12">
                              <input class="form-control mb-4 mb-md-0" type="hidden" value="{{$question->id}}" name="id"  required/>
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
                      <th>Answer/En</th>
                      <th>Answer/Ar</th>
                      <th>option</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($question['answers'] as $answer)
                    <tr>
                        <td>{{$answer->translate('en')->answer}}</td>
                        <td>{{$answer->translate('ar')->answer}}</td>
                        <td>
                        <a href="/admin/delete_question_answer/{{$question->id}}/{{$answer->id}}"><i class="fa fa-trash text-danger"></i> </a>
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
