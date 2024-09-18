<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-3">
            {{ __('Update Password') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="needs-validation" novalidate>
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Current Password') }}</label>
            <input type="password" class="form-control" id="update_password_current_password" name="current_password" required>
            <div class="invalid-feedback">
                {{ __('Current password is required') }}
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('New Password') }}</label>
            <input type="password" class="form-control" id="update_password_password" name="password" required>
            <div class="invalid-feedback">
                {{ __('Password is required') }}
            </div>
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input type="password" class="form-control" id="update_password_password_confirmation" name="password_confirmation" required>
            <div class="invalid-feedback">
                {{ __('Please confirm your password') }}
            </div>
        </div>

        <button type="submit" class="btn btn-info">{{ __('Save') }}</button>

        @if (session('status') === 'password-updated')
            <div class="alert alert-success mt-3">
                {{ __('Password updated successfully.') }}
            </div>
        @endif
    </form>
</section>
