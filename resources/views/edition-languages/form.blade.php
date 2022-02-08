<input type="hidden" name="id" value="{{ $edition_language->id ?? '' }}">
<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Edition Languages Name <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="name" class="form-control" value="{{ $edition_language->name ?? old('name') }}" placeholder="Type Edition Language Name..." >
            </div>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" style="margin-top: 33px;">Save</button>
    </div>
</div>
