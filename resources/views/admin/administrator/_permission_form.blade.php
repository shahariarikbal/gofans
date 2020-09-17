<div class="material-card card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tr class="bg-gradient-light">
                    <th>#S.No</th>
                    <th>Module Name</th>
                    <th class="text-center" colspan="3">Permission</th>
                </tr>
                @if(!empty($modules))
                    @foreach($modules as $key => $module)
                    <tr>
                        <td width="8%">
                            {{ ++$key }}
                        </td>

                        <td>
                            {{ $module['module_name'] }}
                        </td>
                        @if(!empty($module['access']))
                            @foreach($module['access'] as $access)
                                <td>
                                    <div class="form-check form-check-inline">
                                        <div class="custom-control custom-checkbox">
                                            <input {{ (isset($permission[$module['route_name']]) && in_array($access, $permission[$module['route_name']]))?'checked':'' }} type="checkbox" name="access[{!! $module['route_name'] !!}][]" value="{{ $access }}" class="custom-control-input" id="{{ $access.$key }}">
                                            <label class="custom-control-label" for="{{ $access.$key }}">{{ $access }}</label>
                                        </div>
                                    </div>
                                </td>
                            @endforeach
                        @endif
                    </tr>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</div>

