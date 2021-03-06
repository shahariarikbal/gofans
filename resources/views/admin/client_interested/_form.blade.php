<div class="material-card card">
    <div class="card-body">

        <div class="form-group">
            <h5>Name<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="title" value="{{ old('title', isset($data) ? $data->title:'') }}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <h5>Description</h5>
            <div class="controls">
                <textarea type="text" name="description"  class="form-control">{{old('description', isset($data) ? $data->description:'')}}</textarea>
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
                        <input type="radio" class="custom-control-input" {{ isset($data->status) && $data->status  == 1 ? 'checked':'' }} value="1" id="active" name="status">
                        <label class="custom-control-label" for="active">Active</label>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" {{ isset($data->status) && $data->status == 0 ? 'checked':'' }} value="0" id="inactive" name="status">
                        <label class="custom-control-label" for="inactive">Inactive</label>
                    </div>
                </div>
                @if ($errors->has('status'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>



    </div>
</div>

