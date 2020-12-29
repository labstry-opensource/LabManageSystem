<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}


?>
<div class="p-3 page-display">
    <div class="title-operation">
        <h2 class="h3">Page</h2>
        <div class="">
            <button class="btn btn-success btn-operation-toggle" id="btn-edit-toggle">
                Edit
            </button>
            <button class="btn d-none btn-success btn-operation-toggle" id="btn-save-toggle">
                Save
            </button>
        </div>
    </div>
    <div class="pages-show-container py-4">
        <div class="list-group nested-items my-2" data-dir="/">
        </div>
    </div>
</div>

<div class="modal fade" id="savingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Saving. Please wait..." aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">


            </div>
        </div>
    </div>
</div>

<?php
    include ROOT_DIR . '/admin/widget/nested-pages.php';
?>
<script type="text/html" id="processNotice">
    <div class="d-flex align-items-center p-3">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="ps-3">
            Saving structure, please wait...
        </div>
    </div>

</script>

<script type="text/html" id="onSuccessNotice">
    <div class="bg-success d-flex align-items-center text-light p-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
        </svg>
        <div class="ps-3">
            Your structure has been saved.
        </div>
    </div>
</script>

<script>
    var base_path = <?php echo json_encode(BASE_PATH); ?>;
    var pages_url =  <?php echo json_encode(BASE_PATH . '/api/generic.php?__lms_action=pages'); ?>;
    var pages_edit_url = <?php echo json_encode(BASE_PATH . '/api/generic.php?__lms_action=pages-struct-edit'); ?>;
    var page_link_base =  <?php echo json_encode(BASE_PATH. '/admin/?section=page_details'); ?>;
    var pages_data = '';
    var page_filter = '';
    var edit_mode = false;
    var nested_sortable_arr = [];
    var page_drag_action = [];

    function getPageData(){
        var xhttp = new XMLHttpRequest();
        xhttp.addEventListener("load", function(){
            pages_data = this.response;
            $('.pages-show-container .nested-items').html($.templates('.list-group-template').render(pages_data));
        });
        xhttp.open('GET', self.pages_url);
        xhttp.responseType = 'json';
        xhttp.send();
    }

    function initSortable(){
        // Loop through each nested sortable element
        var nestedSortables = $('.nested-items');
        for (var i = 0; i < nestedSortables.length; i++) {
            self.nested_sortable_arr[i] =  new Sortable(nestedSortables[i], {
                group: 'nested',
                handle: '.handle',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                emptyInsertThreshold: 10,
                disabled: true,
                onEnd: function (evt) {
                    var end_dir = $(evt.item).parents('.nested-items').data('dir');
                    var slug = $(evt.item).children('.page-drag-handle').data('slug');
                    page_drag_action.push({
                        parent_dir: end_dir,
                        slug: slug,
                    })
                },
            });
        }

    }

    function enableSortable(){
        edit_mode = !edit_mode;
        for (var i = 0; i < nested_sortable_arr.length; i++) {
            nested_sortable_arr[i].option('disabled', false);
        }
    }

    function disableSortable(){
        edit_mode = !edit_mode;
        for (var i = 0; i < nested_sortable_arr.length; i++) {
            nested_sortable_arr[i].option('disabled', true);
        }
    }

    function saveNewStruct(){
        var modalContent = $('#savingModal .modal-body')
        modalContent.html($('#processNotice').html());
        $('#savingModal').modal('toggle');
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() { // Call a function when the state changes.
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                modalContent.html($('#onSuccessNotice').html());
                setTimeout(function(){
                    $('#savingModal').modal('toggle');
                }, 2000);
            }
        }
        xhttp.open('POST', self.pages_edit_url, true);
        xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8",);
        xhttp.send(JSON.stringify(page_drag_action));
    }

    function toggleEditMode(){
        if(edit_mode){
            disableSortable();
            $('#btn-edit-toggle').removeClass('d-none');
            $('#btn-save-toggle').addClass('d-none');
            saveNewStruct();
            $('.handle.page-drag-handle').removeClass('bg-grey');
        }
        else{
            if(!nested_sortable_arr.length) initSortable();
            enableSortable();
            $('#btn-edit-toggle').addClass('d-none');
            $('#btn-save-toggle').removeClass('d-none');
            $('.handle.page-drag-handle').addClass('bg-grey');
        }
    }

    getPageData();

    $(document).on('click', '.btn-operation-toggle', () => {
        toggleEditMode();

    });
</script>
