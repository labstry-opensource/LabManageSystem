<?php

if(!defined('BASE_PATH')) {
    die('Direct access not permitted');
}


?>
<div class="p-3">
    <h2 class="h3">Page</h2>
    <div class="pages-show-container py-4">
        <div class="list-group mt-1">
            <nested-page
                    v-for="data in pages_data"
                    v-if="pages_data !== null"
                    v-bind:data="data"
            ></nested-page>
        </div>
    </div>
</div>

<script id="nested-page" type="text/html">
    <div class="list-group-item nested_page_component nested-items filter">
        <div v-if="data !== null" class="">
            <div class="text-pop-mosaic">
                <div class="row">
                    <div class="col-12 col-md-6">
                        {{data.title}}
                    </div>
                    <div class="col-12 col-md-6 text-start text-md-end">
                        <a v-bind:href="page_link_base + '&id=' + data.id"
                           class="btn bg-pop-mosaic text-white">
                            Edit
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                            </svg>
                        </a>
                    </div>
                </div>


                <div class="list-group mt-1">
                    <nested-page v-if="data.pages !== null"
                                 v-for="nested_page_data in data.pages"
                                 v-bind:level="level+1"
                                 v-bind:data="nested_page_data"></nested-page>
                    <div v-if="data.pages == null" class="list-group-item nested_page_component nested-items"></div>
                </div>

            </div>
        </div>
    </div>
</script>
<script>
    Vue.component('nested-page', {
        template: document.getElementById('nested-page').innerHTML,
        props:{
            level: {
                type: Number,
                default: 0,
            },
            data: {
                type: Object,
            }
        },
        data: function(){
            return {
                page_link_base: <?php echo json_encode(BASE_PATH. '/admin/?section=page_details'); ?>,
            }
        }
    });
</script>

<script>
    var pageViews = new Vue({
        el: '.pages-show-container',
        data: {
            pages_url: <?php echo json_encode(BASE_PATH . '/api/generic.php?__lms_action=pages'); ?>,
            page_link_base: <?php echo json_encode(BASE_PATH. '/admin/?section=page_details'); ?>,
            pages_data: '',
            page_filter: '',
            edit_mode: false,
        },
        mounted: function(){
            this.getPageData();
        },
        methods: {
            getPageData: function(){
                var self = this;
                var xhttp = new XMLHttpRequest();
                xhttp.addEventListener("load", function(){
                    self.pages_data = this.response;
                    self.$nextTick(function(){
                        this.initSortable();
                    });
                });
                xhttp.open('GET', self.pages_url);
                xhttp.responseType = 'json';
                xhttp.send();

            },
            initSortable: function(){
                // Loop through each nested sortable element
                var nestedSortables = $('.nested-items');
                for (var i = 0; i < nestedSortables.length; i++) {
                    new Sortable(nestedSortables[i], {
                        group: 'nested',
                        animation: 150,
                        fallbackOnBody: true,
                        swapThreshold: 0.65,
                        emptyInsertThreshold: 10,
                    });
                }

            },
            toggleEditMode: function(){

            }
        }
    });

</script>
