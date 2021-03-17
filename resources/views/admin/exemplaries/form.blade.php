<div class="row">
    <div class="form-group col-12">
        <label for="code" class="required">Código </label>
        <input type="text" name="code" id="code" required class="form-control" autofocus value="{{ old('name', $exemplary->code )}}">
    </div>

    <div class="form-group col-12">
    <label for="work" class="required">Obra</label>

        @if(Route::is('exemplaries.edit'))
            <select name="work_id" id="work_id" class="form-control select2">
                <option value="{{$exemplary->work->id}}">
                        {{$exemplary->work->title}}
                </option>
                @foreach ($works as $work)
                    @if($work->id != $exemplary->work->id)
                    <option value="{{$work->id}}">
                        {{$work->title}}
                    </option>
                    @endif
                @endforeach
            </select>
            @else
            <select name="work_id" id="work_id" class="form-control select2">
                @foreach ($works as $work)
                    <option value="{{$work->id}}">
                        {{$work->title}}
                    </option>
                @endforeach
            </select>

            @endif
    </div>
   
</div>

