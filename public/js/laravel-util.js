/**
 * Created by felipeneuhauss on 30/09/15.
 */

/**
 * Funcao que altera quando a pagina e clicada de modo adicionar o campo de pesquisa
 * na url
 */
$('ul.pagination li a').on('click', function (){
    $(this).attr('href', $(this).attr('href')+'&search='+$('#table-search').val());
    return true;
});
