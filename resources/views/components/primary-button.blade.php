{{-- <button {{ $attributes->merge(['type' => 'submit', 'class' => 'sign-btn g-recaptcha', 'data-sitekey' => '6LfoogUpAAAAAD3LE8_Yv9Yy112YHuhGEcMglvco', 'data-callback' => 'onSubmit', 'data-action' => 'submit']) }}> --}}
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'sign-btn has-spinner', 'data-load-text' => 'Loading']) }}>
    {{ $slot }}
</button>
