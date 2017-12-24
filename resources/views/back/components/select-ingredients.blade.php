<div class="form-group">
    {{ Form::label('icon', 'Ингредиенты:') }}

    <div class="added-ingredients well">
        @foreach($ingredients as $ingredient)
            <div class="added-ingredient row form-inline">
                <label class="col-md-4">
                    <img src="{{ App\Helpers\IconHelper::asset($ingredient->icon) }}" class="col-md-3">
                    <span class="col-md-9">{{$ingredient->name}}</span>
                </label>
                <input type="hidden" name="ingredients[{{$ingredient->id}}][id]" value="{{$ingredient->id}}">
                <input type="text" name="ingredients[{{$ingredient->id}}][notes]" value="{{$ingredient->pivot->notes}}" class="form-control col-md-4">
                <span class="glyphicon glyphicon-trash col-md-1 remove-ingredient"></span>
            </div>

        @endforeach
    </div>

    <button type="button" class="btn btn-primary select-ingredient-popup">
        Добавить Ингредиент
    </button>

    <!-- Modal -->
    <div class="modal fade" id="selectIngredientPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::text('ingredient_name', null, ['class' => 'form-control ingredient-name', 'placeholder' => 'Имя Ингредиента']) }}
                    </div>
                    <div class="ingredient-results"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary save-selected-ingredients">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>