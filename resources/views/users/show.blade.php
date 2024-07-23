<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Данные о студенте
        </h2>
    </x-slot>

    <div>
        <table class="table table-bordered table-dark table-striped">
            <thead>
            <tr>
                <th>ID студента</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Дата рождения</th>
                <th>Группа пользователя</th>
                <th>Адрес пользователя</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->second_name }}</td>
                <td>{{ $user->middle_name }}</td>
                <td>{{ $user->birthday }}</td>
                <td>{{ $user->group->name }}</td>
                <td>{{ $user->fullAddress }}</td>
            </tr>
            </tbody>
        </table>
        <br>
    </div>

    <div class="d-flex align-items-center justify-content-center text-danger">
        <h3>Успеваемость студента</h3>
    </div>

    @if(count($user->subjects) > 0)
        <div>
            <table class="table table-bordered table-info table-striped">
                <thead>
                <th>Название предмета</th>
                <th>Оценка</th>
                <th>Редактирование оценки</th>
                </thead>

                <tbody>
                @foreach ($user->subjects as $subject)
                    <tr>

                        <td>
                            <div>{{ $subject->name }}</div>
                        </td>

                        <td>
                            @if($subject->pivot->assessment !== null)
                                <div>{{$subject->pivot->assessment}}</div>
                            @else
                                <div>нет оценки</div>
                            @endif
                        </td>

                        <td>

                            <div class="d-flex gap-2 justify-content-center py-5">

                                <form action="{{ route('users.subjects.edit', [$user, $subject]) }}" method="GET">
                                    @csrf
                                    <button class="btn btn-info rounded-pill px-3" type="submit">
                                        Изменить оценку
                                    </button>
                                </form>

                                <form action="{{ route('users.subjects.destroy', [$user, $subject]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-info rounded-pill px-3" type="submit">
                                        Удалить оценку
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="d-flex align-items-center justify-content-center text-danger">
            <h3>Оценки еще не выставлены</h3>
        </div>
    @endif

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <a class="btn btn-primary" href="{{ route('users.subjects.create', $user) }}">Проставить оценку</a>
        </div>
    </div>

</x-app-layout>
