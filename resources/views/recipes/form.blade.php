@csrf
<div class="form-group">
    <label for="name">Naziv</label>
    <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="{{ old('name') ?? $recipe->name }}">
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="category_id">Kategorija</label>
    <select class="form-control" id="category_id" name="category_id">
        <option>Odaberi...</option>
        @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $category->id === $recipe->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>
<br>
<div class="form-group">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sastojci</th>
                <th style="text-align: center"><a href="#" class="btn btn-primary addRow">+</a></th>
            </tr>
        </thead>
        <tbody>
        @if(empty($recipe->ingredients))
            <tr>
                <td><input type="text" id="ingredients[]" name="ingredients[]" class="form-control"></td>
                <td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>
            </tr>
            <tr>
                <td><input type="text" id="ingredients[]" name="ingredients[]" class="form-control"></td>
                <td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>
            </tr>
        @else
        @foreach($recipe->ingredients as $ingredient)
            <tr>
                <td><input type="text" id="ingredients[]" name="ingredients[]" value="{{ $ingredient }}" class="form-control"></td>
                <td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    @error('ingredients.*')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="description">Opis pripreme</label>
    <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') ?? $recipe->description }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label for="image">Slika:</label>
    <input type="file" id="image" name="image">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<br>
<button type="submit" class="btn btn-primary">Spremi</button>

<script type="text/javascript">
    $('.addRow').on('click', function() {
        addRow();
    });

    function addRow() {
        var tr = '<tr>'+
                    '<td><input type="text" id="ingredients[]" name="ingredients[]" class="form-control"></td>'+
                    '<td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>'+
                '</tr>';
        $('tbody').append(tr);
    };

    $('tbody').on('click', '.remove', function() {
        $(this).parent().parent().remove();
    });
</script>
