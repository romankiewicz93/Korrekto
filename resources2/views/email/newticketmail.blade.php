@component('mail::message')
Hallo, <br>
diese ist eine automatische Mail von Korrekto!<br>
Zu Ihrem Modul wurde ein neuer Korrekturauftrag angelegt.
Loggen Sie sich in Ihrem Modul ein um mehr Informationen zu erhalten

@component('mail::button', ['url' => 'www.korrekto.de'])
Korrekto
@endcomponent

Danke,<br>
Korrekto
@endcomponent
