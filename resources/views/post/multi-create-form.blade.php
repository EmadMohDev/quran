<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Editions <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select class="form-control chosen" name="edition_id" required>
            <option>---</option>
            @foreach($editions as $edition)
            <option value="{{$edition->id}}" {{ old('edition_id') == $edition->id ? 'selected' : '' }}>{{$edition->name .' - '. $edition->name_en}}</option>
            @endforeach
        </select>
        @error('edition_id')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Surahs <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select class="form-control chosen" name="surah_id" required>
            <option>---</option>
            @foreach($surahs as $surah)
            <option value="{{$surah->id}}" data-number="{{ $surah->count_of_ayahs }}" {{ old('surah_id') == $surah->id ? 'selected' : '' }}>{{$surah->name .' - '. $surah->name_en}}</option>
            @endforeach
        </select>
        @error('surah_id')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">Start Ayah <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select class="form-control chosen" id="start-ayah" name="start" required>
            <option>---</option>
        </select>
        @error('start')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">End Ayah <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select class="form-control chosen" id="end-ayah" name="end" required>
            <option>---</option>
        </select>
        @error('end')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.Operator.Operator')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        <select class="form-control chosen-rtl"  name="operator_id[]" required multiple>
            <option>---</option>
            @foreach($operators as $operator)
            <option value="{{$operator->id}}" {{ old('operator_id') ? (in_array($operator->id, old('operator_id')) ? 'selected' : '') : '' }}>{{$operator->name}} - {{$operator->country->title}}</option>
            @endforeach
        </select>
        @error('operator_id')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.published date') <span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::text('published_date',null,['placeholder'=>'published_date','class'=>'form-control js-datepicker' ,'value' => 'date("Y-m-d")' , 'autocomplete' => 'off' ]) !!}
        @error('published_date')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
</div>

<div class="form-group">
    <label class="col-sm-3 col-lg-2 control-label">@lang('messages.Status')<span class="text-danger">*</span></label>
    <div class="col-sm-9 col-lg-10 controls">
        {!! Form::select('active',array('1' => 'Active' , '0' => 'Not Active'),null,['class'=>'form-control chosen-rtl','required']) !!}
        @error('active')<span class="text-danger">{{ $message }}</span>@enderror
    </div>
</div>
