<template>
    <div class="">
        <line-chart :chart-data="datacollection" :options="options"></line-chart>
<!--        <button @click="fillData()">Randomize</button>-->
    </div>
</template>

<script>
    import LineChart from './LineChart'
    export default {
        components: {
            LineChart
        },
        data () {
            return {
                datacollection: {},
                chartData : [this.getRandomInt(), this.getRandomInt()],
                user: this.userData,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }],
                        yAxes: [{
                            display: false,
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }]
                    }
                }
            }
        },
        props: ['userData'],
        mounted () {
            this.getUserData();
        },
        created() {
        },
        methods: {
            fillData () {
                this.datacollection = {
                    labels: [this.getRandomInt(), this.getRandomInt()],
                    datasets: [
                        {
                            label: 'Conversions Data',
                            // backgroundColor: '#f87979',
                            data: this.chartData
                        }
                    ]
                }
            },
            getRandomInt () {
                return Math.floor(Math.random() * (50 - 5 + 1)) + 5
            },
            async getUserData(){
                await this.$http.get(process.env.MIX_BASE_URL+'/stats/conversationChart/' + this.user.id).then((response) => {
                    this.datacollection = {
                        labels: response.data.label,
                        datasets: [
                            {
                                label: 'Conversions Data',
                                backgroundColor: '#6699ff',
                                data: response.data.revenue
                            }
                        ]
                    }
                    this.chartData = response.data;

                });
            }
        }
    }
</script>

<style>
    .small {
        max-width: 600px;
        margin:  150px auto;
    }
</style>
