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
                <div class="custom-control custom-radio">
                    <input type="radio" id="active" value="1" {{ isset($data) && $data->status == 1 ? 'checked':'' }} name="status" class="custom-control-input">
                    <label class="custom-control-label" for="active">Active</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="inactive" value="0" {{ isset($data) && $data->status == 0 ? 'checked':'' }} name="status" class="custom-control-input">
                    <label class="custom-control-label" for="inactive">Inactive</label>
                </div>
                @if ($errors->has('status'))
                    <strong class="text-danger">{{ $errors->first('status') }}</strong>
                @endif
            </div>
        </div>
    </div>
</div>

