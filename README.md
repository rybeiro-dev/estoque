# Estoque App

Projeto em PHP 8.2 com o framework Laravel 11.
 
A ideia aqui foi utilizar o DataTables ServerSide e alguns configurações para 
obter o melhor desempenho no uso desse recurso.

O DataTables ServerSide post no backend um conjunto de dados que devem ser 
utilizados para configura-lo.

Como por exemplo: O uso do Search ele posta o valor e na outra ponta o 
desenvolvedor tem essa informação para formar a query de retorno.

A request deve conter as colunas que compõe a estrutura da tabela para o 
DataTabeles.

```javascript
// referencia resources/view/products/index.blade.php
// ... codigo omitido
columns: [
        { data: 'id' },
        { data: 'description' },
        { data: 'brand' },
        { data: 'product_model' },
        { data: 'department' },
        { data: 'group' },
        { data: 'price' },
        { data: 'status' },
]
// ... codigo omitido
```

O response esperado deve ser um Array com um estrutura bem definida

```php
# referencia controller aap/Http/Controllers/ProductController
return [
            "draw" => $draw,
            "recordsTotal" => $total,
            "recordsFiltered" => $total,
            "data" => $dados
        ];
```

> Sexta-feira, 31 de Maio de 2024.
> Developer by Fabio Ribeiro
