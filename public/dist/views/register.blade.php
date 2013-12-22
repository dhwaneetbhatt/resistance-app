<div class='register-container container'>
    <div class='row'>
        <div class='col-md-4 col-md-offset-4'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Register</h3>
                </div>
                <div class='panel-body'>
                    {{ Form::open(array('url'=>'/register', 'role'=>'form')) }}
                    <fieldset>
                        <div class='form-group'>
                            {{ Form::text('first_name', null, array('class'=>'form-control', 'placeholder'=>'Firstname')) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::text('last_name', null, array('class'=>'form-control', 'placeholder'=>'Lastname')) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::submit('Register', array('class'=>'form-control left btn btn-success'))}}
                        </div>
                        <div class='form-group'>
                            <div class='action-link'>Already registered? Login {{ HTML::link('/login', 'here') }}</div>
                        </div>
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>