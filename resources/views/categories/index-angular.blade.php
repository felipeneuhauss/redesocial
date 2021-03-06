@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="box" ng-controller="CategoryController">
        <div class="row-fluid">
            <div class="span12">
                <h3><i class="icon-fly"></i> Categorias</h3>
                <div class="box-content nopadding">
                    <div class="box-content">
                        <form id="form-category" class="form-validate" method="post" ng-submit="add(categoryForm)" enctype="multipart/form-data">
                            <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                           <div class="form-group">
                                   <label class="control-label" for="name">Selecione as marcas</label>
                                   <select class='form-control' ng-model='categoryForm.category.id'
                                           ng-options="category.id as category.name for category in getCategories()" ng-model="selected"
                                       >
                                       <option value="">Selecione uma categoria pai</option>
                                   </select>
                               </div>
                           <div class="form-group">
                               <label for="name">Nome da categoria</label>
                               <input type="text" name="name" ng-model="categoryForm.name" class="form-control" id="name" placeholder="Nome da categoria">
                             </div>
                             <div class="form-group">
                               <label for="">Imagem para representar a categoria</label>
                               <input type="file" name="image">
                             </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="button" class="btn btn-default" ng-click="prepostForm = {}">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <hr />
        <div class="row-fluid">
            <div class="box-title">
                <h3><i class="icon-code"></i> Categorias
                <a href="#form-category" class="btn btn-default" ng-click="categoryForm = {}">Adicionar nova categoria</a></h3>
                <div class="content">
                    <input type="text" placeholder="Pesquisar..." name="search" ng-model="filter" style="top:3px;position:relative;">
                </div>
            </div>
            <hr />
            <table class="table table-user table table-striped">
                <thead>
                <tr>
                  <th>Categoria pai</th>
                  <th>Nome</th>
                  <th>Imagem</th>
                  <th>Ações</th>
                </tr>
              </thead>
            <tbody>
                <tr dir-paginate="category in result | filter: filter | itemsPerPage: pageSize" current-page="currentPage" ng-class-odd="'odd'">
                    <td>
                        {!category.category.name!}
                    </td>
                    <td>
                        {!category.name!}
                    </td>
                    <td>
                        {!category.image!}
                    </td>
                    <td>
                        <a href="#" ng-click="remove(category)">Remover</a><br />
                        <a href="#" ng-click="edit(category)"> Editar</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="col-md-12 text-center">
                <dir-pagination-controls boundary-links="true" on-page-change="pageChangeHandler(newPageNumber)" template-url="/js/plugins/angular-pagination/dirPagination.tpl.html"></dir-pagination-controls>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/app/categories/crud.js"></script>
@stop
