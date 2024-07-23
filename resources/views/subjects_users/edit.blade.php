<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Изменение оценки
        </h2>
    </x-slot>

    <div class="d-flex align-items-center justify-content-center">
        <h3 class="text-danger">Изменить оценку студента:&nbsp;</h3> <h4 class="text-primary">&nbsp;{{$user->second_name}}&nbsp;{{$user->first_name}}</h4>
    </div>

    @include('subjects_users.form', ['action' => route('users.subjects.update', [$user, $subject]), 'method' => 'PUT', 'subjects' => $subject, 'inscription' => 'Изменить оценку'])

</x-app-layout>
