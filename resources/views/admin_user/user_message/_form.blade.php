<div class="material-card card">
    <div class="card-body">

        <div class="form-group">
            <h5>Select Users<span class="text-danger">*</span></h5>
            <div class="controls">
                <select class="select2 form-control" name="users[]" multiple="multiple" style="height: 36px;width: 100%;">
                    <option value="0" {{ isset($data->getMessage) && (in_array(0, $data->getMessage))?'selected':'' }}>All</option>
                    @if(!empty($users))
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ isset($data->getMessage) && (in_array($user->id, $data->getMessage))?'selected':'' }}>
                                {{ $user->name. " - ". $user->email }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @if ($errors->has('users'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('users') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Subject<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="subject" value="{{ old('subject', isset($data) ? $data->subject:'') }}" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('subject'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('subject') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Message<span class="text-danger">*</span></h5>
            <div class="controls">
                <textarea name="message" rows="5" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">{{ old('message', isset($data) ? $data->message:'') }}</textarea>
                @if ($errors->has('message'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('message') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>

