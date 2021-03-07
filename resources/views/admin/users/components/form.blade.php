@csrf
<div class="mb-3">
    <label for="name">User Name</label>
    <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
           value="{{old('name')}} @isset($user) {{$user->name}} @endisset" aria-describedby="name">
    @error('name')
    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
           value="{{old('email')}} @isset($user) {{$user->email}} @endisset" aria-describedby="email">
    @error('email')
    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
    @enderror
</div>

@isset($create)
<div class="mb-3">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
    @error('password')
    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
    @enderror
</div>
<div class="mb-3">
    <label for="password_confirmation">Password Confirm</label>
    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
    @error('password_confirmation')
    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
    @enderror
</div>
@endisset

<div class="mb-3">
    @foreach($roles as $role)
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}" id="{{$role->name}}"
                    @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
            <label for=""{{$role->name}} class="form-check-label">
                {{$role->name}}
            </label>
        </div>
    @endforeach
</div>