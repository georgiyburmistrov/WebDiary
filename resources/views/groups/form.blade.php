<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <div class="d-flex align-items-center justify-content-center text-primary">
        <h2>Группа</h2>
    </div>
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" aria-label="Recipient's username" aria-describedby="button-addon2" value="@isset($group) {{ $group->name }} @endisset">
        <button class="btn btn-outline-primary" type="submit" id="button-addon2">{{ $inscription }}</button>
    </div>
</form>


