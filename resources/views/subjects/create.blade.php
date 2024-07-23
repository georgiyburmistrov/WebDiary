<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Форма создания предмета
        </h2>
    </x-slot>

    <div class="d-flex align-items-center justify-content-center text-primary">
        <h1>Окно создания педмета</h1>
    </div>

    <div>
        @include('subjects.form', ['action' => route('subjects.store'), 'method' => 'POST', 'inscription' => 'Создать предмет'])
    </div>

</x-app-layout>
