<div class="form-group">
    {{ Form::label('icon', 'Ингредиенты:') }}
    {{ Form::hidden('icon', $icon ?? '') }}

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectIngredientPopup">
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
                    <div class="ingredient-results">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>