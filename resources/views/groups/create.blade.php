<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Форма создания группы
        </h2>
    </x-slot>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <h1>Форма создания группы</h1>
    </div>
    <div>
        @include('groups.form', ['action' => route('groups.store'), 'method' => 'POST', 'inscription' => 'Создать группу'])
    </div>
</x-app-layout>
