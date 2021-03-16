
<div class="row">

    <div class="form-group col-12">
        <label for="title" class="required">Título </label>
        <input type="text" name="title" id="title" required class="form-control" autofocus value="{{ old('name', $work->title )}}">
    </div>
    <div class="form-group col-12">
        <label for="authors" class="required">Autores </label>
        <input type="text" name="authors" id="authors" required class="form-control" autofocus value="{{ old('authors', $work->authors )}}">
    </div>
    <div class="form-group col-12">
        <label for="category" class="required" >Categoria </label>
        @if(Route::is('works.edit'))
        <select name="category_id" id="category_id" class="form-control select2">
            <option value="{{$work->category->id}}">
                    {{$work->category->name}}
            </option>
            @foreach ($categories as $category)
                @if($category->id != $work->category->id)
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
                @endif
            @endforeach
        </select>
        @else
        <select name="category_id" id="category_id" class="form-control select2">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">
                    {{$category->name}}
                </option>
            @endforeach
        </select>

        @endif
     
    </div>
    <div class="form-group col-12">
        <label for="subject" class="required" >Assunto </label>
        @if(Route::is('works.edit'))
        <select name="subject_id" id="subject_id" class="form-control select2">
            <option value="{{$work->subject->id}}">
                    {{$work->subject->name}}
            </option>
            @foreach ($subjects as $subject)
                @if($subject->id != $work->subject->id)
                <option value="{{$subject->id}}">
                    {{$subject->name}}
                </option>
                @endif
            @endforeach
        </select>
        @else
        <select name="subject_id" id="subject_id" class="form-control select2">
            @foreach ($subjects as $subject)
                <option value="{{$subject->id}}">
                    {{$subject->name}}
                </option>
            @endforeach
        </select>

        @endif
     
    </div>
    <div class="form-group col-12">
        <label for="edition" class="required" autofocus value="{{ old('edition', $work->edition)}}">Edição</label>
        <input type="text" name="edition" id="edition" required class="form-control" autofocus value="{{ old('edition', $work->edition )}}">
    </div>
    <div class="form-group col-12">
        <label for="year" class="required" autofocus value="{{ old('year', $work->year)}}">Ano</label>
        <input type="number" name="year" id="year" required class="form-control" autofocus value="{{ old('year', $work->year)}}">
    </div>
    <div class="form-group col-12">
        <label for="pages" class="required" autofocus value="{{ old('pages', $work->pages)}}">Nº de páginas </label>
        <input type="number" name="pages" id="pages" required class="form-control" autofocus value="{{ old('pages', $work->pages)}}">
    </div>

    @if(Route::is('works.edit'))
        <div class="form-group col-12">
         @if(strstr($work->img, '://'))
            <label for="img" autofocus value="{{ old('img', $work->img )}}">Imagem </label>
            <div>
                <input type="hidden" name="old_img" value = "{{$work->img}}">
                <img style="max-width:50%"
                src="{{$work->img}}"
                />
            </div>
            @else
            <label for="img" autofocus value="{{ old('img', $work->img )}}">Imagem </label>
            <div>
                <input type="hidden" name="old_img" value = "{{$work->img}}">
                <img style="max-width:50%"
                src="{{asset('storage/'.$work->img)}}" 
                />
            </div> <img class="card-img-top" 
              style="max-width:100%;margin-bottom:1rem" 
              src="{{asset('storage/'.$work->img) }}" alt="Card image cap">
            @endif
        
            <div style="margin-top:1rem">
                     <p>Nova imagem</p>
                <input type="file" name="img" class="form-control-file" accept="image/*" onchange="loadFile(event)">
                <img style="max-width:50%" id="output"/>
                @push('scripts')
                    <script>
                        var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                                }
                         };
                    </script>     
                @endpush                    
            </div>
        </div>
      
        <div class="form-group col-12">
        <label for="resume" class="required">Resumo </label>
        <textarea id="summernote" name="resume">{{$work->resume}}</textarea>

    </div>
        @else
        <div class="form-group col-12">
        <label for="img" class="required" autofocus value="{{ old('img', $work->img )}}">Imagem </label>
        <div>
            <input type="file" name="img" required="required"  class="form-control-file" accept="image/*" onchange="loadFile(event)">
                <img  style="max-width:50%"id="output"/>
                @push('scripts')

                    <script>
                        var loadFile = function(event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                        }
                    };
                    </script>     
                @endpush             
        </div>
        <div class="form-group col-12">
        <label for="resume" class="required">Resumo </label>
        <textarea id="summernote" name="resume"></textarea>

    </div>
     @endif
    
       

</div>

@push('scripts')
    <script>
        $(function(){
            $('.select2').select2();
        })
        $('select[value]').each(function(){
            $(this).val($(this).attr('value'));
        })

        $(document).ready(function() {
  $('#summernote').summernote();
});
    </script>
@endpush