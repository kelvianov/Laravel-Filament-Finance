<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;

class LoginCustom extends Login
{
  
    public ?array $data = [];

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema(components: [
                        $this->getLoginFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getRememberFormComponent(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function getLoginFormComponent(): Component
    {
        return TextInput::make('login')
                 ->label(__('Nama/Email'))              
            ->placeholder('Nama pengguna atau email')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes([
                'tabindex' => 1,
                'class' => 'w-full px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white border-none focus:ring-2 focus:ring-yellow-400 transition',
            ]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label(__('Password'))             
            ->placeholder('Kata sandi')
            ->password()
            ->required()
            ->autocomplete('current-password')
            ->extraInputAttributes([
                'class' => 'w-full px-4 py-3 rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white border-none focus:ring-2 focus:ring-yellow-400 transition',
            ]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        $loginField = filter_var($data['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        return [
            $loginField => $data['login'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.login' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }

}