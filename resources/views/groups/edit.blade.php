<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Форма редактирования групп
        </h2>
    </x-slot>

    <div>
        @include('groups.form', ['action' => route('groups.update', $group), 'method' => 'PUT', 'inscription' => 'Изменить группу'])
    </div>

</x-app-layout>
