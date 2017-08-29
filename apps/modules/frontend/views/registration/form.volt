<div class="col-md-12">   
{{ form('class': 'form-horizontal') }}
    <fieldset>
        <legend>Регистрация на сайте</legend>
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">{{ registration.label('name') }}</label>  
            <div class="col-md-4">
                {{ registration.render('name') }}
            </div>
                {{ registration.messages('name') }}
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="phone">{{ registration.label('phone') }}</label>  
            <div class="col-md-4">
            {{ registration.render('phone') }}
            <span class="help-block">На указаный номер телефона придёт SMS с кодом активации вашего аккаунта </span>  
            {{ registration.messages('phone') }}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="email">{{ registration.label('email') }}</label>  
            <div class="col-md-4">
            {{ registration.render('email') }}
            </div>
            {{ registration.messages('email') }}
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="password">{{ registration.label('password') }}</label>  
            <div class="col-md-4">
                {{ registration.render('password') }} 
            </div>
            {{ registration.messages('password') }}
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="confirmPassword">{{ registration.label('confirmPassword') }}</label>  
            <div class="col-md-4">
                {{ registration.render('confirmPassword') }}
            </div>
            {{ registration.messages('confirmPassword') }}
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="checkboxes"></label>
            <div class="col-md-4">
                <div class="checkbox">
                  <label for="radio_accountant">
                    {{ registration.render('radio_accountant') }}
                    {{ registration.label('radio_accountant') }}
                  </label>
                </div>
                <div class="checkbox">
                    <label for="radio_company">
                        {{ registration.render('radio_company') }}
                        {{ registration.label('radio_company') }}
                    </label>
                </div>
            </div>
        </div>



        <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton"></label>
          <div class="col-md-4">
                {{ registration.render('btn') }}
          </div>
        </div>
    </fieldset>

</form>
</div>