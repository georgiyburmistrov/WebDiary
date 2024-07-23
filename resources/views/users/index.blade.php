<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Списки студентов
        </h2>
    </x-slot>

    @if (count($users) > 0)

        <div>
            <form action="{{route('users.index')}}" method="get">
                <div class="mb-3">
                    <label class="form-label">Поиск студента</label>
                    <input name="userName" type="text" class="form-control" value="{{ request()->get('userName') }}" placeholder="Enter the name of the students">
                    <br>Дата рождения:
                    <br><input id="date" type="date"  name="userBirthday" placeholder="d.m.Y" value="{{ request()->get('userBirthday') }}">
                </div>

                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </div>

        <div>
            <div class="d-flex align-items-center justify-content-center text-primary">
                <h2>Все студенты</h2>
            </div>

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
                        <th>Редактирование пользователя</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($users as $user)

                        <tr>
                            <td>
                                <div>{{ $user->id }}</div>
                            </td>
                            <td>
                                <div>{{ $user->first_name }}</div>
                            </td>
                            <td>
                                <div>{{ $user->second_name }}</div>
                            </td>
                            <td>
                                <div>{{ $user->middle_name }}</div>
                            </td>
                            <td>
                                <div>{{ $user->birthday }}</div>
                            </td>
                            <td>
                                <div>{{ $user->group->name }}</div>
                            </td>

                            <td>

                                <div class="d-flex gap-2 justify-content-center py-5">

                                    <form action="{{ route('users.show', $user) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-light rounded-pill px-3" type="submit">
                                            Данные студента
                                        </button>
                                    </form>

                                    <form action="{{ route('users.edit', $user) }}" method="GET">
                                        @csrf
                                        <button class="btn btn-light rounded-pill px-3" type="submit">
                                            Изменить данные
                                        </button>
                                    </form>

                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-light rounded-pill px-3" type="submit">
                                            Удалить студента
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $users->links() }}
        </div>
    @endif

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <a class="btn btn-primary" href="{{ route('users.create') }}">Добавить студента</a>
        </div>
    </div>

</x-app-layout>
