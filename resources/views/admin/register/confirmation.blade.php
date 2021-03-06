@extends ('layouts.admin_register_2')

@section ('register_content')

    <ol id="steps">
        <li>
            <div class="step-title step-finished">
                <span class="number">1</span>
                <h2>
                    Informações
                    <small>Como vai ser?</small>
                </h2>
            </div>
        </li>
        <li>
            <div class="step-title step-finished">
                <span class="number">2</span>
                <h2>
                    Jogos
                    <small>Quais jogos?</small>
                </h2>
            </div>
        </li>
        <li>
            <div class="step-title step-finished">
                <span class="number">3</span>
                <h2>
                    Sistema de Pagamento
                    <small>Integre à sua conta ao Bcash</small>
                </h2>
            </div>
        </li>
        <li>
            <div class="step-title">
                <span class="number">3</span>
                <h2>
                    Confirmação
                    <small>Tudo certo?</small>
                </h2>
            </div>
            <div class="row">
                <div class="step-content col-md-12">

                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Título</th>
                                <td>{{ $championship->name }}</td>
                            </tr>
                            <tr>
                                <th>Descrição</th>
                                <td>{{ $championship->description }}</td>
                            </tr>
                            <tr>
                                <th>Data de início</th>
                                <td>{{ $championship->event_start->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Localização</th>
                                <td>{{ $championship->location }}</td>
                            </tr>
                            <tr>
                                <th>Conta Bcash</th>
                                <td>{{ $championship->token }}</td>
                            </tr>
                            <tr>
                                <th rowspan="3">Jogos</th>
                            </tr>
                            @if ($championship->competitions)
                                @foreach($championship->competitions as $competition)
                                <tr>
                                    <td>
                                        {{ $competition->game->name }}
                                        @if ( ! $competition->present()->isSingleRegistration())
                                            <small>( Inscrição por time. )</small>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <div class="next-step">
                        <p>
                            <a href="{{ route('admin.register.publish', [$championship->id]) }}"
                                class="btn btn-success btn-lg pull-right">
                                Publicar
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </li>
    </ol>

@endsection