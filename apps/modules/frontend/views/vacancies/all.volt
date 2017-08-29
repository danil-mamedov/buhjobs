<div class="col-md-12">   
    <h4>Знайдено {{page.total_items}} вакансій</h4>
</div>
    {% if page.items is defined %}
        {% for item in page.items %}
            <div class="row">
                <div class="col-md-12">
                    <!--span class="label label-success">
                        <span class="glyphicon glyphicon-leaf"></span> Новая вакансия
                    </span-->
                    <h3><a href='/vacancies/vacancy-{{item.id}}.html'>{{item.title}}, {{item.salary}} грн</a></h3>
                </div>
                <div class="col-md-12">
                    <span class="glyphicon glyphicon-briefcase"></span> ООО Херня, 
                    <span class='glyphicon glyphicon-map-marker' style='color: #ff5454'></span> Харьков
                </div>
                <div class="col-md-12">
                    {{item.description}}
                </div>
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

