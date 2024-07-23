<form method="GET" action="{{ route('login') }}">
    <p>Пароль от Вашего личного кабинета: <strong>{{ $userPassword }}</strong></p>
    <div class="flex items-center justify-end mt-4">
        <x-primary-button>
            {{ __('Go to site') }}
        </x-primary-button>
    </div>
</form>

