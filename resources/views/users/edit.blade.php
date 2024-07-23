<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Изменение личных данных
        </h2>
    </x-slot>

    <div>
        @include('users.form', ['action' => route('users.update', $user), 'method' => 'PUT', 'groups' => $groups, 'selectedGroup' => $selectedGroup, 'inscription' => 'Изменить данные'])
    </div>

</x-app-layout>
