<?php

declare(strict_types=1);

use App\Controller\IndexController;
use App\Controller\ProductController;
use App\Controller\CategoryController;

function CreateRoute(string $controllerName, string $methodName)
{
  return [
    'controller' => $controllerName,
    'method' => $methodName,
  ];
}

$routes = [
  '/' => CreateRoute(IndexController::class, 'indexAction'),
  '/produtos' => CreateRoute(ProductController::class, 'listAction'),
  '/produtos/novo' => CreateRoute(ProductController::class, 'addAction'),
  '/produtos/editar' => CreateRoute(ProductController::class, 'editAction'),
  '/produtos/excluir' => CreateRoute(ProductController::class, 'removeAction'),
  '/produtos/relatorio' => CreateRoute(ProductController::class, 'reportAction'),

  '/categorias' => CreateRoute(CategoryController::class, 'listAction'),
  '/categorias/nova' => CreateRoute(CategoryController::class, 'addAction'),
  '/categorias/editar' => CreateRoute(CategoryController::class, 'updateAction'),
  '/categorias/excluir' => CreateRoute(CategoryController::class, 'removeAction'),
];

return $routes;
