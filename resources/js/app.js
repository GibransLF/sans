import "./bootstrap";

import Alpine from "alpinejs";

import "flowbite";

// datatables
import jsZip from "jszip";
window.JSZip = jsZip;
import pdfmake from "pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;
import DataTable from "datatables.net-dt";
import "datatables.net-buttons-dt";
import "../../node_modules/datatables.net-dt/css/dataTables.dataTables.css";
import "../../node_modules/datatables.net-buttons-dt/css/buttons.dataTables.css";
import "datatables.net-buttons/js/buttons.colVis.mjs";
import "datatables.net-buttons/js/buttons.html5.mjs";
import "datatables.net-buttons/js/buttons.print.mjs";
import "datatables.net-responsive-dt";

let table = new DataTable("#manageProduk", {
    responsive: true,
    dom: "lBfrtip",
    buttons: [
        {
            extend: "copy",
            exportOptions: {
                columns: ":not(.nprint)",
            },
        },
        {
            extend: "excel",
            exportOptions: {
                columns: ":not(.nprint)",
            },
        },
        {
            extend: "pdf",
            exportOptions: {
                columns: ":not(.nprint)",
            },
        },
        {
            extend: "print",
            exportOptions: {
                columns: ":not(.nprint)",
            },
        },
    ],
});
let akun = new DataTable("#akun", {
    responsive: true,
    dom: "lfrtip",
});

window.Alpine = Alpine;

Alpine.start();
