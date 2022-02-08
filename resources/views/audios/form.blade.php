<input type="hidden" name="id" value="{{ $audio->id ?? '' }}">
@error('ayah_id') <span class="text-danger">{{ $message }}</span> @enderror
<div class="row">

    <div class="col-md-12">
        <div class="form-group">
            <label  class="control-label">Ayah Text</label>
            <div class="controls">
                <textarea class="form-control" rows="3" readonly>{{ $audio->ayah->text ?? '' }}</textarea>
            </div>
            @error('text') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- src --}}
    <div class="col-md-3">
        <div class="form-group">
            <label  class="control-label">Upload Audio <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="file" name="src" class="form-control" accept=".mp3,audio/*">
            </div>
            @error('src') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    {{-- Audio --}}
    <div class="col-md-3">
        <div class="form-group">
            <div class="controls">
                <audio controls> <source src="{{ url($audio->src ?? '') }}" > </audio>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label  class="control-label">Select Quality <span class="text-danger">*</span></label>
            <div class="controls">
                <select class="form-control chosen-rtl" name="quality">
                    <option value="64" {{ old('quality') == '64' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '64' ? 'selected' : '' }}>64</option>
                    <option value="128" {{ old('quality') == '128' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '128' ? 'selected' : '' }}>128</option>
                    <option value="192" {{ old('quality') == '192' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '192' ? 'selected' : '' }}>192</option>
                </select>
            </div>
            @error('quality') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label  class="control-label">Default ? <span class="text-danger">*</span></label>
            <div class="controls">
                <label style="margin-right: 30px;"> <input type="radio" name="default_audio" style="margin-right: 5px;" value="1" {{ $audio->default_audio == 1 ? 'checked' : '' }}> True </label>
                <label style="margin-right: 30px;"> <input type="radio" name="default_audio" style="margin-right: 5px;" value="0" {{ $audio->default_audio != 1 ? 'checked' : '' }}> False </label>
            </div>
            @error('quality') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

</div>
<button type="submit" class="btn btn-primary" style="margin-top: 33px;">Save</button>
