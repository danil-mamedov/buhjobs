<div class="col-md-12">   
    <h3>Предложений по работе:</h3>




    {% if offers is defined %}
        {% for offer in offers %}
        <p>Предложение #{{ offer.id }}</p>
        Подробнее о предложении здесь: <a href='/offers/{{offer.id}}'> перейти</a>
            {{ offer.id }}<br/>
        {% endfor %}
    {% endif %}


</div>