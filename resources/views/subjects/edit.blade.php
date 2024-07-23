<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Форма редактирования предметов
        </h2>
    </x-slot>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <h1>Форма редакторования предметов</h1>
    </div>

    <div>
        @include('subjects.form', ['action' => route('subjects.update', $subject), 'method' => 'PUT', 'inscription' => 'Изменить предмет'])
    </div>

</x-app-layout>
