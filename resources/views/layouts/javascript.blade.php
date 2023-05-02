<script>
    var hostUrl = "/Admin/dist/assets/";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="/Admin/dist/assets/plugins/global/plugins.bundle.js"></script>
<script src="/Admin/dist/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/Admin/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="/Admin/dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
{{-- <script src="/Admin/dist/assets/js/widgets.bundle.js"></script> --}}
<script src="/Admin/dist/assets/js/custom/widgets.js"></script>
<script src="/Admin/dist/assets/js/custom/apps/chat/chat.js"></script>
<script src="/Admin/dist/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="/Admin/dist/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="/Admin/dist/assets/js/custom/utilities/modals/users-search.js"></script>
<!--end::Page Custom Javascript-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/validator.min.js') }}"></script>
@stack('scripts')
