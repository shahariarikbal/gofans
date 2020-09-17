<div class="material-card card">
    <div class="card-body">

        <div class="form-group">
            <h5>Select Subject<span class="text-danger">*</span></h5>
            <div class="controls">
                <select class="form-control{{ $errors->has('subject_id') ? ' is-invalid' : '' }}" name="subject_id" required data-validation-required-message="This field is required">
                    <option>-- Select Subject --</option>
                    @if(!empty($subjects))
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ (!empty($data)) && $data->subject_id == $subject->id ? 'selected':'' }}>{{ $subject->name}}</option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('subject_id'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('subject_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Message<span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea name="message" rows="10" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">{{ old('message', isset($data) ? $data->message:'') }}</textarea>
                @if ($errors->has('message'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>
        </div>


    </div>
</div>

