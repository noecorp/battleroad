@extends ('layouts.default')

@section('content')

    <div class="featured-title featured-login">
        <div class="container">
            <h2 class="sr-only">Login</h2>
        </div>
    </div>

    <div class="container" id="login">

        <div class="row">

            <div class="login-form col-md-6 col-md-offset-3">

    			{{ Form::open(['route' => 'session.store', 'role' => 'form']) }}

                    <div class="form-group">
                        {{ Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'Login', 'required']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Password', 'required']) }}
                    </div>

                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('remember') }} Mantenha-me conectado
                        </label>
                    </div>

                    <span class="help-block pull-right"><a href="#">Esqueceu sua senha?</a></span>

                    <button type="submit" class="btn btn-default btn-block btn-lg champ-button">Login</button>

                {{ Form::close() }}

            </div><!-- login-form -->

        </div><!-- row -->

	</div><!-- container -->

@stop