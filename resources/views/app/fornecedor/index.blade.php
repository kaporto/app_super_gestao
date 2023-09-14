<h3>Fornecedor</h3>

@php
    //bloco de codigo php
@endphp

{{-- @dd($fornecedores) --}}

{{--

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Alguns</h3>
@elseif (count($fornecedores) > 10)
    <h3>Varios</h3>
@else
    <h3>Nenhum</h3>
@endif



@unless ($fornecedores[0]['status'] == 'S') <!-- se o retorno da condicao for false -->
    Fornecedor inativo
@endunless

--}}

<!-- isset verifica se a variavel esta definida -->

@isset($fornecedores)
    @for($i=0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome']}}
        <br>
        Status: {{ $fornecedores[$i]['status']}}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado nao informado'}} {{-- utilizando default--}}
        <hr>
    @endfor  
    Escape da variavel: @{{ $fornecedores[1]['cnpj']}}  
@endisset

@php

/*

 empty se a variavel vazia, quando:
 ''
 0
 0.0
 '0'
 null
 false
 array()
 $var  sem nada declarado

 Operador condicional ternario
  condicao ? se true : se false;
*/
@endphp