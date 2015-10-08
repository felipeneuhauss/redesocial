@extends('layouts.layout')
@section('content')
<div class="box" ng-controller="AirportController">
    <div class="row-fluid">
        <div class="span12">
            <h3><i class="icon-fly"></i> Aeroportos</h3>
            <div class="box-content nopadding">
                <div class="box-content">
                    <form id="form-airport" class="form-validate" method="post" ng-submit="add(airportForm)">
                       <div class="form-group">
                           <label for="value">Sigla do Aeroporto - {! airportForm.value !}</label>
                           <input type="text" name="value" ng-model="airportForm.value" class="form-control" id="value" placeholder="Sigla">
                         </div>
                         <div class="form-group">
                           <label for="exampleInputPassword1">Nome do aeroporto</label>
                           <input type="text" name="name" ng-model="airportForm.name" class="form-control" id="name" placeholder="Nome do aeroporto">
                         </div>
                         {{--<div class="form-group">--}}
                           {{--<label for="exampleInputFile">File input</label>--}}
                           {{--<input type="file" id="exampleInputFile">--}}
                           {{--<p class="help-block">Example block-level help text here.</p>--}}
                         {{--</div>--}}
                         {{--<div class="checkbox">--}}
                           {{--<label>--}}
                             {{--<input type="checkbox"> Check me out--}}
                           {{--</label>--}}
                         {{--</div>--}}
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
            <h3><i class="icon-list"></i>Aeroportos <a href="#form-airport" class="btn btn-default" ng-click="airportForm = {}">Adicionar novo aeroporto</a></h3>
            <div class="actions">
                <input type="text" placeholder="Pesquisar..." name="search" ng-model="filter" style="top:3px;position:relative;">
            </div>
        </div>
        <div data-visible="true" data-height="300" class="box-content">
            <table class="table table-user table-nohead">
                <tbody>
                <tr>
                    <td>Nome</td>
                    <td>Contatos</td>
                    <td>Dados bancários</td>
                    <td></td>
                </tr>
                <tr dir-paginate="airport in result | filter: filter | itemsPerPage: pageSize" current-page="currentPage" ng-class-odd="'odd'">
                    <td>
                        {!airport.value!}
                    </td>
                    <td>
                        {!airport.name!}
                    </td>
                    <td>
                        <a href="#" ng-click="remove(airport)">Remover</a><br />
                        <a href="#" ng-click="edit(airport)"> Editar</a>
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
<script type="text/javascript" src="/js/app/airports/crud.js"></script>
@stop
