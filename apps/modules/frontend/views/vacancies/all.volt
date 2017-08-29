<div class="col-md-12">   
    <h3>Активные вакансии ({{page.total_items}}) </h3>

    {% if page.items is defined %}
        {% for item in page.items %}

        <div class="col-md-12">
            <div class="col-md-1">
                <span class="glyphicon glyphicon-eye-open"></span>
            </div>
            <div class="col-md-11">
                <a href='/vacancies/vacancy-{{item.id}}.html'>{{item.title}}, {{item.salary}} грн </a>
            </div>
        </div>
        <div class="col-md-12">
            {{item.description}}
        </div>



        {% endfor %}
    {% endif %}

    {% if page.items is defined %}
        <ul class="pagination">
            <li>
                <a href="/vacancies/1">Первая</a>
            </li>
            <li>
                <a href="/vacancies/{{page.before}}">{{page.before}}</a>
            </li>
            <li class="active">
                <a href="/vacancies/{{page.current}}">{{page.current}}</a>
            </li>
            <li>
                <a href="/vacancies/{{page.next}}">{{page.next}}</a>
            </li>
            <li>
                <a href="/vacancies/{{page.last}}">Последняя</a>
            </li>
        </ul>
    {% endif %}

</div>