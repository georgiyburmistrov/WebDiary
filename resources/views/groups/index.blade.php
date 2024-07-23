<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Список групп
        </h2>
    </x-slot>

    @if (count($groups) > 0)

        <div>
            <form action="{{route('groups.index')}}" method="get">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Поиск группы</label>
                    <input name="groupName" type="text" class="form-control" value="{{ request()->get('groupName') }}" placeholder="Enter the name of the group">
                </div>
                <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </div>

        <div class="d-flex align-items-center justify-content-center text-primary">
            <h2>Все группы</h2>
        </div>

        <div>
            <table class="table table-bordered table-dark table-striped">
                <thead>
                <tr>
                    <th>Номер группы</th>
                    <th>Название группы</th>
                    <th>Действия над группой</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($groups as $group)

                    <tr>
                        <td>
                            <div>{{ $group->id }}</div>
                        </td>
                        <td>
                            <div>{{ $group->name }}</div>
                        </td>
                        <td>

                            <div class="d-flex gap-2 justify-content-center py-5">

                                <form action="{{ route('groups.show', $group) }}" method="GET">
                                    <button class="btn btn-light rounded-pill px-3" type="submit">
                                        Просмотреть группу
                                    </button>
                                </form>

                                <form action="{{ route('groups.edit', $group) }}" method="GET">
                                    <button class="btn btn-light rounded-pill px-3" type="submit">
                                        Редактировать группу
                                    </button>
                                </form>

                                <form action="{{ route('groups.destroy', $group) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-light rounded-pill px-3" type="submit">
                                        Удалить группу
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
            {{ $groups->links() }}
        </div>

    @endif

    <div class="col-lg-6 col-xxl-4 my-5 mx-auto">
        <div class="d-grid gap-2">
            <a class="btn btn-primary" href="{{ route('groups.create') }}">Создать группу</a>
        </div>
    </div>

</x-app-layout>
