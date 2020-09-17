<div class="material-card card">
    <div class="card-body">

        <div class="form-group">
            <h5>Name<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" value="{{ old('name', isset($data) ? $data->name:'') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Status<span class="text-danger">*</span></h5>
            <div class="controls">
                <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input {{ $errors->has('status') ? ' is-invalid' : '' }}" {{ isset($data->status) && $data->status  == 1 ? 'checked':'' }} value="1" id="active" name="status">
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input {{ $errors->has('status') ? ' is-invalid' : '' }}" {{ isset($data->status) && $data->status == 0 ? 'checked':'' }} value="0" id="inactive" name="status">
                        <label class="custom-control-label" for="inactive">Inactive</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

