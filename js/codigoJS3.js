var chart3, options3;
$("#btnBD3").click(function(){
    $(".modal-header").css("background-color", "#17a2b8");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("GRAFICA DE LAS MEJORAS");
    $("#modal-3").modal("show");
    
    $.ajax({
        url:"../graficos3.php",
        type: "POST",
        dataType:"json",
        success:function(data){
            options3.series[0].data = data;
            chart3 = new Highcharts.Chart(options3);
            console.log(data);
        }
    })    
    datos();
});

function datos(){
    var v_modal = $("#modal_3").modal({show: false});      
    options3 = {
        chart:{
            renderTo: 'contenedor-modal3',
            type: 'column'
        },
        title:{
            text: 'COORDINACION DE GESTION DE SEGURIDAD DE INFORMACION Y CONTROL DE CAMBIO'
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



