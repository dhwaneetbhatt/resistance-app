<div class='login-container container'>
    <div class='row'>
        <div class='col-md-4 col-md-offset-4'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>Please sign in</h3>
                </div>
                <div class='panel-body'>
                    {{ Form::open(array('url'=>'/login', 'role'=>'form')) }}
                    <fieldset>
                        <div class='form-group'>
                            {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
                        </div>
                        <div class='form-group'>
                            {{ Form::submit('Login', array('class'=>'form-control left btn btn-primary'))}}
                        </div>
                        <div class='form-group'>
                            <div class='action-link'>Not a user? Register {{ HTML::link('/register', 'here') }}</div>
                        </div>
                    </fieldset>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>