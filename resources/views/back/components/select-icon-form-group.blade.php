<div class="form-group">
    {{ Form::label('icon', 'Иконка:') }}
    {{ Form::hidden('icon', $icon ?? '') }}
    <div class="icon-preview">
        @if(!empty($icon))
            <img src="{{ App\Helpers\IconHelper::asset($icon) }}" data-toggle="modal" data-target="#selectIconPopup">
        @else
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selectIconPopup">
                Выбрать Иконку
            </button>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="selectIconPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="panel-group" id="ingredients-accordion">
                        @foreach(App\Helpers\IconHelper::getDirsIcons() as $name => $dir)
                            @include('back.components.ingredient-panel', ['dir' => $dir, 'name' => $name])
                        @endforeach
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