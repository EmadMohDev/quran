<input type="hidden" name="id" value="{{ $surah->id ?? '' }}">
<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Surah Name <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="name" class="form-control" value="{{ $surah->name ?? old('name') }}" placeholder="Type Surah Name..."  >
            </div>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Sourah Order <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="number" name="number" class="form-control" min="1" max="115"  value="{{ $surah->number ?? old('number') }}" placeholder="Type Surah Order..."  >
            </div>
            @error('number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Sourah Name EN <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="text" name="name_en" class="form-control" value="{{ $surah->name_en ?? old('name_en') }}" placeholder="Type Surah Name EN..."  >
            </div>
            @error('name_en') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Count of Ayahs <span class="text-danger">*</span></label>
            <div class="controls">
                <input type="number" name="count_of_ayahs" class="form-control" min="1" max="300" value="{{ $surah->count_of_ayahs ?? old('count_of_ayahs') }}" placeholder="Count of Ayahs..."  >
            </div>
            @error('count_of_ayahs') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-9">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Sourah Translation Name EN</label>
            <div class="controls">
                <input type="text" name="translation_name_en" class="form-control" value="{{ $surah->translation_name_en ?? old('translation_name_en') }}" placeholder="Type Surah Translation Name EN..."  >
            </div>
            @error('translation_name_en') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label style="padding-top:10px;" class="control-label">Surah Type <span class="text-danger">*</span></label>
            <div class="controls">

                <select class="form-control chosen-rtl"  name="surah_type"  >
                    <option value="1" {{ old('surah_type') == 1 ? 'selected' : '' }} {{ isset($surah) && $surah->surah_type == 1 ? 'selected' : '' }}>Meccan</option>
                    <option value="0" {{ old('surah_type') == 0 ? 'selected' : '' }} {{ isset($surah) && $surah->surah_type == 0 ? 'selected' : '' }}>Medinan</option>
                </select>

            </div>
            @error('surah_type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
