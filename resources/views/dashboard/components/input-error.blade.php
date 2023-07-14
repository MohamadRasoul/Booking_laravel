@props(['field'])

@error($field)
    <ul {{ $attributes->merge(['class' => 'text-sm text-danger space-y-1']) }}>
        @foreach ((array) $errors->get($field) as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@enderror
