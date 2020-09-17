<div class="material-card card">
    <div class="card-body">
        <div class="form-group">
            <h5>Select Role<span class="text-danger">*</span></h5>
            <div class="controls">
                <select class="form-control" name="role" required data-validation-required-message="This field is required">
                    <option>-- Select Role --</option>
                    <option value="admin" {{ !empty($data) && isset($data->role) == 'admin' ? 'selected':'' }}>Admin</option>
                    <option value="super_admin" {{ !empty($data) && isset($data->role) == 'super_admin' ? 'selected':'' }}>Super Admin</option>
                </select>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

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
            <h5>Email<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="email" name="email" value="{{ old('email', isset($data) ? $data->email:'') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        @if(empty($data))
        <div class="form-group">
            <h5>Password<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <h5>Confirm Password<span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="password" name="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" required data-validation-required-message="This field is required">
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        @endif

    </div>
</div>

