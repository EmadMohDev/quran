{{-- TITLE --}}
<div class="col-md-12">
    <div class="form-group">
        <label  class="control-label">Title <span class="text-danger">*</label>
        <div class="controls">
            <input type="text" class="form-control" name="title" placeholder="Title..." value="{{ old('title') ? old('title') : (isset($category) ? $category->title : '') }}">
        </div>
        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
        {!! Form::submit($buttonAction,['class'=>'btn btn-primary']) !!}
    </div>
</div>
