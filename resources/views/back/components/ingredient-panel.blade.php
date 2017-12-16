<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#panel-{{$name}}">
                {{ $name }}
            </a>
        </h4>
    </div>
    <div id="panel-{{$name}}" class="panel-collapse collapse">
        <div class="panel-body">
            @foreach($dir as $icon)
                @include('back.components.icon', ['icon' => $icon])
            @endforeach
        </div>
    </div>
</div>