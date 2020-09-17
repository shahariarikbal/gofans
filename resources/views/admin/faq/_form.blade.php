<div class="material-card card">
    <div class="card-body">

        <div class="form-group">
            <h5>Select Category<span class="text-danger">*</span></h5>
            <div class="controls">
                <select name="faq_category_id" class="form-control{{ $errors->has('faq_category_id') ? ' is-invalid' : '' }}">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($data) && $data->faq_category_id == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('faq_category_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('faq_category_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Question<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="question" value="{{ old('question', isset($data) ? $data->question:'') }}" class="form-control{{ $errors->has('question') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('question'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('question') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Answer<span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea name="answer" rows="5" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">{{ old('answer', isset($data) ? $data->answer:'') }}</textarea>
                @if ($errors->has('answer'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('answer') }}</strong>
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

