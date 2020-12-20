<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <!-- Navbar content -->
            <a class="navbar-brand" href="#">Users Dashboard!</a>
                        <button @click="sortByName" class="btn btn-outline-primary mr-md-2">Sort!</button>
        </nav>
<!--        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">-->
<!--            <a class="navbar-brand" href="#">Users Dashboard!</a>-->
<!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class="navbar-toggler-icon"></span>-->
<!--            </button>-->
<!--            <button @click="sortByName" class="btn btn-outline-primary mr-sm-2">Sort!</button>-->
<!--        </nav>-->
        <div class="row">
            <div v-for="user in users" :key="user.id" class="col-md-3">
                <SingleCard :userData="user"></SingleCard>
            </div>
        </div>
    </div>

</template>
<script>
    import SingleCard from "./SingleCard";
    export default {
        components: {
            SingleCard
        },
        data() {
            return {
                sorted: true,
                user: {
                    "name": "",
                    "avatar": "https://via.placeholder.com/50?text=12",
                    "id": "",
                    "occupation": ""
                },
                users: {},
                id: '',
            }
        },
        methods: {
            allUser() {
                this.$http.get(process.env.MIX_BASE_URL+'/stats/users/').then((response) => {
                    this.users = response.data; // JSON.parse(JSON.stringify(response.data));
                    //console.log(this.users);
                });
            },
            sortByName() {
                this.sorted ? this.sorted = false : this.sorted =  true;
                this.$http.get(process.env.MIX_BASE_URL+'/stats/users?sort='+this.sorted).then((response) => {
                    this.users = response.data; // JSON.parse(JSON.stringify(response.data));
                    // this.sorted != this.sorted;
                });
            },

        },
        mounted() {
            this.allUser();
        },
        computed: {}
    }
</script>
<style scoped>
    img {
        height: 50px;
        width: 50px;
    }
</style>
