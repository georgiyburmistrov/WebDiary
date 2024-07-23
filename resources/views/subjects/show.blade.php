<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Окно просмотра предмета
        </h2>
    </x-slot>

    <div>
        <table class="table table-bordered table-dark table-striped">
            <thead>
            <tr>
                <th>Номер предмета</th>
                <th>Название предмета</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $subjects->id }}</td>
                <td>{{ $name }}</td>
            </tr>
            </tbody>
        </table>
        <br>
    </div>

</x-app-layout>
