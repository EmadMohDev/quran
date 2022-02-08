@include('errors')
<input type="hidden" name="id" value="{{ $ayah->id ?? '' }}">
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="form-group">
                <label  class="control-label">Ayah Text <span class="text-danger">*</span></label>
                <div class="controls">
                    <textarea class="form-control" rows="3" name="text" placeholder="Type Ayah...">{{ $ayah->text ?? old('text') }}</textarea>
                </div>
                @error('text') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Surahs --}}
        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Select Surah <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="surah_id">
                        {!! session('url')['surah'] ? '' : '<option value="---">---</option>' !!}
                        @foreach ($surahs as $id => $surah)
                        <option value="{{ $id }}" {{ old('surah_id') == $id ? 'selected' : '' }} {{ isset($ayah) && $ayah->surah_id == $id ? 'selected' : '' }}>{{ $surah }}</option>
                        @endforeach
                    </select>
                </div>
                @error('surah_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Edition --}}
        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Select Edition <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="edition_id">
                        {!! session('url')['edition']  ? '' : '<option value="---">---</option>' !!}
                        @foreach ($editions as $id => $edition)
                        <option value="{{ $id }}" {{ old('edition_id') == $id ? 'selected' : '' }} {{ isset($ayah) && $ayah->edition_id == $id ? 'selected' : '' }}>{{ $edition }}</option>
                        @endforeach
                    </select>
                </div>
                @error('edition_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Image</label>
                <div class="controls">
                    <input type="file" name="image" class="form-control">
                    @if (isset($ayah) && $ayah->image)
                        <img src="{{ url($ayah->image) }}" style="width: 100px;">
                    @endif
                </div>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label  class="control-label">Number In Quran <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="number" min="1" name="number" class="form-control" value="{{ $ayah->number ?? old('number') }}" placeholder="Type Number In Quran..." >
                </div>
                @error('number') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label  class="control-label">Number In Surah <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="number" min="1" name="order_in_surah" class="form-control" value="{{ $ayah->order_in_surah ?? old('order_in_surah') }}" placeholder="Type Number In Surah..." >
                </div>
                @error('order_in_surah') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <label  class="control-label">Juz <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="number" min="1" name="juz" class="form-control" value="{{ $ayah->juz ?? old('juz') }}" placeholder="Type Juz..." >
                </div>
                @error('juz') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Page <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="number" min="1" name="page" class="form-control" value="{{ $ayah->page ?? old('page') }}" placeholder="Type Page..." >
                </div>
                @error('page') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Hizb Quarter <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="number" min="1" name="hizb_quarter" class="form-control" value="{{ $ayah->hizb_quarter ?? old('hizb_quarter') }}" placeholder="Type Hizb Quarter..." >
                </div>
                @error('hizb_quarter') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Ruku <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="number" min="1" name="ruku" class="form-control" value="{{ $ayah->ruku ?? old('ruku') }}" placeholder="Type Ruku..." >
                </div>
                @error('ruku') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Manzil <span class="text-danger">*</span></label>
                <div class="controls">
                    <input type="number" min="1" name="manzil" class="form-control" value="{{ $ayah->manzil ?? old('manzil') }}" placeholder="Type Manzil..." >
                </div>
                @error('manzil') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label  class="control-label">Sajda <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="is_sajda">
                        <option value="1" {{ old('is_sajda') == '1' ? 'selected' : '' }} {{ isset($ayah) && $ayah->is_sajda == '1' ? 'selected' : '' }}>Has Sajda</option>
                        <option value="0" {{ old('is_sajda') == '0' ? 'selected' : '' }} {{ isset($ayah) && $ayah->is_sajda == '0' ? 'selected' : '' }}>Not Has Sajda</option>
                    </select>
                </div>
                @error('is_sajda') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        @include('ayahs.audios')
</div>

<button type="submit" class="btn btn-primary" style="margin: 33px auto;display: block;">Save</button>

<script type="text/javascript" src="{{url('assets/repeater/jquery.repeater.min.js')}}"></script>
<script type="text/javascript" src="{{url('assets/repeater/form-repeater.js')}}"></script>
