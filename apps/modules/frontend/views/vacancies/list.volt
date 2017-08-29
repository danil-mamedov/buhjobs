<div class="col-md-12">   

    <h3>Добавить вакансию: 
        <a href='/my/vacancies/add' class='btn btn-success btn-xs'>
            <span class="glyphicon glyphicon-plus"></span>
            Добавить
        </a>
    </h3>

    <h3>Мои вакансии:</h3>

    {% if vacancies is defined %}
        {% for vacancy in vacancies %}
            <div class="panel panel-default">
                <div class="panel-heading">Вакансия: {{ vacancy.title }} | Просмотров: {{ vacancy.view }}</div>
                <div class="panel-body">{{ vacancy.description }}</div>
                <div class="panel-footer">
                    <a href='/jobs/{{ vacancy.id }}/' class='btn btn-primary btn-xs'>
                        <span class="glyphicon glyphicon-eye-open"></span>
                        Просмотреть
                    </a>
                    <a href='/my/vacancies/{{ vacancy.id }}/' class='btn btn-primary btn-xs'>
                        <span class="glyphicon glyphicon-pencil"></span>
                        Изменить
                    </a>
                </div>
            </div>
        {% endfor %}
    {% endif %}

</div>