
@include('dashboard.layout.header')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">About Us</h2>
            <form   method="POST" enctype="multipart/form-data" action="/admin/changeAbout">
                @csrf
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>FaceBook:</label>
                                    <input type="search" class="form-control form-control-lg" name="faceBook" placeholder="Type your keywords here" value="{{$about->faceBook}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Instagram:</label>
                                    <input type="search" class="form-control form-control-lg" name="insta" placeholder="Type your keywords here" value="{{$about->insta}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Linked In:</label>
                                    <input type="search" class="form-control form-control-lg" name="linked" placeholder="Type your keywords here" value="{{$about->linked}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Website:</label>
                                    <input type="search" class="form-control form-control-lg" name="website" placeholder="Type your keywords here" value="{{$about->website}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="search" class="form-control form-control-lg" name="address" placeholder="Type your keywords here" value="{{$about->address}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>phone:</label>
                                    <input type="search" class="form-control form-control-lg" name="phone" placeholder="Type your keywords here" value="{{$about->phone}}">
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