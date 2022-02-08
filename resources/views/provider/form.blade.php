<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Provider Name <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="name" class="form-control" value="{{ $provider->name ?? old('name') }}" placeholder="Type Provider Name..." >
            </div>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Is Active? <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="form-control chosen-rtl"  name="is_active"  >
                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }} {{ isset($provider) && $provider->is_active == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }} {{ isset($provider) && $provider->is_active == '0' ? 'selected' : '' }}>Disable</option>
                </select>
            </div>
            @error('is_active') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Provider Name en <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="name_en" class="form-control" value="{{ $provider->name_en ?? old('name_en') }}" placeholder="Type Provider Name en..." >
            </div>
            @error('name_en') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
            {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
        </div>
    </div>

</div>
