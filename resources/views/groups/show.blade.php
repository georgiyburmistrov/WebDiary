<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Окно просмотра группы
        </h2>
    </x-slot>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <h2>Окно просмотра группы</h2>
    </div>

    <div>
        <table class="table table-bordered table-dark table-striped">
            <thead>
            <tr>
                <th>Номер группы</th>
                <th>Название предмета</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ $group->name }}</td>
            </tr>
            </tbody>
        </table>
        <br>
    </div>

    @if(count($users) > 0)
        <div class="d-flex align-items-center justify-content-center text-danger">
            <h3>Успеваемость группы</h3>
        </div>
        <div>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Имя пользователя/Предмет обучения</th>
                    @foreach($subjects as $subject)
                        <th>
                            {{ $subject->name }}
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr class={{ $user->color }}>
                        <td>{{ $user->second_name }}</td>
                        @foreach($user->subjects as $subject)
                            <td>{{$subject->pivot->assessment}}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td>Средний балл:</td>
                    @foreach($subjects as $subject)
                        <td>
                            {{ $subject->avg }}
                        </td>
                    @endforeach
                </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-center text-success">
            <h4>Список отличников:</h4><br>
        </div>

        <div>
            <table class="table table-success">
                <tbody>
                <tr>
                    @foreach($aStudents as $aStudent)
                        <td>{{ $aStudent->second_name }}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex align-items-center justify-content-center text-primary">
            <h4>Список хорошистов:</h4><br>
        </div>

        <div>
            <table class="table table-warning">
                <tbody>
                <tr>
                    @foreach($bStudents as $bStudent)
                        <td>{{ $bStudent->second_name }}</td>
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>
    @endif

</x-app-layout>
