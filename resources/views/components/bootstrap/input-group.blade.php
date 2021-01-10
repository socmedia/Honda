<fieldset class="input-group mb-3">

    @if ($withIcon === true)
    <div class="input-group-prepend">
        <span class="input-group-text">
            {{$icon}}
        </span>
    </div>
    @endif

    {{$slot}}

    @if ($inlineEdit === true)
    <div class="input-group-prepend">
        <button class="btn btn-light shadow-none rounded-right">
            <i class="fa fa-check"></i>
        </button>
    </div>
    @endif

</fieldset>