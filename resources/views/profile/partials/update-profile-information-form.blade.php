<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 mb-3">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            <div class="invalid-feedback">
                {{ __('Name is required') }}
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            <div class="invalid-feedback">
                {{ __('Valid email is required') }}
            </div>
        </div>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="alert alert-warning" role="alert">
                {{ __('Your email address is unverified.') }}
                <button form="send-verification" class="btn btn-link p-0">{{ __('Click here to resend verification email.') }}</button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <div class="alert alert-success mt-3">
                    {{ __('Profile updated successfully.') }}
                </div>
            @endif
        </div>
    </form>
</section>
