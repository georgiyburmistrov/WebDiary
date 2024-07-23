<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Имя<span style="color: red; "><sup>*</sup></span>:
            <br> <input type="text" name="first_name" id="user-name" value="@isset($user) {{ $user->first_name }} @endisset"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Фамилия<span style="color: red; "><sup>*</sup></span>:
            <br> <input type="text" name="second_name" id="user-name" value="@isset($user) {{ $user->second_name }} @endisset"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Отчество:
            <br> <input type="text" name="middle_name" id="user-name" value="@isset($user) {{ $user->middle_name }} @endisset"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Дата рождения<span style="color: red; "><sup>*</sup></span>:
            <br> <input type="date" name="birthday" value="@isset($user) {{ Carbon\Carbon::createFromFormat('d-m-Y', $user->birthday)->format('Y-m-d')  }} @endisset"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Адрес электронной почты<span style="color: red; "><sup>*</sup></span>:
            <br> <input type="email" name="email" id="user-email" value="@isset($user) {{ $user->email }} @endisset"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Измените/Назначьте пароль<span style="color: red; "><sup>*</sup></span>:
            <br> <input type="password" name="password" id="user-password" value="@isset($user) {{ $user->password }} @endisset"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Подвердите пароль<span style="color: red; "><sup>*</sup></span>:
            <br> <input type="password" name="password_confirmation" id="user-password_confirmation"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Выберете группу:<span style="color: red; "><sup>*</sup></span>
            <x-input-label for="group" :value="__('Groups')" />
            <x-group-select :groups="$groups" :selected-group="$selectedGroup" />
            <x-input-error :messages="$errors->get('group')" class="mt-2" />
    </div>

    <div class="d-flex align-items-center justify-content-center text-success">
        <h4>Введите данные о проживании:</h4><span style="color: red; "><sup>*</sup></span>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Город:
            <br> <input type="text" name="address[city]" id="user-name" value="{{ old('address[city]') }}"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Улица:
            <br> <input type="text" name="address[street]" id="user-name" value="{{ old('address[street]') }}"></p>
    </div>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <p>Дом:
            <br> <input type="text" name="address[number]" id="user-name" value="{{ old('address[number]') }}"></p>
    </div>

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" href="{{ route('groups.create') }}">{{ $inscription }}</button>
        </div>
    </div>

</form>
