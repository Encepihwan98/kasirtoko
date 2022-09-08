@extends('layout.master')

@section('content')
<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
        <form id="general-info" class="section general-info">
            <div class="info">
                <h6 class="">Informasi Pribadi</h6>
                <div class="row">
                    <div class="col-lg-11 mx-auto">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-sm-4 col-md-4">
                                <div class="upload mt-4 pr-md-4">
                                    <input type="file" id="input-file-max-fs" class="dropify" data-default-file="assets/img/200x200.jpg" data-max-file-size="2M" />
                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-sm-8 col-md-8 mt-md-0 mt-4">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="fullName">Nama Lengkap</label>
                                                <input type="text" value="{{ Auth::user()->name }}" class="form-control mb-4" id="fullName" placeholder="Full Name" value="Jimmy Turner">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="fullName">Email</label>
                                                <input type="email" value="{{ Auth::user()->email }}" class="form-control mb-4" id="email" placeholder="Full Name" value="Jimmy Turner">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="fullName">No Hp</label>
                                                <input type="text" value="{{ Auth::user()->phone_number }}" class="form-control mb-4" id="nohp" placeholder="Full Name" value="Jimmy Turner">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection