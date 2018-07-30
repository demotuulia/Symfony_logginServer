/**
 * Javascript used by template
 * app/Resources/views/frontEnd/partials/paging.html.twig
 */

var globalOnChangePagingSelectLink = '';
var globalOnChangePagingNextLink = '';
var globalOnChangePagingPreviousLink = '';
var globalOnChangePagingExcelLink = '';

$( document ).ready(function() {

    /**
     * Initialize date pickers
     * 
     */
    $( "#startDate" ).datepicker({
        dateFormat: "yy-mm-dd"
    });

    $( "#endDate" ).datepicker({
        dateFormat: "yy-mm-dd"
    });


    /**
     * Initialize  event functions
     * 
     */
    
    $( "#PagingSelect" ).change(function() {
        var selectedPage = $(this).val() ;
        changeListingPage(selectedPage);
    });
    
    $( "#prevPage" ).click(function(event) {
        event.preventDefault();
        changePage(globalOnChangePagingPreviousLink);
    });


    $( "#nextPage" ).click(function(event) {
        event.preventDefault();
        changePage(globalOnChangePagingNextLink);
    });

    $( "#ExportExcelLink" ).click(function(event) {
        event.preventDefault();
        changePage(globalOnChangePagingExcelLink);
    });


});


/**
 * Change Page
 *
 * @param link
 */
function changePage(link) {
    var decodedLink = link.replace(/&amp;/g, '&');
    window.location.href = decodedLink;
}



/**
 * changeListingPage
 *
 * @param integer page
 */
function changeListingPage(page) {
    var redirectLink = globalOnChangePagingSelectLink.replace(/&amp;/g, '&');
    redirectLink +=   '&page=' + page;
    window.location.href = redirectLink;
}
