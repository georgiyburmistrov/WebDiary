<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Проставление оценки
        </h2>
    </x-slot>

    <div class="d-flex align-items-center justify-content-center">
        <h3 class="text-danger">Проставление оценки студенту:&nbsp;</h3><h4 class="text-primary">&nbsp;{{$user->second_name}} {{$user->first_name}}</h4>
    </div>
    @include('subjects_users.form', ['action' => route('users.subjects.store', $user), 'method' => 'POST', 'subjects' => $subjects, 'inscription' => 'Проставить оценку'])

</x-app-layout>

