var chart1, options1;
$("#btnBD1").click(function(){
    $(".modal-header").css("background-color", "#17a2b8");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("GRAFICA DE LAS MEJORAS");
    $("#modal-1").modal("show");
    
    $.ajax({
        url:"../graficos1.php",
        type: "POST",
        dataType:"json",
        success:function(data){
            options1.series[0].data = data;
            chart1 = new Highcharts.Chart(options1);
            console.log(data);
        }
    })    
    datos();
});

function datos(){
    var v_modal = $("#modal_1").modal({show: false});      
    options1 = {
        chart:{
            renderTo: 'contenedor-modal1',
            type: 'column'
        },
        title:{
            text: 'COORDINACION DE ADMINISTRACION DE SEGURIDAD LOGICA'
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



