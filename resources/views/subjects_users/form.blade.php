<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)

    <div>
        @if($subjects instanceof \Illuminate\Database\Eloquent\Collection)
            <select name="subject_id" class="form-select form-select-lg mb-3">
                @foreach($subjects as $subject)
                    <option value={{$subject->id}}>{{ $subject->name }}</option>
                @endforeach
            </select>
        @else
            <div class="d-flex align-items-center justify-content-center">
                <input type="hidden" name="subject_id" value={{$subjects->id}}>
                <h3 class="text-success">{{$subjects->name}}</h3>
            </div>
        @endif
    </div>

    <div>
        <select name="assessment" class="form-select form-select-sm">
            @for ($i = 1; $i < 6; $i++)
                <option>{{$i}}</option>
            @endfor
        </select>
    </div>

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">
                {{$inscription}}
            </button>
        </div>
    </div>

</form>
