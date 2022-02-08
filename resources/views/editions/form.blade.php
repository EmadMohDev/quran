<input type="hidden" name="id" value="{{ $edition->id ?? '' }}">
<div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Edition Identifier <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="text" name="identifier" class="form-control" value="{{ $edition->identifier ?? old('identifier') }}" placeholder="Type Edition Identifier..." >
                </div>
                @error('identifier') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Edition Name <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="text" name="name" class="form-control" value="{{ $edition->name ?? old('name') }}" placeholder="Type Edition Name..." >
                </div>
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Edition Name EN <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="text" name="name_en" class="form-control" value="{{ $edition->name_en ?? old('name_en') }}" placeholder="Type Edition Name EN..." >
                </div>
                @error('name_en') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-2">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Direction <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="direction"  >
                        <option value="ltr" {{ old('direction') == 'ltr' ? 'selected' : '' }} {{ isset($edition) && $edition->direction == 'ltr' ? 'selected' : '' }}>LTR</option>
                        <option value="rtl" {{ old('direction') == 'rtl' ? 'selected' : '' }} {{ isset($edition) && $edition->direction == 'rtl' ? 'selected' : '' }}>RTL</option>
                    </select>
                </div>
                @error('direction') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Select Language <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="edition_lang_id">
                        @foreach ($langs as $id => $lang)
                        <option value="{{ $id }}" {{ old('edition_lang_id') == $id ? 'selected' : '' }} {{ isset($edition) && $edition->edition_lang_id == $id ? 'selected' : '' }}>{{ $lang }}</option>
                        @endforeach
                    </select>
                </div>
                @error('edition_lang_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Select Format <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="format_id">
                        @foreach ($formats as $id => $format)
                        <option value="{{ $id }}" {{ old('format_id') == $id ? 'selected' : '' }} {{ isset($edition) && $edition->format_id == $id ? 'selected' : '' }}>{{ $format }}</option>
                        @endforeach
                    </select>
                </div>
                @error('format_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Select Type <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="edition_type_id">
                        @foreach ($types as $id => $type)
                        <option value="{{ $id }}" {{ old('edition_type_id') == $id ? 'selected' : '' }} {{ isset($edition) && $edition->edition_type_id == $id ? 'selected' : '' }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                @error('edition_type_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label style="padding-top:10px;" class="control-label">Select Provider <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="provider_id">
                        @foreach ($providers as $id => $provider)
                        <option value="{{ $id }}" {{ old('provider_id') == $id ? 'selected' : '' }} {{ isset($edition) && $edition->provider_id == $id ? 'selected' : '' }}>{{ $provider }}</option>
                        @endforeach
                    </select>
                </div>
                @error('provider_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

</div>
<button type="submit" class="btn btn-primary" style="margin-top: 33px;">Save</button>
