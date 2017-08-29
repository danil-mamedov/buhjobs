<form action='/login/' method="POST">
    <input type="email" required name="email" placeholder="Укажите ваш Email" /><br/>
    <input type="password" required name="password" placeholder="Ваш пароль" /><br/>
    <button class="btn btn-success">Register</button>
</form>
{% if status is defined %}
    {{ status }}
{% endif %}
