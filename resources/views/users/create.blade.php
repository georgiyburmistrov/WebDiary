<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Регистрация студента
        </h2>
    </x-slot>

    <div>
        @include('users.form', ['action' => route('users.store'), 'method' => 'POST', 'groups' => $groups, 'selectedGroup' => $selectedGroup, 'inscription' => 'Зарегестрировать студента'])
    </div>

</x-app-layout>
