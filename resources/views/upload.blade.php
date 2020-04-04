@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">File Uploader</div>

                    <div class="card-body">

                        <!-- print success message after file upload  -->
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                    Session::forget('success');
                                @endphp
                            </div>
                        @endif

                        <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="title">Image/file</label>
                                <input type="file" name="files[]" class="form-control-file" multiple="">
                                @if($errors->has('files'))
                                    <span class="help-block text-danger">{{ $errors->first('files') }}</span>
                                @endif
                            </div>

                            <div class="text-center">
                                <button class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
