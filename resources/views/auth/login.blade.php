<x-guest-layout>
    <x-slot name="website_title">Login</x-slot>
    <x-slot name="website_description">Login description</x-slot>


    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" @error('email') class="is-invalid" @enderror name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  id="password" placeholder="Password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="custom-control-label" for="remember">
                    {{ __('Remember Me') }}
                </label>

            </div>
        </div>
        <div class="account-dialog-actions">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
            <a class="account-dialog-link" href="{{ route('register') }}">Create a new account</a>
        </div>
    </form>

</x-guest-layout>
