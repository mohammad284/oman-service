
@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Privacy & Term</h2>
            <form   method="POST" enctype="multipart/form-data" action="/admin/changePrivacy">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Privacy /En:</label>
                                    <textarea type="search" rows="4" class="form-control form-control-lg" name="privacy_en" placeholder="Type your keywords here" value="">{{$data->translate('en')->privacy}}</textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Privacy /Ar:</label>
                                    <textarea type="search" rows="4" class="form-control form-control-lg" name="privacy_ar" placeholder="Type your keywords here" value="">{{$data->translate('ar')->privacy}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Term / En:</label>
                                    <textarea type="search" rows="4" class="form-control form-control-lg" name="term_en" placeholder="Type your keywords here" value="">{{$data->translate('en')->term}}</textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Term / Ar:</label>
                                    <textarea type="search" rows="4" class="form-control form-control-lg" name="term_ar" placeholder="Type your keywords here" value="">{{$data->translate('ar')->term}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
  </div>

  @include('dashboard.layout.footer')