<select class="form-select" name="group_id" id="group_id">
    @foreach($groups as $group)
        <option value="{{ $group->id }}" {{ $group->id == $selectedGroup ? 'selected' : '' }}>
            {{ $group->name }}
        </option>
    @endforeach
</select>
