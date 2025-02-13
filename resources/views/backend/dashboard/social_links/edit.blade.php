@extends('backend.dashboard.dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-10 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit - {{$socialLink->platform}} Information</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('social-links.update', $socialLink->id)}}" method ="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <h6 class="heading-small text-muted mb-4">Information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Platform</label>
                                            <select name="platform" class ="form-control">
                                                <option disabled selected value="">Select Platform</option>
                                                <option @selected($socialLink->platform =='facebook' ) value="facebook">Facebook</option>
                                                <option @selected($socialLink->platform =='instagram' ) value="instagram">Instagram</option>
                                                <option @selected($socialLink->platform =='twitter' ) value="twitter">Twitter</option>
                                                <option @selected($socialLink->platform =='linkedin' ) value="linkedin">Linkedin</option>
                                                <option @selected($socialLink->platform =='youtube' ) value="youtube">youtube</option>
                                                <option @selected($socialLink->platform =='tiktok' ) value="tiktok">Tiktok</option>
                                                <option @selected($socialLink->platform =='whatsapp' ) value="whatsapp">Whatsapp</option>
                                            </select>
                                            @error('platform')
                                                <div class="alert text-danger" style="font-weight: bold;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Link or number</label>
                                            <input type="link" value="{{ old('link', $socialLink->link) }}" name="link"
                                                class="form-control" placeholder="Paste your link here">
                                            @error('link')
                                                <div class="alert text-danger" style="font-weight: bold;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="d-flex mt-3 justify-content-end">
                            <a href="{{ route('social-links.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
