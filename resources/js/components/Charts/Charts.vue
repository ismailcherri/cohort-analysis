<template>
    <div class="Charts">
        <div class="container">
            <div class="card">
                <h3 class="card-header">Retention Chart</h3>
                <div class="card-body">
                    <p class="card-text">Weekly cohorts retention of User through the onboarding process</p>
                    <highcharts :options="chartOptions"></highcharts>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import './_Charts.scss'
    import axios from 'axios'

    export default {
        data(){
            return {
                url: '/api/retention-stats/weekly-cohorts',
                chartOptions: {
                    chart: {
                        type: 'spline'
                    },
                    title: {
                        text: 'Weekly Retention Curve'
                    },
                    xAxis: {
                        categories: [0,20,40,50,70,90,99,100],
                        title: 'Onboarding Steps'
                    },
                    yAxis: {
                        title: {
                            text: 'User Percentage (%)'
                        },
                        labels: {
                            formatter: function() {
                                return this.value + ' %';
                            }
                        },
                        min: 0,
                        max: 100
                    },
                    series: []
                }
            }
        },
        mounted(){
            axios.get(this.url)
                .then(response => {
                    response.data.forEach(series => {
                        this.$children[0].chart.addSeries(series)
                    })
                })
        }
    };
</script>
