<ol class="breadcrumb">
    <li><a href="/">Главная</a></li>
    <li><a href="/my/" >Личный кабинет</a></li>
    <li><a href="/my/vacancies/" >Мои вакансии</a></li>
    <li class="active">Добавить вакансию</li>
</ol>




    <!-- h1>Добавить новую вакансию </h1 -->
    {% if errors is defined %}
        <br/><div class="col-md-12 alert alert-danger">
            {% for error in errors %}
                {{ error }}<br/>
            {% endfor %}
        </div>
    {% endif %}
    <form action='' method='post'>
        <div class="form-group">
            {{ form.label('title', ['class':'col-md-2 control-label']) }}
            <div class="col-md-10">
              {{ form.render('title') }}
            </div>
        </div>
        <div class="form-group">
            {{ form.label('salary', ['class':'col-md-2 control-label']) }}
            <div class="col-md-10">
              {{ form.render('salary') }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="description">Описание</label>  
            <div class="col-md-10">
              {{ form.render('description') }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Опубликовать на сайте</label>  
            <div class="col-md-10">
              {{ form.render('published_status_id') }}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <button class="btn btn-success">
                    <span class="glyphicon glyphicon-briefcase"></span> Создать
                </button> 
            </div>
        </div>
    </form>
