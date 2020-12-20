<template>
    <div class="card mb-2">
            <h5 class="card-header ">
                <div class="row">
                    <div class="col-md-2">
                        <img class="card-img-top" :src=this.avatar alt="Photo" @error="imageLoadError">
                    </div>
                    <div class="col-md-10 float-right">
                        <h6 class="card-title">{{ user.name }}</h6>
                        <small class="text-muted">{{ user.occupation }}</small>
                    </div>
                </div>

            </h5>
            <div class="card-body">
               <chartjs-component :userData="user"></chartjs-component>
            </div>
            <div class="card-footer ">
                <div class="row">
                    <div class="col-4">
                        <strong>{{ meta.total_impression}}</strong>
                        <div class="clearfix"></div>
                        <small class="text-muted">Impressions</small>
                    </div>
                    <div class="col-4">
                        <strong>{{ meta.total_conversion}}</strong>
                        <div class="clearfix"></div>

                        <small class="text-muted">Conversions</small>
                    </div>
                    <div class="col-4">
                        <strong>${{ this.total_revenue }}</strong>
                        <br>
                        <small class="text-muted">Revenue</small>
                    </div>
                </div>
            </div>

        </div>
</template>
<script>
    import moment from 'moment';
    import ChartjsComponent from "./ChartjsComponent";
    export default {
        components : {
            ChartjsComponent
            // Chartjs
        },
        props: ['userData'],
        data() {
            return {
                "avatarPlaceholder" : "",
                // user: {
                //     "name": "",
                //     "avatar": "https://via.placeholder.com/50?text=12",
                //     "id": "",
                //     "occupation": ""
                // },
                user: this.userData,
                meta: {
                        "total_impression": 0,
                        "total_conversion": 0,
                        "total_revenue": 0,
                },
                //id: this.$attrs.id,
            }
        },

        methods: {
            allUser() {
                this.$http.get(process.env.MIX_BASE_URL+'/stats/users/').then((response) => {
                    this.user = response.data.data;
                });
            },
            singleUser() {
                this.$http.get(process.env.MIX_BASE_URL+'/stats/users/' + this.id).then((response) => {
                    this.user = response.data;
                });
            },
            async metaUser() {
                await this.$http.get(process.env.MIX_BASE_URL+'/stats/metas/' + this.user.id).then((response) => {
                    this.meta = response.data;
                });
            },
            imageLoadError (event) {
                event.target.src = "https://via.placeholder.com/50?text="+this.user.name.charAt(0)
                // console.log('Image failed to load');
            },
        },
        mounted() {
            this.metaUser();
            // this.fillChartData();
            // this.renderChart(this.chartdata, this.chartOptions)
        },
        computed: {
            avatar() {
                if(this.user.avatar){
                    return this.user.avatar;
                }else{
                    return "https://via.placeholder.com/50?text="+this.user.name.charAt(0);
                }
                //return this.avatarPlaceholder;
                // return this.user.avatar;
            },
            total_revenue(){
                if(this.meta.total_revenue){
                    return this.meta.total_revenue.toFixed(2);
                }else{
                    return this.meta.total_revenue;
                }
            }
        }
    }
</script>
<style scoped>
    img {
        height: 50px;
        width: 50px;
    }
</style>
