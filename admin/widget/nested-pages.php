<script type="text/html" class="page-list-template">
    <div class="list-group-item">
        <div class="p-2 handle page-drag-handle" data-slug="{{: slug}}"></div>
        <div class="page-details">
            <div class="row">
                <div class="col-12 col-md-6 fw-bold text-pop-mosaic">
                    {{:title}}
                </div>
                <div class="col-12 col-md-6 text-start text-md-end">
                    <a href="#"
                       class="btn bg-pop-mosaic text-white">
                        Edit
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="list-group nested-items my-2" data-dir="{{: slug}}">
                {{if pages}}
                {{for pages}}
                {{include tmpl=".page-list-template"/}}
                {{/for}}
                {{/if}}
            </div>
        </div>

    </div>
</script>

<script type="text/html" class="list-group-template">
    {{include tmpl=".page-list-template"/}}
</script>