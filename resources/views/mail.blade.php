<form method="post" action="/mail/send">
    @csrf

    <input type="email"  name="email" placeholder="Mail-Adresse" />
    <input type="submit" />
</form>
