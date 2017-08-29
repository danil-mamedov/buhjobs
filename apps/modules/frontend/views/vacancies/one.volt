<div class="col-md-12">   
    <h3>Информация о вакансии:</h3>    
    <form action='' method='post'>
        <div class="form-group">
            <label class="col-md-2 control-label" for="title">Название</label>  
            <div class="col-md-10">
              {{ form.render('title') }}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="salary">ЗП</label>  
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
                    <span class="glyphicon glyphicon-ok"></span> Сохранить изменения
                </button> 
            </div>
        </div>
    </form>

</div>
<div class="col-md-12">  
    {{flashSession.output()}}
</div>
<!-- div class="col-md-12">  
    <form action='delete' method='post'>
        <button class="btn btn-danger">
            <span class="glyphicon glyphicon-remove"></span> Удалить вакансию
        </button> 
    </form>
</div -->