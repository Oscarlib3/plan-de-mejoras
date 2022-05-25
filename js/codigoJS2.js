var chart2, options2;
$("#btnBD2").click(function(){
    $(".modal-header").css("background-color", "#17a2b8");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("GRAFICA DE LAS MEJORAS");
    $("#modal-2").modal("show");
    
    $.ajax({
        url:"../graficos2.php",
        type: "POST",
        dataType:"json",
        success:function(data){
            options2.series[0].data = data;
            chart2 = new Highcharts.Chart(options2);
            console.log(data);
        }
    })    
    datos();
});

function datos(){
    var v_modal = $("#modal_2").modal({show: false});      
    options2 = {
        chart:{
            renderTo: 'contenedor-modal2',
            type: 'column'
        },
        title:{
            text: 'COORDINACION DE PLANIFICACION Y CONTROL DE ACCESO'
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



