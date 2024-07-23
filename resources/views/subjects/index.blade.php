<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Список предметов
        </h2>
    </x-slot>

    @if (count($subjects) > 0)

        <div>
            <form action="{{route('subjects.index')}}" method="get">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Поиск группы</label>
                    <input name="subjectName" type="text" class="form-control" value="{{ request()->get('subjectName') }}" placeholder="Enter the name of the subject">
                </div>
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </div>

        <div>
            <div class="d-flex align-items-center justify-content-center text-primary">
                <h2>Предметы обучения</h2>
            </div>

            <div>
                <table class="table table-bordered table-dark table-striped">
                    <thead>
                    <tr>
                        <th>Номер предмета</th>
                        <th>Название предмета</th>
                        <th>Действия над предметом</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($subjects as $subject)

                        <tr>
                            <td>
                                <div>{{ $subject->id }}</div>
                            </td>
                            <td>
                                <div>{{ $subject->name }}</div>
                            </td>
                            <td>

                                <div class="d-flex gap-2 justify-content-center py-5">

                                    <form action="{{ route('subjects.show', $subject) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-light rounded-pill px-3" >
                                            Просмотреть предмет
                                        </button>
                                    </form>

                                    <form action="{{ route('subjects.edit', $subject) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-light rounded-pill px-3">
                                            Редактировать предмет
                                        </button>
                                    </form>

                                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light rounded-pill px-3" type="submit">
                                            Удалить предмет
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                {{ $subjects->links() }}
            </div>
        </div>
    @endif

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <a class="btn btn-primary" href="{{ route('subjects.create') }}">Создать предмет</a>
        </div>
    </div>

</x-app-layout>

