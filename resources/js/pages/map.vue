<template>
    <div>
        <div class="row" style="background:white;">
            <div class="col-lg-12" style="padding:0px;">
                <div id="map" style="height:700px;">
                </div>
            </div>
        </div>
        <div class="ibox" id="carrera" style="margin:0px !important;">
            <div class="ibox-title" style="padding: 5px 50px 8px 15px;">

                <div class="input-group">
                    <input class="form-control" style="" id="myInput" type="text" placeholder="Busquedad">
                    <span class="input-group-append"><a
                            style="color:black;cursor:default;background-color:white!important;border-top:1px solid rgb(229, 230, 231)!important;
                                                                    border-right:1px solid rgb(229, 230, 231)!important;border-bottom:1px solid rgb(229, 230, 231)!important;border-left:none"
                            class="btn btn-primary">
                            <i class="fa fa-search"></i></a></span>
                </div>
                <div class="ibox-tools" style="top:5px!important;right:5px!important;">
                    <a class="collapse-link btn btn-primary" id="ocultar_dispositivos" data-ocultado="0">
                        <i class="fa fa-bars"></i>
                    </a>

                </div>
            </div>
            <div class="ibox-content" style="padding:0px!important;">
                <div style="height:245px!important;" class="contenedor">

                </div>

            </div>
        </div>
        <div class="leyenda" id="leyenda">
            <div class="row">
                <div class="col-lg-2"><b>LEYENDA</b></div>
                <div class="col-lg-3">
                    <div style="margin-top:5px;">Conectado</div>
                    <div class="circle_gps button" id="button-0"></div>
                </div>
                <div class="col-lg-3">
                    <div style="margin-top:5px;">Desconectado</div>
                    <div class="circle_gps_red button " id="button-0"></div>
                </div>
                <div class="col-lg-3">
                    <div style="margin-top:5px;">Sin Movimiento</div>
                    <div class="circle_gps_yellow button" id="button-0"></div>
                </div>

            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "Mapa",
    data() {
        return {
            mapa: null,
            marker: null,
            center: {
                lat: -11.98657222134976, lng: -77.0040282800608
            },
            lineCoordenadas: []
        }
    },
    watch: {
        center: {
            handler(value) {
                this.$nextTick(this.updateMap);
            },
            deep: true,
        }
    },
    created() {
        let me = this;
        Echo.channel("location").listen("SendPositionPrueba", (e) => {
            const { location } = e;
            me.center = location;
        });
    },
    methods: {
        mapInit() {
            this.mapa = new google.maps.Map(document.getElementById("map"), {
                center: this.center,
                zoom: 12,
                gestureHandling: "greedy",
                zoomControl: false,
                mapTypeControl: true,
                streetViewControl: false,
                fullscreenControl: false,
            });
            const carrera = document.getElementById("carrera");
            this.mapa.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(carrera);
            const leyenda = document.getElementById("leyenda");
            this.mapa.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(leyenda);
            this.marker = new google.maps.Marker({
                map: this.mapa,
                position: this.center,
                animation: "bounce"
            });
        },
        updateMap() {
            let newPosition = { lat: Number(this.center.lat), lng: Number(this.center.lng) };
            
            this.lineCoordenadas.push(newPosition);
            this.mapa.setCenter(newPosition);
            this.marker.setPosition(newPosition);

            let x = new google.maps.Polyline({
                path: this.lineCoordenadas,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1,
                strokeWeight: 4,
                map: this.mapa
            });
        }
    },
    mounted() {
        this.mapInit();
    }
}
</script>