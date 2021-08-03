@extends('layouts.admin')
@section('title', "Configurações")
@section('content')
  

<x-alert>
    Conteudo e eu quiser....
</x-alert>

  <h1> Configurações...</h1>
  Versão: {{$Versao}}

  <form method="POST">
    @csrf
    Nome:<br/>
    <input name="nome" type="text" value={{$nome}} /><br/>
    Idade:<br/>
    <input name="idade" type="text" value={{$idade}} /><br/><br/>
    Cidade:<br/>
    <input name="cidade" type="text" value={{$cidade}} /><br/><br/>
    <input type="submit" value="Enviar" /><br/>
  </form>
  <a href="/config/info">Info</a>
@endsection
    

