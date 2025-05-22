<?php

namespace Source\Models\Product;

class Stock {
    // Atributos privados
    private $id;
    private $produto;
    private $quantidade;
    private $precoUnitario;

    // Construtor
    public function __construct
    (
        int $id = null, 
        Product $produto = null, 
        int $quantidade = null, 
        float $precoUnitario = null
    ) 
    {
        $this->id = $id;
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
    }

    // Getters
    public function getId() : ?int {
        return $this->id;
    }

    public function getProduto() : ?Product {
        return $this->produto;
    }

    public function getQuantidade() : ?int {
        return $this->quantidade;
    }

    public function getPrecoUnitario() : ?float {
        return $this->precoUnitario;
    }

    // Setters
    public function setId($id) : void {
        $this->id = $id;
    }

    public function setProduto($produto) : void {
        $this->produto = $produto;
    }

    public function setQuantidade($quantidade) : void {
        $this->quantidade = $quantidade;
    }

    public function setPrecoUnitario($precoUnitario) : void {
        $this->precoUnitario = $precoUnitario;
    }
}
