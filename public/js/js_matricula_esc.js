
const fecha_actual= new Date();
const APP = new Vue({
    el:'#contenedor',
    data:{
        dataRe:{
            periodo:fecha_actual.getFullYear(),
            fecha_apertura:'',
            fecha_cierre:'',
        }
    }
});


console.log(URL+'utils/Spanish.json');
$(document).ready(function() {
    initComponent();
    /* $('#example').DataTable({
         "processing": true,
         "serverSide": true,
         "sAjaxSource": URL+"/admin/sever_matri/data_list?insti="+$("#institucion").val(),
         order: [[ 0, "desc" ]],
         dom: 'Bfrtip',
         buttons: [
             'csv', 'excel'
         ],
          columnDefs: [
              {
                  "targets": 0,
                  "data": "",
                  "render": function (data, type, row, meta) {

                      return '<span style="display: block;margin: auto;text-align: center;">'+row[0]+'</span>';

                  }
              },
              {
                  "targets": 1,
                  "data": "",
                  "render": function (data, type, row, meta) {

                      return '<span style="display: block;margin: auto;text-align: center;">'+row[1]+'</span>';

                  }
              },
              {
                  "targets": 2,
                  "data": "",
                  "render": function (data, type, row, meta) {

                      return '<span style="display: block;margin: auto;text-align: center;">'+row[2]+'</span>';

                  }
              },
              {
                  "targets": 3,
                  "data": "",
                  "render": function (data, type, row, meta) {

                      return '<span style="display: block;margin: auto;text-align: center;">'+formatoFechaView(row[3])+'</span>';

                  }
              },
              {
                  "targets": 4,
                  "data": "",
                  "render": function (data, type, row, meta) {
                      return '<span style="display: block;margin: auto;text-align: center;">'+formatoFechaView(row[4])+'</span>';

                  }
              },
              {
                  "targets": 5,
                  "data": "",
                  "render": function (data, type, row, meta) {
                      var etiqueta ='';
                      if (row[5]==1){
                          etiqueta = '<span style="display: block;margin: auto;text-align: center;" class="badge badge-pill badge-primary">ABIERTO</span>';
                      }else{
                          etiqueta = '<span style="display: block;margin: auto;text-align: center;" class="badge badge-pill badge-danger">CERRADO</span>';
                      }

                      return etiqueta;
                     // return '<span style="display: block;margin: auto;text-align: center;">'+row[6]+'</span>';

                  }
              },{
                  "targets": 6,
                  "data": "",
                  "render": function (data, type, row, meta) {

                      return '<button style="display: block;margin: auto;text-align: center;" type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>';
                      // return '<span style="display: block;margin: auto;text-align: center;">'+row[6]+'</span>';

                  }
              },
          ],
         language: {
             url: URL+'/utils/Spanish.json'
         }
     });*/

} );

function initComponent() {
    $('[data-toggle="flatpickr"]').each((function () {
        var t = $(this), n = {
            mode: void 0 !== t.data("flatpickr-mode") ? t.data("flatpickr-mode") : "single",
            altInput: void 0 === t.data("flatpickr-alt-input") || t.data("flatpickr-alt-input"),
            altInputClass: void 0 !== t.data("flatpickr-alt-input-class") ? t.data("flatpickr-alt-input-class") : "form-control flatpickr-input",
            monthSelectorType: void 0 !== t.data("flatpickr-month-selector-type") ? t.data("flatpickr-month-selector-type") : "static",
            altFormat: void 0 !== t.data("flatpickr-alt-format") ? t.data("flatpickr-alt-format") : "F j, Y",
            dateFormat: void 0 !== t.data("flatpickr-date-format") ? t.data("flatpickr-date-format") : "Y-m-d",
            wrap: void 0 !== t.data("flatpickr-wrap") && t.data("flatpickr-wrap"),
            inline: void 0 !== t.data("flatpickr-inline") && t.data("flatpickr-inline"),
            static: void 0 !== t.data("flatpickr-static") && t.data("flatpickr-static"),
            enableTime: void 0 !== t.data("flatpickr-enable-time") && t.data("flatpickr-enable-time"),
            noCalendar: void 0 !== t.data("flatpickr-no-calendar") && t.data("flatpickr-no-calendar"),
            appendTo: void 0 !== t.data("flatpickr-append-to") ? document.querySelector(t.data("flatpickr-append-to")) : void 0,
            onChange: function (r, e) {
                n.wrap && t.find("[data-toggle]").text(e)
            }
        };
        t.flatpickr(n)
    }))
}

