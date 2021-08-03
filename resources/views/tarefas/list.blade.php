@extends('layouts.admin')
@section('title', "Listagem de Tarefas")
@section('content')
  <h1>Listagem</h1>
  <a href="{{ route('tarefas.add') }}">Adicionar um novo item</a>
 @if (count($list))
  <ul>
    @foreach ($list as $item)
        
        <li>
          <a href="{{ route('tarefas.done', ['id'=>$item->Id]) }}">[ @if ($item->resolvido===1) Desmarcar @else Marcar @endif] </a>
          {{$item->titulo}}
          <a href="{{ route('tarefas.edit', ['id'=>$item->Id]) }}">[ editar ]</a>
          <a href="{{ route('tarefas.del', ['id'=>$item->Id]) }}" onclick="return confirm('Temcerteza que quer excluir?')">[ excluir ]</a>
        </li>
    @endforeach
  </ul>
  @else
    Não há itens a serem listados.    
  @endif
@endsection