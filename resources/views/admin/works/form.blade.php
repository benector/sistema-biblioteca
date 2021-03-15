
<div class="row">

    <div class="form-group col-12">
        <label for="name" class="required">Nome </label>
        <input type="text" name="name" id="name" required class="form-control" autofocus value="{{ old('name', $course->name )}}">
    </div>
    <div class="form-group col-12">
        <label for="slug" class="required">Slug </label>
        <input type="text" name="slug" id="slug" required class="form-control" autofocus value="{{ old('slug', $course->slug )}}">
    </div>
    <div class="form-group col-12">
        <label for="category" class="required" >Categoria </label>
        @if(Route::is('courses.edit'))
        <select name="category_id" id="category_id" class="form-control select2">
            <option value="{{$course->category->id}}">
                    {{$course->category->name}}
            </option>
            @foreach ($categories as $category)
                @if($category->id != $course->category->id)
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
        <label for="name" class="required" autofocus value="{{ old('slug', $course->video)}}">Video (URL) </label>
        <input type="text" name="video" id="video" required class="form-control" autofocus value="{{ old('video', $course->video )}}">
    </div>
    @if(Route::is('courses.edit'))
        <div class="form-group col-12">
            <label for="img_link" autofocus value="{{ old('video', $course->img_link )}}">Imagem </label>
            <div>
                <input type="hidden" name="old_img_link" value = "{{$course->img_link}}">
                <img style="max-width:50%"
                src="{{asset('storage/'.$course->img_link)}}" 
                />
            </div>
            <div style="margin-top:1rem">
                     <p>Nova imagem</p>
                <input type="file" name="img_link" class="form-control-file" accept="image/*" onchange="loadFile(event)">
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
        <label for="name" class="required">Descrição </label>
        <textarea id="summernote" name="description">{{$course->description}}</textarea>

    </div>
        @else
        <div class="form-group col-12">
        <label for="img_link" class="required" autofocus value="{{ old('video', $course->img_link )}}">Imagem </label>
        <div>
            <input type="file" name="img_link" required="required"  class="form-control-file" accept="image/*" onchange="loadFile(event)">
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
        <label for="name" class="required">Descrição </label>
        <textarea id="summernote" name="description"></textarea>

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