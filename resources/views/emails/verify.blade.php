@component('mail::message')
# Hai {{ $user->name }}

Terima kasih telah mendaftar di **HappyCare**!  
Klik tombol di bawah ini untuk memverifikasi alamat email kamu:

@component('mail::button', ['url' => $url])
Verifikasi Email Saya
@endcomponent

Jika kamu tidak merasa membuat akun ini, abaikan saja email ini.

Terima kasih,  
**Tim HappyCare**
@endcomponent
