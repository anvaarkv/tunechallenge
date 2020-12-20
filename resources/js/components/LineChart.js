// import { Line, mixins } from 'vue-chartjs'
// const { reactiveProp } = mixins
//
// export default {
// extends: Line,
// mixins: [reactiveProp],
// props: {
//     options: {
//         scales: {
//             xAxes: [{
//                 gridLines: {
//                     color: "rgba(0, 0, 0, 0)",
//                 }
//             }],
//             yAxes: [{
//                 display: false,
//                 gridLines: {
//                     color: "rgba(0, 0, 0, 0)",
//                 }
//             }]
//         }
//     }
// },
// mounted () {
// // this.chartData is created in the mixin.
// // If you want to pass options please create a local options object
//     this.renderChart(this.chartData, this.options)
// }
// }


import { Line, mixins, Bar, Radar } from 'vue-chartjs'
const { reactiveProp } = mixins

export default {
    extends: Bar,
    mixins: [reactiveProp],
    props: {
        chartData: {},
        options: {}
    },
    mounted () {
        // this.chartData is created in the mixin.
        // If you want to pass options please create a local options object
        this.renderChart(this.chartData, this.options)
    }
}
