@include('errors')
<input type="hidden" name="id" value="{{ $zekr->id ?? '' }}">
<div class="row">
    <div class="col-md-12">
        {{-- CATEGORY --}}
        <div class="col-md-4">
            <div class="form-group">
                <label  class="control-label">Select Category <span class="text-danger">*</span></label>
                <div class="controls">
                    <select class="form-control chosen-rtl"  name="category_id">
                        {{ isset(request()->category) ? '<option value="---">---</option>' : '' }}
                        @foreach ($categories as $id => $title)
                        <option value="{{ $id }}" {{ old('category_id') == $id ? 'selected' : (isset($zekr) && $zekr->category_id == $id ? 'selected' : '') }}>{{ $title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- REFERENCE --}}
        <div class="col-md-4">
            <div class="form-group">
                <label  class="control-label">Reference</label>
                <div class="controls">
                    <input type="text" class="form-control" name="reference" placeholder="Reference..." value={{ old('reference') ? old('reference') : (isset($zekr) ? $zekr->reference : '') }}>
                </div>
                @error('reference') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- COUNT --}}
        <div class="col-md-4">
            <div class="form-group">
                <label  class="control-label">Count</label>
                <div class="controls">
                    <input type="number" min=1 class="form-control" name="count" placeholder="Count..." value={{ old('count') ? old('count') : (isset($zekr) ? $zekr->count : '') }}>
                </div>
                @error('count') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- ZEKR --}}
        <div class="col-md-12">
            <div class="form-group">
                <label  class="control-label">Zekr Text <span class="text-danger">*</span></label>
                <div class="controls">
                    <textarea class="form-control" rows="3" name="zekr" placeholder="Type Zekr...">{{ old('zekr') ? old('zekr') : (isset($zekr) ? $zekr->zekr : '') }}</textarea>
                </div>
                @error('text') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- DESCRIPTION --}}
        <div class="col-md-12">
            <div class="form-group">
                <label  class="control-label">Description</label>
                <div class="controls">
                    <textarea class="form-control" rows="3" name="description" placeholder="Description...">{{ old('description') ? old('description') : (isset($zekr) ? $zekr->description : '') }}</textarea>
                </div>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary" style="margin: 33px auto;display: block;">Save</button>
