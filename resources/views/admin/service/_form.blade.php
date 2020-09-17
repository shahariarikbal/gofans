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
            <h5>Link Heading</h5>
            <div class="controls">
                <input type="text" name="link_heading" value="{{ old('link_heading', isset($data) ? $data->link_heading:'') }}" class="form-control{{ $errors->has('link_heading') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('link_heading'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('link_heading') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <h5>Link Label</h5>
            <div class="controls">
                <input type="text" name="link_label" value="{{ old('link_label', isset($data) ? $data->link_label:'') }}" class="form-control{{ $errors->has('link_label') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('link_label'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('link_label') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <h5>Link view Label</h5>
            <div class="controls">
                <input type="text" name="link_view_label" value="{{ old('link_view_label', isset($data) ? $data->link_view_label:'') }}" class="form-control{{ $errors->has('link_view_label') ? ' is-invalid' : '' }}">
                @if ($errors->has('link_view_label'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('link_view_label') }}</strong>
                    </span>
                @endif
            </div>
        </div>

       {{--  <div class="form-group">
            <h5>Service Type</h5>
            <div class="controls">
                <input type="text" readonly name="service_type" value="{{ old('service_type', isset($data) ? $data->service_type:'') }}" class="form-control{{ $errors->has('service_type') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('service_type'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('service_type') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Keyword Option</h5>
            <div class="controls">
                <input type="text" name="keyword_option" value="{{ old('keyword_option', isset($data) ? $data->keyword_option:'') }}" class="form-control{{ $errors->has('keyword_option') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('keyword_option'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('keyword_option') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Mode</h5>
            <div class="controls">
                <input type="text" readonly name="mode" value="{{ old('mode', isset($data) ? $data->mode:'') }}" class="form-control{{ $errors->has('mode') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('mode'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mode') }}</strong>
                    </span>
                @endif
            </div>
        </div>
 --}}
        

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

