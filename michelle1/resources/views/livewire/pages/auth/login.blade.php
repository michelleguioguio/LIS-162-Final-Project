<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div style="max-width: 400px; margin: 15px auto; padding: 30px; background-color: #f6d4e1ff; border: 2px solid #f6d4e1ff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-family: 'Helvetica', sans-serif;">


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div style="margin-bottom: 20px;">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full rounded border-gray-300 px-3 py-2" type="email" name="email" required autofocus autocomplete="username" style="border:1px solid #f6a7c6ff;" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-red-500" />
        </div>

        <!-- Password -->
        <div style="margin-bottom: 20px;">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full rounded border-gray-300 px-3 py-2" type="password" name="password" required autocomplete="current-password" style="border:1px solid #f6a7c6ff;" />
            <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-red-500" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center gap-3">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button style="background-color: #a4d88cff; color:white; padding:10px 20px; border-radius:8px; font-weight:bold;">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>

