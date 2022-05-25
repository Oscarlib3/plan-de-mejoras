var chart, options;
$("#btnBD").click(function(){
    $(".modal-header").css("background-color", "#17a2b8");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("GRAFICA DE LAS MEJORAS");
    $("#modal").modal("show");
    
    $.ajax({
        url:"../graficos.php",
        type: "POST",
        dataType:"json",
        success:function(data){
            options.series[0].data = data;
            chart = new Highcharts.Chart(options);
            console.log(data);
        }
    })    
    datos();
});

function datos(){
    var v_modal = $("#modal").modal({show: false});      
    options = {
        chart:{
            renderTo: 'contenedor-modal',
            type: 'column'
        },
        title:{
            text: 'COORDINACION DE MONITOREO Y RESPUESTA DE INCIDENTES'
        },
        xAxis:{
            type: 'category'
        },
        yAxis:{
            title:{
                text: ' avance'
            }
        },
        plotOptions: {
            series:{
                borderWidth:1,
                dataLabels:{
                    enabled:true,
                    format:'{point.y:.0f}'
                }
            }
        },
        tooltip:{
            headerFormat:"<span style='font-size:10px'> {series.name}</span><br>",
            pointFormat: "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.0f}</b>"
        },
        series:[{
            name: "proximas actividades",
            colorByPoint:true,
            data:[],
        }]        
    }
    v_modal.on("shown",function(){});
    v_modal.modal("show");
}



