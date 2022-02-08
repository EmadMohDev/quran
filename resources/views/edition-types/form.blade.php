<input type="hidden" name="id" value="{{ $edition_type->id ?? '' }}">
<div class="row">
    <div class="col-md-10">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Edition Type Title <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="title" class="form-control" value="{{ $edition_type->title ?? old('title') }}" placeholder="Type Edition Type Title..." >
            </div>
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary" style="margin-top: 33px;">Save</button>
    </div>
</div>
