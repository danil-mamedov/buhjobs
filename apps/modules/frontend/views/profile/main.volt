<div class="col-md-12"></div>
<div class="col-md-3"></div>
<div class="col-md-6">
    <h3>Здравствуйте, {{ name }}</h3>
    <form action='' method='post' enctype="multipart/form-data">

        <div class="form-group">
          <label class="col-md-3 control-label" for="surname">Фамилия</label>  
          <div class="col-md-9">
            {{ myform.render('surname') }}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label" for="name">Имя</label>  
          <div class="col-md-9">
            {{ myform.render('name') }}
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label" for="middle_name">Отчество</label>  
          <div class="col-md-9">
            {{ myform.render('middle_name') }}
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="email">Email</label>  
          <div class="col-md-9">
            {{ myform.render('email') }}
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="date_birthday">Дата рождения</label>  
          <div class="col-md-9">
            {{ myform.render('date_birthday') }}
          </div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="phone">Моб. телефон</label>  
          <div class="col-md-9">
            {{ myform.render('phone') }}
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-3 control-label" for="gender">Пол</label>  
          <div class="col-md-9">
            {{ myform.render('gender') }}
          </div>
        </div>





        <div class="form-group">
          <div class="col-md-12">
            <br/>
            <button class="btn btn-success">
                <span class="glyphicon glyphicon-ok"></span> Сохранить изменения
            </button> 
            <a href="/my/profile/" class="btn btn-default">
                <span class="glyphicon glyphicon-remove"></span> Отмена
            </a>
          </div>
        </div>
        

    </form>
    {% if errors is defined %}
        <br/><div class="col-md-12 alert alert-danger">
            {% for error in errors %}
                {{ error }}<br/>
            {% endfor %}
        </div>
    {% endif %}
</div>
<div class="col-md-3"></div>




