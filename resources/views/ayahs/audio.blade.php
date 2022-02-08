<div data-repeater-item="">
    <hr>
    <div class="row">
        <div class="col-md-12">
            {{-- src --}}
            <div class="col-md-3">
                <div class="form-group">
                    <label  class="control-label">Upload Audio <span class="text-danger">*</span></label>
                    <div class="controls">
                        <input type="file" name="src" class="form-control" accept=".mp3,audio/*">
                        <input type="hidden" name="id" value="{{ $audio->id  ?? ''}}">
                    </div>
                    @error('src[]') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Audio --}}
            <div class="col-md-4">
                <div class="form-group">
                    <div class="controls">
                        <audio controls class="show-file"> <source src="{{ isset($audio) ? url($audio->src) : '' }}"> </audio>
                    </div>
                </div>
            </div>

            {{-- quality --}}
            <div class="col-md-2">
                <div class="form-group">
                    <label  class="control-label">Select Quality <span class="text-danger">*</span></label>
                    <div class="controls">
                        <select required class="form-control chosen" name="quality">
                            <option>---</option>
                            <option value="32" {{ old('quality') == '32' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '32' ? 'selected' : '' }}>32</option>
                            <option value="40" {{ old('quality') == '40' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '40' ? 'selected' : '' }}>40</option>
                            <option value="48" {{ old('quality') == '48' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '48' ? 'selected' : '' }}>48</option>
                            <option value="64" {{ old('quality') == '64' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '64' ? 'selected' : '' }}>64</option>
                            <option value="128" {{ old('quality') == '128' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '128' ? 'selected' : '' }}>128</option>
                            <option value="192" {{ old('quality') == '192' ? 'selected' : '' }} {{ isset($audio) && $audio->quality == '192' ? 'selected' : '' }}>192</option>
                        </select>
                    </div>
                    @error('quality[]') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- default_audio --}}
            <div class="col-md-2">
                <div class="form-group">
                    <label  class="control-label">Make Default <span class="text-danger">*</span></label>
                    <div class="controls">
                        <input type="radio" name="default_audio" value="1" {{ isset($audio) && $audio->default_audio == 1 ? 'checked' : (!isset($index) ? 'checked' : '') }} class="form-control" style="width: 25px;">
                    </div>
                    @error('default_audio[]') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            {{-- Remove --}}
            <div class="form-group col-1">
                <label  class="control-label">Remove</label> <br>
                <a class="btn btn-danger remove-audio" data-id="{{ isset($audio) ? $audio->id : '' }}"> <i class="fa fa-trash"></i></a>
                <a class="hidden" data-repeater-delete=""></a>
            </div>
        </div>
    </div>

</div>
