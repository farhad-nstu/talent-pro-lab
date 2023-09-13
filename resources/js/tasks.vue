<template>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            {/* <th>Score</th> */}
        </tr>
        </thead>
        <tbody>
        <tr :class="{success: user.id == current}" v-for="(user, key) in sortedUsers">
            <td>{{ ++key }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.score }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['current'],
        data() {
            return {
                users: []
            }
        },
        created() {
            this.fetchTasks();
            this.listenForChanges();
        },
        methods: {
            fetchTasks() {
                axios.get('/tasks').then((response) => {
                    this.users = response.data;
                })
            },
            listenForChanges() {
                Echo.channel('updatestatus')
                .listen('UpdateStatus', (e) => {
                    var user = this.users.find((user) => user.id === e.id);
                        // check if user exists on leaderboard
                        if(user){
                            var index = this.users.indexOf(user);
                            this.users[index].status = e.status;
                        }
                        // if not, add 'em
                        else {
                            this.users.push(e)
                        }
                    })
            }
        },
        computed: {
            sortedUsers() {
                return this.users.sort((a,b) => b.score - a.score)
            }
        }
    }
</script>